<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
      /* CSS untuk halaman Contact */
      

      .contact_section {
          padding: 50px 0;
          background-color: #f9f9f9;
      }

      .contactus {
          text-align: center;
          font-size: 36px;
          font-weight: bold;
          margin-top: 0px !important;
      }

      .container-bg {
          background: white;
          border-radius: 10px;
          box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
          padding: 20px;
      }

      .map_container iframe {
          width: 100%;
          height: 100%;
          border: none;
          border-radius: 10px;
          margin-left: 15px;
      }

      .contact-form-wrapper form {
          display: flex;
          flex-direction: column;
      }

      .contact-form-wrapper form div {
          margin-bottom: 15px;
      }

      .contact-form-wrapper input,
      .contact-form-wrapper textarea {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 14px;
      }

      .contact-form-wrapper textarea {
          height: 120px;
          resize: none;
      }

      .contact-form-wrapper button {
          padding: 10px 30px;
          color: white;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          cursor: pointer;
      }

      .contact-form-wrapper button:hover {
          background-color: #777777;
      }

      .alert-success {
          position: relative;
          margin-top: 20px;
          margin-bottom: 20px;
          padding: 10px;
          border: 1px solid green;
          border-radius: 5px;
          background-color: #d4edda;
          color: #155724;
      }

      .map_container {
          margin-bottom: 20px;
      }

      .row {
          display: flex;
          flex-wrap: wrap;
          gap: 20px;
      }

      .col-md-6,
      .col-lg-5 {
          flex: 1;
      }

      @media (max-width: 768px) {
          .row {
              flex-direction: column;
          }

          .map_container iframe {
              height: 300px;
          }
      }
  </style>

</head>

<body>
  <div class="hero_area">
      <!-- Header Section -->
      @include('home.header')
      <!-- End Header Section -->

      <!-- Contact Section -->
      <section class="contact_section">
          <div class="container px-0">
              <div class="heading_container">
                  <h2 class="contactus">Contact Us</h2>
              </div>
          </div>
          <div class="container container-bg">
              <div class="row">
                  <!-- Google Maps Section -->
                  <div class="col-lg-7 col-md-6 px-0">
                      <div class="map_container">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3797403374724!2d112.72634007476088!3d-7.311166492696731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd1cb925a1d%3A0x1dbecb0b2e9b059f!2sUniversitas%20Telkom%20Surabaya!5e0!3m2!1sid!2sid!4v1728971516883!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                  </div>
                  <!-- Contact Form Section -->
                  <div class="col-md-6 col-lg-5 px-0">
                      <div class="contact-form-wrapper">
                          <form action="{{ route('contact.store') }}" method="POST">
                              @csrf
                              <div>
                                  <input type="text" name="name" placeholder="Name" required />
                              </div>
                              <div>
                                  <input type="email" name="email" placeholder="Email" required />
                              </div>
                              <div>
                                <input type="text" name="phone" placeholder="Phone" required id="phone" />
                            </div>
                                                      
                              <div>
                                  <textarea name="message" placeholder="Message" required></textarea>
                              </div>
                              <div>
                                  <button type="submit">KIRIM</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>
  <br><br><br>
  <!-- Footer Section -->
  @include('home.footer')

  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
      @if(session()->has('toastr::notifications'))
          {!! session('toastr::notifications') !!}
      @endif
  </script>
  <script>
    document.getElementById('phone').addEventListener('keydown', function (event) {
        if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode !== 8) {
            event.preventDefault(); // Mencegah karakter selain angka dan backspace
        }
    });
</script>
</body>

</html>
