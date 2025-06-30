<!DOCTYPE html>
<html lang="en" style="min-height: 100vh;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ config('app.name', 'ULP Ahmad Yani') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/Logo_PLN.png">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="main-wrapper mt-5">
        <div class="pt-5 pb-2"></div>
        <div class="auth-wrapper d-flex justify-content-center align-items-center pt-5">
            <div class="auth-box border-secondary bg-white p-4">
                <div class="text-center pt-3 pb-3">
                    <img src="/assets/images/Logo_PLN.png" alt="logo" class="light-logo" width="40"
                        height="60" />
                    <b style="color:#39acd7; font-family: Montserrat;">PT PLN (PERSERO) ULP AHMAD YANI</b>
                </div>

                {{-- Pesan Error Login --}}
                @if ($errors->has('login'))
                    <div class="alert alert-danger">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                {{-- Validasi Error Field --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                @if ($error !== $errors->first('login'))
                                    <li>{{ $error }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal mt-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white h-100">
                                <i class="mdi mdi-account fs-4"></i>
                            </span>
                        </div>
                        <input type="text" name="username"
                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                            placeholder="Username" value="{{ old('username') }}" required autofocus>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white h-100">
                                <i class="mdi mdi-lock fs-4"></i>
                            </span>
                        </div>
                        <input type="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Password" required>
                    </div>

                    <!-- Tombol Buka Kamera -->
                    <div class="form-group mt-4 d-flex justify-content-between">
                        <button class="btn btn-success me-2 text-white" type="button" id="openCamera">Buka
                            Kamera</button>
                        <button class="btn btn-success text-white" type="submit">Login</button>
                    </div>

                    <!-- Elemen Kamera -->
                    <div class="form-group mt-3 text-center">
                        <video id="preview" width="300" height="220" style="display: none;"></video>
                        <canvas id="canvas" width="300" height="220" style="display: none;"></canvas>
                        <input type="hidden" id="imageInput" name="imageInput">
                        <button class="btn btn-primary mt-2" type="button" id="snap" style="display: none;">Ambil
                            Gambar</button>
                        <button class="btn btn-danger mt-2" type="button" id="closeCamera" style="display: none;">Tutup
                            Kamera</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    @section('scripts')
    @endsection
    <script>
        $(".preloader").fadeOut();

        let scanner = null;

        const video = document.getElementById('preview');
        const canvas = document.getElementById('canvas');
        const openCameraButton = document.getElementById('openCamera');
        const closeCameraButton = document.getElementById('closeCamera');
        const snapButton = document.getElementById('snap');
        const imageInput = document.getElementById('imageInput');

        openCameraButton.addEventListener('click', () => {
            video.style.display = 'block';
            snapButton.style.display = 'inline-block';
            closeCameraButton.style.display = 'inline-block';

            scanner = new Instascan.Scanner({
                video: video,
                scanPeriod: 5,
                mirror: false
            });

            scanner.addListener('scan', function(content) {
                console.log("Barcode terbaca: " + content);

                fetch('/scan-result', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kode: content
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert("Nama: " + data.data.nama + "\nLokasi: " + data.data.lokasi);
                        } else {
                            alert("Perabot tidak ditemukan!");
                        }
                    });
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('Kamera tidak ditemukan');
                }
            }).catch(function(e) {
                console.error(e);
                alert("Gagal membuka kamera: " + e.message);
            });
        });

        closeCameraButton.addEventListener('click', () => {
            if (scanner) {
                scanner.stop();
            }
            video.style.display = 'none';
            snapButton.style.display = 'none';
            closeCameraButton.style.display = 'none';
            canvas.style.display = 'none';
        });

        snapButton.addEventListener('click', () => {
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL('image/png');
            imageInput.value = dataURL;
            canvas.style.display = 'block';
        });
    </script>

</body>

</html>
