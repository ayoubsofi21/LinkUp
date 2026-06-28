<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 dark:bg-slate-900">

    <div class="min-h-screen flex items-center justify-center px-6">
        <div class="max-w-5xl w-full grid lg:grid-cols-2 gap-12 items-center">

            <!-- Left -->
            <div>
                <h1 class="text-5xl font-extrabold text-blue-600 mb-6">
                    LinkUp
                </h1>

                <h2 class="text-4xl font-bold text-slate-800 dark:text-white leading-tight mb-6">
                    Connect with developers,<br>
                    share your projects,<br>
                    and grow your network.
                </h2>

                <p class="text-lg text-slate-600 dark:text-slate-300 mb-8">
                    Build your professional profile, publish posts, interact with
                    the community, and collaborate with developers around the world.
                </p>

                <div class="flex gap-4">
                    @auth
                        <a href="{{ route('feed') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Go to Feed
                        </a>
                    @endauth
                    @guest  
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-6 py-3 border border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition">
                            Register
                        </a>
                    @endguest

                    @auth
                        <a href="{{ url('/') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Go to Feed
                        </a>
                    @endauth

                </div>

            </div>

            <!-- Right -->
            <div class="hidden lg:flex justify-center">

                <img
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=900"
                    alt="Developers"
                    class="rounded-3xl shadow-2xl object-cover">

            </div>

        </div>
    </div>

</body>
</html>