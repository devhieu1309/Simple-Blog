<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Quản lý Danh mục') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-widest rounded-lg shadow-md transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Tạo danh mục mới') }}
            </a>
        </div>
    </x-slot>


    <div class="py-12 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-0 text-slate-900 dark:text-slate-100">
                    <div class="relative overflow-x-auto">
                        @if(session('success'))
                        <div class="bg-green-200 p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="w-full text-sm text-left rtl:text-right text-slate-500 dark:text-slate-400">
                            <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold">ID</th>
                                    <th scope="col" class="px-6 py-4 font-bold">Tên danh mục</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-right">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                @foreach($categories as $category)
                                <tr class="bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-slate-400">{{ $category->id }}</td>
                                    <th scope="row" class="px-6 py-4 font-semibold text-slate-900 whitespace-nowrap dark:text-white">
                                        {{ $category->name }}
                                    </th>
                                    <td class="px-6 py-4 text-right space-x-3">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">Sửa</a>
                                        
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" type="submit"  class="font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-900 dark:hover:text-rose-300 transition-colors">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                     <div class="px-6 py-4">
                        {{ $categories->links() }}
                     </div>
                    <!-- <div class="px-6 py-4 bg-slate-50 dark:bg-slate-700/30 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between">
                        <div class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                            Hiển thị từ <span class="font-bold text-slate-700 dark:text-slate-200">1</span> đến <span class="font-bold text-slate-700 dark:text-slate-200">3</span> trong <span class="font-bold text-slate-700 dark:text-slate-200">10</span> danh mục
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>