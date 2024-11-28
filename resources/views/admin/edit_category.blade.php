<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style type="text/css">

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 60px;
            }

            input[type="text"] {
                width: 400px;
                height: 50px;
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

            <h1 style="color: #fff; font-size: 35px;">PERBARUI KATEGORI</h1>

            <div class="div_deg">

            <form action="{{ url('update_category', $data->id )}}" method="post" onsubmit="return checkForm()">
                @csrf
                <input type="text" id="category" name="category" value="{{ $data->category_name }}" oninput="checkForm()">
                <input class="btn btn-primary" type="submit" value="Perbarui" id="submitBtn" disabled>
            </form>
            
            <script>
                // Fungsi untuk mengecek apakah kolom kategori kosong atau tidak
                function checkForm() {
                    var categoryInput = document.getElementById("category").value;
                    var submitBtn = document.getElementById("submitBtn");
            
                    // Jika input kategori kosong, disable tombol submit
                    if (categoryInput.trim() === "") {
                        submitBtn.disabled = true;
                    } else {
                        submitBtn.disabled = false;
                    }
                }
            
                // Panggil fungsi untuk pertama kali pada halaman load
                window.onload = checkForm;
            </script>
            

                

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
