<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $order_count = 12;
        $cus_count = 12;
        $orders = Order::where('status', 0)->get();
        if(request()->date_from && request()->date_to) {
            $orders = Order::where('status', 0)->whereBetween('created_at', [request()->date_from, request()->date_to])->get();
        }
        return view('admin.index', compact('product_count', 'order_count', 'cus_count', 'orders'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function post_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ]);


        if(Auth::attempt($request->only('email', 'password'), $request->has('rmb'))) {
            return redirect()->route('admin.index');
        }
        else {
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
