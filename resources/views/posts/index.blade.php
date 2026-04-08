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
        Xem thêm

        <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
            →
        </span>
    </a>
</article>
@endforeach
{{ $posts->links() }}
<!-- <nav class="mt-12 flex items-center justify-between px-4 pt-12 sm:px-6"
    aria-label="Pagination">
    <div class="flex flex-1 justify-between">
        <a class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            rel="prev" href="/"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z">
                </path>
            </svg> &nbsp; Previous
        </a>
        <a class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            rel="next">Next Page &nbsp; <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z">
                </path>
            </svg>
        </a>
    </div>
</nav> -->
@endsection