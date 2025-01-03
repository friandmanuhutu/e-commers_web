<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style type="text/css">
            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 60px;
            }

            .table_deg {
                border: 2px solid white;
                border-collapse: separate;
                border-spacing: 5px; /* Menambahkan jarak antar sel */
                text-align: center;
            }

            th {
                background-color: #C63C51;
                text-align: center;
                color: white;
                font-size: 19px;
                font-weight: bold;
                padding: 15px;
                border: 2px solid white; /* Menambahkan garis pada setiap header */
            }

            td {
                border: 1px solid white; /* Menambahkan garis pada setiap kotak data */
                color: white;
                padding: 15px;
                text-align: center;
            }

            .view_category{
                padding: 10px 10px 10px 10px;
                color: white;
                background-color: blue;
                border-radius: 5px;
                text-decoration: none;
            }

            .view_category:hover {
                color: white;
                background-color: rgb(8, 8, 164);
                text-decoration: none;
            }

            input[type="search"] {
                width: 500px;
                height: 50px;
                margin-left: 50px;
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

            <form action="{{ url('product_search') }}" method="get">
                @csrf
                <input type="search" name="search" id="">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Judul Produk</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)
                    <tr>
                        <td>{{ $products->title }}</td>
                        <td>{!!Str::limit($products->description,50)!!}</td>
                        <td>{{ $products->category }}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->quantity }}</td>
                        <td>
                            <img height="120" width="120" src="{{ asset('products/' . $products->image) }}" alt="{{ $products->title }}">

                        </td>

                        <td>
                            <a class="view_category" href="{{ url('update_product',$products->id )}}">Edit</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" onClick="confirmation(event)" href="{{ url('delete_product', $products->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
            <div class="div_deg">

                {{ $product->onEachSide(1)->links() }}

            </div>

      </div>
    </div>
    @include('admin.js')
  </body>
</html>



