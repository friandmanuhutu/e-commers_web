<section class="shop_section layout_padding">
    <div class="container">
        
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

                        <!-- Form untuk menambahkan produk ke keranjang -->
                        <form action="{{ url('add_cart', $products->id) }}" method="GET" style="display: flex; flex-direction: column; align-items: flex-start;">
                            
                            <!-- Menambahkan label "Kuantitas" sejajar dengan kolom input -->
                            <div style="display: flex; align-items: center; margin-bottom: 10px; width: 100%;">
                                <label for="quantity" style="margin-right: 10px; margin-top: 10px;">Kuantitas:</label>
                                <input type="number" name="quantity" min="1" max="{{ $products->quantity }}" value="1" id="quantity" 
                                style="width: 60%; padding: 6px; margin-bottom: 1px; 
                                border: 2px solid #ddd; border-radius: 5px; 
                                box-shadow: 0 1px 7px rgba(0, 0, 0, 0.07); 
                                background-color: #f9f9f9; transition: all 0.3s ease-in-out;">
                            </div>

                            <!-- Tombol Detail Produk dan Beli Produk -->
                            <div style="display: flex; justify-content: space-between; width: 100%; gap: 10px;">
                                <!-- Mengubah warna tombol Detail menjadi #3dc2ec dan teks putih, serta menambahkan efek hover -->
                                <a href="{{ url('product_details', $products->id) }}" class="btn" style="background-color: #3dc2ec; color: white; flex: 1; text-align: center; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#777777'" onmouseout="this.style.backgroundColor='#3dc2ec'">Detail</a>
                                @if($products->quantity > 0)
                                    <button type="submit" class="btn btn-success" style="flex: 1;">Beli Produk</button>
                                @else
                                    <button class="btn btn-secondary" disabled style="flex: 1;">Stok Habis</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
