<section class="slider_section">
  <div class="slider_container" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); padding: 60px 0; color: #fff; overflow: hidden; position: relative;">
    <div class="container">
      <div class="row align-items-center">
        <!-- Bagian Teks -->
        <div class="col-md-6">
          <h1 style="font-size: 4rem; font-weight: bold; line-height: 1.2; margin-bottom: 20px; animation: fadeInUp 1s;">
            Welcome to <span style="color: #facc15;">Our Website</span>
          </h1>
          <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 30px; animation: fadeInUp 1.2s;">
            Kami adalah platform e-commerce terpercaya yang menyediakan beragam produk pilihan dari kategori terbaik. Dengan komitmen pada kualitas dan kepuasan pelanggan, kami hadir untuk memberikan pengalaman belanja yang modern, aman, dan nyaman.
          </p>
          <a href="/contact" 
   style="background-color: #facc15; color: #1e3a8a; padding: 15px 30px; border-radius: 50px; font-size: 1.1rem; font-weight: bold; text-decoration: none; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s; animation: fadeInUp 1.4s;"
   onmouseover="this.style.backgroundColor='#d5ad0f'; this.style.boxShadow='0 15px 30px rgba(0, 0, 0, 0.3)'; this.style.transform='translateY(-5px)';"
   onmouseout="this.style.backgroundColor='#facc15'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)'; this.style.transform='translateY(0)';">
    Contact Us
</a>


        </div>

        <!-- Bagian Gambar -->
        <div class="col-md-6">
          <div style="position: relative; border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1); animation: zoomIn 1.5s;">
            <!-- Wrapper Background untuk Gambar -->
            <div style="border-radius: 20px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img src="images/Hero.png" 
                   alt="E-Commerce" 
                   style="max-width: 65%; transition: transform 0.3s ease;">
            </div>
            <!-- Elemen Dekorasi -->
            <div style="position: absolute; top: -20px; left: -20px; width: 100px; height: 100px; background-color: rgba(255, 255, 255, 0.2); border-radius: 50%; filter: blur(20px); animation: moveCircle 3s infinite;"></div>
            <div style="position: absolute; bottom: -30px; right: -30px; width: 150px; height: 150px; background-color: rgba(255, 255, 255, 0.2); border-radius: 50%; filter: blur(30px); animation: moveCircle 3s infinite;"></div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<style>
  /* Animasi Teks */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Animasi Gambar */
  @keyframes zoomIn {
    from {
      transform: scale(0.8);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  /* Animasi Lingkaran Dekorasi */
  @keyframes moveCircle {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }

  /* Hover Effect pada Gambar */
  .slider_container img:hover {
    transform: scale(1.02);
  }

  /* Hover Effect pada Button */
  a:hover 
  {
    background-color: #ffffff18;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
  }

  
</style>
