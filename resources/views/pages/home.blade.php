@extends('layouts.public-app')

@section('main-content')
@foreach($posts as $post)
<article class="mb-4 rounded-lg border border-gray-100 bg-white p-4 shadow-xs transition hover:shadow-lg sm:p-6">
  <span class="">
   <img class="" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
  </span>

  <a href="#">
    <h3 class="mt-0.5 text-lg font-medium text-gray-900">
      {{ $post->title }}
    </h3>
  </a>

  <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
    {{ $post->content}}
  </p>

  <a href="{{ route('post.show', $post->id) }}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
    Xem chi tiết
    <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
      →
    </span>
  </a>
</article>
@endforeach

<a href="{{ route('post.index') }}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
  Xem tất cả bài viết

  <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
    →
  </span>
</a>
@endsection