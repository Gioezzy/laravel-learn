<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-green-600 dark:text-green-400">
                Dashboard Pengguna
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="text-gray-900 dark:text-gray-100">
                        <h3 class="mb-2 text-lg font-semibold">Halo, {{ auth()->user()->name }}! 👋</h3>
                        <p class="mb-4">Ini adalah halaman dashboard kamu sebagai pengguna biasa.</p>


                        <div class="pt-4 mt-6 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-gray-500 dark:text-gray-400">
                                Silakan perbarui profil atau mulai menggunakan layanan kami.
                            </p>

                            <div class="mt-4 space-x-4">
                                <a href="{{ route('profile.edit') }}"
                                    class="px-4 py-2 text-white transition duration-200 bg-indigo-600 rounded-lg dark:bg-indigo-500 hover:bg-indigo-700">
                                    Update Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>