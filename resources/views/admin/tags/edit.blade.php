<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Chỉnh sửa thẻ') }}
            </h2>
            <a href="{{ route('admin.tags.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 dark:bg-slate-700 border border-transparent rounded-lg font-semibold text-xs text-slate-700 dark:text-slate-200 uppercase tracking-widest hover:bg-slate-300 dark:hover:bg-slate-600 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Quay lại') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                <form action="{{ route('admin.tags.update', 1) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tên thẻ (Tag Name)</label>
                        <input type="text" name="name" id="name" value="laravel" class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 focus:border-indigo-500 focus:ring-indigo-500 transition-colors" required>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-base font-bold shadow-lg transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Cập nhật thẻ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>