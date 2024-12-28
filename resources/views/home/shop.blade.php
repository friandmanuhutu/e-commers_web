<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        a:hover 
        {
          background-color: #ffffff18;
          box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->
  <!-- shop section -->
    @include('home.product')
  <!-- end shop section -->


</body>

</html>
