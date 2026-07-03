<nav
    x-data="{ open: false, dropdown: false }"
    class="sticky top-0 z-50
    bg-white/90 dark:bg-[#1e293b]/90
    backdrop-blur-xl
    border-b border-slate-200/80 dark:border-slate-800/80
    shadow-sm
    transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-4">
            <!-- Left Side -->
            <div class="flex items-center flex-1 max-w-md gap-4">
                <!-- Logo -->
                <a href="{{ route('feed') }}" class="flex items-center gap-3 group">
                    <!-- Logo Icon Container -->
               <div
                    class="flex h-11 w-11 items-center justify-center
                        rounded-2xl overflow-hidden
                        shadow-lg shadow-brand-500/20
                        transition-all duration-300
                        group-hover:scale-105">

                    <img
                        src="{{ asset('images/linkup-logo.png') }}"
                        alt="LinkUp Logo"
                        class="w-full h-full object-cover">
                </div>
                    <!-- Brand Name -->
                    <div class="hidden sm:flex flex-col leading-none">
                        <span
                            class="text-xl font-extrabold tracking-tight
                                text-slate-900 dark:text-white
                                transition-colors duration-200
                                group-hover:text-brand-500 dark:group-hover:text-brand-400">
                            LinkUp
                        </span>
                    </div>
                </a>
                <!-- Search -->
                <div class="relative hidden md:block w-full max-w-md">
                    <!-- Search Icon -->
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <svg
                            class="w-5 h-5 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <!-- Search Input -->
                    <input
                        type="text"
                        placeholder="Search people, posts, jobs..."
                        class="w-full
                            h-11
                            pl-11
                            pr-4
                            rounded-xl
                            border border-slate-200/80 dark:border-slate-700/80
                            bg-slate-50 dark:bg-slate-800/50
                            text-sm text-slate-700 dark:text-slate-200
                            placeholder:text-slate-400
                            shadow-sm
                            transition-all duration-200
                            focus:outline-none
                            focus:bg-white dark:focus:bg-slate-800
                            focus:border-brand-500
                            focus:ring-4
                            focus:ring-brand-500/10" />
                </div>
            </div>
            <!-- Center Navigation -->
            <div class="hidden lg:flex items-center gap-1">
                <!-- Dashboard (Active State) -->
                <a
                    href="{{ route('feed') }}"
                    class="flex flex-col items-center justify-center w-16 h-14 text-brand-500 dark:text-brand-400 border-b-2 border-brand-500 dark:border-brand-400">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Home
                    </span>
                </a>
                <!-- Home / Feed -->
                <a
                    href="{{ url('/') }}"
                    class="flex flex-col items-center justify-center
                            w-16 h-14
                            text-slate-500 dark:text-slate-400
                            hover:text-brand-500 dark:hover:text-brand-400
                            hover:bg-slate-50 dark:hover:bg-slate-800/50
                            rounded-xl
                            transition-all duration-200">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.879 6.196A9 9 0 015.121 17.804z"/>
                    </svg>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Feed
                    </span>
                </a>
                <!-- Network -->
                <a
                    href="#"
                    class="flex flex-col items-center justify-center w-16 h-14 text-slate-500 dark:text-slate-400 hover:text-brand-500 dark:hover:text-brand-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition duration-200">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Network
                    </span>
                </a>
                <!-- Jobs -->
                <a
                    href="#"
                    class="flex flex-col items-center justify-center w-16 h-14 text-slate-500 dark:text-slate-400 hover:text-brand-500 dark:hover:text-brand-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition duration-200">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Jobs
                    </span>
                </a>
                <!-- Messages -->
                <a
                    href="#"
                    class="relative flex flex-col items-center justify-center w-16 h-14 text-slate-500 dark:text-slate-400 hover:text-brand-500 dark:hover:text-brand-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition duration-200">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="absolute top-2 right-3 w-2 h-2 bg-amber-500 rounded-full"></span>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Messages
                    </span>
                </a>
                <!-- Notifications -->
                <a
                    href="#"
                    class="relative flex flex-col items-center justify-center w-16 h-14 text-slate-500 dark:text-slate-400 hover:text-brand-500 dark:hover:text-brand-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition duration-200">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1 right-2 bg-red-500 text-white text-[9px] font-bold rounded-full h-4 w-4 flex items-center justify-center">
                        3
                    </span>
                    <span class="hidden xl:block text-[10px] mt-1 font-medium">
                        Notifications
                    </span>
                </a>
            </div>
            <!-- Right Side -->
            <div class="flex items-center gap-3">
                <!-- Divider -->
                <div class="hidden sm:block h-8 w-px bg-slate-200 dark:bg-slate-700"></div>
                <!-- Dark Mode Toggle -->
                <button
                    @click="$store.theme.toggle()"
                    class="p-2 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646A9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646"/>
                    </svg>
                </button>
                
                @auth
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ dropdown: false }">
                    <button
                        @click="dropdown = !dropdown"
                        @click.away="dropdown = false"
                        class="flex items-center gap-2 rounded-xl focus:outline-none group">
                        <img
                            class="h-9 w-9 rounded-xl object-cover ring-2 ring-brand-500/20 group-hover:ring-brand-500/40 transition-all"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                            alt="{{ Auth::user()->name }}">
                        <div class="hidden md:flex flex-col items-start">
                            <span class="text-sm font-semibold text-slate-800 dark:text-slate-200">
                                {{ Auth::user()->name }}
                            </span>
                            <span class="text-xs text-slate-500 dark:text-slate-400">
                                Me
                            </span>
                        </div>
                        <svg
                            class="hidden sm:block h-4 w-4 text-slate-400 transition-transform duration-200"
                            :class="{ 'rotate-180': dropdown }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown Content -->
                    <div
                        x-show="dropdown"
                        x-cloak
                        x-transition
                        class="absolute right-0 mt-3 w-72 rounded-2xl bg-white dark:bg-[#1e293b] border border-slate-200 dark:border-slate-800 shadow-2xl overflow-hidden z-50">
                        <!-- User Info -->
                        <div class="p-5 border-b border-slate-200 dark:border-slate-700">
                            <div class="flex items-center gap-3">
                                <img
                                    class="h-14 w-14 rounded-2xl object-cover ring-2 ring-brand-500/20"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                    alt="{{ Auth::user()->name }}">
                                <div class="overflow-hidden">
                                    <h3 class="font-semibold text-slate-900 dark:text-white truncate">
                                        {{ Auth::user()->name }}
                                    </h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 truncate">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Menu -->
                        <div class="py-2">
                            <a
                                href="{{ route('profile.edit') }}"
                                class="flex items-center gap-3 px-5 py-3 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196A9 9 0 015.121 17.804z"/>
                                </svg>
                                My Profile
                            </a>
                            <a
                                href="{{ route('profile.edit') }}"
                                class="flex items-center gap-3 px-5 py-3 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l.7 2.153a1 1 0 00.95.69h2.264c.969 0 1.371 1.24.588 1.81l-1.832 1.332a1 1 0 00-.364 1.118l.7 2.153c.3.921-.755 1.688-1.54 1.118l-1.832-1.332a1 1 0 00-1.176 0l-1.832 1.332c-.784.57-1.838-.197-1.539-1.118l.699-2.153a1 1 0 00-.364-1.118L6.547 7.58c-.783-.57-.38-1.81.588-1.81h2.264a1 1 0 00.951-.69l.699-2.153z"/>
                                </svg>
                                Settings
                            </a>
                        </div>
                        <div class="border-t border-slate-200 dark:border-slate-700"></div>
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="flex items-center gap-3 w-full px-5 py-3 text-left text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Guest Buttons -->
                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        Login
                    </a>
                    <a
                        href="{{ route('register') }}"
                        class="px-4 py-2 text-sm font-medium rounded-xl bg-brand-500 hover:bg-brand-600 text-white transition shadow-sm shadow-brand-500/10">
                        Register
                    </a>
                </div>
                @endauth
                
                <!-- Mobile Menu Toggle Button -->
                <button
                    @click="open = !open"
                    class="lg:hidden p-2 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            :class="{'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path
                            :class="{'hidden': !open, 'inline-flex': open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Panel -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white dark:bg-[#1e293b] border-t border-slate-200 dark:border-slate-800">
        <!-- Search -->
        <div class="p-4 border-b border-slate-200 dark:border-slate-800">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                        class="h-5 w-5 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input
                    type="text"
                    placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-800 border-none text-slate-800 dark:text-slate-200 placeholder-slate-400 focus:ring-2 focus:ring-brand-500">
            </div>
        </div>
        <!-- Links -->
        <div class="py-2 px-2 space-y-1">
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-brand-500 bg-brand-50/60 dark:bg-brand-500/10 transition">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>
            <a
                href="{{ url('/') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                <span>📰</span>
                <span>Feed</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                <span>👥</span>
                <span>Network</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                <span>💼</span>
                <span>Jobs</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                <span>💬</span>
                <span>Messages</span>
            </a>
            <a
                href="#"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                <span>🔔</span>
                <span>Notifications</span>
            </a>
        </div>
        
        @auth
        <!-- Auth Profile Footer -->
        <div class="border-t border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/20">
            <div class="p-4 flex items-center gap-4">
                <img
                    class="w-12 h-12 rounded-2xl object-cover ring-2 ring-brand-500/20"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                    alt="{{ Auth::user()->name }}">
                <div class="overflow-hidden">
                    <h3 class="font-semibold text-slate-900 dark:text-white truncate">
                        {{ Auth::user()->name }}
                    </h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 truncate">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            <div class="px-2 pb-4 space-y-1">
                <a
                    href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                    <span>⚙️</span>
                    <span>Profile Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="flex items-center gap-3 w-full px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 transition text-left">
                        <span>🚪</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        @else
        <!-- Guest Action Buttons -->
        <div class="border-t border-slate-200 dark:border-slate-700 p-4 grid grid-cols-2 gap-3">
            <a
                href="{{ route('login') }}"
                class="flex items-center justify-center h-11 px-4 rounded-xl border border-slate-300 dark:border-slate-700 text-sm font-semibold text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                Login
            </a>
            <a
                href="{{ route('register') }}"
                class="flex items-center justify-center h-11 px-4 rounded-xl bg-gradient-to-r from-brand-500 to-sky-400 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all transform active:scale-95">
                Register
            </a>
        </div>
        @endauth
    </div>
</nav>