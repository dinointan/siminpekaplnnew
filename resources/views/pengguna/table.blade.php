<table class="table" id="pengguna_table">
    <thead class="text-primary">
        <tr>
            <th><b>No</b></th>
            <th><b>ID User Pengguna</b></th>
            <th><b>Nama User Pengguna</b></th>
            <th><b>Username</b></th>
            <th><b>Role</b></th>
            <th><b>Divisi</b></th>
            @if ($type != 'export')
                <th class="text-center"><b>Aksi</b></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $pengguna)
            <tr>
                <td style="width: 10%;">{{ $loop->iteration }}</td>
                <td>{{ $pengguna->id }}</td>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->username }}</td>
                <td>{{ $pengguna->role }}</td>
                <td>{{ $pengguna->divisi }}</td>
                @if ($type != 'export')
                    <td style="width: 25%;" class="text-center">
                        <button class="btn btn-sm rounded-3 text-white btn-success detail-btn" data-bs-toggle="modal"
                            data-bs-target="#detail-modal" data-id_pengguna="{{ $pengguna->id }}"
                            data-nama_pengguna="{{ $pengguna->name }}" data-username="{{ $pengguna->username }}"
                            data-email="{{ $pengguna->email }}" data-role="{{ $pengguna->role }}"
                            data-divisi="{{ $pengguna->divisi ?? '-' }}" data-foto="{{ $pengguna->foto }}">
                            <i class="fas fa-info-circle"></i> Detail
                        </button>
                        <a href="{{ route('pengguna.edit', $pengguna) }}"
                            class="btn btn-sm rounded-3 text-white btn-warning">
                            <i class="fas fa-edit"></i> Ubah
                        </a>
                        <form action="{{ route('pengguna.destroy', $pengguna) }}" method="post" class="d-inline">
                            <button type="submit"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data pengguna {{ $pengguna->nama_pengguna }}?')"
                                class="btn btn-sm rounded-3 text-white btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
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
