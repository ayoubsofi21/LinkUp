<section class="max-w-xl">
    <header class="mb-6">
        <h2 class="text-base font-bold tracking-tight text-slate-900 dark:text-white">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <!-- Name Input Field -->
        <div class="space-y-1.5">
            <x-input-label for="name" :value="__('Name')" class="text-xs font-bold tracking-wide text-slate-400 dark:text-slate-500 uppercase" />
            <x-text-input id="name" name="name" type="text" class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-slate-800 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 focus:outline-none" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-1 text-xs font-medium text-red-500" :messages="$errors->get('name')" />
        </div>

        <!-- Email Input Field -->
        <div class="space-y-1.5">
            <x-input-label for="email" :value="__('Email Address')" class="text-xs font-bold tracking-wide text-slate-400 dark:text-slate-500 uppercase" />
            <x-text-input id="email" name="email" type="email" class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-slate-800 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 focus:outline-none" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-1 text-xs font-medium text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 rounded-xl border border-amber-200/80 bg-amber-50/40 dark:border-amber-950/40 dark:bg-amber-950/10">
                    <p class="text-xs font-medium text-amber-800 dark:text-amber-400 flex items-center gap-2">
                        <svg class="h-4 w-4 shrink-0 stroke-[2]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        {{ __('Your email address is unverified.') }}
                    </p>
                    <button form="send-verification" class="mt-1.5 text-xs text-brand-500 hover:text-brand-600 font-bold underline transition focus-visible:outline-none rounded">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-xs font-medium text-emerald-500 flex items-center gap-1">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Action Section -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="h-11 px-5 inline-flex items-center justify-center text-xs font-bold tracking-wide text-white bg-brand-500 hover:bg-brand-600 rounded-xl shadow-md shadow-brand-500/10 transition-all transform active:scale-95">
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)" class="text-xs font-semibold text-emerald-500 flex items-center gap-1">
                    <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    {{ __('Saved successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>