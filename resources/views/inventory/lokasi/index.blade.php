<x-layout>
    <x-slot:title>Daftar Lokasi</x-slot:title>


    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <x-alert type="success" :message="session('status')"></x-alert>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary float-end rounded-2" href="{{ route('lokasi.create') }}"
                        tabindex="1">Tambah
                        Lokasi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('inventory.lokasi.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#lokasi_table').DataTable({
                "language": datatableLanguageOptions,
                "columnDefs": [{
                    "targets": [2],
                    "orderable": true,
                    "searchable": false
                }]
            });

            $('input[type="search"]').focus();
        });

        function exportData(type) {
            window.lokasi.href = "/lokasi/export?type=" + type;
        }
    </script>
</x-layout>
