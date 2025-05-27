<table class="w-full text-lg text-left text-gray-500 dark:text-gray-300">
    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th>No.</th>
            <th>Siswa</th>
            <th>Guru</th>
            <th>Industri</th>
            <th>Mulai</th>
            <th>Selesai</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pkls as $pkl)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pkl->siswa->nama ?? '-' }}</td>
                <td>{{ $pkl->guru->nama ?? '-' }}</td>
                <td>{{ $pkl->industri->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($pkl->mulai)->locale('id')->translatedFormat('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($pkl->selesai)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-4">Tidak ada data yang ditemukan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $pkls->withQueryString()->links() }}
</div>