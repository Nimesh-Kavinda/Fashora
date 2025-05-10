<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   
         $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('user.orders',compact('orders')); 
    }

    public function order_details($order_id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->first();
        if($order)
        {
            $orderItems = OrderItem::where('order_id',$order->id)->orderBy('id')->paginate(12);
            $transaction = Transaction::where('order_id',$order->id)->first();
            return view('user.order-details',compact('order','orderItems','transaction'));
        }
        else
        {
            return redirect()->route('login');
        }
       
    }

    public function order_cancle(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = "canceled";
        $order->canceled_date = Carbon::now();
        $order->save();
        return back()->with('status', "Order has been canceled!");
    }

    public function update_information(Request $request, $id)
    {
        
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->name = $request->name;
    $user->mobile = $request->mobile;
    $user->email = $request->email;

    $passwordChanged = false;

    if ($request->filled('old_password') && $request->filled('new_password')) {
       if (!Hash::check($request->old_password, $user->password)) {
        return back()->with('status_fail', 'Old password is incorrect!');
        }

         if ($request->new_password !== $request->new_password_confirmation) {
            return back()->with('status_fail', 'Confirmation password do not match!');
        }

        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->new_password);
        $passwordChanged = true;
    }

    $user->save();

    if ($passwordChanged) {
        Auth::logout(); 
        return redirect()->route('login')->with('status', 'Password changed successfully. Please login again.');
    }

    return back()->with('status', 'Profile successfully updated.');
    }
}
