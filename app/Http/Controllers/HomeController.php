<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRegister;
use App\Models\Customer;
use Mail;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $top_product = Product::orderBy('id', 'DESC')->search()->paginate(6);
        return view('index', compact('category', 'top_product'));
    }
    public function product()
    {
        $category = Category::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $product = Product::orderBy('id', 'DESC')->search()->paginate(10);
        return view('product', compact('category', 'product'));
    }

    public function view($id)
    {
        $top_product = Product::orderBy('id', 'DESC')->search()->paginate(6);
        $model = Category::where('id', $id)->first();
        $product = Product::where('id', $id)->first();
        $category = Category::where('is_active', 1)->orderBy('name', 'ASC')->get();
        if($model) {
            return view('product_forcate', ['model' => $model, 'category' => $category]);
        }
        else if($product) {
            return view('product_detail', ['model' => $product, 'category' => $category]);
        }
        else {
            return view('404');
        }
    }

    public function about()
    {
        return view('about');
    }
    
    public function register(){
        return view('register');
    }
    
    public function post_register(Request $request){
        // $validate = $request->validated();
        if(Customer::create($request->all())) {
            return redirect()->route('home.login')->with('success', 'Đăng ký thành công');
        }
    }


    public function login()
    {
        return view('login');
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

        // $credentials = ['email' => $request->email, 'password' => $request->password];
        if(Auth::guard('cus')->attempt($request->only('email', 'password'), false)) {
            return redirect()->route('home.index');
        }
        else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home.index');
    }

    public function news()
    {
        $news = News::where('is_active', 1)->orderBy('id', 'ASC')->paginate(10);
        return view('news', compact('news'));
    }

    public function news_detail()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        return view('news_detail', compact('news'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function post_contact(Request $req)
    {
        Mail::send('mail.contact', [
            'name' => $req->name,
            'content' => $req->content,

        ], function($message) use($req) {
            $message->to('trungkienlx02@gmail.com', $req->name);
            $message->from($req->email);
            $message->subject('Test Email');
        });
        return redirect()->route('home.index');
    }

    public function product_detail()
    {
        $product = Product::orderBy('id', 'DESC')->search()->paginate(10);
        return view('product_detail', compact('product'));
    }
}

