{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Barcode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .barcode {
            margin-top: 20px;
        }
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        .location {
            margin-top: 5px;
            margin-bottom: 20px;
        }
        .barcode-number {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">
    <h3>Cetak Barcode</h3>

    <div class="logo">
        <img src="{{ asset('images/pln_logo.png') }}" alt="PLN Logo">
        <div>
            <div><strong>PT PLN (PERSERO) ULP AHMAD YANI</strong></div>
            <div>RL N</div>
        </div>
    </div>

    <h4>Meja Kantor</h4>
    <div class="location">Lokasi: Gudang A</div>

    {{-- <div class="barcode"> --}}
        {{-- Jika kamu pakai Laravel package untuk barcode misalnya milon/barcode --}}
        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('PB-0012', 'C128') }}" alt="Barcode">
        <div class="barcode-number">PB-0012</div>
    </div>
</body>
</html> --}}
