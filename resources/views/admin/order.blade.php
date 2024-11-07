<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style>

            h3 {
                color: white;
            }
            table {
                border-collapse: separate;
                border-spacing: 5px; /* Menambahkan jarak antar sel */
                border: 2px solid white;
                text-align: center;
            }

            th {
                background-color: #C63C51;
                padding: 10px;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                /* padding-right: 0px;
                padding-left: 0px; */
                /* border: 1px solid white; Menambahkan garis pada header */
            }

            .table_center {
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
            }

            .action a {
                color: white;
                background-color: #777;
                margin: 5px;
                border-radius: 5px;
            }
            .action a:hover {
                text-decoration: none;
                background-color: #444;
                color: white;
            }

            .cetak {
                color: white;
                background-color: #777;
                margin: 5px;
                border-radius: 7px;
                padding: 9px;
                font-weight: bold;
            }

            .cetak:hover{
                color: white;
                background-color: #444;
                text-decoration: none;
            }

            .status .red {
                color: white;
                background-color: rgb(156, 156, 8);
                margin: 5px;
                border-radius: 5px;
                font-weight: bold;
            }
            .status .blue {
                color: white;
                background-color: blue;
                margin: 5px;
                border-radius: 5px;
                font-weight: bold;
                padding: 7px;
            }

            .status .green {
                color: white;
                background-color: green;
                margin: 5px;
                border-radius: 5px;
                font-weight: bold;
                padding: 7px;
            }


            td {
                color: white;
                padding: 15px;
                border: 2px solid white; /* Menambahkan garis pada setiap kotak */
            }
        </style>

    </head>

  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h3>Semua Pesanan</h3>
                <br>


            <div class="table_center">



                <table>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Status Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Cetak PDF</th>
                    </tr>

                    @foreach($data as $data)


                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->rec_address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->product ? $data->product->title : 'Produk telah dihapus' }}</td>
                        <td>{{ $data->product ? 'RP ' . $data->product->price : 'Produk telah dihapus' }}</td>
                        <td>
                            <img width="150" src="products/{{ $data->product ? $data->product->image : 'Produk telah dihapus' }}">
                        </td>

                        <td>{{ $data->payment_status }}</td>

                        <td class="status" >

                            @if($data->status == 'Sedang Diproses')

                            <span class="red">{{ $data->status }}</span>

                            @elseif($data->status == 'Dikirim')

                            <span class="blue">{{ $data->status }}</span>

                            @else

                            <span class="green">{{ $data->status }}</span>

                            @endif

                        </td>

                        <td class="action">
                            <a  href="{{ url('on_the_way', $data->id) }}" style="width: 80px;">Dikirim</a>
                            <a  href="{{ url('delivered', $data->id) }}" style="width: 80px;">Terkirim</a>

                        </td>

                        <td>
                            <a class="cetak" href="{{ url('print_pdf',$data->id) }}">Invoice</a>
                        </td>

                    </tr>

                    @endforeach
                </table>

            </div>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
