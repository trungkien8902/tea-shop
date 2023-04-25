<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $top_product = Product::orderBy('id', 'DESC')->search()->paginate(6);
        return view('index', compact('top_product'));
    }
    public function product()
    {
        $product = Product::orderBy('id', 'DESC')->search()->paginate(10);
        return view('product', compact('product'));
    }

    public function about()
    {
        return view('about');
    }

    public function news()
    {
        return view('news');
    }

    public function contact()
    {
        return view('contact');
    }

    public function product_detail()
    {
        $product = Product::orderBy('id', 'DESC')->search()->paginate(10);
        return view('product_detail', compact('product'));
    }
}

