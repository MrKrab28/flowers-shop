<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class OrderController extends Controller
{
    public function index($status)
    {
        $statusMap = [
            'selesai' => 'diterima'
        ];

        $statusToFind = $statusMap[$status] ?? $status;
        $data = [
            'orders' => Order::where('status', $statusToFind )->get()
        ];

        return view('pages.admin.orders', $data);
    }

    public function detail($status, $id)
    {
        $statusMap = [
            'selesai' => 'diterima'
        ];

        $statusToFind = $statusMap[$status] ?? $status;
        $order = Order::where('status', $statusToFind)->where('id', $id)->first();

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
                $order->status = "proses";
                break;

            case 'proses':
                $order = Order::with('customer', 'items.product')->find($order->id);

                // $user_email = $order->customer->email;


                // $data_email = [
                //     'subject' => 'testing',
                //     'pengirim' => 'andidarmansyah73@gmail.com',
                //     'order' => $order


                // ];
                // Mail::to($user_email)->send(new KirimEmail($data_email, 'Dikirim'));

                $order->status = "dikirim";
                break;

            default:
                $order->status = "pending";
                break;
        }

        $order->update();

        return redirect()->route('admin.orders', $status);
    }

    public function cetakLaporan(Order $order)
    {

        $orders = Order::with('items' , 'customer')->where('status', 'diterima')->get();


        $pdf = PDF::loadView('pages.admin.laporan-order', compact('orders'));
        return $pdf->stream('laporan-order.pdf');
    }
}
