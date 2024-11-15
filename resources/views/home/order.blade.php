<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    @include('home.css')

    <style>

        .div_center
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

        /* mungkin untuk garis atas */
        th
        {
            border: 2px solid #3DC2EC;
            background-color: #3DC2EC;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        /* untuk garis border */
        td
        {
            border: 1px solid #3DC2EC;
            pad: 10px;
        }

        .status {
            font-weight: bold;
        }
        .status1 {
            font-weight: 500;
        }

    </style>

</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <div class="div_center">
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Status Pengiriman</th>
                    <th>Gambar</th>
                </tr>

                @foreach($order as $order)

                <tr>
                    <td class="status1">{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td class="status">{{ $order->status }}</td>
                    <td>
                        <img height="150" width="200" src="products/{{ $order->product->image }}">
                    </td>
                </tr>

                @endforeach

            </table>
        </div>

    </div>

    @include('home.footer')
</body>
</html>
