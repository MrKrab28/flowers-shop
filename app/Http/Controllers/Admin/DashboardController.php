<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $start = Carbon::today()->startOfWeek();
        $end = Carbon::today()->endOfWeek();


        $labels = [];
        $values = [];

        while ($start <= $end) {
            $labels[] = $start->isoFormat('DD MMM');

            $values[] = Order::where('status', 'Diterima')->whereDate('updated_at', $start)->get()->sum('total');

            $start->addDay();
        }

        $data = [
            'orders' => Order::whereNot('status', 'Diterima')->get()->count(),
            'availableProducts' => Product::whereNot('stok', 0)->get()->count(),
            'emptyProducts' => Product::where('stok', 0)->get()->count(),
            'customers' => User::all()->count(),
            'chart' => [
                'labels' => $labels,
                'data' => $values
            ],
        ];

        return view('pages.admin.dashboard', $data);
    }
}
