
<section class="ftco-section">
  <div class="container-fluid px-4">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Makananan & Minuman</span><br>
        <h2 class="mb-4">Sing di edol</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6 menu-wrap">
        <div class="heading-menu text-center ftco-animate">
          <h3>Makanan</h3>
        </div>
<!--  -->

        <?php foreach ($produk as $produk):?>
          <?php 

if ($produk->kategori == "makanan") {?>
          <div class="menus d-flex ftco-animate">
            <div class="menu-img img" style="background-image:  url(<?php echo base_url('assets/template/back/dist/img/produk/'.$produk->gambar);?>"></div>
            <div class="text">
              <div class="d-flex">
                <div class="one-half">
                  <h3><?= $produk->nama_produk;?></h3>
                </div>
                <div class="one-forth">
                  <span class="price">Rp.<?= $produk->harga;?></span>
                </div>
              </div>
              <p><?= $produk->detail_produk;?></p>

            </div>
          </div>
          <?php }?>
        <?php endforeach; ?>
      
      </div>

      <div class="col-md-6 col-lg-6 menu-wrap">
        <div class="heading-menu text-center ftco-animate">
          <h3>Minuman</h3>
        </div>
       <?php foreach ($produk1 as $produk1):?>
          <?php 

if ($produk1->kategori == "minuman") {?>
          <div class="menus d-flex ftco-animate">
            <div class="menu-img img" style="background-image:  url(<?php echo base_url('assets/template/back/dist/img/produk/'.$produk1->gambar);?>"></div>
            <div class="text">
              <div class="d-flex">
                <div class="one-half">
                  <h3><?= $produk1->nama_produk;?></h3>
                </div>
                <div class="one-forth">
                  <span class="price">Rp.<?= $produk1->harga;?></span>
                   <!-- <strong><h6><?= $produk->nama_toko;?></h6></strong> -->
                </div>
              </div>
              <p><?=  $produk1->detail_produk;?></p>
            </div>
          </div>
          <?php }?>
        <?php endforeach; ?>
        </div>
      </div>
    </section>