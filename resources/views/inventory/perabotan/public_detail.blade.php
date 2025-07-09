<x-public>

    @section('content')
        <div class="container">
            <h1>Detail Perabotan</h1>
            <p><strong>Nama:</strong> {{ $perabotan->nama }}</p>
            <p><strong>Kategori:</strong> {{ $perabotan->kategori->nama_kategori ?? '-' }}</p>
            <p><strong>Lokasi:</strong> {{ $perabotan->lokasi->nama_lokasi ?? '-' }}</p>
            <p><strong>Tahun Pengadaan:</strong> {{ $perabotan->tahun_pengadaan }}</p>
            <p><strong>Keterangan:</strong> {{ $perabotan->keterangan }}</p>
        </div>
    @endsection
</x-public>
