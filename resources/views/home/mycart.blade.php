<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style type="text/css">

        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th
        {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td
        {
            border: 1px solid skyblue;
        }

    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
  </div>
  
  <div class="div_deg">

    <table>

        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Hapus</th>
        </tr>

        @foreach($cart as $cart)

        <tr>
            <td>{{ $cart->product->title }}</td>
            <td>{{ $cart->product->price }}</td>
            <td>
                <img width="150" src="/products/{{ $cart->product->image }}">
            </td>

            <td>
                <a class = "btn btn-danger" href="{{ url('delete_cart',$cart->id) }}">Hapus Barang</a>
            </td>

        </tr>

        @endforeach

    </table>

  </div>
  
  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->
</body>

</html>
