<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style>
            table
            {
                border: 2px solid skyblue;
                text-align: center;
            }

            th
            {
                background-color: skyblue;
                padding: 10px;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
            }

            .table_center
            {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            td
            {
                color: white;
                padding: 15px;
                border: 1px solid skyblue;
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

            <div class="table_center">

                <table>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor Handphone</th>
                        <th>Product title</th>
                        <th>price</th>
                        <th>Gambar</th>
                        <th>Status</th>
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

                        <td>{{ $data->status }}</td>
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
