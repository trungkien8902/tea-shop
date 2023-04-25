<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function view_login()
    {
        return view('auth.login');
    }

    public function view_register()
    {
        return view('auth.register');
    }

    public function customer()
    {
        $cus = Customer::orderBy('id', 'DESC')->get();
        return response([
            'data' => $cus,
            'status_code' => 200,
            'message' => 'ok'
        ]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:customer',
           'password' => 'required|string|min:6'
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ]);

        if($validator->fails())return response()->json($validator->errors());
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(
        ['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
      }
      
    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password')))  {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json(['message' => 'Chào '.$user->name,
            'access_token' => $token, 'token_type' => 'Bearer',]);
        }

    // public function logout(){
    //     auth()->user()->tokens()->delete();
    //     return ['message' => 'Bạn đã thoát ứng dụng và token đã xóa'];
    // }
}
