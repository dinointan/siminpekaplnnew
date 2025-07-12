<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b>{{ session('status') }}</b>
        </div>
    @endif

    <div class="row">
        <!-- Total Perabotan -->
        <div class="col-md-4">
            <a href="{{ route('perabotan.index') }}">
                <div class="card card-hover">
                    <div class="box bg-danger">
                        <div class="row align-items-center">
                            <div class="col-md-8 float-start">
                                <h2 class="fw-bold text-white">{{ $total_perabotans }}</h2>
                                <h6 class="text-white fw-normal">Total Perabotan</h6>
                            </div>
                            <div class="col-md-4">
                                <i class="mdi mdi-package-variant-closed text-white" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Kategori -->
        <div class="col-md-3">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('kategori.index') }}">
                    <div class="card card-hover">
                        <div class="box bg-info">
                            <div class="row align-items-center">
                                <div class="col-md-8 float-start">
                                    <h2 class="fw-bold text-white">{{ $total_kategoris }}</h2>
                                    <h6 class="text-white fw-normal">Total Kategori</h6>
                                </div>
                                <div class="col-md-4">
                                    <i class="mdi mdi-format-list-bulleted-type text-white"
                                        style="font-size: 80px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>

        <!-- Total Lokasi -->
        <div class="col-md-5">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('lokasi.index') }}">
                    <div class="card card-hover">
                        <div class="box bg-success">
                            <div class="row align-items-center">
                                <div class="col-md-8 float-start">
                                    <h2 class="fw-bold text-white">{{ $total_lokasis }}</h2>
                                    <h6 class="text-white fw-normal">Total Lokasi</h6>
                                </div>
                                <div class="col-md-4">
                                    <i class="mdi mdi-map-marker text-white" style="font-size: 80px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>

    <!-- Mutasi Perabotan -->
    <div class="row mt-3">
        <div class="col-md-6">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('mutasi.index') }}">
                    <div class="card card-hover">
                        <div class="box bg-primary">
                            <div class="row align-items-center">
                                <div class="col-md-8 float-start">
                                    <h2 class="fw-bold text-white">{{ $total_mutasi_perabotans }}</h2>
                                    <h6 class="text-white fw-normal">Mutasi Perabotan</h6>
                                </div>
                                <div class="col-md-4">
                                    <i class="mdi mdi-swap-horizontal text-white" style="font-size: 80px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>
</x-layout>
