<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        
    </style>

</head>
<body>

    <center>
        <h3>Nama Pembeli : {{ $data->name }}</h3>
        <h3>Alamat Pembeli : {{ $data->rec_address }}</h3>
        <h3>Nomor Handphone : {{ $data->phone }}</h3>

        <h2>Nama Produk : {{ $data->product->title }}</h2>
        <h2>Harga : Rp {{ $data->product->price }}</h2>
        <img height="250" width="300" src="products/{{ $data->product->image }}">
    </center>
</body>
</html>
