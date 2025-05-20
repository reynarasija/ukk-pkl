<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PKL List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-lg text-center">
                <table class="w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-300">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th>Siswa</th>
                        <th>Guru</th>
                        <th>Industri</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pkls as $pkl)
                        <tr>
                            <td>{{ $pkl->siswa->nama ?? '-' }}</td>
                            <td>{{ $pkl->guru->nama ?? '-' }}</td>
                            <td>{{ $pkl->industri->nama ?? '-' }}</td>
                            <td>{{ $pkl->mulai }}</td>
                            <td>{{ $pkl->selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
