<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
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

    public function productDetail()
    {
        return view('Web.ProductDetail');
    }
}
