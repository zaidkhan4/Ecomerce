<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;



class HomeController extends Controller
{

    public function index(){
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd = Order::where('status', 'Delivered')->get()->count();
        $comments = Comment::all();
        $replies = Reply::all();


        return view('admin.index', compact('user','product',
          'order','deliverd', 'comments','replies'  ));
    }

    public function home()
    {
        $products = Product::all();
        $comments = Comment::all();
        $replies = Reply::all();

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

        return view('home.index', compact('products','count','comments','replies'));
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

        $baners = Baner::all();

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

        return view('home.testimonial', compact('count', 'baners'));
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


    public function contactsave(Request $request)
    {

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        flash()->success('Contact Addedd Successfully.');
        return redirect()->back();

    }



    public function add_comment(Request $request)
    {

        if(Auth::id())
        {

            $comment = new Comment;

            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }

    }


    public function add_reply(Request $request)
    {

        if(Auth::id())
        {

            $reply = new Reply;

            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;

            $reply->save();
            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }

    }









//stripe payment

public function stripe($value)
{

    return view('home.stripe',compact('value'));

}



    public function processPayment(Request $request,$value)
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
                $charge = Charge::create([
                    'source' => $request->stripeToken,
                    'description' => 'Payment From Customer',
                    'amount' => $value * 100,
                    'currency' => 'usd',
                ]);




                $name = Auth::user()->name;
                $phone = Auth::user()->phone;
                $address = Auth::user()->address;

                $userid = Auth::user()->id;

                $carts = Cart::where('user_id', $userid)->get();

                foreach ($carts as $cart) {
                    $order = new Order;

                    $order->name = $name;
                    $order->rec_address = $address;
                    $order->phone = $phone;

                    $order->user_id = $userid;
                    $order->product_id = $cart->product_id;

                    $order->payment_status = "paid";
                    $order->save();

                }

                $cart_remove = Cart::where('user_id', $userid)->get();

                foreach ($cart_remove as $remove)
                {
                    $data = Cart::find($remove->id);

                    $data->delete();
                }


                // Payment was successful
                return redirect()->route('mycart')->with('success', 'Your payment was successful. Thank you for your purchase!');
            } catch (CardException $e) {
                return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
            }
        }








}
