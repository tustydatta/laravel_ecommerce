<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website template</title>
    
    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class=" bg-slate-800">
    <div class="text-center py-6 mx-auto my-16">
        <h3 class="mb-4 text-4xl text-orange-400 mb-6">Admin Login</h3>
        <form action="{{ route('admin_authenticate') }}" method="post" class=" w-4/5 mx-auto py-8 bg-slate-500">
            @csrf
            <div class="w-full mb-4">
                <label for="email" class="text-xl">E-mail</label>
                <div>
                    <input type="email" name="email" placeholder="enter your email address" class="w-2/4 mt-3 ml-4 p-2 rounded-lg text-black">
                </div>
            </div>

            <div class="w-full mb-4">
                <label for="password" class="text-xl">Password</label>
                <div>
                    <input type="password" name="password" placeholder="enter your password" class="w-2/4 mt-3 ml-4 p-2 rounded-lg text-black">
                </div>
            </div>

            <div>
                <input type="submit" value="Login" class="bg-sky-700 text-white p-3 border border-sky-800 rounded-lg">
            </div>
        </form>
    </div>
</body>
