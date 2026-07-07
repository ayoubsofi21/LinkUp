<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de {{ $user->name }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">

<div class="max-w-3xl mx-auto px-4 py-8 min-h-screen">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-8">
        <div class="h-32 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
        
        <div class="px-6 pb-6 relative">
            <div class="absolute -top-16 left-6">
                @if($user->image)
                    <img 
                        src="{{ asset('storage/'.$user->image) }}" 
                        alt="Photo de {{ $user->name }}"
                        class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-md bg-white"
                    >
                @else
                    <div class="w-28 h-28 rounded-full border-4 border-white shadow-md bg-slate-200 flex items-center justify-center text-slate-400 font-bold text-2xl">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="pt-16">
                <h2 class="text-2xl font-bold text-slate-900 tracking-tight">
                    {{ $user->name }}
                </h2>
                
                @if($user->headline)
                    <p class="text-base text-slate-700 mt-1 font-medium">
                        {{ $user->headline }}
                    </p>
                @endif

                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mt-3 text-sm text-slate-500">
                    @if($user->company)
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="font-semibold text-slate-600">{{ $user->company }}</span>
                        </div>
                    @endif

                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <span class="font-medium text-slate-600">
                            <strong class="text-slate-900">{{ $user->posts->count() }}</strong> publications
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="space-y-4">
    @forelse($posts as $post)
        <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:border-slate-200 transition-all duration-200">
            
            <p class="text-slate-800 text-sm leading-relaxed whitespace-pre-line">
                {{ $post->content }}
            </p>

            <div class="flex items-center gap-1.5 mt-2 text-xs text-slate-400">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>

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

        </div>
    @empty
        <div class="bg-white rounded-xl border border-dashed border-slate-200 p-12 text-center shadow-sm">
            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <p class="text-sm font-semibold text-slate-700">Aucune publication pour le moment</p>
            <p class="text-xs text-slate-400 mt-1">Cet utilisateur n'a encore rien partagé sur son fil d'actualité.</p>
        </div>
    @endforelse
</div>

</div>

</body>
</html>