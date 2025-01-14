<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::orderBy('nama')->get()
        ];

        return view('pages.admin.product', $data);
    }

    public function add()
    {
        return view('pages.admin.product_add');
    }

    public function store(Request $request)
    {
        $file = $request->file('img');
        $filename = time() . '.' . $file->extension();

        $product = new Product();
        $product->kode = $request->kode;
        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->stok = convertToNumeric($request->stok);
        $product->harga = convertToNumeric($request->harga);
        $product->img = $filename;
        $product->save();

        $file->move(public_path('files/product/'), $filename);

        return redirect()->route('admin.products')->with('success', 'Berhasil menambah product');
    }

    public function edit(Request $request)
    {
        if ($request->has('kode')) {
            $data = [
                'product' => Product::find($request->kode)
            ];

            return view('pages.admin.product_edit', $data);
        }
        abort(404);
    }

    public function update(Request $request)
    {
        $file = $request->file('img');

        if ($file) {
            $filename = time() . '.' . $file->extension();
        }

        $product = Product::find($request->kode);
        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->stok = convertToNumeric($request->stok);
        $product->harga = convertToNumeric($request->harga);
        if ($file) {
            File::delete(public_path('files/product/' . $product->img));
            $product->img = $filename;
            $file->move(public_path('files/product/'), $filename);
        }
        $product->update();

        return redirect()->route('admin.products')->with('success', 'Update product berhasil');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->kode);
        File::delete(public_path('files/product/' . $product->img));
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Hapus product berhasil');
    }
}
