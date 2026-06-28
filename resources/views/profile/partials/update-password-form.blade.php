<section class="max-w-xl">
    <header class="mb-6">
        <h2 class="text-base font-bold tracking-tight text-slate-900 dark:text-white">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="space-y-1.5">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-xs font-bold tracking-wide text-slate-400 dark:text-slate-500 uppercase" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-slate-800 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 focus:outline-none" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-xs font-medium text-red-500" />
        </div>

        <!-- New Password -->
        <div class="space-y-1.5">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-xs font-bold tracking-wide text-slate-400 dark:text-slate-500 uppercase" />
            <x-text-input id="update_password_password" name="password" type="password" class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-zinc-950 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 focus:outline-none" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-xs font-medium text-red-500" />
        </div>

        <!-- Password Confirmation -->
        <div class="space-y-1.5">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-xs font-bold tracking-wide text-slate-400 dark:text-slate-500 uppercase" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-slate-800 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 focus:outline-none" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-xs font-medium text-red-500" />
        </div>

        <!-- Action Bar -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="h-11 px-5 inline-flex items-center justify-center text-xs font-bold tracking-wide text-white bg-brand-500 hover:bg-brand-600 rounded-xl shadow-md shadow-brand-500/10 transition-all transform active:scale-95">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)" class="text-xs font-semibold text-emerald-500 flex items-center gap-1">
                    <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    {{ __('Password protected.') }}
                </p>
            @endif
        </div>
    </form>
</section>