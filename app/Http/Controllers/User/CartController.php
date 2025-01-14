<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmail;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.user.cart');
    }

    public function store(Request $request)
    {
        if ($request->qty > 10) return redirect()->back()->with('error', 'Limit Belanja Melewati Batas');
        if (auth()->user()->cart) {

            $cart = auth()->user()->cart;
        } else {

            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->save();
        }
        $product = Product::find($request->product);
        if ($cart->items->sum('total') + ($product->harga * $request->qty) <= 1000000) {
            $item = CartItem::where('cart_id', $cart->id)->where('kode_product', $request->product)->first();
            if ($item) {
                $item->qty = $item->qty + $request->qty;
                $item->update();
            } else {
                $item = new CartItem();
                $item->cart_id = $cart->id;
                $item->kode_product = $request->product;
                $item->qty = $request->qty;
                $item->save();
            }
        }else{
            return redirect()->back()->with('error', 'Harga Belanja Melewati Batas');
        }




        return redirect()->back()->with('success', 'Berhasil menambah ke keranjang');
    }

    public function checkout()
    {
        $data = [
            'items' => auth()->user()->cartItems
        ];

        return view('pages.user.checkout', $data);
    }

    public function order(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->alamat = $request->alamat;
        $order->no_telp = $request->no_telp;
        $order->kode_pos = $request->kode_pos;
        $order->payment = $request->payment;
        $order->status = 'Pending';
        $order->save();

        foreach (auth()->user()->cartItems as $item) {
            $oi = new OrderItem();
            $oi->order_id = $order->id;
            $oi->kode_product = $item->kode_product;
            $oi->qty = $item->qty;
            $oi->save();

            $product = Product::find($item->kode_product);
            $product->stok = $product->stok - $item->qty;
            $product->update();
        }

        auth()->user()->cart->delete();
         // $user_email = $request->input('email');
        //  $order_id = $request->input('id_order');
         $order = Order::with('customer', 'items.product')->find($order->id);

         $user_email = $order->customer->email;


         $data_email = [
             'subject' => 'testing',
             'pengirim' => 'andidarmansyah73@gmail.com',
             'order' => $order


         ];
         Mail::to($user_email)->send(new KirimEmail($data_email, 'Pending'));

        return redirect()->route('orders')->with('success', 'Berhasil membuat pesanan');
    }
}
