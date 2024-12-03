<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Stripe;

use Session;

use Illuminate\SUpport\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){

        $user = User::where('usertype','user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $deliverd = Order::where('status','Terkirim')->get()->count();

        return view('admin.index',compact('user','product','order','deliverd'));
    }

    public function home(){
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();

        if (!$user) {
            toastr()->timeOut(10000)->closeButton()->addError('Silakan login untuk menambahkan produk ke keranjang.');
            return redirect()->back();
        }

        $user_id = $user->id;

        // Validasi jika jumlah produk di keranjang sudah melebihi stok
        $product = Product::find($product_id);
        $cart_count = Cart::where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->count();

        if ($cart_count >= $product->quantity) {
            toastr()->timeOut(10000)->closeButton()->addError('Anda tidak dapat menambahkan lebih banyak produk dari stok tersedia.');
            return redirect()->back();
        }

        // Jika validasi lolos, tambahkan produk ke keranjang
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Ditambahkan ke Keranjang');
        return redirect()->back();
    }


    public function mycart()
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Dihapus dari Daftar Keranjang');

        return redirect()->back();
    }

    public function comfirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

            // Kurangi stok produk
            $product = Product::find($carts->product_id);
            if ($product->quantity > 0) {
                $product->quantity -= 1; // atau kurangi sesuai jumlah di keranjang
                $product->save();
            }
        }

        // Hapus keranjang pengguna
        Cart::where('user_id', $userid)->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Produk berhasil dipesan');
        return redirect()->back();
    }


    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id',$user)->get()->count();

        $order = Order::where('user_id',$user)->get();

        return view('home.order',compact('count','order'));
    }

    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "idr",

                "source" => $request->stripeToken,

                "description" => "Test payment from complete" 

        ]);

      

        $name = Auth::user()->name;

        $phone = Auth::user()->phone;

        $address = Auth::user()->address;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->payment_status = 'Terbayar';

            $order->product_id = $carts->product_id;

            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Dipesan');

        return redirect('mycart');

    }

    public function shop(){
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.shop',compact('product','count'));
    }

    public function why(){
       

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.why',compact('count'));
    }

    public function testimonial(){
       

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.testimonial',compact('count'));
    }

    public function contact(){
       

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.contact',compact('count'));
    }

}
