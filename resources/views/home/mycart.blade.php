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
            border: 2px solid #3DC2EC;
            text-align: center;
            width: 800px;
        }

        th
        {
            border: 2px solid #3DC2EC;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: #3DC2EC;
        }

        td
        {
            border: 1px solid skyblue;
        }

        .order_deg {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .order_deg
        {
            padding-right: 100px;
            margin-top: -10px;
        }

        label
        {
            display: inline-block;
            width: 150px;
        }

        .div_gap 
        {
            padding: 10px 0;
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            width: 100%;
            max-width: 500px;
            margin: auto;
            justify-content: center;
            gap: 10px;
        }

        .div_gap label 
        {
            width: 150px;
            font-weight: bold;
            color: #333;
            margin-right: 10px;
            text-align: right;
        }

        .div_gap input[type="text"],
        .div_gap textarea 
        {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }


        .cart_value h3 
        {
            text-align: center;
            font-size: 24px;
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .div_gap textarea {
    resize: none;
    height: 80px;
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

        <?php

        $value = 0;

        ?>

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

        <?php

        $value = $value + $cart->product->price;

        ?>

        @endforeach

    </table>

  </div>

  <div class="cart_value">

    <h3>Total Harga Harus Dibayar : Rp {{ $value }}</h3>

  </div>

    <div class="order_deg" style="display: flex; justify-content:center; align-items:center; margin-bottom:120px;">

        <form action="{{ url('comfirm_order') }}" method="Post">

            @csrf

            <div class="div_gap">
                <label>Penerima</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>

            <div class="div_gap">
                <label>Alamat Penerima</label>
                <textarea name="address">{{Auth::user()->address}}</textarea>
            </div>

            <div class="div_gap">
                <label>Nomer Handphone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>

            <div class="div_gap">
                
                <input class="btn btn-primary" type="submit" value="Cash On Delivery">

                <a class="btn btn-success" href="{{ url('stripe',$value) }}">Debit</a>
            </div>

        </form>

    </div>
  
  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->
</body>

</html>
