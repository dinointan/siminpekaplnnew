<!DOCTYPE html>
<html>
<head>
    <title>Scan Barcode</title>
</head>
<body>
    <h2>Scan Barcode Perabotan</h2>
    <video id="preview" width="100%"></video>

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        scanner.addListener('scan', function (content) {
            console.log('Scanned content:', content);
            fetch("{{ route('scan.result') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ kode: content })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert("Nama: " + data.data.nama + "\nLokasi: " + data.data.lokasi);
                    // Bisa arahkan ke detail page juga
                    // window.location.href = "/perabot/" + data.data.id;
                } else {
                    alert("Perabot tidak ditemukan!");
                }
            });
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('Kamera tidak ditemukan');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
</body>
</html>
