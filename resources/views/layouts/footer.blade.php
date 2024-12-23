<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="/build/assets/images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="/build/assets/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <h5>Tabish Ali</h5>  </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
			<script>
$(document).ready(function () {
    $('#search-bar').on('keyup', function () {
        let query = $(this).val();

        // Universal suggestion route
        let searchUrl = "{{ route('index.search.suggestions') }}";

        if (query.length >= 3) {
            $.ajax({
                url: searchUrl,
                method: 'GET',
                data: { query: query },
                success: function (response) {
                    let suggestions = response.suggestions;
                    let suggestionList = '';

                    if (suggestions.length > 0) {
                        suggestions.forEach(function (product) {
                            suggestionList += `
                                <a class="dropdown-item" href="/productDetail/${product.id}">
                                    ${product.name}
                                </a>`;
                        });
                        $('#suggestion').html(suggestionList).show();
                    } else {
                        $('#suggestion').html('<div class="dropdown-item text-muted">No products found</div>').show();
                    }
                },
                error: function () {
                    $('#suggestion').hide();
                }
            });
        } else {
            $('#suggestion').hide();
        }
    });

    // Hide dropdown when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#search-bar, #suggestion').length) {
            $('#suggestion').hide();
        }
    });
});

</script>
<script>
$(document).ready(function () {

    // Add product to cart
    $(document).on('click', '.add-to-cart', function () {
        const productId = $(this).data('id');
        const productName = $(this).data('name');
        const productPrice = $(this).data('price');
        const productImage = $(this).data('image');
        const productQuantity = 1;

        $.ajax({
            url: '{{ route('cart.add') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: productQuantity
            },
            success: function (response) {
                alert('Product added to cart!');
                updateCartUI(response.cart);
            }
        });
    });

    // Remove product from cart
    $(document).on('click', '.remove-from-cart', function(e) {
    e.preventDefault();
    
    var productId = $(this).data('id'); // Get product ID
    
    $.ajax({
        url: '{{ route('cart.remove', ':id') }}'.replace(':id', productId), // Route to delete product
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}' // CSRF token for security
        },
        success: function(response) {
            if (response.success) {
                // Product removed from cart, update the UI
                alert(response.message); // You can replace with a notification or update cart display
                location.reload(); // Reload the page or update the cart dynamically
            } else {
                alert(response.message); // Handle error case
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error); // Handle errors if any
        }
    });
});


    // Update product quantity
    $(document).on('change', '.quantity-amount', function () {
        const productId = $(this).data('id');
        const quantity = $(this).val();

        $.ajax({
            url: `/cart/update/${productId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            },
            success: function (response) {
                updateCartUI(response.cart);
            }
        });
    });

    // Update the cart UI after actions
    function updateCartUI(cart) {
        let cartTotal = 0;
        $('#cart-table-body').empty();

        for (let id in cart) {
            const item = cart[id];
            const total = item.price * item.quantity;
            cartTotal += total;

            $('#cart-table-body').append(`
                <tr data-id="${id}">
                    <td><img src="${item.image}" width="50"></td>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>
                        <input type="number" class="form-control text-center quantity-amount" value="${item.quantity}" data-id="${id}" min="1">
                    </td>
                    <td>$${total.toFixed(2)}</td>
                    <td><button class="btn btn-black btn-sm remove-from-cart" data-id="${id}">X</button></td>
                </tr>
            `);
        }

        $('#cart-total').text(cartTotal.toFixed(2));
    }
});
</script>


		</footer>