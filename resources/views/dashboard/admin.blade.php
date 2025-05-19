<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-red-600 dark:text-red-400">
                Dashboard Admin
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="mb-4 text-lg font-semibold">Selamat datang, Admin!</h3>
                        <p class="mb-6">Ini adalah panel admin. Anda bisa mengelola pengguna, melihat statistik, dll.
                        </p>


                        <a href="{{ route('penggunas.index') }}"
                            class="px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-lg dark:bg-blue-500 hover:bg-blue-700">
                            Manajemen Pengguna
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>