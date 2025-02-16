<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index(){
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd = Order::where('status', 'Delivered')->get()->count();


        return view('admin.index', compact('user','product',
          'order','deliverd'  ));
    }

    public function home()
    {
        $products = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.index', compact('products','count'));
    }

    public function login_home()
    {
        $products = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.index', compact('products','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.product_detail', compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        flash()->success('Products Addedd to the Cart Successfully.');
        return redirect()->back();
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

            $carts = Cart::where('user_id', $userid)->get();

        }
        else
        {
            $count = '';
        }

        return view('home.mycart',compact('count','carts'));
    }


    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        flash()->success('Cart Remove Successfully.');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;

        $carts = Cart::where('user_id', $userid)->get();

        foreach ($carts as $cart) {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;

            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        return redirect()->back();

    }


    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        $orders = Order::where('user_id', $user)->get();


        return view('home.order', compact('count','orders'));
    }


    public function shop()
    {
        $products = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.shop', compact('products','count'));
    }


    public function why()
    {
    

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.why', compact('count'));
    }


    public function testimonial()
    {


        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.testimonial', compact('count'));
    }



    public function contact()
    {


        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

        }
        else
        {
            $count = '';
        }

        return view('home.contact', compact('count'));
    }



}
