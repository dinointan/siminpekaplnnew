<table class="table" id="pengguna_table">
    <thead class="text-primary">
        <tr>
            <th><b>No</b></th>
            <th><b>ID User Pengguna</b></th>
            <th><b>Nama User Pengguna</b></th>
            <th><b>Username</b></th>
            <th><b>Role</b></th>
            <th><b>Divisi</b></th>
            <th><b>Foto</b></th>
            @if ($type != 'export')
                <th class="text-center"><b>Aksi</b></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($penggunas as $pengguna)
            <tr>
                <td style="width: 25%;">{{ $loop->iteration }}</td>
                <td>{{ $pengguna->id_pengguna }}</td>
                <td>{{ $pengguna->nama_pengguna }}</td>
                <td>{{ $pengguna->username }}</td>
                <td>{{ ucfirst($pengguna->role) }}</td>
                <td>{{ $pengguna->divisi ?? '-' }}</td>
                <td>
                    <img src="{{ $pengguna->foto ? asset('storage/' . $pengguna->foto) : asset('assets/images/pengguna/default.jpg') }}"
                        alt="Foto Pengguna" width="50" height="50" class="rounded">
                </td>
                @if ($type != 'export')
                    <td class="text-right" style="width: 25%;">
                        {{-- <button class="btn btn-sm rounded-3 text-white btn-secondary" 
              data-bs-toggle="modal"
              data-bs-target="#detail-modal"
              data-id="{{ $pengguna->id_pengguna }}"
              data-nama="{{ $pengguna->nama_pengguna }}"
              data-username="{{ $pengguna->username }}"
              data-role="{{ $pengguna->role }}"
              data-divisi="{{ $pengguna->divisi }}"
              data-foto="{{ $pengguna->foto }}"
              id="detail-btn">
              <i class="fas fa-info-circle"></i> Detail -->>
            </button> --}}
                        <a href="{{ route('pengguna.show', $pengguna->id_pengguna) }}"
                            class="btn btn-sm rounded-3 text-white btn-secondary">
                            <i class="fas fa-info-circle"></i>
                            Detail
                        </a>
                        <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}"
                            class="btn btn-sm rounded-3 text-white btn-success">
                            <i class="fas fa-edit"></i>
                            Ubah
                        </a>
                        <form action="{{ route('pengguna.destroy', $pengguna->id_pengguna) }}" method="post"
                            class="d-inline">
                            <button type="submit"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data pengguna {{ $pengguna->nama_pengguna }}?')"
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
