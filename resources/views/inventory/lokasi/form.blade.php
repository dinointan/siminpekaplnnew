  <x-layout>
      <x-slot:title>{{ $type == 'create' ? 'Tambah' : 'Ubah' }} Lokasi</x-slot:title>

      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">
                      <a class="btn btn-warning float-end rounded-2" href="{{ route('lokasi.index') }}">Kembali</a>
                  </div>
                  <div class="card-body">
                      <form
                          action="{{ $type == 'create' ? route('lokasi.store') : route('lokasi.update', $lokasi->id) }}"
                          method="POST">
                          @csrf
                          @if ($type != 'create')
                              @method('PUT')
                          @endif

                          <div class="form-group">
                              <label for="nama_lokasi">Nama Lokasi <span class="text-danger">*</span></label>
                              <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror"
                                  id="nama_lokasi" name="nama_lokasi"
                                  value="{{ old('nama_lokasi') ? old('nama_lokasi') : (isset($lokasi) ? $lokasi->nama_lokasi : old('nama_lokasi')) }}"
                                  autocomplete="off" autofocus required>
                              @error('nama_lokasi')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              <div></div>

                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </x-layout>
