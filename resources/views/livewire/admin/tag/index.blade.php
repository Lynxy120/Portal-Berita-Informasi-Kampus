<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Tag</h1>
        <a href="{{ route('admin.tags.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-600 dark:hover:bg-blue-800">
            Tambah Tag
        </a>
    </div>

    <div class="mb-4">
        <input wire:model.live="search" placeholder="Cari tag..."
            class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white px-3 py-2 rounded w-full max-w-sm focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 outline-none">
    </div>

    <div class="overflow-x-auto bg-white dark:bg-zinc-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
            <thead class="bg-gray-50 dark:bg-zinc-700">
                <tr>
                    <th
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        No</th>
                    <th
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Nama</th>
                    <th
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Slug</th>
                    <th
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                @forelse ($tags as $index => $tag)
                    @php
                        $number = $loop->iteration + ($tags->currentPage() - 1) * $tags->perPage();
                    @endphp
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $number }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $tag->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $tag->slug }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm">
                            <a href="{{ route('admin.tags.edit', $tag) }}"
                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-2">Edit</a>
                            <button wire:click="delete({{ $tag->id }})"
                                wire:confirm="Yakin ingin menghapus tag '{{ $tag->name }}'?"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">Tidak ada
                            data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tags->links() }}
    </div>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600 dark:text-green-400">{{ session('message') }}</div>
    @endif
</div>
