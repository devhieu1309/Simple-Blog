<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Quản lý Bài viết') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold uppercase tracking-widest rounded-lg shadow-md transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Tạo bài viết mới') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-0 text-slate-900 dark:text-slate-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-slate-500 dark:text-slate-400">
                            <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold">Name</th>
                                    <th scope="col" class="px-6 py-4 font-bold">Author</th>
                                    <th scope="col" class="px-6 py-4 font-bold">Category</th>
                                    <th scope="col" class="px-6 py-4 font-bold">Tags</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-center">Image</th>
                                    <th scope="col" class="px-6 py-4 font-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                <tr class="bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <th scope="row" class="px-6 py-4 font-semibold text-slate-900 whitespace-nowrap dark:text-white">
                                        Hướng dẫn học Laravel cho người mới bắt đầu
                                    </th>
                                    <td class="px-6 py-4 flex items-center">
                                        <div class="h-7 w-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold mr-2">MH</div>
                                        Minh Hiếu
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded text-xs font-medium border border-indigo-100 dark:border-indigo-800/50">Lập trình</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#laravel</span>
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#php</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center">
                                            <img src="https://ui-avatars.com/api/?name=Laravel&background=F03A17&color=fff" alt="Post thumbnail" class="h-10 w-16 object-cover rounded border border-slate-200 dark:border-slate-700 shadow-sm">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 space-x-3">
                                        <a href="{{ route('admin.posts.edit', 1) }}" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">Sửa</a>
                                        <button class="font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-900 dark:hover:text-rose-300 transition-colors">Xóa</button>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <th scope="row" class="px-6 py-4 font-semibold text-slate-900 whitespace-nowrap dark:text-white">
                                        10 tính năng mới trong PHP 8.3
                                    </th>
                                    <td class="px-6 py-4 flex items-center">
                                        <div class="h-7 w-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold mr-2">MH</div>
                                        Minh Hiếu
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded text-xs font-medium border border-emerald-100 dark:border-emerald-800/50">Tin tức</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#php8</span>
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#backend</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center">
                                            <img src="https://ui-avatars.com/api/?name=PHP&background=777BB4&color=fff" alt="Post thumbnail" class="h-10 w-16 object-cover rounded border border-slate-200 dark:border-slate-700 shadow-sm">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 space-x-3">
                                        <a href="#" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">Sửa</a>
                                        <button class="font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-900 dark:hover:text-rose-300 transition-colors">Xóa</button>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <th scope="row" class="px-6 py-4 font-semibold text-slate-900 whitespace-nowrap dark:text-white">
                                        Cách tối ưu hóa hiệu suất ứng dụng Web
                                    </th>
                                    <td class="px-6 py-4 flex items-center">
                                        <div class="h-7 w-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold mr-2">MH</div>
                                        Minh Hiếu
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 rounded text-xs font-medium border border-amber-100 dark:border-amber-800/50">Công nghệ</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#performance</span>
                                            <span class="text-[10px] px-1.5 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded border border-slate-200 dark:border-slate-600">#web</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center">
                                            <img src="https://ui-avatars.com/api/?name=Web&background=00D1B2&color=fff" alt="Post thumbnail" class="h-10 w-16 object-cover rounded border border-slate-200 dark:border-slate-700 shadow-sm">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 space-x-3">
                                        <a href="#" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">Sửa</a>
                                        <button class="font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-900 dark:hover:text-rose-300 transition-colors">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Footer -->
                    <div class="px-6 py-4 bg-slate-50 dark:bg-slate-700/30 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between">
                        <div class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                            Hiển thị từ <span class="font-bold text-slate-700 dark:text-slate-200">1</span> đến <span class="font-bold text-slate-700 dark:text-slate-200">3</span> trong <span class="font-bold text-slate-700 dark:text-slate-200">24</span> bài viết
                        </div>
                        <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-lg shadow-sm bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
                            <a href="#" class="relative inline-flex items-center rounded-l-lg px-2 py-2 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                <span class="sr-only">Previous</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-bold text-white focus:z-20">1</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">2</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">3</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">4</a>
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-400 border-l border-slate-200 dark:border-slate-700">...</span>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">598</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">599</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">600</a>
                            <a href="#" class="relative inline-flex items-center rounded-r-lg px-2 py-2 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 border-l border-slate-200 dark:border-slate-700 transition-colors">
                                <span class="sr-only">Next</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>