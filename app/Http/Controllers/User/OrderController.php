<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'orders' => Order::where('user_id', auth()->user()->id)->get()
        ];

        return view('pages.user.orders', $data);
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order) {
            return view('pages.user.order_detail', compact('order'));
        }
        abort(404);
    }

    public function terima($id)
    {
        $order = Order::find($id);
        $order->status = "Diterima";
        $order->update();

        return redirect()->route('orders')->with('success', 'Pesanan telah diterima');
    }

    public function review(Request $request)
    {
        $review = new Review();
        $review->order_item_id = $request->item;
        $review->score = $request->rating;
        $review->save();

        return redirect()->back()->with('success', 'Ulasan telah terkirim');
    }
}
