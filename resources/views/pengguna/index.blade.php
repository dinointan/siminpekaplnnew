<x-layout>
    @if (session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif

    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    </x-slot:styles>
    <x-slot:title>Daftar Pengguna</x-slot:title>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div id="flash-alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div id="flash-alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <x-export-button></x-export-button>
                    <a class="btn btn-primary float-end rounded-2" href="{{ route('pengguna.create') }}">Tambah
                        Pengguna</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('pengguna.table', ['type' => 'index'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>ID Pengguna</b></label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="modal_id_pengguna"
                                    readonly></div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Nama Pengguna</b></label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="modal_nama_pengguna"
                                    readonly></div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Username</b></label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="modal_username"
                                    readonly></div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Role</b></label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="modal_role" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Divisi</b></label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="modal_divisi" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Foto</b></label></div>
                            <div class="col-md-8">
                                <img src="{{ asset('assets/images/users/default.jpg') }}" id="modal_foto"
                                    alt="Foto Pengguna" width="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#pengguna_table').DataTable({
                language: datatableLanguageOptions,
                ordering: true 
            });
        });


        $(document).on('click', '.detail-btn', function() {
            $('#modal_id_pengguna').val($(this).data('id_pengguna') || '-');
            $('#modal_nama_pengguna').val($(this).data('nama_pengguna') || '-');
            $('#modal_username').val($(this).data('username') || '-');
            $('#modal_role').val($(this).data('role') || '-');
            $('#modal_divisi').val($(this).data('divisi') || '-');

            const foto = $(this).data('foto');
            if (foto) {
                $('#modal_foto').attr('src', '/storage/' + foto); // atau tambahkan subfolder
            } else {
                $('#modal_foto').attr('src', '/assets/images/users/default.jpg');
            }

        });
    </script>
</x-layout>
