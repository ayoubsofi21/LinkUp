@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50/50 py-12 transition-colors duration-300 dark:bg-[#121824]">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Refined Brand Header -->
        <div class="border-b border-slate-200/80 pb-6 dark:border-slate-800/80">
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">Account Settings</h1>
            <p class="mt-1.5 text-sm text-slate-500 dark:text-slate-400">Manage your workspace identity, credentials, and security preferences.</p>
        </div>

        <!-- Settings Container Stack -->
        <div class="space-y-6">
            
            <!-- Profile Information Block -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm dark:border-slate-800/80 dark:bg-[#1e293b] sm:p-8 transition-all duration-300 hover:shadow-md">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password Block -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm dark:border-slate-800/80 dark:bg-[#1e293b] sm:p-8 transition-all duration-300 hover:shadow-md">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account Danger Zone Block -->
            <div class="overflow-hidden rounded-2xl border border-red-200/60 bg-white shadow-sm dark:border-red-950/40 dark:bg-[#1e293b] transition-all duration-300 hover:shadow-md">
                <!-- Visual warning stripe using your signature brand gradient mapped with red -->
                <div class="h-1.5 w-full bg-gradient-to-r from-red-500 to-amber-500 opacity-90"></div>
                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection