<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('cart',compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        Cart::instance('cart')->add($request->id,$request->name,$request->quantity,$request->price,['size'=>$request->size])->associate('App\Models\Product');
        return redirect()->back();
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);

        if (Session::has('coupon')) {
            $this->calculateDiscount();
        }

        return redirect()->back();
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);

        if (Session::has('coupon')) {
            $this->calculateDiscount();
        }

        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
{
    $coupon_code = $request->coupon_code;

    if (isset($coupon_code)) {
        $coupon = Coupon::whereRaw('LOWER(code) = ?', [strtolower($coupon_code)])
            ->whereDate('expiry_date', '>=', Carbon::today())
            ->where('cart_value', '<=', floatval(preg_replace('/[^\d.]/', '', Cart::instance('cart')->subtotal())))
            ->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'Invalid coupon code!');
        } else {
            Session::put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value,
            ]);

            $this->calculateDiscount();
            return redirect()->back()->with('success', 'Coupon has been applied!');
        }
    } else {
        return redirect()->back()->with('error', 'Invalid coupon code!');
    }
}


   public function calculateDiscount()
{
    $discount = 0;

    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');


        $rawSubtotal = Cart::instance('cart')->subtotal();
        $subtotal = floatval(preg_replace('/[^\d.]/', '', $rawSubtotal));


        if ($coupon['type'] == 'fixed') {
            $discount = $coupon['value'];
        } else {
            $discount = ($subtotal * $coupon['value']) / 100;
        }

        $subtotalAfterDiscount = $subtotal - $discount;

        $taxRate = config('cart.tax');
        $taxAfterDiscount = ($subtotalAfterDiscount * $taxRate) / 100;
        $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

        Session::put('discounts', [
            'discount' => number_format($discount, 2, '.', ''),
            'subtotal' => number_format($subtotalAfterDiscount, 2, '.', ''),
            'tax'      => number_format($taxAfterDiscount, 2, '.', ''),
            'total'    => number_format($totalAfterDiscount, 2, '.', ''),
        ]);
    }
}


    public function remove_coupon_code()
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return back()->with('success', 'Coupon has been removed!');
    }

    public function checkout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        $address = Address::where('user_id',Auth::user()->id)->where('isdefault',1)->first();
        return view('checkout',compact('address'));

    }

    public function place_an_order(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->where('isdefault',true)->first();

        if(!$address)
        {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:10',
                'zip' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required',
            ]);

            $address = new Address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = 'Sri Lanka';
            $address->user_id = $user_id;
            $address->isdefault = true;
            $address->save();

        }

        $this->setAmountforCheckout();

        $order = new Order();

        $order->user_id = $user_id;
        $checkout = Session::get('checkout');
        $order->subtotal = (float) str_replace(',', '', $checkout['subtotal']);
        $order->discount = (float) str_replace(',', '', $checkout['discount']);
        $order->tax = (float) str_replace(',', '', $checkout['tax']);
        $order->total = (float) str_replace(',', '', $checkout['total']);
        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->locality = $address->locality;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->landmark = $address->landmark;
        $order->zip = $address->zip;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($request->mode == "card")
        {
            //
        }
        elseif($request->mode == "paypal")
        {
            //
        }
        elseif($request->mode == "cod" )
        {
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = "pending";
            $transaction->save();
        }


        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');
        Session::put('order_id',$order->id);
        return redirect()->route('cart.order.confirmation');

    }

    public function setAmountforCheckout()
    {
        if(!Cart::instance('cart')->content()->count() > 0)
        {
            Session::forget('checkout');
            return;
        }

        if(Session::has('coupon'))
        {
            Session::put('checkout',[
                'discount' => Session::get('discounts')['discount'],
                'subtotal' => Session::get('discounts')['subtotal'],
                'tax'      => Session::get('discounts')['tax'],
                'total'    => Session::get('discounts')['total'],

            ]);
        }
        else
        {
            Session::put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function order_confirmation()
    {
        if(Session::has('order_id'))
        {

         $order = Order::find(Session::get('order_id'));
         return view('order-confirmation',compact('order'));

        }

        return redirect()->route('cart.index');

    }

}


