<x-layout>
    @if (session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif

    <x-slot:styles>
        <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    </x-slot:styles>
    <x-slot:title>Daftar User Pengguna</x-slot:title>
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
                        User Pengguna</a>
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
    <div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="detailModalLabel">Detail User Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>ID User Pengguna</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_id_pengguna" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Nama User Pengguna</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_nama_pengguna" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Username</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_username" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Email</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_email" class="form-control" readonly>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Role</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_role" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Divisi</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_divisi" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Foto</strong></label>
                            <div class="col-sm-9">
                                <img id="foto" src="" alt="Foto Pengguna"
                                    style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
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

            const foto = $(this).data('foto');
console.log("Foto:", foto);


            // Event listener tombol detail (versi jQuery)
            $(document).on('click', '.detail-btn', function() {
                $('#modal_id_pengguna').val($(this).data('id_pengguna') || '-');
                $('#modal_nama_pengguna').val($(this).data('nama_pengguna') || '-');
                $('#modal_username').val($(this).data('username') || '-');
                $('#modal_email').val($(this).data('email') || '-');
                $('#modal_role').val($(this).data('role') || '-');
                $('#modal_divisi').val($(this).data('divisi') || '-');

                const foto = $(this).data('foto');
                if (foto) {
                    $('#foto').attr('src', '/storage/pengguna/' + foto);
                } else {
                    $('#foto').attr('src', '');
                }
            });

            // Event listener tombol detail (versi native JS)
            document.querySelectorAll('.detail-pengguna-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const nama = this.getAttribute('data-nama');
                    const username = this.getAttribute('data-username');
                    const role = this.getAttribute('data-role') || '-';
                    const divisi = this.getAttribute('data-divisi') || '-';

                    document.getElementById('modal-nama').textContent = nama;
                    document.getElementById('modal-username').textContent = username;
                    document.getElementById('modal-role').textContent = role;
                    document.getElementById('modal-divisi').textContent = divisi;
                });
            });
        });

        // Fungsi export pengguna
        function exportData(type) {
            window.location.href = "/pengguna/export?type=" + type;
        }
    </script>

</x-layout>
