<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomeController $request)
    {
        $top_product = Product::orderBy('id', 'DESC')->search()->paginate(8);
        return view('index', compact('top_product'));
    }

    public function view_login()
    {
        $data = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customer.login', compact('data'));
    }

    public function view_register()
    {
        $data = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customer.register', compact('data'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8'
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống'
            ]
        );

        if ($validator->fails())
            return response()->json($validator->errors());
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return view('index');
        $token = $customer->createToken('auth_token')->plainTextToken;
        return response()->json(
            ['data' => $customer, 'access_token' => $token, 'token_type' => 'Bearer',]
        );
    }

    public function login(Request $request) {
        if (Auth::attempt($request->only('email', 'password')))  {
            dd('Sai mật khẩu');
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // $customer = Customer::where('email', $request['email'])->firstOrFail();
        $customer = Customer::where('email', $request['email'])->firstOrFail();
        // $token = $customer->createToken('auth_token')->plainTextToken;

        response()->json(['message' => 'Xin Chào '.$customer->name]);
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('customer.login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Customer::create($request->all())) {
            return redirect()->route('index')->with('success', 'Đăng ký tài khoản thành công');;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
