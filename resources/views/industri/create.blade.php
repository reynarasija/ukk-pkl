<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Industri Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('industri.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-1">Nama Industri</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full rounded-md border-gray-300 text-gray-900 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Bidang Usaha</label>
                            <input type="text" name="bidang_usaha" value="{{ old('bidang_usaha') }}" class="w-full rounded-md border-gray-300  text-gray-900 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Alamat</label>
                            <textarea name="alamat" class="w-full rounded-md border-gray-300 text-gray-900 shadow-sm" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Kontak</label>
                            <input type="text" name="kontak" value="{{ old('kontak') }}" class="w-full rounded-md border-gray-300 text-gray-900 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border-gray-300 text-gray-900 shadow-sm" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-5 py-2.5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
