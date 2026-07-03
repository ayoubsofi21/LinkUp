<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage; // Pour gérer la suppression d'image
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts=Post::all();
        $posts = Post::withCount('comments')
             ->latest()
             ->get();
        return view("pages.feed",compact("posts"));
    }
    public function store(StorePostRequest $request)
    {
        $filename = null;

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->validated()['content'],
            'image' => $filename,
        ]);

        return redirect()
            ->route('feed')
            ->with('success', 'Post published successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $post)
    {
        $post=Post::findOrFail($post);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // 1. Trouver l'article ou renvoyer une erreur 404 si l'ID n'existe pas
        $post = Post::findOrFail($id);
        // À la place de $this->authorize('update', $post);
        Gate::authorize('update', $post);
        // Ou si vous utilisez Laravel 11/12 : Gate::authorize('update', $post);
        // 3. Valider les données reçues
        $validated = $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image de 2 Mo max
        ]);
        // 4. Gérer le changement d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image du stockage (si elle existe et n'est pas une URL de test)
            if ($post->image && !str_starts_with($post->image, 'http')) {
                Storage::disk('public')->delete($post->image);
            }
            // Enregistrer la nouvelle image dans le dossier "posts"
            $path = $request->file('image')->store('posts', 'public');
            $post->image = $path;
        }

        // 5. Mettre à jour le texte et sauvegarder
        $post->content = $validated['content'];
        $post->save();
        // 6. Rediriger l'utilisateur
        return redirect()->route('feed')->with('success', 'Article modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
  

public function destroy(string $id)
{
    // 1. Trouver l'article
    $post = Post::findOrFail($id);
    // 2. Vérifier le droit de supprimer (Laravel 12)
    Gate::authorize('delete', $post);
    // 3. Supprimer de la base de données
    $post->delete();
    // 4. Retourner à la liste
    return redirect()->route('feed');
}
}
