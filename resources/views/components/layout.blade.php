<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Blog' }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    
    <nav class="bg-white border-b border-gray-200 py-4 px-6 md:px-12 mb-8 shadow-sm">
        <div class="max-w-3xl mx-auto flex justify-between items-center">
            
            <a href="/posts" class="text-xl font-bold text-indigo-600">Hashing Blog</a>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm font-medium text-gray-600">
                        Hello, {{ auth()->user()->name }}
                    </span>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-600 hover:text-red-800">
                            Log Out
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Log in</a>
                    <a href="{{ route('register') }}" class="rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto p-6 md:p-12">
        {{ $slot }}
    </div>

</body>

</html>