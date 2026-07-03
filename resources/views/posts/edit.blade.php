<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-50 p-6 flex justify-center items-center min-h-screen">

    <div class="w-full max-w-2xl bg-white border border-slate-100 shadow-xl rounded-2xl p-6">
        
        <div class="flex items-center gap-3 mb-6">
            <img class="w-11 h-11 rounded-xl object-cover" src="https://i.pravatar.cc/150?u={{ $post->id }}" alt="Avatar">
            <div>
                <h4 class="text-sm font-bold text-slate-900">Modifier l'article</h4>
                <p class="text-xs text-slate-400">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wide text-slate-500">Contenu</label>
                    <textarea 
                        name="content" 
                        rows="5"
                        class="w-full text-sm text-slate-700 p-3 border border-slate-200 rounded-xl focus:outline-none focus:border-slate-400 resize-none"
                        required
                    >{{ old('content', $post->content) }}</textarea>
                </div>

                @if($post->image)
                    <div class="space-y-1">
                        <p class="text-xs text-slate-400">Image actuelle :</p>
                        <img src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('storage/'. $post->image) }}" class="w-full h-48 object-cover rounded-xl">
                    </div>
                @endif

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wide text-slate-500">Changer l'image (optionnel)</label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*"
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 file:cursor-pointer"
                    >
                </div>

                <div class="flex justify-between items-center pt-2">
                    <a href="{{ url()->previous() }}" class="text-sm text-slate-500 hover:underline">Annuler</a>
                    <button type="submit" class="px-5 py-2.5 bg-slate-900 text-white text-sm font-semibold rounded-xl hover:bg-slate-800 transition-colors cursor-pointer">
                        Mettre à jour
                    </button>
                </div>
            </form>

        @if($errors->any())
            <div class="mt-4 p-4 bg-red-50 text-red-600 rounded-xl text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</body>
</html>