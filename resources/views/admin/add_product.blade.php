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

            h1 {
                color: #fff;
                font-size: 35px;
            }

            label {
                display: inline-block;
                width: 250px;
                font-size: 18px !important;
                color: #fff !important;
            }

            input[type="text"] {
                width: 200px;
                height: 50px;
            }

            textarea {
                width: 450px;
                height: 80px;
            }

            .input_deg {
                padding: 15px;
            }

            .custom-btn {
            background-color: blue; /* Warna biru */
            color: white !important; /* Warna teks */
            border: none;
            }

            /* Warna saat di-hover */
            .custom-btn:hover {
            background-color:  rgb(8, 8, 164); /* Warna ungu */
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


            <h1>TAMBAH PRODUK</h1>

        <div class="div_deg">

            <form action="{{ url('upload_product') }}" method="Post" enctype="multipart/form-data">

                @csrf

                <div class="input_deg">
                    <label for="">Judul Produk</label>
                    <input type="text" name="title" id="" required>
                </div>

                <div class="input_deg">
                    <label for="">Deskripsi</label>
                    <textarea name="description" required ></textarea>
                </div>

                <div class="input_deg">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" required>
                </div>

                <div class="input_deg">
                    <label for="">Stok</label>
                    <input type="number" name="qty" id="" required>
                </div>


                <div class="input_deg">
                    <label for="">Produk Kategori</label>
                    <select name="category" required>
                    <option value="">Select a Option</option>

                        @foreach ($category as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="input_deg">
                    <label for="">Gambar Produk</label>
                    <input type="file" name="image" required>
                </div>

                <div class="input_deg">
                    <input type="submit" class="btn custom-btn" value="Tambahkan">
                </div>

            </form>

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
