<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center">
    <div class="container mx-auto">
        <h2 class="text-center text-2xl font-bold mb-4">Reset Password</h2>
        @if(session('status'))
            <div class="text-green-500 text-center mb-4">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="mb-4">
                <label for="login" class="block text-gray-700">Email atau NO MBKM</label>
                <input type="text" id="login" name="login" required class="border rounded w-full p-2">
                @error('login')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password Baru</label>
                <input type="password" id="password" name="password" required class="border rounded w-full p-2">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="border rounded w-full p-2">
                @error('password_confirmation')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Reset Password</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
