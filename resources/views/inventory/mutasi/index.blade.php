<x-layout>
    <x-slot:title>Daftar Mutasi Perabotan</x-slot:title>

    @if (session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <x-alert type="success" :message="session('status')"></x-alert>
            @endif
            <div class="card">
                <div class="card-header">
                    <x-export-button></x-export-button>
                    <a class="btn btn-primary float-end rounded-2" href="{{ route('mutasi.create') }}"
                        tabindex="1">Tambah
                        Data Mutasi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('inventory.mutasi.table')
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
                    <h5 class="modal-title" id="detailModalLabel">Detail Mutasi Perabotan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>ID Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_id_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Nama Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_nama_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Kategori</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_kategori" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Lokasi Asal</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_lokasi_awal" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Lokasi Tujuan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_lokasi_tujuan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Tahun Pengadaan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_tahun" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Keterangan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="modal_kondisi_perabotan" class="form-control" readonly>
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
            $('#mutasi_table').DataTable({
                language: datatableLanguageOptions,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false
                }]
            });

            $(document).on('click', '.detail-btn', function() {
                $('#modal_id_perabotan').val($(this).data('id_perabotan') || '-');
                $('#modal_nama_perabotan').val($(this).data('nama_perabotan') || '-');
                $('#modal_kategori').val($(this).data('kategori') || '-');
                $('#modal_lokasi_awal').val($(this).data('lokasi_awal') || '-');
                $('#modal_lokasi_tujuan').val($(this).data('lokasi_tujuan') || '-');
                $('#modal_tahun').val($(this).data('tahun') || '-');
                $('#modal_kondisi_perabotan').val($(this).data('kondisi_perabotan') || '-');

                const foto = $(this).data('foto');
                if (foto) {
                    $('#foto').attr('src', '/assets/images/items/' + foto);
                } else {
                    $('#foto').attr('src', '');
                }
            });
        });

        function exportData(type) {
            window.location.href = "/mutasi/export?type=" + type;
        }
    </script>


</x-layout>
