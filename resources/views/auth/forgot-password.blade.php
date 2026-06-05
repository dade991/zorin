<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-rice-50 to-rice-100">
        <div class="w-full max-w-md px-6 py-12 space-y-8">
            <!-- Logo & Brand -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-rice-600 rounded-xl">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h1 class="mt-6 text-4xl font-bold text-gray-900">
                    Zorin Rice Milling
                </h1>
                <p class="mt-2 text-xl text-gray-600">
                    Reset your password
                </p>
            </div>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email address
                    </label>
                    <input id="email" type="email" name="email" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 text-sm"
                        value="{{ old('email') }}" autocomplete="email">
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Send Password Reset Link
                    </button>
                </div>
            </form>

            <div class="text-center text-sm text-gray-500">
                Remember your password? <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500">
                    Sign in
                </a>
            </div>
        </div>
    </div>
</body>
</html>