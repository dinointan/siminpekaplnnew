@php
    use Illuminate\Support\Str;
@endphp

<table class="table" id="furnitures-table">
    <thead class="text-primary">
        <tr>
            <th><b>ID Perabotan</b></th>
            <th><b>Kode Perabotan</b></th>
            <th><b>Nama Perabotan</b></th>
            <th><b>Kategori</b></th>
            <th><b>Tahun Pengadaan</b></th>
            <th><b>Lokasi</b></th>
            <th><b>Keterangan</b></th>
            <th class="text-center"><b>Aksi</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perabotans as $perabotan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $perabotan->kode }}</td>
                <td title="{{ $perabotan->nama }}">
                    @if ($type != 'export')
                        {{ Str::limit($perabotan->nama, 40, '...') }}
                    @else
                        {{ $perabotan->nama }}
                    @endif
                </td>
                <td>{{ $perabotan->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $perabotan->tahun_pengadaan }}</td>
                <td>{{ $perabotan->lokasi->nama_lokasi ?? '-' }}</td>
                <td>{{ $perabotan->keterangan ?? '-' }}</td>

                @if ($type != 'export')
                    <td style="width: 25%;" class="text-center">
                        @php
                           $svg = QrCode::size(80)->generate(route('perabotan.public.detail', ['id' => $perabotan->id]));
                            $qrCodeBase64 = base64_encode($svg);
                        @endphp

                        {{-- Baris Pertama --}}
                        <div class="d-flex justify-content-center gap-1 mb-2 flex-wrap">
                            <button class="btn btn-sm rounded-3 text-white btn-success detail-btn" data-bs-toggle="modal"
                                data-bs-target="#detail-modal" data-id_perabotan="{{ $perabotan->id }}"
                                data-nama_perabotan="{{ $perabotan->nama }}" data-kode="{{ $perabotan->kode }}"
                                data-kategori="{{ $perabotan->kategori->nama_kategori ?? '-' }}"
                                data-lokasi="{{ $perabotan->lokasi->nama_lokasi ?? '-' }}"
                                data-tahun="{{ $perabotan->tahun_pengadaan }}"
                                data-kondisi_perabotan="{{ $perabotan->keterangan }}"
                                data-foto="{{ $perabotan->foto }}"
                                data-qrcode="data:image/svg+xml;base64,{{ $qrCodeBase64 }}">
                                <i class="fas fa-info-circle"></i> Detail
                            </button>

                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('perabotan.edit', $perabotan->id) }}"
                                    class="btn btn-sm rounded-3 text-white btn-warning">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                            @endif
                        </div>

                        {{-- Baris Kedua --}}
                        @if (auth()->user()->role === 'admin')
                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                <form action="{{ route('perabotan.destroy', $perabotan->id) }}" method="post"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus {{ $perabotan->nama }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm rounded-3 text-white btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>

                                <a href="{{ route('perabotan.cetakqr', ['kode' => $perabotan->kode]) }}"
                                    class="btn btn-sm rounded-3 text-white" style="background-color: #6f42c1;"
                                    target="_blank">
                                    <i class="fas fa-print"></i> Cetak QR
                                </a>
                            </div>
                        @endif
                    </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
