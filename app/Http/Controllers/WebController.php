<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('web.index',compact('products'));
    }

    public function shop()
    {
        return view('Web.shop');
    }

    public function about()
    {
        return view('Web.about');
    }

    public function blog()
    {
        return view('Web.blog');
    }

    public function contact()
    {
        return view('Web.contact');
    }

    public function services()
    {
        return view('Web.services');
    }

    public function cart()
    {
        return view('Web.cart');
    }

    public function productDetail(Product $product)
    {
        return view('Web.ProductDetail', compact('product'));
    }
}
