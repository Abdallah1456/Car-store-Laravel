<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;                            //   to check in db
use App\Models\Cart;
use App\Models\Order;

use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    function index()
    {
        $data= Product::all();             //   to get data from db

        return view('product',['products'=>$data]);            //    to send data to view
    }





    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }


    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }




    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }


    

    static function cartItem()
    {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=Session::get('user')['id'];
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }


    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }


    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');

            return view('ordernow',['total'=>$total]);
    }


    function orderPlace(Request $req)
{
    $rules = [
        'payment_method' => 'required',
        'address' => 'required',
    ];

    if ($req->payment_method == 'online') {
        $rules = array_merge($rules, [
            'card_number' => 'required|',
            'expiry_date' => 'required|',
            'cvv' => 'required|',
        ]);
    }
    $validated = $req->validate($rules);
    $userId = Session::get('user')['id'];
    $allCart = Cart::where('user_id', $userId)->get();

    if ($allCart->isEmpty()) {
        return redirect('cartlist')->with('error', 'Your cart is empty.');
    }
    foreach ($allCart as $cart) {
        $order = new Order;
        $order->product_id = $cart->product_id; // Use -> not ['']
        $order->user_id = $cart->user_id;
        $order->status = "pending";
        $order->payment_method = $validated['payment_method'];
        $order->payment_status = "pending";
        $order->address = $validated['address'];
        $order->save();
    }
    Cart::where('user_id', $userId)->delete();
    return redirect('/')->with('success', 'Order placed successfully!');
}



    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->get();

            return view('myorders',['orders'=>$orders]);
    }
}
