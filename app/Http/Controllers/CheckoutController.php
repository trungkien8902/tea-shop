<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('cus');
    }

    public function form()
    {
        return view('checkout');
    }

    public function success()
    {
        return view('checkout_success');
    }

    public function submit_form(Request $req, CartHelper $cart)
    {
        $c_id = Auth::guard('cus')->user()->id;
        $order_name = Auth::guard('cus')->user()->name;
        $order_email = Auth::guard('cus')->user()->email;
        $order_phone = Auth::guard('cus')->user()->phone;
        $order_address = Auth::guard('cus')->user()->address;

        if( $order = Order::create([
            'id_customer' => $c_id,
            'name_reciver' => $order_name,
            'email' => $order_email,
            'phone' => $order_phone,
            'address' => $order_address,
            'notes' => $req->order_note
        ])) {
            $order_id = $order->id;

            foreach($cart->items as $id_product => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetail::create([
                    'id_order' => $order_id,
                    'id_product' => $id_product,
                    'total_money' => $price,
                    'quantity' => $quantity
                ]);
            }
            session(['cart' => '']);
            return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công');
        } else {
            return redirect()->route()->back()->with('error', 'Đặt hàng không thành công');

        }


    }
}
