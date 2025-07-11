<!DOCTYPE html>
<html>

<head>
    <title>Cetak QR Perabotan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            width: 300px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .header img {
            height: 60px;
        }

        .qr-code {
            margin: 10px auto;
        }

        .btn-cetak {
            margin-top: 15px;
            padding: 6px 16px;
            font-size: 14px;
        }

        @media print {
            .btn-cetak {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="qr-code">
           {!! QrCode::size(120)->generate(route('perabotan.public.detail', ['id' => $perabotan->id])) !!}
        </div>

        <h4>SCAN ME</h4>

        <button onclick="window.print()" class="btn-cetak">Cetak</button>
    </div>
</body>

</html>
