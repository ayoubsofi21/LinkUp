<section class="space-y-6">
    <header>
        <h2 class="text-base font-bold tracking-tight text-red-500">
            {{ __('Danger Zone') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="h-11 px-5 inline-flex items-center justify-center text-xs font-bold text-white bg-red-500 hover:bg-red-600 transition-all rounded-xl shadow-sm transform active:scale-95"
    >
        {{ __('Deactivate & Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/60 dark:border-slate-800/80 shadow-2xl">
            @csrf
            @method('delete')

            <div class="flex items-start gap-4 mb-5">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-500 dark:bg-red-500/10">
                    <svg class="h-5 w-5 stroke-[2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold tracking-tight text-slate-900 dark:text-white">
                        {{ __('Are you absolutely sure?') }}
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
                        {{ __('This action cannot be undone. All of your historical metrics, workspace collections, datasets, and integration tokens will be wiped from our nodes permanently.') }}
                    </p>
                </div>
            </div>

            <div class="mt-6 max-w-sm">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full h-11 px-3 text-sm bg-slate-50 dark:bg-slate-800/40 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all focus:bg-white dark:focus:bg-slate-800 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 focus:outline-none"
                    placeholder="{{ __('Confirm identity with your password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs font-semibold text-red-500" />
            </div>

            <!-- Modal Actions Footer -->
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-slate-100 pt-5 dark:border-slate-700/60">
                <x-secondary-button 
                    x-on:click="$dispatch('close')"
                    class="h-11 px-4 inline-flex items-center justify-center text-xs font-bold text-slate-600 bg-white hover:bg-slate-50 border border-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:border-slate-700 dark:hover:bg-slate-700 rounded-xl transition-all"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="h-11 px-4 inline-flex items-center justify-center text-xs font-bold text-white bg-red-500 hover:bg-red-600 transition-all rounded-xl shadow-sm">
                    {{ __('Confirm Deletion') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>