<x-layout>
    <x-slot:title>{{ $type == 'create' ? 'Tambah' : 'Ubah' }} Kategori</x-slot:title>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning float-end rounded-2" href="{{ route('kategori.index') }}">Kembali</a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ $type == 'create' ? route('kategori.store') : route('kategori.update', $kategori->id) }}"
                        method="POST">
                        @csrf
                        @if ($type == 'edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                id="nama_kategori" name="nama_kategori"
                                value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" autocomplete="off"
                                autofocus required>
                            @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
