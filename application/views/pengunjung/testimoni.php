

        <section class="ftco-section testimony-section img" style="background-image: url(images/bg_5.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Testimoni</span><br>
            <h2 class="mb-4">Sapa bae sing tuku?</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <?php foreach ($data_rating as $rating):?>
              <div class="item">
                <div class="testimony-wrap text-center pb-5">
                  <span class="position"><?= $rating->nama_toko; ?></span>
                  <div class="user-img mb-4" style="background-image: url(<?php echo base_url('assets/template/back/dist/img/produk/'.$rating->gambar);?>">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                      <span class="position"><?= $rating->nama_produk; ?></span>

                    <p class="mb-2"><?= $rating->rating; ?></p>
                    <p class="name"><?= $rating->email; ?></p>
                    
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            
            </div>
          </div>
        </div>
      </div>
  </section>