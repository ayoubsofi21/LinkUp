@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-xl shadow overflow-hidden">

    <div class="px-6 py-5 border-b">
        <h1 class="text-2xl font-bold text-gray-800">
            Discover People
        </h1>
        <p class="text-gray-500 text-sm mt-1">
            Find developers and connect with them.
        </p>
    </div>

    <div class="divide-y">
        @foreach($users as $user)

            @continue($user->id == auth()->id())

            <div class="flex items-center justify-between px-6 py-5 hover:bg-gray-50 transition">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xl">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                    <div>
                        <h2 class="font-semibold text-gray-800">
                            {{ $user->name }}
                        </h2>

                        <p class="text-sm text-gray-500">
                            {{ $user->email }}
                        </p>

                        <div class="flex gap-5 mt-2 text-xs text-gray-400">

                            <span>
                                {{ $user->followers_count }} Followers
                            </span>

                            <span>
                                {{ $user->following_count }} Following
                            </span>

                        </div>
                    </div>

                </div>

                <div>

                    @if(auth()->user()->isFollowing($user))

                        <form action="{{ route('users.unfollow',$user) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                                Following
                            </button>
                        </form>

                    @else

                        <form action="{{ route('users.follow',$user) }}" method="POST">
                            @csrf

                            <button
                                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                Follow
                            </button>
                        </form>

                    @endif

                </div>

            </div>

        @endforeach
    </div>

</div>
@endsection