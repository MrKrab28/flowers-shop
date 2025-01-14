<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('pages.admin.account');
    }

    public function update(Request $request)
    {
        $admin = Admin::find(auth()->user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = $request->password;
        }
        $admin->save();

        return redirect()->back()->with('success', 'Update akun berhasil');
    }
}
