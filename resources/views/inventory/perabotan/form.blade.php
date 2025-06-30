<x-layout>
    <x-slot:title>{{ $type == 'create' ? 'Tambah' : 'Ubah' }} Perabotan</x-slot:title>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning float-end rounded-2" href="{{ route(name: 'perabotan.index') }}">Kembali</a>
                </div>
                <div class="card-body">
                    <form id="form-perabotan"
                        action="{{ $type == 'create' ? route(name: 'perabotan.store') : ($perabotan ? route(name: 'perabotan.update', parameters: $perabotan->id) : '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($perabotan)
                            @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="kode">Kode Perabotan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        id="kode" name="kode" value="{{ old('kode', $perabotan->kode ?? '') }}"
                                        autocomplete="off" required>
                                    @error('kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <button type="button" id="generate_kode"
                                            class="input-group-text btn btn-primary text-white">Buat Kode</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Perabotan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $perabotan->nama ?? '') }}"
                                    autocomplete="off" autofocus required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="kategori">Kategori<span class="text-danger">*</span></label>
                            @php
                                $id_kategori = old('kategori') ?? ($perabotan->kategori_id ?? '');
                            @endphp
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                        name="kategori" aria-label="Category select" data-placeholder="Pilih Kategori"
                                        required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ $kategori->id == $id_kategori ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun_pengadaan">Tahun Pengadaan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tahun_pengadaan') is-invalid @enderror"
                                    id="tahun_pengadaan" name="tahun_pengadaan"
                                    value="{{ old('tahun_pengadaan') ?? ($perabotan->tahun_pengadaan ?? '') }}"
                                    autocomplete="off" autofocus required>
                                @error('tahun_pengadaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="lokasi">Lokasi<span class="text-danger">*</span></label>
                            @php
                                $id_lokasi = old('lokasi') ?? ($perabotan->lokasi_id ?? '');
                            @endphp
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-select @error('lokasi') is-invalid @enderror" id="lokasi"
                                        name="lokasi" aria-label="Location select" required>
                                        <option value="">Pilih Lokasi</option>
                                        @if (is_iterable($lokasis))
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->id }}"
                                                    {{ $lokasi->id == $id_lokasi ? 'selected' : '' }}>
                                                    {{ $lokasi->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option disabled>Data lokasi tidak tersedia</option>
                                        @endif

                                    </select>
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Kondisi Perabotan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan" name="keterangan"
                                    value="{{ old('keterangan') ? old('keterangan') : (isset($perabotan) ? $perabotan->keterangan : old('keterangan')) }}"
                                    autocomplete="off" required>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <img src="/assets/images/perabotans/{{ $perabotan->foto ?? 'default.png' }}">
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="foto" class="form-label">Foto <span class="text-muted"> (kosongkan
                                                jika
                                                tidak ingin
                                                diubah)</span></label>
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                            id="foto" name="foto">
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                function generateCode() {
                    const randomNumber = Math.floor(1000 + Math.random() * 9000); // 4 digit angka
                    return 'PB-' + randomNumber;
                }

                $('#generate_kode').click(function() {
                    $('#kode').val(generateCode());
                });

                $('#picture').change(function() {
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        $('#img-preview').attr('src', e.target.result);
                    }
                    fileReader.readAsDataURL(file);
                });

                $('#create-category-btn').click(function() {
                    const kategori = prompt('Masukkan nama kategori baru');
                    if (kategori) {
                        $.ajax({
                            url: '{{ route('kategori.create') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                name: kategori,
                            },
                            success: function(response) {
                                const option =
                                    `<option value="${response.id}" selected>${response.name}</option>`;
                                $('#kategori').append(option);
                            }
                        });
                    }
                });
            });
        </script>

    </x-layout>
