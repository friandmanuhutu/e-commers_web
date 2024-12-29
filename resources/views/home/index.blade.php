<!DOCTYPE html>
<html>

<head>

    @include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->
  <!-- shop section -->
<div class="heading_container heading_center" style="margin-top: 70px">
    <h2>Produk Terbaru</h2>
</div>
    @include('home.product')
  <!-- end shop section -->

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->
</body>

</html>
