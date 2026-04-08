@extends('layouts.public-app')

@section('main-content')
<div class="relative p-4">
    <div class="max-w-3xl mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
            <div class="">
                <h1 href="#" class="text-gray-900 font-bold text-4xl">{{ $post->title }}</h1>
                <hr>
                <p class="text-base leading-8 my-5">
                    {{ $post->content }}
                </p>

                @foreach($post->tags as $tag)
                <a href="#"
                    class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                    #{{ $tag->name }}
                </a>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection