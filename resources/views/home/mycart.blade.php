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
        .div_gap textarea, .div_gap input[type="number"]
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

/* Menghilangkan tanda panah pada input type="number" */
.no-spin::-webkit-outer-spin-button,
    .no-spin::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .no-spin[type="number"] {
        -moz-appearance: textfield;
    }

    .order_deg h5 {
        text-align: center;
        margin: 10px -90px -20px 0px;
        padding: 15px;
        background-color: #3DC2EC;
        /* border-radius: 7px; */
        color: #fff;

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

<div class="order_deg" style="display: flex; justify-content: center; align-items: center; margin-bottom: 120px; width: 100%;">
    <form action="{{ url('comfirm_order') }}" method="POST" style="width: 100%; max-width: 600px;">
        @csrf
        <div>
            <h5>Biodata Penerima</h5>
        </div>
        <table style="width: 115%; border-collapse: collapse; border: 2px solid #3DC2EC; margin-top: 20px;">
            {{-- <tr style="background-color: #3DC2EC; color: white; text-align: left;">
                <th style="padding: 10px; border: 1px solid #3DC2EC; width: 30%;">Label</th>
                <th style="padding: 10px; border: 1px solid #3DC2EC; width: 70%;">Input</th> --}}
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Penerima</td>
                <td style="padding: 10px; border: 1px solid #ccc;">
                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        required
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"
                    >
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Alamat Penerima</td>
                <td style="padding: 10px; border: 1px solid #ccc;">
                    <textarea
                        name="address"
                        required
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; resize: none; height: 80px;"
                    >{{ Auth::user()->address }}</textarea>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">Nomor Handphone</td>
                <td style="padding: 10px; border: 1px solid #ccc;">
                    <input
                        type="number"
                        name="phone"
                        value="{{ Auth::user()->phone }}"
                        class="no-spin"
                        required
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"
                    >
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; border: 1px solid #ccc; text-align: center;">
                    <input
                        class="btn-primary"
                        type="submit"
                        value="Cash On Delivery"
                        style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; margin-right: 10px;"
                    >
                    <a
                        class="btn-success"
                        href="{{ url('stripe', $value) }}"
                        style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; text-decoration: none;"
                    >
                        Debit
                    </a>
                </td>
            </tr>
        </table>
    </form>
</div>

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->
</body>

</html>
