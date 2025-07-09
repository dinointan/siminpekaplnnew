<x-layout>
    @if (session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif
    <x-slot:title>Daftar Kategori</x-slot:title>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary float-end rounded-2" href="{{ route('kategori.create') }}"
                        tabindex="1">Tambah
                        Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('inventory.kategori.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#kategory_table').DataTable({
                "language": datatableLanguageOptions,
                "columnDefs": [{
                    "targets": [2],
                    "orderable": false,
                    "searchable": false
                }]
            });

            $('input[type="search"]').focus();
        });
    </script>
</x-layout>
