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
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Perabotan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>ID Perabotan</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_id_perabotan" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Nama Perabotan</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_nama_perabotan" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Kategori</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_kategori" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Lokasi Asal</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_lokasi_awal" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Lokasi Tujuan</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_lokasi_tujuan" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Tahun Pengadaan</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_tahun" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Keterangan</b></label></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="modal_kondisi_perabotan" readonly>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-4"><label><b>Foto</b></label></div>
                            <div class="col-md-8">
                                <img src="{{ asset('assets/images/users/default.jpg') }}" id="modal_foto"
                                    alt="Foto Perabotan" width="100">
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
                    $('#modal_foto').attr('src', '/storage/' + foto);
                } else {
                    $('#modal_foto').attr('src', '/assets/images/users/default.jpg');
                }
            });
        });

        function exportData(type) {
            window.location.href = "/mutasi/export?type=" + type;
        }
    </script>


</x-layout>
