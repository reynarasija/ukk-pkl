<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List PKL') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 flex justify-between">
                <form action="{{ route('pkl.index') }}" method="GET" class="flex space-x-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..."
                        class="rounded-lg border-gray-300 shadow-sm text-sm px-4 py-2 dark:bg-gray-700 dark:text-white" />
                    <button type="submit"
                        class=" bg-blue-600 text-white font-medium rounded-lg text-base px-5 py-2.5 hover:bg-blue-700">Cari</button>
                </form>
                <a href="{{ route('pkl.create') }}"
                    class="inline-block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Tambah List PKL
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-lg text-center">
                    <div class="p-2">
                        <h1>Data PKL Para Siswa</h1>
                    </div>
                    <div id="pkl-table">
                        @include('pkl.table', ['pkls' => $pkls])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('pkl.index') }}",
                    type: "GET",
                    data: { search: query },
                    beforeSend: function () {
                        $('#pkl-table').html('<p class="text-center">Loading...</p>');
                    },
                    success: function (data) {
                        $('#pkl-table').html(data);
                    },
                    error: function (xhr) {
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush -->