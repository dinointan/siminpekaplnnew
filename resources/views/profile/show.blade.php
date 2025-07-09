<x-layout>
    <x-slot:title>Profil Saya</x-slot:title>

    <div class="row">
        @if (session('status'))
            <x-alert type="success" :message="session('status')"></x-alert>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/assets/images/users/{{ $user->picture }}" class="img-fluid rounded-3" alt=""
                                style="width: 100% !important;">
                        </div>
                        {{-- Kolom Form --}}
                        <div class="col-md-9">
                            <div class="row">
                                {{-- Kolom Kiri --}}
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label"><b>Nama Pengguna</b></label>
                                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label"><b>Username</b></label>
                                        <input type="text" class="form-control" value="{{ $user->username }}"
                                            readonly>
                                    </div>
                                </div>
                                {{-- Kolom Kanan --}}
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label"><b>Role</b></label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->role == 'pegawai' ? 'pegawai' : \Illuminate\Support\Str::ucfirst($user->role) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label"><b>Divisi</b></label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->divisi ? $user->divisi : 'Tidak ada' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-4 me-4">
                                <a href="{{ route('profile.edit') }}"
                                    class="btn btn-sm rounded-3 text-white btn-warning">
                                    Ubah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
