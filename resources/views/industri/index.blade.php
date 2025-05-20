<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('industri List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-lg text-center">
                <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-300">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
