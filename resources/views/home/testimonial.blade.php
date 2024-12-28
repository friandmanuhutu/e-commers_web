<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        .client_name h5 {
            color: #3dc2ec;
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
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Morijorch
                  </h5>
                  <h6>
                    Saya Sangat Puas
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Pengalaman belanja yang sangat menyenangkan! Pengiriman cepat dan produk sesuai dengan yang diharapkan. Suka banget dengan layanan gratis ongkirnya juga!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Rochak
                  </h5>
                  <h6>
                    Keren
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Website ini benar-benar memudahkan saya dalam mencari produk berkualitas. Layanan pelanggan responsif, pengiriman tepat waktu, dan banyak promo menarik. Terima kasih
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Brad Johns
                  </h5>
                  <h6>
                    Sangat Rekomendasi
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Saya terkesan dengan pilihan produk yang lengkap dan kualitasnya yang sangat baik. Fitur-fitur di platform ini juga sangat user-friendly, membuat belanja jadi nyaman!
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Rakabuming Raka
                  </h5>
                  <h6>
                    Sangat Bermanfaat
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                Belanja di sini tidak pernah mengecewakan. Produk cepat sampai, sesuai deskripsi, dan harga bersaing. Saya sudah jadi pelanggan setia!
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->
</body>

</html>
