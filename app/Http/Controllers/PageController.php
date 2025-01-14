<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $data = [
                'products' => Product::where('nama', 'like', '%' . $request->q . '%')->orWhere('deskripsi', 'like', '%' . $request->q . '%')->orderBy('nama')->paginate(12)
            ];
        } else {
            $data = [
                'products' => Product::orderBy('nama')->paginate(12)
            ];
        }

        return view('index', $data);
    }
}
