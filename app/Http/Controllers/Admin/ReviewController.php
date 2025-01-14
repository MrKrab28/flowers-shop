<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::has('order.review')->get()
        ];

        return view('pages.admin.reviews', $data);
    }
}
