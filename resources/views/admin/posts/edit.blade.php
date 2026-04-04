<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Chỉnh sửa bài viết') }}
            </h2>
            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 dark:bg-slate-700 border border-transparent rounded-lg font-semibold text-xs text-slate-700 dark:text-slate-200 uppercase tracking-widest hover:bg-slate-300 dark:hover:bg-slate-600 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Quay lại') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @csrf
                @method('PUT')
                
                <!-- Left Column: Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-4">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Tiêu đề bài viết</label>
                                <input type="text" name="title" id="title" value="Tiêu đề bài viết hiện tại" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors">
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Nội dung</label>
                                <textarea name="content" id="content" rows="15" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors">Nội dung bài viết hiện tại...</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sidebar Settings -->
                <div class="space-y-6">
                    <!-- Publish Box -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <h3 class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                            Trạng thái & Cập nhật
                        </h3>
                        <div class="space-y-4">
                            <div class="flex gap-2">
                                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-bold shadow-md transition-all">Cập nhật bài viết</button>
                            </div>
                            <button type="button" class="w-full px-4 py-2 text-rose-600 hover:text-rose-700 text-xs font-bold transition-colors">Gỡ bài viết</button>
                        </div>
                    </div>

                    <!-- Category & Tags -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="space-y-6">
                            <!-- Category -->
                            <div>
                                <label for="category_id" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Danh mục</label>
                                <select name="category_id" id="category_id" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="1" selected>Lập trình</option>
                                    <option value="2">Tin tức</option>
                                    <option value="3">Công nghệ</option>
                                </select>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Thẻ (Tags)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="1" checked class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Laravel</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="2" checked class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">PHP</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="3" class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Tailwind</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="4" class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">VueJS</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <label for="image" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-4">Ảnh đại diện</label>
                        <div class="mb-4">
                            <img src="https://via.placeholder.com/400x250" alt="Current featured image" class="w-full h-auto rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                        </div>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-700 border-dashed rounded-xl">
                            <div class="space-y-1 text-center">
                                <div class="flex text-sm text-slate-600 dark:text-slate-400">
                                    <label for="image" class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Thay đổi ảnh</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-slate-500">PNG, JPG up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>