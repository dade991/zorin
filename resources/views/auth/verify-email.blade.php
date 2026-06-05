<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - Zorin Rice Milling</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-rice-50 to-rice-100">
        <div class="w-full max-w-md px-6 py-12 space-y-8">
            <!-- Logo & Brand -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-green-600 rounded-xl">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h1 class="mt-6 text-4xl font-bold text-gray-900">
                    Zorin Rice Milling
                </h1>
                <p class="mt-2 text-xl text-gray-600">
                    Verify your email address
                </p>
            </div>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="text-center">
                <p class="text-gray-600">
                    Before proceeding, please check your email for a verification link.
                    If you haven't received the email, we will send you another one.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="mt-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Resend verification email
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>