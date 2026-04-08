<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Tạo bài viết mới') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 dark:bg-slate-700 border border-transparent rounded-lg font-semibold text-xs text-slate-700 dark:text-slate-200 uppercase tracking-widest hover:bg-slate-300 dark:hover:bg-slate-600 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Quay lại') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @csrf
                <!-- Left Column: Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-4">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Tiêu đề bài viết</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors" placeholder="Nhập tiêu đề hấp dẫn...">
                                @error('title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Nội dung</label>
                                <textarea name="content" id="content" rows="15" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors" placeholder="Viết nội dung bài viết ở đây...">{{ old('content') }}</textarea>
                                @error('content')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Category & Tags -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-6">
                            <!-- Category -->
                            <div>
                                <label for="category_id" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Danh mục</label>
                                <select name="category_id" id="category_id" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Chọn danh mục...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Thẻ (Tags)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($tags as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">{{ $tag->name }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <label for="image" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-4">Ảnh đại diện</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-700 border-dashed rounded-xl">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600 dark:text-slate-400">
                                    <label for="image" class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Tải ảnh lên</span>
                                        <input id="image" name="image" value="{{ old('image') }}" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">hoặc kéo thả</p>
                                </div>
                                @error('image')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-slate-500">PNG, JPG, GIF</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold shadow-md transition-all">
                            Lưu bài viết
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>