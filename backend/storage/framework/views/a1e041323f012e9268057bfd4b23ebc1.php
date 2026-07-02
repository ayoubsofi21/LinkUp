<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', mobileMenu: false, faqOpen: null }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>LinkUp — The Developer Professional Network</title>
    <meta name="description" content="LinkUp is the professional network built exclusively for developers. Share projects, connect with peers, discover opportunities, and grow your career.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Figtree:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        /* ─── Base ─── */
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --blue:    #2563EB;
            --indigo:  #4F46E5;
            --sky:     #0EA5E9;
            --emerald: #10B981;
            --purple:  #8B5CF6;
            --orange:  #F97316;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', 'Figtree', system-ui, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            transition: background 0.3s, color 0.3s;
            -webkit-font-smoothing: antialiased;
        }

        .dark body, .dark {
            background: #020617;
            color: #f1f5f9;
        }

        /* ─── Gradient text ─── */
        .grad-text {
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 40%, #8B5CF6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .grad-text-sky {
            background: linear-gradient(135deg, #0EA5E9 0%, #2563EB 60%, #4F46E5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ─── Glassmorphism ─── */
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.4);
        }

        .dark .glass {
            background: rgba(15,23,42,0.7);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .glass-card {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 4px 24px rgba(0,0,0,0.06), 0 1px 4px rgba(0,0,0,0.04);
            border-radius: 20px;
            transition: transform 0.3s cubic-bezier(.22,.61,.36,1), box-shadow 0.3s;
        }

        .dark .glass-card {
            background: rgba(30,41,59,0.5);
            border: 1px solid rgba(255,255,255,0.07);
            box-shadow: 0 4px 32px rgba(0,0,0,0.3);
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(37,99,235,0.12), 0 4px 16px rgba(0,0,0,0.08);
        }

        /* ─── Nav ─── */
        .nav-blur {
            background: rgba(248,250,252,0.85);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(226,232,240,0.6);
        }

        .dark .nav-blur {
            background: rgba(2,6,23,0.85);
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        /* ─── Buttons ─── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);
            border-radius: 12px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(37,99,235,0.35);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(37,99,235,0.45);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #2563EB;
            background: rgba(37,99,235,0.08);
            border-radius: 12px;
            border: 1.5px solid rgba(37,99,235,0.25);
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s, transform 0.2s;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: rgba(37,99,235,0.14);
            border-color: rgba(37,99,235,0.5);
            transform: translateY(-2px);
        }

        .dark .btn-secondary {
            color: #93c5fd;
            background: rgba(37,99,235,0.12);
            border-color: rgba(37,99,235,0.3);
        }

        /* ─── Animated gradient background ─── */
        .animated-gradient-bg {
            position: relative;
            overflow: hidden;
        }

        .animated-gradient-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 30%, #1e1b4b 60%, #0f172a 100%);
            animation: gradientShift 8s ease-in-out infinite alternate;
        }

        @keyframes gradientShift {
            0%   { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(20deg) brightness(1.05); }
        }

        /* ─── Floating orbs ─── */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            animation: float 10s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-30px) scale(1.06); }
        }

        /* ─── Stat counter animation ─── */
        .stat-card {
            border-radius: 20px;
            padding: 32px 28px;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: default;
        }

        .stat-card:hover {
            transform: translateY(-6px) scale(1.02);
        }

        /* ─── Feature card icon bg ─── */
        .icon-bg-blue   { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
        .icon-bg-indigo { background: linear-gradient(135deg, #e0e7ff, #c7d2fe); }
        .icon-bg-emerald{ background: linear-gradient(135deg, #d1fae5, #a7f3d0); }
        .icon-bg-purple { background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
        .icon-bg-orange { background: linear-gradient(135deg, #ffedd5, #fed7aa); }
        .icon-bg-sky    { background: linear-gradient(135deg, #e0f2fe, #bae6fd); }

        .dark .icon-bg-blue   { background: linear-gradient(135deg, rgba(37,99,235,0.25), rgba(37,99,235,0.12)); }
        .dark .icon-bg-indigo { background: linear-gradient(135deg, rgba(79,70,229,0.25), rgba(79,70,229,0.12)); }
        .dark .icon-bg-emerald{ background: linear-gradient(135deg, rgba(16,185,129,0.25), rgba(16,185,129,0.12)); }
        .dark .icon-bg-purple { background: linear-gradient(135deg, rgba(139,92,246,0.25), rgba(139,92,246,0.12)); }
        .dark .icon-bg-orange { background: linear-gradient(135deg, rgba(249,115,22,0.25), rgba(249,115,22,0.12)); }
        .dark .icon-bg-sky    { background: linear-gradient(135deg, rgba(14,165,233,0.25), rgba(14,165,233,0.12)); }

        /* ─── Timeline ─── */
        .timeline-line {
            position: absolute;
            left: 28px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #2563EB, #4F46E5, #8B5CF6);
            opacity: 0.3;
        }

        /* ─── Testimonial stars ─── */
        .star { color: #F59E0B; }

        /* ─── Accordion ─── */
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0,.5,.2,1);
        }

        .faq-answer.open {
            max-height: 300px;
        }

        /* ─── Section label ─── */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 100px;
            background: rgba(37,99,235,0.1);
            border: 1px solid rgba(37,99,235,0.2);
            font-size: 0.8125rem;
            font-weight: 600;
            color: #2563EB;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .dark .section-label {
            background: rgba(37,99,235,0.15);
            border-color: rgba(37,99,235,0.3);
            color: #93c5fd;
        }

        /* ─── Mock dashboard ─── */
        .mockup-window {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.2), 0 8px 32px rgba(0,0,0,0.12);
        }

        .mockup-titlebar {
            background: #e2e8f0;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dark .mockup-titlebar { background: #1e293b; }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-red  { background: #ef4444; }
        .dot-yellow { background: #f59e0b; }
        .dot-green  { background: #22c55e; }

        .mockup-body {
            background: #f8fafc;
            padding: 20px;
            min-height: 380px;
        }

        .dark .mockup-body { background: #0f172a; }

        /* ─── Floating badge ─── */
        .float-badge {
            animation: floatBadge 4s ease-in-out infinite;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        }

        @keyframes floatBadge {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        /* ─── Scroll fade-in ─── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            animation: fadeInUp 0.7s ease both;
        }

        /* ─── Responsive helpers ─── */
        .container-lg {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─── CTA gradient ─── */
        .cta-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 50%, #1e1b4b 100%);
        }

        /* ─── Dark mode base overrides ─── */
        .dark body {
            background: #020617;
        }

        /* Nav active indicator */
        .nav-link {
            position: relative;
            padding: 4px 0;
            font-size: 0.9rem;
            font-weight: 500;
            color: #475569;
            transition: color 0.2s;
            text-decoration: none;
        }

        .dark .nav-link { color: #94a3b8; }

        .nav-link:hover { color: #2563EB; }
        .dark .nav-link:hover { color: #93c5fd; }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; right: 0;
            bottom: -2px;
            height: 2px;
            border-radius: 2px;
            background: #2563EB;
            transform: scaleX(0);
            transition: transform 0.2s;
        }

        .nav-link:hover::after { transform: scaleX(1); }

        /* Search bar */
        .search-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 14px;
            border-radius: 10px;
            background: rgba(241,245,249,0.8);
            border: 1px solid rgba(226,232,240,0.8);
            font-size: 0.875rem;
            color: #94a3b8;
            transition: border-color 0.2s, background 0.2s;
        }

        .dark .search-bar {
            background: rgba(30,41,59,0.8);
            border-color: rgba(255,255,255,0.08);
        }

        .search-bar:hover, .search-bar:focus-within {
            border-color: #2563EB;
            background: #fff;
        }

        .dark .search-bar:hover, .dark .search-bar:focus-within {
            background: rgba(30,41,59,1);
        }

        /* Code tag badges */
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(37,99,235,0.08);
            color: #2563EB;
            border: 1px solid rgba(37,99,235,0.15);
        }

        .dark .tech-badge {
            background: rgba(37,99,235,0.12);
            color: #93c5fd;
            border-color: rgba(37,99,235,0.25);
        }

        /* Hide scrollbar for horizontal scroll */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="dark:bg-slate-950 dark:text-slate-100 antialiased" :class="{ 'dark': darkMode }">


<header class="nav-blur fixed top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="container-lg">
        <nav class="flex items-center gap-6 h-16">

            
            <a href="<?php echo e(url('/')); ?>" class="flex items-center gap-2.5 flex-shrink-0 group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-black text-sm"
                     style="background: linear-gradient(135deg, #2563EB, #4F46E5); box-shadow: 0 4px 12px rgba(37,99,235,0.35); transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.1) rotate(-3deg)'"
                     onmouseout="this.style.transform='scale(1) rotate(0deg)'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-tight text-slate-900 dark:text-white">LinkUp</span>
            </a>

            
            <div class="hidden lg:flex items-center gap-7 flex-1">
                <a href="#features"    class="nav-link">Features</a>
                <a href="#developers"  class="nav-link">Developers</a>
                <a href="#jobs"        class="nav-link">Jobs</a>
                <a href="#community"   class="nav-link">Community</a>
                <a href="#about"       class="nav-link">About</a>
            </div>

            
            <div class="hidden md:flex search-bar w-56 cursor-text" onclick="this.querySelector('input').focus()">
                <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
                <input class="bg-transparent outline-none text-slate-700 dark:text-slate-300 placeholder-slate-400 text-sm w-full" placeholder="Search developers…" type="input">
            </div>

            
            <div class="flex items-center gap-3 ml-auto">

                
                <button @click="darkMode = !darkMode"
                        class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                        :title="darkMode ? 'Light mode' : 'Dark mode'">
                    <svg x-show="!darkMode" class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5"/>
                        <line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                        <line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                    </svg>
                </button>

                <?php if(auth()->guard()->check()): ?>
                    
                    <a href="<?php echo e(route('feed')); ?>" class="btn-primary text-sm px-4 py-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        Feed
                    </a>
                    <button class="relative w-9 h-9 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-blue-600"></span>
                    </button>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 pl-1 pr-3 py-1 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <img src="<?php echo e(Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=2563EB&color=fff'); ?>"
                                 alt="<?php echo e(Auth::user()->name); ?>"
                                 class="w-7 h-7 rounded-full object-cover">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300 hidden md:block"><?php echo e(Auth::user()->name); ?></span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition
                             class="absolute right-0 top-full mt-2 w-52 glass-card py-2 z-50">
                            <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-blue-50 dark:hover:bg-slate-700 transition-colors">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                </svg>
                                My Profile
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-blue-50 dark:hover:bg-slate-700 transition-colors">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                </svg>
                                Settings
                            </a>
                            <hr class="my-1 border-slate-200 dark:border-slate-700">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"
                       class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors px-3 py-2">
                        Sign in
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="btn-primary text-sm px-5 py-2.5">
                        Get started free
                    </a>
                <?php endif; ?>

                
                <button @click="mobileMenu = !mobileMenu"
                        class="lg:hidden w-9 h-9 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
            </div>
        </nav>

        
        <div x-show="mobileMenu" x-transition class="lg:hidden border-t border-slate-200 dark:border-slate-800 py-4 space-y-1">
            <a href="#features"   class="block px-2 py-2.5 text-slate-700 dark:text-slate-300 hover:text-blue-600 font-medium rounded-lg hover:bg-blue-50 dark:hover:bg-slate-800 transition-colors">Features</a>
            <a href="#developers" class="block px-2 py-2.5 text-slate-700 dark:text-slate-300 hover:text-blue-600 font-medium rounded-lg hover:bg-blue-50 dark:hover:bg-slate-800 transition-colors">Developers</a>
            <a href="#jobs"       class="block px-2 py-2.5 text-slate-700 dark:text-slate-300 hover:text-blue-600 font-medium rounded-lg hover:bg-blue-50 dark:hover:bg-slate-800 transition-colors">Jobs</a>
            <a href="#community"  class="block px-2 py-2.5 text-slate-700 dark:text-slate-300 hover:text-blue-600 font-medium rounded-lg hover:bg-blue-50 dark:hover:bg-slate-800 transition-colors">Community</a>
            <div class="pt-2 flex gap-3">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn-secondary flex-1 text-center text-sm justify-center">Sign in</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn-primary flex-1 text-center text-sm justify-center">Get started</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>



<section class="relative min-h-screen flex items-center pt-24 pb-20 overflow-hidden"
         style="background: linear-gradient(160deg, #020617 0%, #0f172a 40%, #1e1b4b 70%, #1e3a8a 100%);">

    
    <div class="orb w-96 h-96 top-20 -left-32"  style="background: #2563EB; animation-delay: 0s;"></div>
    <div class="orb w-80 h-80 top-40 right-10"  style="background: #4F46E5; animation-delay: 2s;"></div>
    <div class="orb w-64 h-64 bottom-20 left-1/3" style="background: #8B5CF6; animation-delay: 4s;"></div>

    
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 60px 60px;"></div>

    <div class="container-lg relative z-10 grid lg:grid-cols-2 gap-16 items-center">

        
        <div class="space-y-8 fade-in-up">
            <div class="section-label" style="background: rgba(37,99,235,0.15); color: #93c5fd; border-color: rgba(37,99,235,0.3);">
                <span style="width:6px;height:6px;border-radius:50%;background:#22c55e;display:inline-block;"></span>
                100K+ developers already connected
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-white leading-[1.08] tracking-tight">
                Build your career<br>
                <span class="grad-text-sky">where code meets</span><br>
                community
            </h1>

            <p class="text-lg text-slate-300 leading-relaxed max-w-lg">
                LinkUp is the professional network built exclusively for developers.
                Share projects, connect with peers, land your next role — all in one place.
            </p>

            <div class="flex flex-wrap gap-4">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('feed')); ?>" class="btn-primary text-base px-7 py-3.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                        Go to Feed
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn-primary text-base px-7 py-3.5">
                        Start for free
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <a href="#community" class="btn-secondary text-base px-7 py-3.5" style="color:#93c5fd;background:rgba(37,99,235,0.1);border-color:rgba(37,99,235,0.3);">
                    Explore community
                </a>
            </div>

            
            <div class="flex flex-wrap gap-6 pt-2">
                <div class="flex items-center gap-2 text-slate-400 text-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    100K+ developers
                </div>
                <div class="flex items-center gap-2 text-slate-400 text-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Open Source Friendly
                </div>
                <div class="flex items-center gap-2 text-slate-400 text-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Free to join
                </div>
            </div>
        </div>

        
        <div class="relative hidden lg:block" style="animation: fadeInUp 0.9s 0.2s ease both;">

            
            <div class="mockup-window">
                <div class="mockup-titlebar">
                    <div class="dot dot-red"></div>
                    <div class="dot dot-yellow"></div>
                    <div class="dot dot-green"></div>
                    <div class="ml-4 flex-1 bg-white dark:bg-slate-700 rounded px-3 py-0.5 text-xs text-slate-400 font-mono">app.linkup.dev/feed</div>
                </div>
                <div class="mockup-body" style="background: #0f172a;">
                    <div class="grid grid-cols-3 gap-3 h-full">
                        
                        <div class="space-y-3">
                            
                            <div class="rounded-xl p-3" style="background: rgba(30,41,59,0.8); border: 1px solid rgba(255,255,255,0.06);">
                                <div class="w-10 h-10 rounded-full mb-2" style="background: linear-gradient(135deg, #2563EB, #4F46E5);"></div>
                                <div class="h-2.5 rounded-full mb-1.5 w-20" style="background: #334155;"></div>
                                <div class="h-2 rounded-full w-14" style="background: #1e293b;"></div>
                                <div class="mt-3 flex gap-1">
                                    <div class="h-5 rounded-md flex-1" style="background: rgba(37,99,235,0.3);"></div>
                                    <div class="h-5 rounded-md flex-1" style="background: rgba(79,70,229,0.2);"></div>
                                </div>
                            </div>
                            
                            <div class="rounded-xl p-3" style="background: rgba(30,41,59,0.6); border: 1px solid rgba(255,255,255,0.05);">
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <div class="h-2 rounded w-12" style="background: #334155;"></div>
                                        <div class="h-2 rounded w-6" style="background: #2563EB; opacity: 0.7;"></div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="h-2 rounded w-10" style="background: #334155;"></div>
                                        <div class="h-2 rounded w-8" style="background: #4F46E5; opacity: 0.7;"></div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="h-2 rounded w-14" style="background: #334155;"></div>
                                        <div class="h-2 rounded w-5" style="background: #10B981; opacity: 0.7;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-span-2 space-y-2.5">
                            <?php $__currentLoopData = [['#2563EB','#4F46E5','w-28','w-36'],['#4F46E5','#8B5CF6','w-20','w-44'],['#0EA5E9','#2563EB','w-32','w-28']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-xl p-3" style="background: rgba(30,41,59,0.6); border: 1px solid rgba(255,255,255,0.05);">
                                <div class="flex items-center gap-2 mb-2.5">
                                    <div class="w-7 h-7 rounded-full" style="background: linear-gradient(135deg, <?php echo e($post[0]); ?>, <?php echo e($post[1]); ?>);"></div>
                                    <div>
                                        <div class="h-2 rounded <?php echo e($post[2]); ?>" style="background: #334155; margin-bottom: 3px;"></div>
                                        <div class="h-1.5 rounded w-16" style="background: #1e293b;"></div>
                                    </div>
                                </div>
                                <div class="space-y-1.5 mb-2.5">
                                    <div class="h-2 rounded <?php echo e($post[3]); ?>" style="background: #1e293b;"></div>
                                    <div class="h-2 rounded w-full" style="background: #1e293b;"></div>
                                    <div class="h-2 rounded w-3/4" style="background: #1e293b;"></div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="h-4 rounded-md px-2 text-xs flex items-center gap-1" style="background: rgba(37,99,235,0.15);">
                                        <div class="w-1.5 h-1.5 rounded-full" style="background: #2563EB;"></div>
                                        <div class="h-1.5 w-6 rounded" style="background: rgba(37,99,235,0.5);"></div>
                                    </div>
                                    <div class="h-4 rounded-md px-2" style="background: rgba(79,70,229,0.15); width: 32px;"></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="float-badge absolute -top-5 -right-5 glass-card px-4 py-3 flex items-center gap-3"
                 style="animation-delay: 0.5s; border-radius: 14px; background: rgba(30,41,59,0.9); border: 1px solid rgba(37,99,235,0.3);">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: rgba(16,185,129,0.2);">
                    <svg class="w-4 h-4" style="color: #10B981;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xs font-semibold text-white">+24 new connections</div>
                    <div class="text-xs text-slate-400">this week</div>
                </div>
            </div>

            
            <div class="float-badge absolute -bottom-4 -left-6 glass-card px-4 py-3 flex items-center gap-3"
                 style="animation-delay: 1.5s; border-radius: 14px; background: rgba(30,41,59,0.9); border: 1px solid rgba(79,70,229,0.3);">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: rgba(79,70,229,0.2);">
                    <svg class="w-4 h-4" style="color: #8B5CF6;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xs font-semibold text-white">Profile viewed 142×</div>
                    <div class="text-xs text-slate-400">last 30 days</div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-20 bg-white dark:bg-slate-900">
    <div class="container-lg">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php
            $stats = [
                ['100K+', 'Developers', '#2563EB', '#4F46E5', 'Users worldwide building their careers on LinkUp'],
                ['5K+',   'Projects',   '#4F46E5', '#8B5CF6', 'Open source and portfolio projects shared publicly'],
                ['50K+',  'Posts',      '#0EA5E9', '#2563EB', 'Technical articles, tutorials, and discussions'],
                ['20+',   'Countries',  '#10B981', '#0EA5E9', 'A truly global developer community'],
            ];
            ?>

            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="stat-card text-center glass-card" style="background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(248,250,252,0.8));">
                <div class="text-4xl font-black mb-1" style="background: linear-gradient(135deg, <?php echo e($s[2]); ?>, <?php echo e($s[3]); ?>); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    <?php echo e($s[0]); ?>

                </div>
                <div class="text-base font-semibold text-slate-800 dark:text-slate-100 mb-2"><?php echo e($s[1]); ?></div>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-snug"><?php echo e($s[2] ?? ''); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<section id="features" class="py-24 bg-slate-50 dark:bg-slate-950">
    <div class="container-lg">
        <div class="text-center mb-16 space-y-4">
            <div class="section-label mx-auto w-fit">Platform Features</div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight">
                Everything a developer needs
            </h2>
            <p class="text-lg text-slate-500 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
                From building your profile to landing your next role — LinkUp gives you the tools to grow professionally and connect meaningfully.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $features = [
                ['icon-bg-blue',    '#2563EB', 'Professional Profiles', 'Your dev identity, your way. Showcase skills, experience, GitHub activity, and the stack you actually use.', '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>'],
                ['icon-bg-indigo',  '#4F46E5', 'Developer Networking', 'Find and follow engineers who share your interests. Build a network that helps you grow — and grow with you.', '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
                ['icon-bg-emerald', '#10B981', 'Project Showcase', 'Share what you\'re building. Pin live demos, link repos, and get real feedback from engineers who care about craft.', '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>'],
                ['icon-bg-purple',  '#8B5CF6', 'Technical Community', 'Post, discuss, and learn. Ask hard questions, share breakthroughs, and find your people by technology and interest.', '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>'],
                ['icon-bg-orange',  '#F97316', 'Job Opportunities', 'Get discovered by companies that value your actual work — not just your resume. Developer-first job listings only.', '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>'],
                ['icon-bg-sky',     '#0EA5E9', 'Real-time Messaging', 'DM collaborators, form teams, and move fast. Integrated chat keeps the conversation where the code is.', '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
            ];
            ?>

            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="glass-card p-7 group">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 <?php echo e($f[0]); ?> transition-transform group-hover:scale-110">
                    <svg class="w-6 h-6" style="color: <?php echo e($f[1]); ?>;" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <?php echo $f[4]; ?>

                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2"><?php echo e($f[2]); ?></h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed"><?php echo e($f[3]); ?></p>
                <div class="mt-4 flex items-center gap-1 text-sm font-semibold transition-all group-hover:gap-2" style="color: <?php echo e($f[1]); ?>;">
                    Learn more
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<section id="about" class="py-24 bg-white dark:bg-slate-900">
    <div class="container-lg grid lg:grid-cols-2 gap-16 items-center">

        
        <div class="relative">
            <div class="rounded-3xl overflow-hidden" style="background: linear-gradient(135deg, #0f172a, #1e1b4b); min-height: 420px; padding: 32px; position: relative;">
                
                <div class="absolute inset-0 flex items-center justify-center opacity-20">
                    <svg viewBox="0 0 400 300" class="w-full h-full">
                        
                        <?php
                        $nodes = [[200,150],[80,80],[320,80],[80,220],[320,220],[200,40],[200,260],[120,150],[280,150]];
                        $edges = [[0,1],[0,2],[0,3],[0,4],[0,5],[0,6],[0,7],[0,8],[1,7],[2,8],[3,7],[4,8],[5,7],[6,3]];
                        ?>
                        <?php $__currentLoopData = $edges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <line x1="<?php echo e($nodes[$e[0]][0]); ?>" y1="<?php echo e($nodes[$e[0]][1]); ?>" x2="<?php echo e($nodes[$e[1]][0]); ?>" y2="<?php echo e($nodes[$e[1]][1]); ?>" stroke="white" stroke-width="1" opacity="0.3"/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <circle cx="<?php echo e($n[0]); ?>" cy="<?php echo e($n[1]); ?>" r="<?php echo e($i === 0 ? 16 : 8); ?>" fill="<?php echo e($i === 0 ? '#2563EB' : 'white'); ?>" opacity="<?php echo e($i === 0 ? '1' : '0.7'); ?>"/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </svg>
                </div>

                
                <div class="relative z-10 space-y-4">
                    <p class="text-white font-bold text-xl mb-6">Your network, visualized</p>

                    <?php $__currentLoopData = [['Alex M.', 'Senior Engineer @ Vercel', '#2563EB','#4F46E5'],['Priya S.', 'Open Source Maintainer', '#4F46E5','#8B5CF6'],['Jorge R.', 'DevRel @ GitHub', '#0EA5E9','#2563EB']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-3 p-3 rounded-xl" style="background: rgba(255,255,255,0.07); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="w-10 h-10 rounded-full flex-shrink-0" style="background: linear-gradient(135deg, <?php echo e($dev[2]); ?>, <?php echo e($dev[3]); ?>);"></div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-semibold text-white"><?php echo e($dev[0]); ?></div>
                            <div class="text-xs text-slate-400 truncate"><?php echo e($dev[1]); ?></div>
                        </div>
                        <button class="text-xs px-3 py-1.5 rounded-lg font-semibold" style="background: rgba(37,99,235,0.3); color: #93c5fd; border: 1px solid rgba(37,99,235,0.4);">Connect</button>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="absolute -bottom-6 -right-6 w-40 h-40 rounded-full opacity-20 blur-3xl" style="background: #4F46E5;"></div>
        </div>

        
        <div class="space-y-8">
            <div class="section-label w-fit">Why LinkUp</div>
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                The network that gets<br>what you actually do
            </h2>
            <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                Generic professional networks weren't built for people who ship code. LinkUp was. Every feature is designed around how developers actually work — in public, asynchronously, and obsessively.
            </p>

            <div class="space-y-5">
                <?php
                $benefits = [
                    ['Show your real work', 'Link repos, embed demos, pin your best contributions. Your code speaks for itself.'],
                    ['Find people by stack', 'Filter connections by technology, not just job title. Find the Rust engineers, the OSS maintainers, the AI hackers.'],
                    ['Land roles that fit', 'Companies post on LinkUp specifically to hire from a qualified, active developer pool.'],
                    ['Learn in public', 'Share your learnings, failures, and discoveries. The community here reads everything — and responds thoughtfully.'],
                ];
                ?>

                <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex gap-4">
                    <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(37,99,235,0.1);">
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-slate-900 dark:text-white mb-0.5"><?php echo e($b[0]); ?></div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed"><?php echo e($b[1]); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('register')); ?>" class="btn-primary w-fit">
                Join for free
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="py-24 bg-slate-50 dark:bg-slate-950">
    <div class="container-lg">
        <div class="text-center mb-16 space-y-4">
            <div class="section-label mx-auto w-fit">How it works</div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight">
                From signup to hired — in 5 steps
            </h2>
        </div>

        <div class="relative max-w-2xl mx-auto">
            <div class="timeline-line"></div>

            <?php
            $steps = [
                ['01', 'Create Your Profile', 'Import your GitHub, add your stack, write a bio that sounds like you — not a cover letter.', '#2563EB', '#4F46E5'],
                ['02', 'Share Projects & Posts', 'Publish your work, write technical posts, and show what you\'ve been building.', '#4F46E5', '#8B5CF6'],
                ['03', 'Connect With Developers', 'Follow engineers you admire. Send connection requests. Start real conversations.', '#8B5CF6', '#0EA5E9'],
                ['04', 'Collaborate & Contribute', 'Join open-source projects, form teams, and build things together.', '#0EA5E9', '#10B981'],
                ['05', 'Get Hired or Hire', 'Let opportunities come to you — or post roles to attract the engineers you need.', '#10B981', '#2563EB'],
            ];
            ?>

            <div class="space-y-10 pl-16">
                <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative glass-card p-6 group">
                    
                    <div class="absolute -left-16 top-6 w-[58px] flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-xs font-black shadow-lg group-hover:scale-110 transition-transform"
                             style="background: linear-gradient(135deg, <?php echo e($step[3]); ?>, <?php echo e($step[4]); ?>);">
                            <?php echo e($step[0]); ?>

                        </div>
                    </div>

                    <h3 class="font-bold text-slate-900 dark:text-white mb-1.5"><?php echo e($step[1]); ?></h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed"><?php echo e($step[2]); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>



<section class="py-24 bg-white dark:bg-slate-900">
    <div class="container-lg">
        <div class="text-center mb-16 space-y-4">
            <div class="section-label mx-auto w-fit">Testimonials</div>
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                Engineers who made the move
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <?php
            $testimonials = [
                ['Maria Gonzalez', 'Staff Engineer', 'Shopify', '#2563EB', '#4F46E5', 'I landed my current role at Shopify within 3 weeks of posting my projects on LinkUp. The quality of companies hiring here is genuinely different — they read your code before reaching out.'],
                ['Ravi Nair', 'OSS Maintainer', 'Independent', '#4F46E5', '#8B5CF6', 'I\'ve tried every developer community online. LinkUp is the first one where the conversations are actually worth reading. The signal-to-noise ratio is incredible.'],
                ['Chloe Dumont', 'Frontend Lead', 'Vercel', '#0EA5E9', '#2563EB', 'The network graph feature alone is worth it. Being able to see how I\'m connected to engineers at companies I want to work with changed how I think about my career.'],
            ];
            ?>

            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="glass-card p-7 flex flex-col group">
                
                <div class="flex gap-1 mb-5">
                    <?php for($i = 0; $i < 5; $i++): ?>
                    <svg class="star w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <?php endfor; ?>
                </div>

                <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm flex-1 mb-6">
                    "<?php echo e($t[5]); ?>"
                </p>

                <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <div class="w-10 h-10 rounded-full flex-shrink-0" style="background: linear-gradient(135deg, <?php echo e($t[3]); ?>, <?php echo e($t[4]); ?>);"></div>
                    <div>
                        <div class="font-semibold text-slate-900 dark:text-white text-sm"><?php echo e($t[0]); ?></div>
                        <div class="text-xs text-slate-500 dark:text-slate-400"><?php echo e($t[1]); ?> · <?php echo e($t[2]); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<section id="community" class="py-24 bg-slate-50 dark:bg-slate-950">
    <div class="container-lg">
        <div class="text-center mb-16 space-y-4">
            <div class="section-label mx-auto w-fit">Community</div>
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                What's happening right now
            </h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">
                Trending developers, hot projects, and the conversations shaping our community today.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            
            <div class="glass-card p-6">
                <h3 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>
                    </svg>
                    Trending Developers
                </h3>
                <div class="space-y-4">
                    <?php $__currentLoopData = [['Ana Lima','Rust·WebAssembly','#F97316','#EF4444','+842'],['Kai Chen','Go·Kubernetes','#2563EB','#4F46E5','+631'],['Mia Hoffman','TypeScript·React','#8B5CF6','#0EA5E9','+519']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-3 group cursor-pointer">
                        <div class="w-9 h-9 rounded-full flex-shrink-0 transition-transform group-hover:scale-105" style="background: linear-gradient(135deg, <?php echo e($dev[2]); ?>, <?php echo e($dev[3]); ?>);"></div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-semibold text-slate-900 dark:text-white"><?php echo e($dev[0]); ?></div>
                            <div class="text-xs text-slate-500"><?php echo e($dev[1]); ?></div>
                        </div>
                        <span class="text-xs font-bold text-emerald-500"><?php echo e($dev[4]); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="glass-card p-6">
                <h3 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                    Popular Projects
                </h3>
                <div class="space-y-4">
                    <?php $__currentLoopData = [['devlink-cli','A CLI for managing dev environments','TypeScript','⭐ 2.1k'],['rustwebgl','WebGL bindings in pure Rust','Rust','⭐ 1.8k'],['openreview','AI-powered code review platform','Go','⭐ 964']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group cursor-pointer">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <div class="text-sm font-semibold text-blue-600 dark:text-blue-400 group-hover:underline"><?php echo e($proj[0]); ?></div>
                            <span class="text-xs text-slate-500 flex-shrink-0"><?php echo e($proj[3]); ?></span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1.5"><?php echo e($proj[1]); ?></p>
                        <span class="tech-badge"><?php echo e($proj[2]); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="glass-card p-6">
                <h3 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    Trending Topics
                </h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    <?php $__currentLoopData = ['#rust','#typescript','#webassembly','#llm','#kubernetes','#react','#go','#devops','#openai','#nextjs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="tech-badge hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors"><?php echo e($tag); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <h4 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Latest Posts</h4>
                <div class="space-y-3">
                    <?php $__currentLoopData = [['Building a type-safe API client in Go','3 min read'],['Why I moved my team from React to Svelte','7 min read'],['Zero-cost abstractions in Rust, explained','5 min read']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group cursor-pointer">
                        <div class="text-sm font-medium text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors leading-snug">
                            <?php echo e($post[0]); ?>

                        </div>
                        <div class="text-xs text-slate-400 mt-0.5"><?php echo e($post[1]); ?></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-24 bg-white dark:bg-slate-900" id="faq">
    <div class="container-lg max-w-3xl">
        <div class="text-center mb-16 space-y-4">
            <div class="section-label mx-auto w-fit">FAQ</div>
            <h2 class="text-4xl font-black text-slate-900 dark:text-white tracking-tight">Common questions</h2>
        </div>

        <div class="space-y-3">
            <?php
            $faqs = [
                ['What is LinkUp?', 'LinkUp is a professional social network built specifically for software developers. It\'s where you build your professional identity, share projects, connect with peers, and find career opportunities — all within a community that speaks your language.'],
                ['Is LinkUp free to use?', 'Yes. Joining, creating a profile, posting, and connecting with other developers is completely free. We offer an optional Pro tier with advanced analytics, priority search placement, and early access to new features.'],
                ['How do I find other developers?', 'Use our search and filter tools to find developers by stack, location, experience level, or interests. You can also discover people through the community feed, trending posts, and mutual connections.'],
                ['How do I share projects?', 'From your profile or the feed, create a new post and add a project. Link your GitHub repo, add a live demo URL, describe what you built, and tag it with the relevant technologies.'],
                ['How does networking work?', 'Send connection requests to developers you\'d like to stay in touch with. When both sides connect, you can message each other and see each other\'s activity in your feed. Think of it as LinkedIn — built for engineers, by engineers.'],
            ];
            ?>

            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="glass-card overflow-hidden"
                 x-data="{ open: false }"
                 :class="open ? 'ring-1 ring-blue-200 dark:ring-blue-800' : ''">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between p-5 text-left"
                        :class="open ? 'pb-3' : ''">
                    <span class="font-semibold text-slate-900 dark:text-white text-sm md:text-base"><?php echo e($faq[0]); ?></span>
                    <svg class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform"
                         :class="open ? 'rotate-180 text-blue-600' : ''"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="px-5 pb-5">
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed"><?php echo e($faq[1]); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<section class="py-24 relative overflow-hidden cta-gradient">

    
    <div class="absolute inset-0">
        <div class="orb w-80 h-80 top-0 left-1/4"  style="background: #2563EB; opacity: 0.2;"></div>
        <div class="orb w-64 h-64 bottom-0 right-1/4" style="background: #8B5CF6; opacity: 0.2; animation-delay: 3s;"></div>
    </div>

    <div class="container-lg relative z-10 text-center space-y-8">
        <div class="section-label mx-auto w-fit" style="background: rgba(255,255,255,0.1); color: #93c5fd; border-color: rgba(255,255,255,0.2);">
            Join 100K+ developers
        </div>

        <h2 class="text-5xl md:text-6xl font-black text-white tracking-tight max-w-3xl mx-auto leading-tight">
            Ready to build your<br>professional network?
        </h2>

        <p class="text-xl text-slate-300 max-w-xl mx-auto leading-relaxed">
            Your next collaborator, mentor, or employer is already on LinkUp. Join them.
        </p>

        <div class="flex flex-wrap justify-center gap-4 pt-2">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('feed')); ?>" class="btn-primary text-base px-8 py-4">
                    Go to your feed
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary text-base px-8 py-4">
                    Create free account
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="#community" class="btn-secondary text-base px-8 py-4"
                   style="color:#93c5fd; background:rgba(255,255,255,0.07); border-color:rgba(255,255,255,0.2);">
                    Explore the feed
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>



<footer class="bg-slate-950 text-slate-400 border-t border-slate-800">
    <div class="container-lg py-16">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-12">

            
            <div class="col-span-2 md:col-span-1 space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center text-white font-black text-sm"
                         style="background: linear-gradient(135deg, #2563EB, #4F46E5);">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        </svg>
                    </div>
                    <span class="font-bold text-white">LinkUp</span>
                </div>
                <p class="text-sm leading-relaxed">The professional network built for developers, by developers.</p>
                <div class="flex gap-3">
                    <?php $__currentLoopData = [
                        ['GitHub','<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>'],
                        ['LinkedIn','<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>'],
                        ['X','<path d="M4 4l16 16M4 20L20 4"/>'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" title="<?php echo e($s[0]); ?>" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <?php echo $s[1]; ?>

                        </svg>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" title="Discord" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057c.002.022.015.042.03.055a19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/>
                        </svg>
                    </a>
                </div>
            </div>

            
            <div class="space-y-4">
                <h4 class="font-semibold text-white text-sm">Product</h4>
                <ul class="space-y-2.5 text-sm">
                    <?php $__currentLoopData = ['Feed','Profiles','Projects','Messaging','Jobs','Community']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="#" class="hover:text-white transition-colors"><?php echo e($item); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="space-y-4">
                <h4 class="font-semibold text-white text-sm">Company</h4>
                <ul class="space-y-2.5 text-sm">
                    <?php $__currentLoopData = ['About','Blog','Careers','Press','Brand Kit']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="#" class="hover:text-white transition-colors"><?php echo e($item); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="space-y-4">
                <h4 class="font-semibold text-white text-sm">Resources</h4>
                <ul class="space-y-2.5 text-sm">
                    <?php $__currentLoopData = ['Documentation','API','Changelog','Status','Roadmap']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="#" class="hover:text-white transition-colors"><?php echo e($item); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="space-y-4">
                <h4 class="font-semibold text-white text-sm">Legal</h4>
                <ul class="space-y-2.5 text-sm">
                    <?php $__currentLoopData = ['Privacy Policy','Terms of Service','Cookie Policy','Security','GDPR']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="#" class="hover:text-white transition-colors"><?php echo e($item); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

        
        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm">© <?php echo e(date('Y')); ?> LinkUp. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <select class="text-sm bg-slate-800 border border-slate-700 text-slate-400 rounded-lg px-3 py-1.5 outline-none focus:border-blue-500">
                    <option>🌍 English</option>
                    <option>🇫🇷 Français</option>
                    <option>🇪🇸 Español</option>
                    <option>🇩🇪 Deutsch</option>
                    <option>🇧🇷 Português</option>
                </select>
                <div class="text-xs px-2.5 py-1 rounded-full" style="background: rgba(16,185,129,0.1); color: #10B981; border: 1px solid rgba(16,185,129,0.2);">
                    ● All systems operational
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html><?php /**PATH C:\Users\ENAA\Desktop\LinkUp\resources\views/welcome.blade.php ENDPATH**/ ?>