<x-layout>
    <x-slot:title>Daftar Perabotan</x-slot:title>

    @if (session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <x-export-button></x-export-button>
                    <a class="btn btn-primary float-end rounded-2" href="{{ route('perabotan.create') }}">Tambah
                        Perabotan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('inventory.perabotan.table')
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
                    <h5 class="modal-title" id="exampleModalLabel">Detail Perabotan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row mt-2">
                            <label for="id_perabotan">ID Perabotan</label>
                            <input type="text" class="form-control" id="id_perabotan" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="kode_perabotan">Kode Perabotan</label>
                            <input type="text" class="form-control" id="kode_perabotan" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="nama_perabotan">Nama Perabotan</label>
                            <input type="text" class="form-control" id="nama_perabotan" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="tahun">Tahun Pengadaan</label>
                            <input type="number" class="form-control" id="tahun" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="kondisi_perabotan">Kondisi Perabotan</label>
                            <input type="text" class="form-control" id="kondisi_perabotan" disabled>
                        </div>
                        <div class="row mt-2">
                            <label for="qr_code">QR Code</label>
                            <div id="barcode_area"></div>
                        </div>

                        <div class="row mt-2">
                            <label for="foto">Foto</label><br>
                            <img src="/assets/images/furnitures/default.png" width="100" id="foto"
                                alt="Foto" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#perabotan-table').DataTable({
                language: datatableLanguageOptions,
                autoWidth: false,
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false

                }]
            });

            // Fokus ke kolom pencarian
            $('input[type="search"]').focus();

            $(document).on('click', '#detail-btn', function() {
                const kode = $(this).data('kode');

                $('#id_perabotan').val($(this).data('id_perabotan'));
                $('#kode_perabotan').val(kode); // ✅ ini perbaikannya
                $('#nama_perabotan').val($(this).data('nama_perabotan'));
                $('#kategori').val($(this).data('kategori'));
                $('#tahun').val($(this).data('tahun'));
                $('#lokasi').val($(this).data('lokasi'));
                $('#kondisi_perabotan').val($(this).data('kondisi_perabotan'));
                $('#foto').attr('src', '/assets/images/pengguna/' + $(this).data('foto'));

                // Memuat QR Code
                $.get('/perabotan/qrcode?kode=' + kode, function(res) {
                    $('#barcode_area').html(`<img src="${res.image}" alt="QR Code ${res.kode}">`);
                }).fail(function(xhr, status, error) {
                    $('#barcode_area').html(
                        `<span class="text-danger">QR Code gagal dimuat</span>`);
                });
            });

        });

        function exportData(type) {
            window.location.href = "/perabotan/export?type=" + type;
        }
    </script>
</x-layout>
