<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Industri List') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 flex justify-end">
                <a href="{{ route('industri.create') }}" 
                    class="inline-block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Tambah List Industri
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-lg text-center">
                <div class="p-2">
                    <h1>Data Industri</h1>
                </div>
                <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-300">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>No.</th>
                        <th>Nama Perusahaan</th>
                        <th>Bidang Usaha</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($industris as $industri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $industri->nama }}</td>
                            <td>{{ $industri->bidang_usaha}}</td>
                            <td>{{ $industri->alamat}}</td>
                            <td>{{ $industri->kontak }}</td>
                            <td>{{ $industri->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
