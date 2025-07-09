<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Detail Perabotan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1>Test Detail Perabotan</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Perabotan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="furnitures-table">
                                <thead class="text-primary">
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>Kode</b></th>
                                        <th><b>Nama</b></th>
                                        <th><b>Kategori</b></th>
                                        <th><b>Lokasi</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\Perabotan::with(['kategori', 'lokasi'])->take(3)->get() as $perabotan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $perabotan->kode }}</td>
                                            <td>{{ $perabotan->nama }}</td>
                                            <td>{{ $perabotan->kategori->nama_kategori ?? '-' }}</td>
                                            <td>{{ $perabotan->lokasi->nama_lokasi ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-success detail-btn" data-bs-toggle="modal"
                                                    data-bs-target="#detail-modal"
                                                    data-id_perabotan="{{ $perabotan->id }}"
                                                    data-nama_perabotan="{{ $perabotan->nama }}"
                                                    data-kode="{{ $perabotan->kode }}"
                                                    data-kategori="{{ $perabotan->kategori->nama_kategori ?? '-' }}"
                                                    data-lokasi="{{ $perabotan->lokasi->nama_lokasi ?? '-' }}"
                                                    data-tahun="{{ $perabotan->tahun_pengadaan }}"
                                                    data-kondisi_perabotan="{{ $perabotan->keterangan }}"
                                                    data-foto="{{ $perabotan->foto }}">
                                                    <i class="fas fa-info-circle"></i> Detail
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                            <img src="/assets/images/items/default.png" width="100" id="foto" alt="Foto" />
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
            console.log('Document ready');

            $(document).on('click', '.detail-btn', function() {
                console.log('Detail button clicked');
                const kode = $(this).data('kode');
                console.log('Kode:', kode);

                $('#id_perabotan').val($(this).data('id_perabotan'));
                $('#kode_perabotan').val(kode);
                $('#nama_perabotan').val($(this).data('nama_perabotan'));
                $('#kategori').val($(this).data('kategori'));
                $('#tahun').val($(this).data('tahun'));
                $('#lokasi').val($(this).data('lokasi'));
                $('#kondisi_perabotan').val($(this).data('kondisi_perabotan'));
                $('#foto').attr('src', '/assets/images/items/' + $(this).data('foto'));

                console.log('Data set:', {
                    id: $(this).data('id_perabotan'),
                    kode: kode,
                    nama: $(this).data('nama_perabotan'),
                    kategori: $(this).data('kategori'),
                    tahun: $(this).data('tahun'),
                    lokasi: $(this).data('lokasi'),
                    kondisi: $(this).data('kondisi_perabotan'),
                    foto: $(this).data('foto')
                });

                // Memuat QR Code
                $.get(`/perabotan/qrcode-generate?kode=${kode}`, function(res) {
                    console.log('QR Code response:', res);
                    if (res.status === 'success') {
                        $('#barcode_area').html(
                            `<div style="max-width: 200px;">${res.image}</div>`);
                    } else {
                        $('#barcode_area').html(
                            `<span class="text-danger">QR Code gagal dimuat</span>`);
                    }
                }).fail(function(xhr, status, error) {
                    console.error('QR Code error:', error);
                    $('#barcode_area').html(
                        `<span class="text-danger">QR Code gagal dimuat</span>`);
                });
            });
        });
    </script>
</body>

</html>
