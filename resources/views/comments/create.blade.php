
@extends('layouts.app')

@section('content')<h2>Add a comment</h2>

<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea
        name="comment"
        rows="4"
        class="w-full border rounded-lg p-3"
        placeholder="Write your comment..."
    ></textarea>

    <button
        type="submit"
        class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg"
    >
        Add Comment
    </button>
</form>
@endsection