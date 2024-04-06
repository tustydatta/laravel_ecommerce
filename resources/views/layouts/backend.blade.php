<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website template</title>
	<!-- tailwindcss -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- <link rel="stylesheet" href="{{ asset('/css/tailwind.css') }}"> -->
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <!-- alpine js -->
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="">
<div class="bg-black text-white">
	<nav class="container mx-auto text-center flex flex-row justify-between md:h-24 ">
		<a href="http://127.0.0.1:8000">	
			<img src="{{ URL::to('/') }}/images/logo.png" class="h-16 w-24 md:mt-4 m-14">
		</a>
		<h1 class="mt-4 mr-4 text-5xl">Rokomari</h1>

		<form action="{{ route('adminLogout') }}" method="POST">
			@csrf
			<input type="submit" value="Logout" class="bg-red-700 text-white p-3 mt-5 border border-red-800 rounded-lg">
		</form>
	</nav>


	<div class="min-h-screen bg-[url({{ asset('images/bg2.webp')}})] bg-center bg-cover bg-slate-700/75 bg-blend-darken">

		<div class="backdrop-blur-sm">
			
			<div class="flex flex-row">
				<ul class="min-h-screen w-1/5 bg-slate-800">
					<li class="mb-1 p-3 hover:bg-slate-600">
						<a href="{{ route('admin.dashboard') }}">Dashboard</a>
					</li>

					<li class="mb-1 p-3 hover:bg-slate-600">
						<a href="{{ route('category.index') }}">Product Category</a>
					</li>

					<li class="mb-1 p-3 hover:bg-slate-600">
						<a href="{{ route('items.index') }}">Products</a>
					</li>
				</ul>
				<div class="min-h-screen w-4/5 border border-black">
					@yield('content')
				</div>
				
			</div>
	 	</div>
	</div>

	<footer class="bg-slate-800 border border-gray-300">
		<div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
			<div class="md:flex md:justify-between">
				<div class="mb-6 md:mb-0">
					<a href=""></a>
					<img src="{{ URL::to('/') }}/images/logo.png" class="h-8 w-12 me-3">
				</div>
				<div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-4">
					<div class="sm:gap-8">
						<h2 class="mb-6 text-sm font-semibold uppercase text-orange-400">CONTACT US</h2>
						<ul class="text-gray-400 font-medium">
							<li class="mb-4">
								<a href="#" class="hover:underline">Phone: 01864-903688</a>
							</li>
							<li>
								<a href="#" class="hover:underline">E-mail: tustydatta@gamil.com</a>
							</li>
						</ul>
					</div>	

					<div>
						<h2 class="mb-6 text-sm font-semibold uppercase text-orange-400">Resources</h2>
						<ul class="text-gray-400 font-medium">
							<li class="mb-4">
								<a href="#" class="hover:underline">Rokomari</a>
							</li>
							<li>
								<a href="#" class="hover:underline">Tailwind CSS</a>
							</li>
						</ul>
					</div>
					<div>
						<h2 class="mb-6 text-sm font-semibold uppercase text-orange-400">Follow us</h2>
						<ul class="text-gray-400 font-medium">
							<li class="mb-4">
								<a href="#" class="hover:underline">GitHub</a>
							</li>
							<li>
								<a href="#" class="hover:underline">Discord</a>
							</li>
						</ul>
					</div>
					<div>
						<h2 class="mb-6 text-sm font-semibold uppercase text-orange-400">Legal</h2>
						<ul class="text-gray-400 font-medium">
							<li class="mb-4">
								<a href="#" class="hover:underline">Privacy Policy</a>
							</li>
							<li>
								<a href="#" class="hover:underline">Terms &amp: Conditions</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div>
		<div class="bg-black h-14 text-center mt-2 text-xl">
			<i class="fa-brands fa-facebook m-4"></i>
			<i class="fa-brands fa-twitter m-4"></i>
			<i class="fa-brands fa-instagram m-4"></i>
			<i class="fa-brands fa-linkedin m-4"></i>
		</div>
	</div>

</div>
 
</body>
</html>