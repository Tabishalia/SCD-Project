<x-web-layout title="Cart - Furniture and Interior">
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Your Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                @foreach(session('cart', []) as $id => $product)
                                    <tr data-id="{{ $id }}">
                                        <td class="product-thumbnail">
                                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid">
                                        </td>
                                        <td class="product-name">{{ $product['name'] }}</td>
                                        <td class="product-price">${{ number_format($product['price'], 2) }}</td>
                                        <td class="product-quantity">
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                                <button class="btn btn-outline-black decrease" type="button" data-id="{{ $id }}">&minus;</button>
                                                <input type="number" class="form-control text-center quantity-amount" value="{{ $product['quantity'] }}" data-id="{{ $id }}" min="1">
                                                <button class="btn btn-outline-black increase" type="button" data-id="{{ $id }}">&plus;</button>
                                            </div>
                                        </td>
                                        <td class="product-total">${{ number_format($product['price'] * $product['quantity'], 2) }}</td>
                                        <td><button class="btn btn-black btn-sm remove-from-cart" data-id="{{ $id }}">X</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                <button class="btn btn-outline-black btn-sm btn-block" onclick="window.location='{{ route('shop') }}'">Continue Shopping</button>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <h3 class="text-black">Cart Totals</h3>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">${{ number_format($total ?? 0, 2) }}</strong>
                            </div>
                        </div>
                        <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='#'">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
