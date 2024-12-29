<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <!-- Tambahkan Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box {
            padding: 15px;
        }

        .back-btn {
            position: absolute;
            top: 170px; /* Sesuaikan jarak dari slider */
            left: 50px; /* Margin kiri */
            font-size: 20px; /* Ukuran ikon */
            color: #333; /* Warna ikon */
            background-color: rgba(255, 255, 255, 0.7); /* Latar belakang transparan */
            padding: 10px;
            border-radius: 50%;
            text-decoration: none;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            z-index: 1000; /* Pastikan berada di atas elemen lainnya */
            transition: transform 0.2s ease;
        }

        .back-btn:hover {
            transform: scale(1.05); /* Efek zoom saat hover */
        }

        a:hover 
        {
          background-color: #ffffff18;
          box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->

        <!-- Tombol Back -->
        <a href="{{ url('/') }}" class="back-btn">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>

    {{-- product details start --}}
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Detail Produk</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="div_center">
                            <img width="400" src="/products/{{$data->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <div class="title1">
                                <h6>{{$data->title}}</h6>
                            </div>
                            <h6>
                                Rp.<span>{{$data->price}}</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Kategori : {{$data->category}}</h6>
                            <h6>
                                Stok yang Tersedia :
                                <span>{{$data->quantity}}</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <p style="text-align: justify;">{{$data->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- product details end --}}

    <!-- info section -->
    @include('home.footer')
    <!-- end info section -->
</body>

</html>
