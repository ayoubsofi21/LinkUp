<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In — LinkUp</title>
    <meta name="description" content="Sign in to LinkUp, the professional network for developers.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ─── Reset & base ─── */
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            background: #020617;
            color: #f1f5f9;
            -webkit-font-smoothing: antialiased;
        }

        /* ─── Layout ─── */
        .auth-layout {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* ─── Left hero ─── */
        .hero-panel {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px 48px;
            background: linear-gradient(160deg, #020617 0%, #0f172a 45%, #1e1b4b 75%, #1e3a8a 100%);
        }

        /* Grid overlay */
        .hero-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 56px 56px;
            pointer-events: none;
        }

        /* Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: floatOrb 12s ease-in-out infinite;
            pointer-events: none;
        }
        .orb-1 { width: 500px; height: 500px; top: -120px; left: -100px; background: #2563EB; opacity: 0.18; }
        .orb-2 { width: 380px; height: 380px; bottom: -80px; right: 40px; background: #4F46E5; opacity: 0.2; animation-delay: 3s; }
        .orb-3 { width: 260px; height: 260px; top: 40%; left: 40%; background: #8B5CF6; opacity: 0.12; animation-delay: 6s; }

        @keyframes floatOrb {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-40px) scale(1.05); }
        }

        /* ─── Hero content ─── */
        .hero-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563EB, #4F46E5);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(37,99,235,0.4);
        }

        .hero-main {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 0;
        }

        .hero-heading {
            font-size: clamp(2rem, 3.5vw, 2.75rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin: 0 0 16px;
            color: #fff;
        }

        .grad-text {
            background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-size: 1rem;
            color: #94a3b8;
            line-height: 1.65;
            max-width: 420px;
            margin: 0 0 40px;
        }

        /* ─── Dashboard mockup ─── */
        .mockup {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.4), 0 0 0 1px rgba(255,255,255,0.06);
            max-width: 440px;
        }

        .mockup-bar {
            background: #1e293b;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }

        .mockup-body {
            background: #0f172a;
            padding: 16px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 12px;
            min-height: 220px;
        }

        .mock-card {
            background: rgba(30,41,59,0.7);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 10px;
            padding: 12px;
        }

        .mock-line { height: 7px; border-radius: 4px; background: #1e293b; margin-bottom: 6px; }
        .mock-line.bright { background: #334155; }
        .mock-avatar { width: 32px; height: 32px; border-radius: 50%; margin-bottom: 8px; }

        /* ─── Float stat badges ─── */
        .stat-badge {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 14px;
            background: rgba(15,23,42,0.85);
            border: 1px solid rgba(37,99,235,0.3);
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
            z-index: 2;
            animation: floatBadge 5s ease-in-out infinite;
        }

        @keyframes floatBadge {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-8px); }
        }

        .stat-badge-icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
        }

        /* ─── Hero stats row ─── */
        .hero-stats {
            position: relative;
            z-index: 1;
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .hero-stat {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8125rem;
            color: #64748b;
        }

        .hero-stat-dot {
            width: 6px; height: 6px; border-radius: 50%; background: #22c55e;
        }

        .hero-stat strong { color: #e2e8f0; font-weight: 600; }

        /* ─── Right panel ─── */
        .form-panel {
            width: 100%;
            max-width: 520px;
            min-height: 100vh;
            background: #0a0f1e;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            position: relative;
            border-left: 1px solid rgba(255,255,255,0.05);
        }

        /* ─── Auth card ─── */
        .auth-card {
            width: 100%;
            max-width: 420px;
            background: rgba(15,23,42,0.8);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            padding: 40px 36px;
            box-shadow: 0 32px 80px rgba(0,0,0,0.4), 0 0 0 1px rgba(37,99,235,0.08);
        }

        .card-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .card-logo-icon {
            width: 38px; height: 38px; border-radius: 11px;
            background: linear-gradient(135deg, #2563EB, #4F46E5);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(37,99,235,0.4);
        }

        .card-heading {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin: 0 0 6px;
            color: #f1f5f9;
        }

        .card-sub {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0 0 28px;
            line-height: 1.5;
        }

        /* ─── Alert boxes ─── */
        .alert {
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.8125rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
            line-height: 1.45;
        }

        .alert-error {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.25);
            color: #fca5a5;
        }

        .alert-success {
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.25);
            color: #6ee7b7;
        }

        .alert-icon { flex-shrink: 0; margin-top: 1px; }

        /* ─── Form fields ─── */
        .field-group {
            position: relative;
            margin-bottom: 16px;
        }

        .field-label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 500;
            color: #94a3b8;
            margin-bottom: 7px;
            letter-spacing: 0.01em;
        }

        .field-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .field-icon {
            position: absolute;
            left: 14px;
            color: #475569;
            pointer-events: none;
            transition: color 0.2s;
        }

        .field-input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            background: rgba(30,41,59,0.6);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            color: #f1f5f9;
            font-size: 0.9375rem;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .field-input::placeholder { color: #475569; }

        .field-input:focus {
            border-color: rgba(37,99,235,0.6);
            background: rgba(30,41,59,0.9);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15), 0 1px 3px rgba(0,0,0,0.2);
        }

        .field-input:focus + .field-icon,
        .field-wrap:focus-within .field-icon {
            color: #2563EB;
        }

        .field-input.has-error {
            border-color: rgba(239,68,68,0.5);
            box-shadow: 0 0 0 3px rgba(239,68,68,0.1);
        }

        .field-error {
            font-size: 0.75rem;
            color: #f87171;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Password toggle */
        .pwd-toggle {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            cursor: pointer;
            color: #475569;
            padding: 4px;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
            display: flex; align-items: center;
        }

        .pwd-toggle:hover { color: #94a3b8; background: rgba(255,255,255,0.05); }

        /* ─── Remember + forgot ─── */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 18px 0 22px;
        }

        .custom-checkbox-label {
            display: flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            font-size: 0.8125rem;
            color: #64748b;
            user-select: none;
        }

        .custom-checkbox-input {
            position: absolute;
            opacity: 0;
            width: 0; height: 0;
        }

        .custom-checkbox-box {
            width: 18px; height: 18px;
            border: 1.5px solid rgba(255,255,255,0.12);
            border-radius: 5px;
            background: rgba(30,41,59,0.6);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s;
        }

        .custom-checkbox-input:checked ~ .custom-checkbox-box {
            background: #2563EB;
            border-color: #2563EB;
        }

        .custom-checkbox-input:focus ~ .custom-checkbox-box {
            box-shadow: 0 0 0 3px rgba(37,99,235,0.25);
        }

        .custom-check-icon { display: none; }
        .custom-checkbox-input:checked ~ .custom-checkbox-box .custom-check-icon { display: block; }

        .forgot-link {
            font-size: 0.8125rem;
            color: #2563EB;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover { color: #60a5fa; text-decoration: underline; }

        /* ─── Primary button ─── */
        .btn-primary {
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-size: 0.9375rem;
            font-weight: 600;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);
            box-shadow: 0 4px 16px rgba(37,99,235,0.35);
            transition: transform 0.2s, box-shadow 0.2s, filter 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(37,99,235,0.5); }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:active { transform: translateY(0); }

        /* ─── Divider ─── */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 22px 0;
            color: #334155;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.07);
        }

        /* ─── Social buttons ─── */
        .social-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 22px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 8px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(30,41,59,0.5);
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }

        .social-btn:hover {
            background: rgba(30,41,59,0.9);
            border-color: rgba(255,255,255,0.15);
            color: #e2e8f0;
            transform: translateY(-1px);
        }

        /* ─── Security badge ─── */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-top: 20px;
            font-size: 0.75rem;
            color: #475569;
        }

        /* ─── Footer links ─── */
        .auth-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 0.8125rem;
            color: #475569;
        }

        .auth-footer a {
            color: #2563EB;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .auth-footer a:hover { color: #60a5fa; }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 10px;
            font-size: 0.75rem;
            color: #334155;
        }

        .footer-links a {
            color: #334155;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: #64748b; }

        /* ─── Register button ─── */
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1.5px solid rgba(37,99,235,0.35);
            background: rgba(37,99,235,0.06);
            color: #60a5fa;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            margin-top: 8px;
        }

        .btn-outline:hover {
            background: rgba(37,99,235,0.12);
            border-color: rgba(37,99,235,0.6);
            color: #93c5fd;
        }

        /* ─── Responsive: mobile stacks hero above form ─── */
        @media (max-width: 900px) {
            .auth-layout { flex-direction: column; }

            .hero-panel {
                min-height: auto;
                padding: 32px 24px;
            }

            .hero-main { padding: 24px 0; }
            .hero-heading { font-size: 1.75rem; }

            .mockup { display: none; }

            .stat-badge { display: none; }

            .form-panel {
                max-width: 100%;
                min-height: auto;
                padding: 32px 20px;
                border-left: none;
                border-top: 1px solid rgba(255,255,255,0.05);
            }
        }

        /* Accessibility: visible focus for keyboard nav */
        a:focus-visible, button:focus-visible, input:focus-visible {
            outline: 2px solid #2563EB;
            outline-offset: 2px;
        }
    </style>
</head>
<body>

<div class="auth-layout">

    {{-- ══════════════════════════════════════
         LEFT — HERO PANEL
    ══════════════════════════════════════ --}}
    <aside class="hero-panel">

        {{-- Orbs --}}
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        {{-- Logo --}}
        <div class="hero-logo">
            <div class="logo-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                </svg>
            </div>
            <span style="font-weight:700;font-size:1.0625rem;color:#fff;letter-spacing:-0.01em;">LinkUp</span>
        </div>

        {{-- Main hero copy --}}
        <div class="hero-main">
            <h1 class="hero-heading">
                Welcome back<br>to <span class="grad-text">LinkUp</span>
            </h1>
            <p class="hero-sub">
                Continue building your developer network, share projects, collaborate with professionals, and discover new opportunities — all in one place.
            </p>

            {{-- Dashboard mockup --}}
            <div class="mockup" style="position:relative;">
                <div class="mockup-bar">
                    <div class="dot" style="background:#ef4444;"></div>
                    <div class="dot" style="background:#f59e0b;"></div>
                    <div class="dot" style="background:#22c55e;"></div>
                    <div style="flex:1;background:rgba(255,255,255,0.05);border-radius:4px;height:18px;margin-left:10px;display:flex;align-items:center;padding:0 10px;">
                        <span style="font-size:10px;color:#475569;font-family:monospace;">app.linkup.dev/feed</span>
                    </div>
                </div>
                <div class="mockup-body">
                    {{-- Sidebar --}}
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <div class="mock-card">
                            <div class="mock-avatar" style="background:linear-gradient(135deg,#2563EB,#4F46E5);"></div>
                            <div class="mock-line bright" style="width:70%;"></div>
                            <div class="mock-line" style="width:50%;"></div>
                            <div style="display:flex;gap:4px;margin-top:8px;">
                                <div style="height:20px;border-radius:6px;flex:1;background:rgba(37,99,235,0.25);"></div>
                                <div style="height:20px;border-radius:6px;flex:1;background:rgba(79,70,229,0.15);"></div>
                            </div>
                        </div>
                        <div class="mock-card">
                            @foreach([[70,'#2563EB',30],[55,'#4F46E5',45],[80,'#10B981',20]] as $r)
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:7px;">
                                <div style="height:6px;border-radius:3px;width:{{$r[0]}}%;background:#1e293b;"></div>
                                <div style="height:6px;border-radius:3px;width:{{$r[2]}}%;background:{{$r[1]}};opacity:0.5;"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Feed --}}
                    <div style="display:flex;flex-direction:column;gap:8px;">
                        @foreach([['#2563EB','#4F46E5'],['#0EA5E9','#2563EB'],['#4F46E5','#8B5CF6']] as $c)
                        <div class="mock-card">
                            <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                                <div style="width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,{{$c[0]}},{{$c[1]}});flex-shrink:0;"></div>
                                <div>
                                    <div class="mock-line bright" style="width:80px;margin-bottom:3px;"></div>
                                    <div class="mock-line" style="width:50px;"></div>
                                </div>
                            </div>
                            <div class="mock-line" style="width:100%;"></div>
                            <div class="mock-line" style="width:85%;"></div>
                            <div class="mock-line" style="width:60%;"></div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Floating badges relative to mockup --}}
                <div class="stat-badge" style="top:-18px;right:-20px;animation-delay:0s;">
                    <div class="stat-badge-icon" style="background:rgba(16,185,129,0.15);">
                        <svg width="16" height="16" fill="none" stroke="#10B981" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#fff;">100K+ Developers</div>
                        <div style="font-size:10px;color:#64748b;">worldwide</div>
                    </div>
                </div>

                <div class="stat-badge" style="bottom:-18px;left:-20px;animation-delay:2s;border-color:rgba(139,92,246,0.3);">
                    <div class="stat-badge-icon" style="background:rgba(139,92,246,0.15);">
                        <svg width="16" height="16" fill="none" stroke="#8B5CF6" stroke-width="2" viewBox="0 0 24 24">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                            <polyline points="2 17 12 22 22 17"/>
                            <polyline points="2 12 12 17 22 12"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#fff;">5K+ Projects</div>
                        <div style="font-size:10px;color:#64748b;">shared publicly</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats row --}}
        <div class="hero-stats">
            @foreach([['100K+','Developers'],['5K+','Projects'],['50K+','Daily Posts']] as $s)
            <div class="hero-stat">
                <div class="hero-stat-dot"></div>
                <strong>{{ $s[0] }}</strong> {{ $s[1] }}
            </div>
            @endforeach
        </div>
    </aside>


    {{-- ══════════════════════════════════════
         RIGHT — AUTH FORM
    ══════════════════════════════════════ --}}
    <main class="form-panel" role="main">
        <div class="auth-card">

            {{-- Card logo --}}
            <div class="card-logo">
                <div class="card-logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                    </svg>
                </div>
                <span style="font-weight:700;font-size:1rem;color:#f1f5f9;">LinkUp</span>
            </div>

            <h1 class="card-heading">Sign in</h1>
            <p class="card-sub">Welcome back! Continue growing your developer network.</p>

            {{-- ── Session status (Breeze success message) ── --}}
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                <span class="alert-icon">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </span>
                {{ session('status') }}
            </div>
            @endif

            {{-- ── Validation errors ── --}}
            @if ($errors->any())
            <div class="alert alert-error" role="alert" aria-live="polite">
                <span class="alert-icon">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </span>
                <div>
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- ── Login Form ── --}}
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email --}}
                <div class="field-group">
                    <label for="email" class="field-label">Email address</label>
                    <div class="field-wrap">
                        <span class="field-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="field-input {{ $errors->has('email') ? 'has-error' : '' }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                            autofocus
                            aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}"
                        >
                    </div>
                    @error('email')
                    <div class="field-error" id="email-error" role="alert">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field-group" x-data="{ show: false }">
                    <label for="password" class="field-label">Password</label>
                    <div class="field-wrap">
                        <span class="field-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </span>
                        <input
                            id="password"
                            :type="show ? 'text' : 'password'"
                            name="password"
                            class="field-input {{ $errors->has('password') ? 'has-error' : '' }}"
                            placeholder="Your password"
                            autocomplete="current-password"
                            required
                            aria-describedby="{{ $errors->has('password') ? 'password-error' : '' }}"
                        >
                        <button
                            type="button"
                            class="pwd-toggle"
                            @click="show = !show"
                            :aria-label="show ? 'Hide password' : 'Show password'"
                            :aria-pressed="show">
                            <svg x-show="!show" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg x-show="show" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                <line x1="1" y1="1" x2="23" y2="23"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                    <div class="field-error" id="password-error" role="alert">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="remember-row">
                    <label class="custom-checkbox-label">
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember_me"
                            class="custom-checkbox-input"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <span class="custom-checkbox-box" aria-hidden="true">
                            <svg class="custom-check-icon" width="10" height="10" fill="none" stroke="white" stroke-width="3" viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </span>
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                    Sign In
                </button>
            </form>

            {{-- OR divider --}}
            <div class="divider">
                <div class="divider-line"></div>
                or continue with
                <div class="divider-line"></div>
            </div>

            {{-- Social buttons (UI placeholders) --}}
            <div class="social-grid" role="group" aria-label="Social login options">
                {{-- GitHub --}}
                <button type="button" class="social-btn" aria-label="Continue with GitHub">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                    </svg>
                    GitHub
                </button>

                {{-- Google --}}
                <button type="button" class="social-btn" aria-label="Continue with Google">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Google
                </button>

                {{-- LinkedIn --}}
                <button type="button" class="social-btn" aria-label="Continue with LinkedIn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color:#0A66C2;">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                        <rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>
                    </svg>
                    LinkedIn
                </button>
            </div>

            {{-- Security badge --}}
            <div class="security-badge">
                <svg width="12" height="12" fill="none" stroke="#475569" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                Your information is securely encrypted
            </div>
        </div>

        {{-- Footer --}}
        <div class="auth-footer">
            <p style="margin:0 0 10px;">
                Don't have an account?
                <a href="{{ route('register') }}">Create one free</a>
            </p>
            <a href="{{ route('register') }}" class="btn-outline">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
                Create Account
            </a>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </main>

</div>

</body>
</html>