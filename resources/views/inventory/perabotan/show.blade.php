@extends('layouts.app')

@section('title', 'Detail Perabotan')

@section('content')
    <div class="container mt-4">
        <div class="card shadow rounded-3">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Perabotan</h4>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        @if ($perabotan->foto)
                            <img src="{{ asset('storage/' . $perabotan->foto) }}" alt="Foto Perabotan"
                                class="img-fluid rounded shadow">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Foto Default"
                                class="img-fluid rounded shadow">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th>Kode</th>
                                <td>: {{ $perabotan->kode }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $perabotan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>: {{ $perabotan->kategori->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Pengadaan</th>
                                <td>: {{ $perabotan->tahun_pengadaan }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>: {{ $perabotan->lokasi->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>: {{ $perabotan->keterangan ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
