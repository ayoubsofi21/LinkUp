{{--
    ╔══════════════════════════════════════════════════════════════════════╗
    ║  LinkUp — Register Page                                              ║
    ║  Premium Split-Screen Authentication Experience                      ║
    ║  Laravel Breeze · Tailwind CSS v4 · Alpine.js · Heroicons           ║
    ╚══════════════════════════════════════════════════════════════════════╝
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Join LinkUp — Developer Network</title>
    <meta name="description" content="Create your free LinkUp account and join thousands of developers building their professional future.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* ─── Custom Properties ─────────────────────────────────────────── */
        :root {
            --color-brand:       #6366f1;
            --color-brand-light: #818cf8;
            --color-brand-dark:  #4f46e5;
            --color-surface:     #0f172a;
            --color-panel:       #060b18;
        }

        /* ─── Base ──────────────────────────────────────────────────────── */
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, sans-serif; }

        /* ─── Grid Texture ──────────────────────────────────────────────── */
        .grid-texture {
            background-image:
                linear-gradient(rgba(99,102,241,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.06) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* ─── Glow Orbs ─────────────────────────────────────────────────── */
        .orb {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            pointer-events: none;
        }

        /* ─── Float Animation ───────────────────────────────────────────── */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33%       { transform: translateY(-12px) rotate(1deg); }
            66%       { transform: translateY(-6px) rotate(-1deg); }
        }
        @keyframes floatB {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-18px); }
        }
        @keyframes floatStat {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-8px); }
        }
        .float-a  { animation: float    6s ease-in-out infinite; }
        .float-b  { animation: floatB   8s ease-in-out infinite; }
        .float-c  { animation: float    5s ease-in-out infinite reverse; }
        .float-stat { animation: floatStat 4s ease-in-out infinite; }

        /* ─── Typing cursor ─────────────────────────────────────────────── */
        @keyframes blink { 0%,100% { opacity:1; } 50% { opacity:0; } }
        .cursor { animation: blink 1.1s step-end infinite; }

        /* ─── Fade-in ────────────────────────────────────────────────────── */
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(20px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .fade-up          { animation: fadeUp .55s ease forwards; }
        .fade-up-delay-1  { animation: fadeUp .55s .1s ease both; }
        .fade-up-delay-2  { animation: fadeUp .55s .2s ease both; }
        .fade-up-delay-3  { animation: fadeUp .55s .3s ease both; }
        .fade-up-delay-4  { animation: fadeUp .55s .4s ease both; }
        .fade-up-delay-5  { animation: fadeUp .55s .5s ease both; }

        /* ─── Glassmorphism Card ─────────────────────────────────────────── */
        .glass-card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(99,102,241,0.18);
        }

        /* ─── Input Floating Label ───────────────────────────────────────── */
        .input-wrapper { position: relative; }
        .input-field {
            width: 100%;
            padding: 1rem 1rem 0.4rem 2.8rem;
            background: rgba(30,41,59,0.6);
            border: 1.5px solid rgba(99,102,241,0.2);
            border-radius: 0.75rem;
            color: #f1f5f9;
            font-size: 0.9rem;
            transition: border-color .2s, box-shadow .2s, background .2s;
            outline: none;
            -webkit-appearance: none;
        }
        .input-field:focus {
            border-color: #6366f1;
            background: rgba(30,41,59,0.85);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.18), 0 1px 8px rgba(99,102,241,0.12);
        }
        .input-field.has-error {
            border-color: #f87171;
            box-shadow: 0 0 0 3px rgba(248,113,113,0.15);
        }
        .input-label {
            position: absolute;
            left: 2.8rem;
            top: 0.78rem;
            font-size: 0.82rem;
            color: #64748b;
            pointer-events: none;
            transition: top .2s, font-size .2s, color .2s;
        }
        .input-field:focus ~ .input-label,
        .input-field:not(:placeholder-shown) ~ .input-label {
            top: 0.3rem;
            font-size: 0.68rem;
            color: #818cf8;
            font-weight: 500;
            letter-spacing: 0.02em;
        }
        .input-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1.1rem;
            height: 1.1rem;
            color: #475569;
            pointer-events: none;
            transition: color .2s;
        }
        .input-field:focus ~ .input-label ~ .input-icon,
        .input-wrapper:focus-within .input-icon { color: #6366f1; }
        .input-toggle {
            position: absolute;
            right: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: #475569;
            cursor: pointer;
            padding: 0.2rem;
            border-radius: 0.3rem;
            transition: color .2s;
        }
        .input-toggle:hover { color: #818cf8; }

        /* ─── Password Strength ──────────────────────────────────────────── */
        .strength-bar {
            height: 3px;
            border-radius: 9999px;
            background: rgba(255,255,255,0.08);
            overflow: hidden;
        }
        .strength-fill {
            height: 100%;
            border-radius: 9999px;
            transition: width .4s ease, background-color .4s ease;
        }

        /* ─── Primary Button ─────────────────────────────────────────────── */
        .btn-primary {
            width: 100%;
            padding: 0.85rem 1.5rem;
            background: linear-gradient(135deg, #6366f1 0%, #818cf8 50%, #a78bfa 100%);
            background-size: 200% 200%;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            position: relative;
            transition: transform .2s, box-shadow .2s, background-position .3s;
            box-shadow: 0 4px 20px rgba(99,102,241,0.4);
            letter-spacing: 0.01em;
        }
        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99,102,241,0.55);
            background-position: right center;
        }
        .btn-primary:active:not(:disabled) {
            transform: translateY(0);
            box-shadow: 0 4px 16px rgba(99,102,241,0.4);
        }
        .btn-primary:disabled { opacity: .7; cursor: not-allowed; }

        /* ─── Social Buttons ─────────────────────────────────────────────── */
        .btn-social {
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
            width: 100%;
            padding: 0.65rem 1rem;
            background: rgba(30,41,59,0.5);
            border: 1.5px solid rgba(99,102,241,0.18);
            border-radius: 0.75rem;
            color: #cbd5e1;
            font-size: 0.83rem;
            font-weight: 500;
            cursor: pointer;
            transition: background .2s, border-color .2s, transform .2s;
        }
        .btn-social:hover {
            background: rgba(30,41,59,0.85);
            border-color: rgba(99,102,241,0.4);
            transform: translateY(-1px);
        }

        /* ─── Stat Card ──────────────────────────────────────────────────── */
        .stat-card {
            background: rgba(15,23,42,0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 0.875rem;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* ─── Profile Preview Card ───────────────────────────────────────── */
        .preview-card {
            background: rgba(15,23,42,0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 1.25rem;
            overflow: hidden;
        }

        /* ─── Feature Card Hover ─────────────────────────────────────────── */
        .feature-card {
            background: rgba(15,23,42,0.5);
            border: 1px solid rgba(99,102,241,0.12);
            border-radius: 0.875rem;
            padding: 1rem;
            transition: border-color .25s, transform .25s, background .25s;
        }
        .feature-card:hover {
            background: rgba(30,41,59,0.7);
            border-color: rgba(99,102,241,0.35);
            transform: translateY(-3px);
        }

        /* ─── Scrollbar (dark) ───────────────────────────────────────────── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(99,102,241,0.3); border-radius: 9999px; }

        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
        }
    </style>
</head>

<body class="h-full bg-slate-950 text-slate-100 antialiased">

{{-- ════════════════════════════════════════════════════════════════
     MAIN SPLIT LAYOUT
     ════════════════════════════════════════════════════════════════ --}}
<div class="min-h-screen flex flex-col lg:flex-row">

    {{-- ════════════════════════════════════════════════════════════
         LEFT HERO PANEL
         ════════════════════════════════════════════════════════════ --}}
    <div class="hidden lg:flex lg:w-1/2 xl:w-[55%] relative overflow-hidden flex-col"
         style="background: linear-gradient(145deg, #060b18 0%, #0a0f1c 40%, #0d1224 100%);">

        {{-- Grid texture --}}
        <div class="absolute inset-0 grid-texture opacity-60"></div>

        {{-- Glow orbs --}}
        <div class="orb w-96 h-96 -top-24 -left-24" style="background:rgba(99,102,241,0.22)"></div>
        <div class="orb w-72 h-72 bottom-32 -right-16" style="background:rgba(139,92,246,0.18)"></div>
        <div class="orb w-48 h-48 top-1/2 left-1/3" style="background:rgba(99,102,241,0.1)"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col h-full px-12 xl:px-16 py-12">

            {{-- Logo --}}
            <div class="fade-up flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                     style="background: linear-gradient(135deg, #6366f1, #a78bfa)">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 14H9V9h2v7zm4 0h-2V9h2v7z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white tracking-tight">LinkUp</span>
            </div>

            {{-- Headline --}}
            <div class="mt-14 xl:mt-16">
                <p class="fade-up-delay-1 text-xs font-semibold tracking-widest uppercase text-indigo-400 mb-4">
                    Developer Network · 2026
                </p>
                <h1 class="fade-up-delay-2 text-4xl xl:text-5xl font-extrabold text-white leading-[1.1] tracking-tight">
                    Join the Future of<br>
                    <span style="background: linear-gradient(90deg, #818cf8, #c4b5fd); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                        Developer Networking
                    </span>
                </h1>
                <p class="fade-up-delay-3 mt-5 text-slate-400 leading-relaxed text-base xl:text-lg max-w-md">
                    Create your professional profile, showcase projects, collaborate with talented developers,
                    and unlock new career opportunities — all in one place.
                </p>
            </div>

            {{-- ── Developer Profile Preview Card ── --}}
            <div class="fade-up-delay-3 mt-10 flex-1 flex items-start">
                <div class="w-full max-w-md relative">

                    {{-- Main profile card --}}
                    <div class="preview-card float-a">
                        {{-- Card header bar --}}
                        <div class="flex items-center gap-1.5 px-4 py-2.5 border-b border-slate-800/80">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-500/70"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/70"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-green-500/70"></div>
                            <span class="ml-2 text-xs text-slate-500 font-mono">linkup.dev/profile</span>
                        </div>

                        <div class="p-5">
                            {{-- Profile header --}}
                            <div class="flex items-start gap-4">
                                <div class="relative flex-shrink-0">
                                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl">
                                        AK
                                    </div>
                                    <div class="absolute -bottom-0.5 -right-0.5 w-4 h-4 bg-green-400 rounded-full border-2 border-slate-900"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-white font-semibold text-sm">Alex Kim</h3>
                                        <span class="text-xs px-1.5 py-0.5 rounded-md bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 font-mono">PRO</span>
                                    </div>
                                    <p class="text-slate-400 text-xs mt-0.5">Senior Full-Stack Engineer · San Francisco</p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <span class="text-xs text-slate-500 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                                            42 repos
                                        </span>
                                        <span class="text-xs text-slate-500 flex items-center gap-1">
                                            <svg class="w-3 h-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            1.2k connections
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Tech stack --}}
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                @foreach(['TypeScript','React','Go','PostgreSQL','Docker','K8s'] as $tag)
                                <span class="text-xs px-2 py-0.5 rounded-md font-mono"
                                      style="background:rgba(99,102,241,0.15); border:1px solid rgba(99,102,241,0.25); color:#a5b4fc">
                                    {{ $tag }}
                                </span>
                                @endforeach
                            </div>

                            {{-- Activity feed preview --}}
                            <div class="mt-4 space-y-2.5">
                                <div class="flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-md bg-green-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-300">Pushed 14 commits to <span class="text-indigo-400 font-mono">@alex/devflow</span></p>
                                        <p class="text-xs text-slate-600 mt-0.5">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-md bg-indigo-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-300">Sarah replied to your post about <span class="text-indigo-400">Rust async patterns</span></p>
                                        <p class="text-xs text-slate-600 mt-0.5">5 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating stat cards --}}
                    <div class="stat-card absolute -top-5 -right-6 float-stat" style="animation-delay:.5s; min-width:150px;">
                        <div class="w-7 h-7 rounded-lg bg-indigo-500/25 flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-white font-bold text-sm leading-none">100K+</p>
                            <p class="text-slate-500 text-xs mt-0.5">Developers</p>
                        </div>
                    </div>

                    <div class="stat-card absolute -bottom-4 -left-6 float-stat" style="animation-delay:1s; min-width:150px;">
                        <div class="w-7 h-7 rounded-lg bg-purple-500/25 flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <div>
                            <p class="text-white font-bold text-sm leading-none">5K+</p>
                            <p class="text-slate-500 text-xs mt-0.5">Open Projects</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats row --}}
            <div class="mt-auto pt-10">
                <div class="flex items-center gap-6 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        <span class="text-slate-400">Daily active devs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                        <span class="text-slate-400">Global community</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-purple-400"></div>
                        <span class="text-slate-400">Open source first</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ════════════════════════════════════════════════════════════
         RIGHT REGISTRATION PANEL
         ════════════════════════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col items-center justify-start lg:justify-center overflow-y-auto"
         style="background: linear-gradient(160deg, #07090f 0%, #060b18 100%);">

        {{-- Mobile logo (shown only on small screens) --}}
        <div class="lg:hidden flex items-center gap-3 pt-8 pb-2">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                 style="background: linear-gradient(135deg, #6366f1, #a78bfa)">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 14H9V9h2v7zm4 0h-2V9h2v7z"/>
                </svg>
            </div>
            <span class="text-lg font-bold text-white tracking-tight">LinkUp</span>
        </div>

        {{-- Glass Card --}}
        <div class="w-full max-w-md mx-auto px-4 sm:px-0 py-8 lg:py-0">
            <div class="glass-card rounded-3xl shadow-2xl px-7 sm:px-8 py-8 fade-up">

                {{-- Card Header --}}
                <div class="text-center mb-7">
                    <div class="hidden lg:flex items-center justify-center gap-2.5 mb-5">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                             style="background: linear-gradient(135deg, #6366f1, #a78bfa)">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 14H9V9h2v7zm4 0h-2V9h2v7z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-white">LinkUp</span>
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Create Your Account</h2>
                    <p class="mt-1.5 text-sm text-slate-400 leading-relaxed">
                        Join thousands of developers building their<br class="hidden sm:block"> professional future.
                    </p>
                </div>

                {{-- ── Validation Errors ── --}}
                @if ($errors->any())
                <div class="mb-5 rounded-xl p-4 flex gap-3 items-start fade-up"
                     style="background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.3);">
                    <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <ul class="text-sm text-red-300 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- ══════════════════════════════════════════════
                     REGISTRATION FORM — all Breeze fields intact
                     ══════════════════════════════════════════════ --}}
                <form method="POST" action="{{ route('register') }}"
                      x-data="registerForm()"
                      @submit="submitting = true"
                      class="space-y-4">
                    @csrf

                    {{-- ── Name ── --}}
                    <div class="input-wrapper fade-up-delay-1">
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            placeholder=" "
                            class="input-field {{ $errors->has('name') ? 'has-error' : '' }}"
                        >
                        <label for="name" class="input-label">Full Name</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>

                    {{-- ── Email ── --}}
                    <div class="input-wrapper fade-up-delay-2">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder=" "
                            class="input-field {{ $errors->has('email') ? 'has-error' : '' }}"
                        >
                        <label for="email" class="input-label">Email Address</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    {{-- ── Password ── --}}
                    <div class="fade-up-delay-3">
                        <div class="input-wrapper">
                            <input
                                id="password"
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder=" "
                                @input="checkStrength($event.target.value)"
                                class="input-field pr-10 {{ $errors->has('password') ? 'has-error' : '' }}"
                            >
                            <label for="password" class="input-label">Password</label>
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <button type="button" class="input-toggle" @click="showPassword = !showPassword"
                                    :aria-label="showPassword ? 'Hide password' : 'Show password'">
                                <svg x-show="!showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Strength indicator --}}
                        <div x-show="password.length > 0" x-transition class="mt-2.5 space-y-2">
                            <div class="flex gap-1">
                                <template x-for="i in 4">
                                    <div class="strength-bar flex-1">
                                        <div class="strength-fill"
                                             :style="{
                                                width: (i <= strengthScore) ? '100%' : '0%',
                                                background: strengthScore <= 1 ? '#ef4444' : strengthScore === 2 ? '#f59e0b' : strengthScore === 3 ? '#22c55e' : '#6366f1'
                                             }">
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium"
                                      :class="{
                                          'text-red-400':    strengthScore <= 1,
                                          'text-amber-400':  strengthScore === 2,
                                          'text-green-400':  strengthScore === 3,
                                          'text-indigo-400': strengthScore === 4
                                      }"
                                      x-text="strengthLabel">
                                </span>
                                <div class="flex gap-3 text-xs text-slate-500">
                                    <span :class="requirements.length ? 'text-green-400' : ''">8+ chars</span>
                                    <span :class="requirements.upper ? 'text-green-400' : ''">Aa</span>
                                    <span :class="requirements.number ? 'text-green-400' : ''">#1</span>
                                    <span :class="requirements.special ? 'text-green-400' : ''">!@</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── Confirm Password ── --}}
                    <div class="input-wrapper fade-up-delay-4">
                        <input
                            id="password_confirmation"
                            :type="showConfirm ? 'text' : 'password'"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder=" "
                            class="input-field pr-10 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}"
                        >
                        <label for="password_confirmation" class="input-label">Confirm Password</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <button type="button" class="input-toggle" @click="showConfirm = !showConfirm"
                                :aria-label="showConfirm ? 'Hide password' : 'Show password'">
                            <svg x-show="!showConfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="showConfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>

                    {{-- ── Submit Button ── --}}
                    <div class="pt-1 fade-up-delay-5">
                        <button type="submit" class="btn-primary" :disabled="submitting">
                            <span x-show="!submitting" class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Create Account
                            </span>
                            <span x-show="submitting" class="flex items-center justify-center gap-2" style="display:none">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                </svg>
                                Creating your account…
                            </span>
                        </button>
                    </div>
                </form>

                {{-- ── Divider ── --}}
                <div class="relative my-5 fade-up">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-800"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-3 text-xs text-slate-500" style="background: rgba(15,23,42,0.75)">OR</span>
                    </div>
                </div>

                {{-- ── Social Buttons (UI only) ── --}}
                <div class="grid grid-cols-3 gap-2 fade-up">
                    {{-- GitHub --}}
                    <button type="button" class="btn-social" aria-label="Sign up with GitHub">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <span class="text-xs hidden sm:inline">GitHub</span>
                    </button>
                    {{-- Google --}}
                    <button type="button" class="btn-social" aria-label="Sign up with Google">
                        <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24">
                            <path fill="#EA4335" d="M5.266 9.765A7.077 7.077 0 0112 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115z"/>
                            <path fill="#34A853" d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 01-6.723-4.823l-4.04 3.067A11.965 11.965 0 0012 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987z"/>
                            <path fill="#4A90E2" d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21z"/>
                            <path fill="#FBBC05" d="M5.277 14.268A7.12 7.12 0 014.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 000 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067z"/>
                        </svg>
                        <span class="text-xs hidden sm:inline">Google</span>
                    </button>
                    {{-- LinkedIn --}}
                    <button type="button" class="btn-social" aria-label="Sign up with LinkedIn">
                        <svg class="w-4 h-4 flex-shrink-0" fill="#0A66C2" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        <span class="text-xs hidden sm:inline">LinkedIn</span>
                    </button>
                </div>

                {{-- ── Security Notice ── --}}
                <div class="mt-5 flex items-center justify-center gap-2 text-xs text-slate-500 fade-up">
                    <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Your account is protected with secure authentication</span>
                </div>

                {{-- ── Login Link ── --}}
                <p class="mt-5 text-center text-sm text-slate-400 fade-up">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="ml-1 font-semibold text-indigo-400 hover:text-indigo-300 transition-colors duration-200 underline underline-offset-2">
                        Sign In
                    </a>
                </p>
            </div>

            {{-- ── Feature Cards ── --}}
            <div class="grid grid-cols-3 gap-3 mt-5 fade-up">
                <div class="feature-card text-center">
                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center"
                         style="background:rgba(99,102,241,0.2)">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-semibold text-slate-200 leading-tight">Dev Profile</p>
                    <p class="text-xs text-slate-500 mt-0.5 leading-tight">Build your identity</p>
                </div>
                <div class="feature-card text-center">
                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center"
                         style="background:rgba(139,92,246,0.2)">
                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
                    <p class="text-xs font-semibold text-slate-200 leading-tight">Global Network</p>
                    <p class="text-xs text-slate-500 mt-0.5 leading-tight">Connect worldwide</p>
                </div>
                <div class="feature-card text-center">
                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center"
                         style="background:rgba(34,197,94,0.15)">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-semibold text-slate-200 leading-tight">Opportunities</p>
                    <p class="text-xs text-slate-500 mt-0.5 leading-tight">Jobs & collabs</p>
                </div>
            </div>

            {{-- ── Footer ── --}}
            <div class="mt-6 pb-8 text-center fade-up">
                <nav class="flex items-center justify-center gap-4 text-xs text-slate-600 flex-wrap">
                    <a href="#" class="hover:text-slate-400 transition-colors">Privacy Policy</a>
                    <span class="text-slate-800">·</span>
                    <a href="#" class="hover:text-slate-400 transition-colors">Terms of Service</a>
                    <span class="text-slate-800">·</span>
                    <a href="#" class="hover:text-slate-400 transition-colors">Help Center</a>
                </nav>
                <p class="mt-2 text-xs text-slate-700">
                    &copy; {{ date('Y') }} LinkUp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     ALPINE.JS — Password Strength & Form Logic
     ════════════════════════════════════════════════════════════════ --}}
<script>
function registerForm() {
    return {
        showPassword: false,
        showConfirm:  false,
        submitting:   false,
        password:     '',
        strengthScore: 0,
        strengthLabel: '',
        requirements: {
            length:  false,
            upper:   false,
            lower:   false,
            number:  false,
            special: false,
        },

        checkStrength(val) {
            this.password = val;
            const r = this.requirements;
            r.length  = val.length >= 8;
            r.upper   = /[A-Z]/.test(val);
            r.lower   = /[a-z]/.test(val);
            r.number  = /[0-9]/.test(val);
            r.special = /[^A-Za-z0-9]/.test(val);

            const met = Object.values(r).filter(Boolean).length;
            this.strengthScore = met <= 1 ? 1 : met <= 2 ? 2 : met <= 4 ? 3 : 4;
            const labels = { 1:'Weak', 2:'Fair', 3:'Strong', 4:'Very Strong' };
            this.strengthLabel = labels[this.strengthScore] || '';
        }
    }
}
</script>

</body>
</html>