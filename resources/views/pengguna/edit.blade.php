<x-layout>
    <x-slot:title>Ubah Pengguna</x-slot:title>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-secondary float-end rounded-2" href="{{ route('pengguna.index') }}">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $pengguna->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username', $pengguna->username) }}"
                                required>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('role', $pengguna->role) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="pegawai"
                                    {{ old('role', $pengguna->role) == 'pegawai' ? 'selected' : '' }}>Pegawai
                                </option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="divisi">Divisi <span class="text-danger">*</span></label>
                            <select class="form-control @error('divisi') is-invalid @enderror" id="divisi"
                                name="divisi" required>
                                <option value="">-- Pilih Divisi --</option>
                                <option value="K3 Lingkungan dan Keamanan"
                                    {{ old('divisi', $pengguna->divisi) == 'K3 Lingkungan dan Keamanan' ? 'selected' : '' }}>
                                    K3 Lingkungan dan Keamanan
                                </option>
                                <option value="Pelayanan Pelanggan dan Administrasi"
                                    {{ old('divisi', $pengguna->divisi) == 'Pelayanan Pelanggan dan Administrasi' ? 'selected' : '' }}>
                                    Pelayanan Pelanggan dan Administrasi
                                </option>
                                <option value="Sales Retail"
                                    {{ old('divisi', $pengguna->divisi) == 'Sales Retail' ? 'selected' : '' }}>
                                    Sales Retail
                                </option>
                                <option value="Teknik"
                                    {{ old('divisi', $pengguna->divisi) == 'Teknik' ? 'selected' : '' }}>
                                    Teknik
                                </option>
                                <option value="Transaksi Energi Listrik"
                                    {{ old('divisi', $pengguna->divisi) == 'Transaksi Energi Listrik' ? 'selected' : '' }}>
                                    Transaksi Energi Listrik
                                </option>
                            </select>
                            @error('divisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email', $pengguna->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span class="text-muted">(Kosongkan jika tidak
                                    diubah)</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Kosongkan jika tidak diubah">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="foto">Foto (opsional)</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                name="foto" id="foto">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mt-3">
                                <img src="/assets/images/pengguna/{{ $pengguna->foto ?? 'profile.jpg' }}"
                                    width="100" id="img-preview" alt="Foto Pengguna">
                                <small class="text-muted d-block">Kosongkan jika tidak ingin diubah. Ukuran disarankan
                                    1:1</small>
                            </div>
                        </div>

                        <button type="submit" class="btn text-white btn-success mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('foto').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('img-preview').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</x-layout>
