<table class="table" id="lokasi_table">
    <thead class="text-primary">
        <tr>
            <th><b>No</b></th>
            <th><b>Nama Lokasi</b></th>
            @if ($type != 'export')
                <th class="text-center"><b>Aksi</b></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($lokasi as $lokasi)
            <tr>
                <td style="width: 10%;">{{ $loop->iteration }}</td>
                <td>{{ $lokasi->nama_lokasi }}</td>
                @if ($type != 'export')
                    <td style="width: 25%;" class="text-center">
                        <a href="{{ route('lokasi.edit', $lokasi->id) }}"
                            class="btn btn-sm rounded-3 text-white btn-success">
                            <i class="fas fa-edit"></i>
                            Ubah
                        </a>
                        <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="post" class="d-inline">
                            <button type="submit"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data lokasi {{ $lokasi->name }}?')"
                                class="btn btn-sm rounded-3 text-white btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                Hapus
                            </button>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
