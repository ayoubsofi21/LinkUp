@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    <aside class="lg:col-span-3 space-y-6 lg:sticky lg:top-24">
        
        <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="h-20 bg-gradient-to-r from-brand-500 to-sky-400 relative"></div>
            
            <div class="px-6 pb-6 text-center relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 -top-10">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 ring-4 ring-white shadow-md flex items-center justify-center">
                        <span class="text-3xl font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </span>
                    </div>
                </div>
                
                <div class="pt-12">
                    <h2 class="text-lg font-bold text-slate-900 tracking-tight">{{ auth()->user()->name }}</h2>
                    <p class="text-xs text-brand-500 font-medium mt-0.5">Senior Frontend Engineer</p>
                    <p class="text-xs text-slate-400 mt-2">Spécialisé en écosystèmes UI Modernes (Tailwind, React, Blade)</p>
                </div>
                
                <div class="my-4 border-t border-slate-100"></div>
                
                <div class="space-y-2.5 text-left text-xs">
                    <div class="flex justify-between items-center text-slate-500">
                        <span>Relations</span>
                        <span class="font-semibold text-slate-900">1,420</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-500">
                        <span>Vues de votre profil</span>
                        <span class="font-semibold text-slate-900">348</span>
                    </div>
                </div>

                <div class="my-4 border-t border-slate-100"></div>

                <a href="#" class="inline-flex w-full items-center justify-center gap-2 text-xs font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 py-2.5 px-4 rounded-xl transition-all">
                    Accéder à mon tableau de bord
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm hidden lg:block">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Raccourcis récents</h3>
            <ul class="space-y-2.5 text-sm font-medium">
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> laravel-france
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> tailwindcss_ui
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> saas_builders
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <section class="col-span-1 lg:col-span-6 space-y-6">

        @session('success')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ $value }}
            </div>
        @endsession
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm mb-6">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex items-center gap-3 mb-4">
                    <img class="w-11 h-11 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" alt="Avatar">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">{{ auth()->user()->name }}</h4>
                        <p class="text-xs text-slate-400">Share something with your network</p>
                    </div>
                </div>

                <div class="mb-4">
                    <textarea 
                        name="content" 
                        rows="3" 
                        placeholder="What's on your mind?"
                        class="w-full text-base text-slate-700 placeholder-slate-400 bg-transparent border-none focus:ring-0 p-0 resize-none"
                    ></textarea>
                </div>

                <div id="preview-container" class="hidden relative mb-4 rounded-xl overflow-hidden border border-slate-200 bg-slate-50">
                    <img id="image-preview" src="#" class="w-full object-cover max-h-[400px]">
                    <button type="button" onclick="clearSelectedImage()" class="absolute top-3 right-3 bg-rose-600 text-white p-2 rounded-full shadow hover:bg-rose-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                    
                    <label class="flex items-center gap-2 cursor-pointer p-2 rounded-xl text-slate-400 hover:text-brand-500 hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm font-semibold text-slate-700">Photo</span>
                        <input type="file" name="image" id="image-input" accept="image/*" class="hidden" onchange="previewImage(this)">
                    </label>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow transition-colors">
                        Publish
                    </button>
                </div>
            </form>
        </div>
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
            document.getElementById('preview-container').classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function clearSelectedImage() {
    document.getElementById('image-input').value = "";
    document.getElementById('preview-container').classList.add('hidden');
}
</script>

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4 animate-pulse opacity-60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-200 rounded-xl"></div>
                <div class="flex-1 space-y-2">
                    <div class="h-3 bg-slate-200 rounded w-1/4"></div>
                    <div class="h-2 bg-slate-200 rounded w-1/3"></div>
                </div>
            </div>
            <div class="space-y-2 pt-2">
                <div class="h-3 bg-slate-200 rounded w-full"></div>
                <div class="h-3 bg-slate-200 rounded w-5/6"></div>
            </div>
        </div>
         
        <!-- display all post here use foreach loop  -->
        
                    <!-- @foreach($posts as $post)

                    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm mb-4">

                        <div class="flex items-center justify-between mb-4">

                            <div class="flex items-center gap-3">

                                <img
                                    class="w-11 h-11 rounded-xl object-cover"
                                    src="https://i.pravatar.cc/300"
                                    alt="{{ $post->description }}">

                                <div>
                                    <h4 class="font-bold">
                                        {{ $post->description }}
                                    </h4>

                                    <p class="text-xs text-gray-500">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>

                            </div>

                        </div>

                        <p>
                            {!! nl2br(e($post->description)) !!}
                        </p>

                    </div> 

                    @endforeach -->
                <!-- display post and can comment also  .... -->

        @foreach($posts as $post)
<div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm mb-4">

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <img
                class="w-11 h-11 rounded-xl object-cover"
                src="https://i.pravatar.cc/150?u={{ $post->id }}"
                alt="{{ $post->content }}">

            <div>
                <h4 class="text-sm font-bold text-slate-900 hover:text-brand-500 cursor-pointer transition-colors">
                    {{ $post->content }}
                </h4>

                <p class="text-xs text-slate-400 line-clamp-1">
                    Post Author
                </p>

                <p class="text-[11px] text-slate-400 mt-0.5">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        @if(Auth::user() && (Auth::user()->can('update', $post) || Auth::user()->can('delete', $post)))
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" type="button" class="p-2 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-50 focus:outline-none">
                    :
                </button>

                <div 
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-1 w-40 bg-white border border-slate-200 shadow-xl rounded-xl z-50 overflow-hidden"
                >
                    <div class="py-1">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}" class="flex items-center w-full px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Post
                            </a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors text-left w-full">
                                    <svg class="w-4 h-4 mr-2 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete Post
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @else
            <button type="button" class="p-2 text-slate-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="30" height="30">
                    <circle cx="50" cy="40" r="5" fill="currentColor" />
                    <circle cx="50" cy="70" r="5" fill="currentColor" />
                </svg>
            </button>
        @endif
    </div>

    <div class="space-y-3 text-sm text-slate-700 leading-relaxed">
        <p>
            {!! nl2br(e($post->content)) !!}
        </p>
        @if($post->image)
            <img
                src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('storage/'. $post->image) }}"
                alt="Post image"
                class="w-full h-64 object-cover rounded-xl"
            >
        @endif
    </div>
    
        <!-- delete  -->
         <div
        x-data="{ showComments: false }"
        class="pt-4 mt-4  border-slate-100"
    >

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 text-xs font-semibold text-slate-500">
            
            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                @csrf
                <button
                    class="flex items-center gap-2 transition py-1.5 px-3 rounded-lg hover:bg-blue-50 {{ $post->likes->contains(auth()->id()) ? 'text-blue-600' : 'hover:text-blue-600' }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="{{ $post->likes->contains(auth()->id()) ? 'currentColor' : 'none' }}"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M2 10h3a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1z" />
                        <path d="M6 10c0-1 .5-2.5 1.5-4.5S9.5 2 11 2s1.5 1.5 1.5 3v4h6.5a2 2 0 0 1 2 2v1a2 2 0 0 1-.5 1.3 2 2 0 0 1 .1 2.2 2 2 0 0 1-.6 2.2 2 2 0 0 1-1.5 2.3H11c-2.5 0-4.5-2-5-4V10z" />
                    </svg>

                    <span>{{ $post->likes->count() }}</span>
                </button>
            </form>

            <button
                type="button"
                @click="showComments = !showComments"
                class="flex items-center gap-2 hover:text-blue-600 transition-colors py-1.5 px-3 rounded-lg hover:bg-blue-50"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                </svg>

                <span>{{ $post->comments->count() }}</span>
            </button>

            <button
                class="flex items-center gap-2 transition-colors py-1.5 px-3 rounded-lg hover:bg-blue-50 {{ $post->shares?->contains(auth()->id()) ? 'text-blue-600' : 'hover:text-blue-600' }}"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="w-5 h-5"
                    fill="{{ $post->shares?->contains(auth()->id()) ? 'currentColor' : 'none' }}"
                    viewBox="0 0 24 24" 
                    stroke="currentColor"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                    />
                </svg>

                <span>Share</span>
            </button>

            <button
                class="flex items-center gap-2 hover:text-blue-600 transition-colors py-1.5 px-3 rounded-lg hover:bg-blue-50"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>

                <span>Save</span>
            </button>

        </div>
            <!-- delete -->
            <!-- Comments Section -->
            <div
                x-show="showComments"
                x-transition
                class="mt-5 space-y-4"
            >
                 <!-- Comment Form -->
               <form action="{{ route('comments.store', $post->id) }}"
                    method="POST"
                    class="mt-4"
                >
                    @csrf
                    <div class="flex items-end gap-3">
                     <!-- Comment Input -->
                        <div class="flex-1 flex items-end bg-slate-100 rounded-2xl border border-slate-200 px-3 py-2 focus-within:ring-2 focus-within:ring-blue-500 transition ">

                            <textarea
                                name="comment"
                                rows="1"
                                placeholder="Add a comment..."
                                class="w-full bg-transparent resize-none border-none focus:ring-0  placeholder:text-slate-400 text-slate-700"
                            >{{ old('comment') }}</textarea>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="ml-2 w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-sm"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M22 2L11 13"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M22 2L15 22l-4-9-9-4 20-7z"
                                    />
                                </svg>
                            </button>

                        </div>

                    </div>

                    @error('comment')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </form>
                <!-- Existing Comments -->
                @forelse($post->comments as $comment)

                    <div class="border rounded-xl p-3 bg-slate-50">

                        <div class="flex justify-between">

                            <div>
                                <h5 class="font-semibold text-slate-700">
                                    {{ $comment->user->name }}
                                </h5>

                                <p class="text-sm text-slate-700 mt-1">
                                    {{ $comment->comment }}
                                </p>

                                <small class="text-slate-400">
                                    {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </div>

                            @if(auth()->id() == $comment->user_id)

                                <form
                                    action="{{ route('comments.destroy', $comment->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-500 text-xs hover:text-red-700"
                                    >
                                        Delete
                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                @empty

                    <p class="text-sm text-slate-400">
                        No comments yet.
                    </p>

                @endforelse
                <!-- sdjgh -->

            </div>
        </div>

    </div>
    @endforeach
    </section>

    <aside class="lg:col-span-3 space-y-6 lg:sticky lg:top-24 hidden lg:block">
        
        <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Tendances LinkUp</h3>
            <div class="space-y-4">
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 hover:text-brand-500 block leading-snug transition-colors">Le framework Laravel passe la barre des 150M de téléchargements</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 4h • 3,420 lecteurs</span>
                </div>
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 hover:text-brand-500 block leading-snug transition-colors">L'essor du CSS utilitaire dans les architectures d'entreprise</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 1j • 1,895 lecteurs</span>
                </div>
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 hover:text-brand-500 block leading-snug transition-colors">Recrutement Tech : Ce que veulent les CTOs en 2026</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 2j • 5,120 lecteurs</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Suggestions de suivi</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <img class="w-9 h-9 rounded-xl object-cover" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=100&q=80" alt="Alexandre">
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-800 truncate">Alexandre Miller</h4>
                            <p class="text-[11px] text-slate-400 truncate">VP Engineering @ Vercel</p>
                        </div>
                    </div>
                    <button class="text-xs font-bold text-brand-500 hover:text-brand-600 shrink-0 px-2.5 py-1 rounded-lg hover:bg-brand-50 transition-colors">Suivre</button>
                </div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <img class="w-9 h-9 rounded-xl object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80" alt="Léa">
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-800 truncate">Léa Galli</h4>
                            <p class="text-[11px] text-slate-400 truncate">Lead UI/UX Designer</p>
                        </div>
                    </div>
                    <button class="text-xs font-bold text-brand-500 hover:text-brand-600 shrink-0 px-2.5 py-1 rounded-lg hover:bg-brand-50 transition-colors">Suivre</button>
                </div>
            </div>
        </div>

        <div class="text-[11px] text-slate-400 px-2 space-y-1 text-center lg:text-left">
            <div class="flex flex-wrap justify-center lg:justify-start gap-x-3 gap-y-1">
                <a href="#" class="hover:underline hover:text-brand-500">À propos</a>
                <a href="#" class="hover:underline hover:text-brand-500">Accessibilité</a>
                <a href="#" class="hover:underline hover:text-brand-500">Conditions</a>
                <a href="#" class="hover:underline hover:text-brand-500">Confidentialité</a>
            </div>
            <p class="pt-2">LinkUp Corporation © 2026</p>
        </div>
    </aside>

</div>
@endsection
