<table class="table" id="furnitures-table">
    <thead class=" text-primary">
        <tr>
            <th>
                <b>ID Perabotan</b>
            </th>
            <th>
                <b>Kode Perabotan</b>
            </th>
            <th>
                <b>Nama Perabotan</b>
            </th>
            <th>
                <b>Kategori</b>
            </th>
            <th>
                <b>Tahun Pengadaan</b>
            </th>
            <th>
                <b>Lokasi</b>
            </th>
            <th>
                <b>Keterangan</b>
            </th>
            @if ($type != 'export')
                <th>
                    <b>Aksi</b>
                </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($perabotans as $perabotan)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $perabotan->kode }}
                <td title="{{ $perabotan->nama }}">
                    {{-- @if ($type != 'export')
                        {{ Str::limit($perabotan->nama, 40, '...') }}
                    @endif

                    @if ($type == 'export')
                        {{ $perabotan->nama }}
                    @endif --}}
                </td>
                <td>
                    {{ $perabotan->kategori->nama_kategori ?? '-' }}
                </td>
                <td>
                    {{ $perabotan->tahun_pengadaan }}
                </td>
                <td>
                    {{ $perabotan->lokasi->nama_lokasi ?? '-' }}
                </td>

                <td>
                    {{ $perabotan->keterangan ?? '-' }}
                </td>
                @if ($type != 'export')
                    <td>
                        <button class="btn btn-sm rounded-3 text-white btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#detail-modal" id="detail-btn" data-id_perabotan="{{ $perabotan->id }}"
                            data-nama_perabotan="{{ $perabotan->nama }}" data-kode="{{ $perabotan->kode }}"
                            data-kategori="{{ $perabotan->kategori->nama_kategori ?? '-' }}"
                            data-lokasi="{{ $perabotan->lokasi->nama_lokasi ?? '-' }}"
                            data-tahun="{{ $perabotan->tahun_pengadaan }}"
                            data-kondisi_perabotan="{{ $perabotan->keterangan }}" data-foto="{{ $perabotan->foto }}">

                            <i class="fas fa-info-circle"></i> Detail
                        </button>

                        <a href="{{ route('perabotan.edit', $perabotan->id) }}"
                            class="btn btn-sm rounded-3 text-white btn-success">
                            <i class="fas fa-edit"></i> Ubah
                        </a>
                        <form action="{{ route('perabotan.destroy', $perabotan->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                        </form>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
