<div>
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Tag</h1>

    <form wire:submit.prevent="update" class="max-w-lg space-y-4">
        <div>
            <label for="name" class="block font-medium text-gray-700 dark:text-gray-300">Nama Tag</label>
            <input id="name" wire:model.live="name"
                class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white px-3 py-2 rounded w-full focus:ring-2 focus:ring-blue-500 outline-none">
            @error('name')
                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="slug" class="block font-medium text-gray-700 dark:text-gray-300">Slug</label>
            <input id="slug" wire:model="slug"
                class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white px-3 py-2 rounded w-full focus:ring-2 focus:ring-blue-500 outline-none">
            @error('slug')
                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-600 dark:hover:bg-blue-800">Perbarui</button>
            <a href="{{ route('admin.tags.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-black dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white font-bold py-2 px-4 rounded">Batal</a>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600 dark:text-green-400">{{ session('message') }}</div>
    @endif
</div>
