<x-layout>
    <x-slot:title>Detail Perabotan</x-slot:title>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Informasi Perabotan</h4>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <p><strong>ID Perabotan:</strong> {{ $perabotan->id }}</p>
                <p><strong>Kode Perabotan:</strong> {{ $perabotan->kode }}</p>
                <p><strong>Nama Perabotan:</strong> {{ $perabotan->nama }}</p>
                <p><strong>Kategori:</strong> {{ $perabotan->kategori->nama_kategori ?? '-' }}</p>
                <p><strong>Tahun Pengadaan:</strong> {{ $perabotan->tahun_pengadaan }}</p>
                <p><strong>Lokasi:</strong> {{ $perabotan->lokasi->nama_lokasi ?? '-' }}</p>
                <p><strong>Keterangan:</strong> {{ $perabotan->keterangan ?? '-' }}</p>
            </div>
            <div class="col-md-6 text-center">
                <p><strong>QR Code:</strong></p>
                <div>
                {!! QrCode::size(150)->generate(route('perabotan.public.detail', ['id' => $perabotan->id])) !!}

                </div>

                @if ($perabotan->foto)
                    <p class="mt-3"><strong>Foto Perabotan:</strong></p>
                    <img src="{{ asset('assets/images/items/' . $perabotan->foto) }}" alt="Foto Perabotan"
                        class="img-fluid rounded shadow" style="max-height: 200px;">
                @endif
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('perabotan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</x-layout>
