<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class WebController extends Controller
{
    

    public function index(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');
    $categoryId = $request->input('category_id');

    // Build the query for filtering products
    $products = Product::query()
        ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
        ->when($query, fn($q) => $q->where(function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
              ->orWhere('description', 'like', "%$query%");
        }))
        ->orderBy('created_at', 'desc')
        ->paginate(12);

    // Fetch categories for the category dropdown
    $categories = Category::all();

    // Return the view for the index page with the products
    return view('web.index', compact('products', 'categories', 'query', 'categoryId'));
}


public function shop(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');
    $categoryId = $request->input('category_id');

    // Build the query for filtering products
    $products = Product::query()
        ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
        ->when($query, fn($q) => $q->where(function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
              ->orWhere('description', 'like', "%$query%");
        }))
        ->orderBy('created_at', 'desc')
        ->paginate(12);

    // Fetch categories for the category dropdown
    $categories = Category::all();

    // Return the view for the shop page with the products
    return view('web.shop', compact('products', 'categories', 'query', 'categoryId'));
}

public function getProductSuggestions(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'like', "%$query%")
                       ->orWhere('description', 'like', "%$query%")
                       ->limit(5)
                       ->get();

    return response()->json([
        'suggestions' => $products
    ]);
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
