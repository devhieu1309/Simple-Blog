<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Chỉnh sửa bài viết') }}
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
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @csrf
                @method('PUT')

                <!-- Left Column: Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-4">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Tiêu đề bài viết</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors">
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Nội dung</label>
                                <textarea name="content" id="content" rows="15" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors">{{ old('content', $post->content) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sidebar Settings -->
                <div class="space-y-6">
                    <!-- Publish Box -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-4">
                            <div class="flex gap-2">
                                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-bold shadow-md transition-all">Cập nhật bài viết</button>
                            </div>
                        </div>
                    </div>

                    <!-- Category & Tags -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-6">
                            <!-- Category -->
                            <div>
                                <label for="category_id" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Danh mục</label>
                                <select name="category_id" id="category_id" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($categories as $category)
                                    <option {{ $category->id == $post->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Thẻ (Tags)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($tags as $tag)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }} class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
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
                        <div class="mb-4 flex justify-center">
                            <img id="preview-image" src="{{ asset('storage/' . $post->image) }}" alt="Current featured image" class="w-32 h-32 object-cover rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                        </div>
                        <div class="mt-1 flex flex-col items-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-700 border-dashed rounded-xl">
                            <div class="space-y-1 text-center">
                                <div class="flex text-sm text-slate-600 dark:text-slate-400 justify-center">
                                    <label for="image" class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Thay đổi ảnh</span>
                                        <input id="image" name="image" type="file" class="sr-only" onchange="previewFile()">
                                    </label>
                                </div>
                                <p id="file-name" class="text-xs text-slate-500 mt-2 italic truncate max-w-[200px]">Chưa có file nào được chọn</p>
                                <p class="text-xs text-slate-500">PNG, JPG up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewFile() {
            const preview = document.getElementById('preview-image');
            const file = document.querySelector('input[type=file]').files[0];
            const fileNameLabel = document.getElementById('file-name');
            const reader = new FileReader();

            if (file) {
                fileNameLabel.textContent = file.name;
                reader.onloadend = function () {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
            } else {
                fileNameLabel.textContent = "Chưa có file nào được chọn";
            }
        }
    </script>
    @endpush
</x-app-layout>