<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Tambah Data PKL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pkl.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="guru_id" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Guru Pembimbing</label>
                        <select name="guru_id" id="guru_id" class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Guru --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="industri_id" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Industri</label>
                        <select name="industri_id" id="industri_id" class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Industri --</option>
                            @foreach($industris as $industri)
                                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="mulai" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Mulai</label>
                        <input type="date" name="mulai" id="mulai" class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label for="selesai" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Selesai</label>
                        <input type="date" name="selesai" id="selesai" class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>