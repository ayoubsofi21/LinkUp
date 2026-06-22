<!DOCTYPE html>
<html lang="fr" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp — Réseau Social Professionnel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                        }
                    }
                }
            }
        }
    </script>
    
    <script defer href="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { -webkit-font-smoothing: antialiased; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 dark:bg-[#0f172a] dark:text-slate-100 transition-colors duration-300 antialiased min-h-screen flex flex-col">

    <nav class="sticky top-0 z-50 bg-white/80 dark:bg-[#1e293b]/80 backdrop-blur-md border-b border-slate-200/80 dark:border-slate-800/80 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 gap-4">
                
                <div class="flex items-center flex-1 max-w-md gap-4">
                    <a href="#" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-sky-400 flex items-center justify-center shadow-md shadow-brand-500/20 transform group-hover:scale-105 transition-all duration-300">
                            <span class="text-white font-bold text-xl tracking-tighter">Lp</span>
                        </div>
                        <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-slate-900 to-slate-700 dark:from-white dark:to-slate-300 bg-clip-text text-transparent hidden sm:block">LinkUp</span>
                    </a>
                    
                    <div class="relative w-full hidden md:block">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input type="text" placeholder="Rechercher un membre, un emploi..." class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 text-sm rounded-xl border-none focus:ring-2 focus:ring-brand-500/50 transition-all placeholder-slate-400 dark:text-slate-200">
                    </div>
                </div>

                <div class="flex items-center gap-1 sm:gap-3">
                    <a href="#" class="flex flex-col items-center justify-center w-12 sm:w-16 h-14 text-brand-500 dark:text-brand-400 border-b-2 border-brand-500 relative group">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span class="text-[10px] font-medium mt-1 hidden lg:block">Accueil</span>
                    </a>

                    <a href="#" class="flex flex-col items-center justify-center w-12 sm:w-16 h-14 text-slate-500 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 transition-colors group">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span class="text-[10px] font-medium mt-1 hidden lg:block">Réseau</span>
                    </a>

                    <a href="#" class="flex flex-col items-center justify-center w-12 sm:w-16 h-14 text-slate-500 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 transition-colors group">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-[10px] font-medium mt-1 hidden lg:block">Emplois</span>
                    </a>

                    <a href="#" class="flex flex-col items-center justify-center w-12 sm:w-16 h-14 text-slate-500 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 transition-colors relative group">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span class="absolute top-2 right-2 lg:right-4 w-2 h-2 bg-amber-500 rounded-full"></span>
                        <span class="text-[10px] font-medium mt-1 hidden lg:block">Messages</span>
                    </a>

                    <a href="#" class="flex flex-col items-center justify-center w-12 sm:w-16 h-14 text-slate-500 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 transition-colors relative group">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1.5 right-1.5 lg:right-3 bg-rose-500 text-white font-bold text-[9px] h-4 w-4 rounded-full flex items-center justify-center scale-90">3</span>
                        <span class="text-[10px] font-medium mt-1 hidden lg:block">Notifications</span>
                    </a>

                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-1 hidden sm:block"></div>

                    <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="p-2 rounded-xl text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-all">
                        <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg x-show="darkMode" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M16.243 17.657l.707.707M6.343 4.343l.707.707M12 7a5 5 0 100 10 5 5 0 000-10z"/></svg>
                    </button>

                    <div class="relative ml-1" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center gap-1 focus:outline-none">
                            <img class="h-8 w-8 rounded-xl object-cover ring-2 ring-brand-500/20" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=256&q=80" alt="Youssef Profile">
                            <svg class="h-4 w-4 text-slate-400 hidden sm:block transition-transform duration-200" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <div x-show="open" x-cloak class="absolute right-0 mt-2 w-48 rounded-xl bg-white dark:bg-[#1e293b] border border-slate-200 dark:border-slate-800 shadow-xl py-1 z-50">
                            <div class="px-4 py-2 border-b border-slate-100 dark:border-slate-800">
                                <p class="text-xs text-slate-400">Connecté en tant que</p>
                                <p class="text-sm font-semibold truncate text-slate-800 dark:text-slate-200">Youssef</p>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">Mon Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">Paramètres</a>
                            <a href="#" class="block px-4 py-2 text-sm text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-950/30">Déconnexion</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

</body>
</html>