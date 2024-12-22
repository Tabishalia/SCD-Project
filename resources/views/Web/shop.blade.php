<x-web-layout title="Shop - Furniture and Interior">

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		<!-- Start Column 1 -->
					  @foreach($products as $product)
                	<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="{{ route('productDetail', $product) }}">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                        <span class="icon-cross">
                            <img src="/build/assets/images/cross.svg" class="img-fluid" alt="Remove">
                        </span>
                    </a>
                	</div>
            	@endforeach 

		      	</div>
		    </div>
		</div>

</x-web-layout>
		