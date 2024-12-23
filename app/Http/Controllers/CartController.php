<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{  // View the cart
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('web.cart', compact('cart', 'total'));
    }

    // Add product to the cart
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productImage = $request->input('image');
        $productQuantity = $request->input('quantity', 1);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $productQuantity;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $productQuantity,
                'image' => $productImage
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // Update the quantity of a product
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // Remove product from cart
    public function removeFromCart($id)
{
    // Check if cart exists in session
    $cart = session()->get('cart', []);

    // If the cart has the item
    if(isset($cart[$id])) {
        unset($cart[$id]); // Remove the item
        session()->put('cart', $cart); // Update the session cart
        return response()->json(['success' => true, 'message' => 'Product removed successfully']);
    }
    
    return response()->json(['success' => false, 'message' => 'Product not found in cart']);
}

}


