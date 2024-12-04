<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            font-size: 12px; /* Mengurangi ukuran font untuk memuat lebih banyak di satu halaman */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.4; /* Mengurangi jarak antar baris */
        }

        h3, h2 {
            color: #333;
            font-weight: normal;
            margin-bottom: 8px; /* Mengurangi jarak antar judul */
        }

        h2 {
            color: #4CAF50;
            font-size: 22px; /* Ukuran font judul lebih kecil agar muat di halaman */
        }

        .product-image {
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            max-width: 250px; /* Membatasi ukuran gambar agar tidak terlalu besar */
            height: auto;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #5f7d2f;
        }

        .product-info div {
            width: 48%;
        }

        .product-info h4 {
            font-size: 16px; /* Ukuran font untuk keterangan lebih kecil */
            margin: 5px 0;
        }

        .total-price {
            /* Garis bulet besar harga */
            background-color: #f1f8e9;
            padding: 8px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #000000;
        }
    </style>

</head>
<body>

    <div class="container">
        <center>
            <h2>Invoice Pembelian</h2>
        </center>

        <div class="product-info">
            <div>
                <h3>Nama Pembeli:</h3>
                <p>{{ $data->name }}</p>
            </div>
            <div>
                <h3>Nomor Handphone:</h3>
                <p>{{ $data->phone }}</p>
            </div>
        </div>

        <div class="product-info">
            <div>
                <h3>Alamat Pembeli:</h3>
                <p>{{ $data->rec_address }}</p>
            </div>
            <div>
                <h3>Nama Produk:</h3>
                <p>{{ $data->product->title }}</p>
            </div>
        </div>

        <div class="product-info">
            <div>
                <h3>Harga Produk:</h3>
                <p>Rp {{ number_format($data->product->price, 0, ',', '.') }}</p>
            </div>
            <div>
                <h3>Gambar Produk:</h3>
                <img class="product-image" src="products/{{ $data->product->image }}" alt="Product Image">
            </div>
        </div>

        <div class="total-price">
            <h4>Total Pembelian: Rp {{ number_format($data->product->price, 0, ',', '.') }}</h4>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja di toko kami!</p>
        </div>
    </div>

</body>
</html>
