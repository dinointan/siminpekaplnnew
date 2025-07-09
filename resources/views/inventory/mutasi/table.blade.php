<table class="table" id="mutasi_table">
    <thead class="text-primary">
        <tr>
            <th><b>ID Mutasi</b></th>
            <th><b>Tanggal</b></th>
            <th><b>Nama Perabotan</b></th>
            <th><b>Lokasi Asal</b></th>
            <th><b>Lokasi Tujuan</b></th>
            <th><b>Alasan</b></th>
            @if ($type != 'export')
                <th class="text-center"><b>Aksi</b></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($mutasi_perabotans as $mutasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mutasi->tanggal_mutasi }}</td>
                <td>{{ $mutasi->perabotan->nama ?? '-' }}</td>
                <td>{{ $mutasi->lokasiAwal->nama_lokasi ?? '-' }}</td>
                <td>{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</td>
                <td>{{ $mutasi->keterangan ?? '-' }}</td>
                @if ($type != 'export')
                    <td style="width: 25%;" class="text-center">
                        <button class="btn btn-sm rounded-3 text-white btn-success detail-btn" data-bs-toggle="modal"
                            data-bs-target="#detail-modal" data-id_perabotan="{{ $mutasi->perabotan->id ?? '' }}"
                            data-nama_perabotan="{{ $mutasi->perabotan->nama ?? '-' }}"
                            data-kategori="{{ $mutasi->perabotan->kategori->nama_kategori ?? '-' }}"
                            data-lokasi_awal="{{ $mutasi->lokasiAwal->nama_lokasi ?? '-' }}"
                            data-lokasi_tujuan="{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}"
                            data-tahun="{{ $mutasi->perabotan->tahun_pengadaan ?? '-' }}"
                            data-kondisi_perabotan="{{ $mutasi->perabotan->keterangan ?? '-' }}"
                            data-foto="{{ $mutasi->perabotan->foto ?? '' }}">
                            <i class="fas fa-info-circle"></i> Detail
                        </button>
                        <a href="{{ route('mutasi.edit', $mutasi->id) }}"
                            class="btn btn-sm rounded-3 text-white btn-warning">
                            <i class="fas fa-edit"></i> Ubah
                        </a>
                        <form action="{{ route('mutasi.destroy', $mutasi->id) }}" method="post" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm rounded-3 text-white btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>

</table>
