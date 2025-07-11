<!DOCTYPE html>
<html lang="en" style="min-height: 100vh;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ULP Ahmad Yani') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/Logo_PLN.png">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="main-wrapper mt-5">
        <div class="auth-wrapper d-flex justify-content-center align-items-center pt-5">
            <div class="auth-box border-secondary bg-white p-4">
                <div class="text-center pt-3 pb-3 d-flex justify-content-center align-items-center">
                    <img src="/assets/images/Logo_PLN.png" alt="logo" class="light-logo" width="40"
                        height="60" />
                    <b class="ms-3" style="font-size: 24px; color:#10aded;">PLN SIMINPEKA</b>
                </div>

                {{-- Error Messages --}}
                @if ($errors->has('login'))
                    <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                @endif
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

                {{-- Login Form --}}
                <form class="form-horizontal mt-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white h-100">
                            <i class="mdi mdi-account fs-4"></i>
                        </span>
                        <input type="text" name="username" class="form-control form-control-lg"
                            placeholder="Username" value="{{ old('username') }}" required autofocus>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text bg-warning text-white h-100">
                            <i class="mdi mdi-lock fs-4"></i>
                        </span>
                        <input type="password" name="password" class="form-control form-control-lg"
                            placeholder="Password" required>
                    </div>

                    <div class="form-group mt-4">
                        <button class="btn btn-success w-100 text-white" type="submit">Login</button>
                    </div>
                </form>

                {{-- QR Scan Section --}}
                <div class="form-group text-center mt-4">
                    <select id="cameraSelect" class="form-select mb-2" style="display: none;"></select>

                    <p class="text-muted mb-2">Atau Scan QR Code untuk melihat detail perabotan</p>

                    <video id="preview" width="300" height="220"
                        style="border: 2px solid #ccc; display: none;"></video>

                    <div class="mt-2">
                        <button id="startCam" class="btn btn-info">Buka Kamera</button>
                        <button id="stopCam" class="btn btn-danger d-none">Tutup Kamera</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".preloader").fadeOut();

        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 5,
            mirror: false
        });

        scanner.addListener('scan', function(content) {
            console.log("QR Code terbaca:", content);
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
                        window.location.href = data.url;
                    } else {
                        alert("Perabot tidak ditemukan!");
                    }
                })
                .catch(err => {
                    alert("Gagal menghubungi server.");
                });
        });

        let cameras = [];

        document.getElementById('startCam').addEventListener('click', () => {
            Instascan.Camera.getCameras().then(function(availableCameras) {
                if (availableCameras.length > 0) {
                    cameras = availableCameras;
                    const select = document.getElementById('cameraSelect');
                    select.innerHTML = '';

                    // Tampilkan pilihan kamera
                    cameras.forEach((camera, index) => {
                        const option = document.createElement('option');
                        option.value = index;
                        option.text = camera.name || `Camera ${index + 1}`;
                        select.appendChild(option);
                    });

                    select.style.display = 'block';

                    // Mulai dengan kamera pertama secara default
                    scanner.start(cameras[0]);
                    document.getElementById('preview').style.display = 'block';
                    document.getElementById('startCam').classList.add('d-none');
                    document.getElementById('stopCam').classList.remove('d-none');
                } else {
                    alert('Kamera tidak ditemukan.');
                }
            }).catch(function(e) {
                console.error(e);
                alert("Tidak dapat mengakses kamera: " + e.message);
            });
        });

        document.getElementById('cameraSelect').addEventListener('change', function() {
            const selectedIndex = parseInt(this.value);
            if (cameras[selectedIndex]) {
                scanner.stop().then(() => {
                    scanner.start(cameras[selectedIndex]);
                });
            }
        });

        document.getElementById('stopCam').addEventListener('click', () => {
            scanner.stop();
            document.getElementById('preview').style.display = 'none';
            document.getElementById('startCam').classList.remove('d-none');
            document.getElementById('stopCam').classList.add('d-none');
            document.getElementById('cameraSelect').style.display = 'none';
        });
    </script>

</body>

</html>
