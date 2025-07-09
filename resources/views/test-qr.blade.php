<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .qr-code {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background: white;
        }

        .qr-code svg {
            max-width: 100%;
            height: auto;
        }

        .info {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Test QR Code Perabotan</h1>

        <div class="info">
            <h3>Status QR Code:</h3>
            <p><strong>✅ Berhasil!</strong> QR Code sudah bisa di-generate menggunakan format SVG.</p>
            <p>Format SVG tidak memerlukan extension imagick dan lebih ringan.</p>
        </div>

        <div class="qr-code">
            <h3>QR Code Test (PB-TEST)</h3>
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(200)->generate('PB-TEST') !!}
        </div>

        <div style="text-align: center;">
            <a href="/perabotan" class="btn">Kembali ke Daftar Perabotan</a>
            <a href="/dashboard" class="btn">Dashboard</a>
        </div>
    </div>
</body>

</html>
