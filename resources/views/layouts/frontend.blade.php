<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website template</title>
	<!-- tailwindcss -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- <link rel="stylesheet" href="{{ URL::asset('css/tailwind.css') }}"> -->
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <!-- alpine js -->
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
</head>
<body>
<div class="bg-black text-white">
	<header class="fixed w-full z-50 bg-black">
		<nav class="container mx-auto text-center flex flex-row justify-between md:h-24 ">
			<a href="http://127.0.0.1:8000">	
				<img src="{{ URL::to('/') }}/images/logo.png" class="h-16 w-24 md:mt-4 m-14">
			</a>
			
			<ul class="md:flex md:flex-row mt-8 mr-4 text-xl">
				<li><a href="{{ route('home') }}" class="mx-8">Home</a></li>
				<li class="group relative cursor-pointer">
					<div class="flex items-center justify-between space-x-4 px-3">
						<a href="{{ route('all_category') }}" class="menu-hover lg:mx-4">
							Category
						</a>
						<i class="fa-solid fa-chevron-down"></i>
						
					</div>

					<div
						class="invisible absolute z-50 flex w-full bg-black flex-col mt-5 py-1 px-4 shadow-xl group-hover:visible">

						@forelse($menuCategory as $cat)
						<a  href="{{ route('category_product', $cat->id) }}"
							class="my-2 block border-b border-gray-100 py-1 text-base text-white hover:text-orange-400 md:mx-2">
							{{ $cat->name }}
						</a>
						@empty
						@endforelse
					</div>
				</li>
				<li><a href="#" class="mx-8">About</a></li>
				<li><a href="#" class="mx-8">Contact</a></li>
			</ul>
			
			<div class="mt-8 flex flex-row">
				<a href="{{ route('cart') }}">
					<i class="fa-solid fa-cart-shopping p-4 fa-lg relative">
						<span class="absolute right-0 top-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center"
							id="cart_icon"
						></span>
					</i>
				</a>
				
				<a href="{{ route('wish') }}">
					<i class="fa-solid fa-hand-holding-heart mr-2 py-4 px-3 fa-lg relative">
						<span class="absolute right-0 top-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center"
							id="wish_icon"
						>0
						</span>
					</i>
				</a>
				

				<div>
					@guest
						<a href="{{ route('login') }}" class="bg-sky-700 text-white p-2 border border-sky-800 rounded-lg">Login</a>
						<a href="{{ route('register') }}" class="bg-green-700 text-white p-2 border border-green-800 rounded-lg">Register</a>
					@else
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<input type="submit" value="Logout" class="bg-red-700 text-white px-2 py-1 border border-red-800 rounded-lg">
						</form>
					@endguest
				</div>
			</div>
		</nav>
	</header>

	@guest
	<div class="min-h-screen bg-[url({{ asset('images/grocery1.jpg')}})] bg-center bg-cover bg-fixed bg-slate-700/75 bg-blend-darken">
	@else
	<div class="min-h-screen bg-[url({{ asset('images/grocery.png')}})] bg-center bg-cover bg-fixed bg-slate-700/75 bg-blend-darken">
	@endguest
		<div class="backdrop-blur-sm px-14">
            <div class="pb-6 pt-24">
                @yield('content')
            </div>
	 	</div>	
	</div>

	<footer class="bg-slate-800">
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

	<div class="bg-black h-14 text-center mt-2 text-xl">
		<i class="fa-brands fa-facebook m-4"></i>
		<i class="fa-brands fa-twitter m-4"></i>
		<i class="fa-brands fa-instagram m-4"></i>
		<i class="fa-brands fa-linkedin m-4"></i>
	</div>
</div>
 
</body>
</html>