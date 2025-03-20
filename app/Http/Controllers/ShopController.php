<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {   
        $size = $request->query('size') ? $request->query('size') : 12;
        $o_column = "";
        $o_order = "";
        $order = $request->query('order') ? $request->query('order') : -1;
        
        $products = Product::orderBy('created_at','DESC')->paginate($size);
        return view('shop',compact('products', 'size', 'order'));
    }

    public function product_details($product_slug)
    {   
        $product = Product::where('slug',$product_slug)->first();
        $rproducts = Product::where('slug','<>',$product_slug)->get()->take(8);
        $nextProduct = Product::where('id', '>', $product->id)->orderBy('id')->first();
        $prevProduct = Product::where('id', '<', $product->id)->orderBy('id', 'desc')->first();

        return view('details',compact('product','rproducts','nextProduct','prevProduct'));
    }

}
