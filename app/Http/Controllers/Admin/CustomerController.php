<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all()
        ];

        return view('pages.admin.users', $data);
    }

    public function edit($id)
    {
        $data = [
            'user' => User::find($id)
        ];

        return view('pages.admin.user_edit', $data);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Update customer berhasil');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
