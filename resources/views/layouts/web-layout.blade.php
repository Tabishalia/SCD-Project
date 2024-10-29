
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
	<link href="{{ asset('/build/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('/build/assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('/build/assets/css/style.css') }}" rel="stylesheet">

	<title>{{ $title ?? 'Home - Furniture and Interior' }}</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		@include("layouts/navbar")
		<!-- End Header/Navigation -->


        {{ $slot }}

		<!-- Start Footer Section -->
		@include("layouts/footer")
		
		<!-- End Footer Section -->	


		<script src="{{ asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
 		<script src="{{ asset('build/assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('build/assets/js/custom.js') }}"></script>

	</body>

</html>
