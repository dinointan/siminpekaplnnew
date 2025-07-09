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
    <div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="detailModalLabel">Detail Perabotan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>ID Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="id_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Kode Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="kode_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Nama Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="nama_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Kategori</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="kategori" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Tahun Pengadaan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="tahun" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Lokasi</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="lokasi" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Kondisi Perabotan</strong></label>
                            <div class="col-sm-9">
                                <input type="text" id="kondisi_perabotan" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>QR Code</strong></label>
                            <div class="col-sm-9">
                                <img id="modal-qrcode-img" alt="QR Code" class="img-thumbnail"
                                    style="width: 90px; height: 90px;">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Foto Perabotan</strong></label>
                            <div class="col-sm-9">
                                <img id="foto" src="" alt="Foto Perabotan"
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
            // Inisialisasi DataTable
            $('#furnitures-table').DataTable({
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

            $(document).on('click', '.detail-btn', function() {
                const kode = $(this).data('kode');

                $('#id_perabotan').val($(this).data('id_perabotan'));
                $('#kode_perabotan').val(kode);
                $('#nama_perabotan').val($(this).data('nama_perabotan'));
                $('#kategori').val($(this).data('kategori'));
                $('#tahun').val($(this).data('tahun'));
                $('#lokasi').val($(this).data('lokasi'));
                $('#kondisi_perabotan').val($(this).data('kondisi_perabotan'));
                const foto = $(this).data('foto');
                if (foto) {
                    $('#foto').attr('src', '/assets/images/items/' + foto);
                } else {
                    $('#foto').attr('src', '');
                }

                // Memuat QR Code berdasarkan kode
                $('#barcode_area').html($(this).data('qrcode'));

            });

        });

        document.querySelectorAll('.detail-btn').forEach(button => {
            button.addEventListener('click', function() {
                const kode = this.getAttribute('data-kode'); // ambil kode perabotan

                // Isi href Cetak QR secara dinamis
                const cetakLink = `/perabotan/cetakqr/${kode}`;
                document.getElementById('cetak-qr-btn').setAttribute('href', cetakLink);

                // QR Code image
                const qrCodeData = this.getAttribute('data-qrcode');
                document.getElementById('modal-qrcode-img').src = qrCodeData;
            });
        });


        function exportData(type) {
            window.location.href = "/perabotan/export?type=" + type;
        }
        document.querySelectorAll('.detail-btn').forEach(button => {
            button.addEventListener('click', function() {
                const qrCodeData = this.getAttribute('data-qrcode');
                document.getElementById('modal-qrcode-img').src = qrCodeData;
            });
        });
    </script>
</x-layout>
