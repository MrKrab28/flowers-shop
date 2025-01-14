<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index($status)
    {
        $data = [
            'orders' => Order::where('status', $status)->get()
        ];

        return view('pages.admin.orders', $data);
    }

    public function detail($status, $id)
    {
        $order = Order::where('status', $status)->where('id', $id)->first();

        if ($order) {
            return view('pages.admin.order_detail', compact('order'));
        }
        abort(404);
    }

    public function update($status, $id)
    {
        $order = Order::where('status', $status)->where('id', $id)->first();
        switch ($status) {
            case 'pending':
                $order->status = "Proses";
                break;

            case 'proses':
                $order = Order::with('customer', 'items.product')->find($order->id);

                $user_email = $order->customer->email;


                $data_email = [
                    'subject' => 'testing',
                    'pengirim' => 'andidarmansyah73@gmail.com',
                    'order' => $order


                ];
                Mail::to($user_email)->send(new KirimEmail($data_email, 'Dikirim'));
                $order->status = "Dikirim";
                break;

            default:
                $order->status = "Pending";
                break;
        }

        $order->update();

        return redirect()->route('admin.orders', $status);
    }
}
