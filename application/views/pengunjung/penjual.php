<section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span class="subheading">Pemilik</span><br>
              <h2 class="mb-4">Sing due Warung</h2>
            </div>
          </div>  
          <div class="row">
                  <?php foreach ($penjual as $penjual):?>
            <div class="col-md-6 col-lg-3 ftco-animate">
         
              <div class="staff">

                <div class="img" style="background-image: url(<?php echo base_url('assets/template/back/dist/img/'.$penjual['image']);?>"></div>
                <div class="text pt-4">
                  <h3><?= $penjual['nama'];?></h3>
                  <span class="position mb-2">Restaurant Owner</span>
                  <p><?=$penjual['motto'];?></p>
                  <br>
                  <div class="faded">
                    <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                    <ul class="ftco-social d-flex">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
             <?php endforeach; ?>

          </div>
        </div>
      </section>

      <!-- <section class="ftco-section testimony-section" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5"> -->
        