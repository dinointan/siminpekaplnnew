<x-layout>
    <x-slot:title>{{ $type == 'create' ? 'Tambah' : 'Ubah' }} Mutasi Perabotan</x-slot:title>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-secondary float-end rounded-2" href="{{ route('mutasi.index') }}">Kembali</a>
                    <div class="card-body">
                        <form id="form-mutasi"
                            action="{{ $type == 'create' ? route('mutasi.store') : route('mutasi.update', ['mutasi' => $mutasi->id]) }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if ($type == 'edit')
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="tanggal">Tanggal Mutasi<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal_mutasi"
                                    value="{{ old('tanggal_mutasi', $mutasi->tanggal_mutasi ?? date('Y-m-d')) }}"
                                    required>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="perabotan">Nama Perabotan<span class="text-danger">*</span></label>
                                @php
                                    $id = old('perabotan') ?? ($perabotan->id ?? '');
                                @endphp
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-select @error('id_perabotan') is-invalid @enderror"
                                            id="perabotan" name="id_perabotan" aria-label="Pilih Perabotan" required>
                                            <option value="">Pilih Perabotan</option>
                                            @foreach ($perabotans as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == (old('id_perabotan') ?? ($mutasi->id_perabotan ?? '')) ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('perabotan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Asal<span class="text-danger">*</span></label>
                                @php
                                    $id_lokasi = old('lokasi_awal') ?? ($mutasi->id_lokasi ?? '');
                                @endphp
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-select @error('lokasi_awal') is-invalid @enderror"
                                            id="lokasi_awal" name="lokasi_awal" aria-label="Pilih Lokasi Asal" required>
                                            <option value="">Pilih Lokasi</option>
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->id }}"
                                                    {{ $lokasi->id == (old('lokasi_awal') ?? ($mutasi->lokasi_awal ?? '')) ? 'selected' : '' }}>
                                                    {{ $lokasi->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lokasi_awal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Tujuan<span class="text-danger">*</span></label>
                                @php
                                    $id_lokasi = old('lokasi') ?? ($mutasi->id_lokasi ?? '');
                                @endphp
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-select @error('lokasi_tujuan') is-invalid @enderror"
                                            id="lokasi_tujuan" name="lokasi_tujuan" aria-label="Pilih Lokasi Asal"
                                            required>
                                            <option value="">Pilih Lokasi</option>
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->id }}"
                                                    {{ $lokasi->id == (old('lokasi_tujuan') ?? ($mutasi->lokasi_tujuan ?? '')) ? 'selected' : '' }}>
                                                    {{ $lokasi->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lokasi_awal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Alasan Mutasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan" name="keterangan"
                                    value="{{ old('keterangan') ? old('keterangan') : (isset($mutasi) ? $mutasi->keterangan : old('keterangan')) }}"
                                    autocomplete="off" required>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn  text-white btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
