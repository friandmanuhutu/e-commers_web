<section class="shop_section layout_padding">
  <div class="container">
      <div class="heading_container heading_center">
          <h2>Produk Terbaru</h2>
      </div>
      <div class="row">

          @foreach($product as $products)
              <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                      <div class="img-box">
                          <img src="products/{{ $products->image }}" alt="">
                      </div>
                      <div class="detail-box1">
                          <h6>{{ $products->title }}</h6>
                      </div>
                      <div class="detail-box2">
                          <h6>
                              Rp.<span>{{ $products->price }}</span>
                          </h6>
                      </div>
                      <div class="detail-box3">
                          <h6>Stok: {{ $products->quantity }}</h6>
                      </div>
                      <div class="detail-section" style="padding:20px">
                          <a href="{{ url('product_details', $products->id) }}">Detail</a>

                          @if($products->quantity > 0)
                              <a href="{{ url('add_cart', $products->id) }}">Beli Produk</a>
                          @else
                              <button class="btn btn-secondary" disabled>Stok Habis</button>
                          @endif
                      </div>
                  </div>
              </div>
          @endforeach

      </div>
  </div>
</section>
