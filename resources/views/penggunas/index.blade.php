<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Daftar Pengguna
            </h2>
            <a href="{{ route('penggunas.create') }}"
                class="px-4 py-2 text-white bg-indigo-600 rounded-lg dark:bg-indigo-500 hover:bg-indigo-700 dark:hover:bg-indigo-600">
                Tambah Pengguna
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('success') }}
                </div>
            @endif


            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                        Telepon</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                        Photo</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                @foreach ($penggunas as $user)
                                    <tr>
                                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-gray-100">
                                            {{ $user->name }}</td>
                                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-gray-100">
                                            {{ $user->email }}</td>
                                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-gray-100">
                                            {{ $user->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($user->file_upload)
                                                <img src="{{ asset('storage/' . $user->file_upload) }}" alt="foto"
                                                    class="max-w-[100px] max-h-[100px] object-cover rounded">
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">(tidak ada photo)</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('penggunas.edit', $user->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">
                                                    Edit
                                                </a>
                                                <form action="{{ route('penggunas.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                                        class="text-red-600 hover:text-red-900 dark:text-red-400">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 mt-4">
                        {{ $penggunas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
