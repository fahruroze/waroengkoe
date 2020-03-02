<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Rating Produk</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reting Produk <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
	
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-12 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading" align="center">Book a table</span>
		            <h2 class="mb-4" align="center">Buat Rating</h2>
		          </div>
		          <?=$this->session->flashdata('message');?>

	            <form method="post" action="<?= base_url('pengunjung/tambahrating');?>">
             <div>
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukan Email Anda" class="form-control">
            <?=form_error('email', '<div class="alert alert-danger" role="alert">', '</div>')?>
          </div>
            <!-- <div class="form-group">
            <label>Pilih Pelanggan</label>
            <select name="id_rating" id="id_rating" class="form-control">
             <option selected disabled>Pelanggan</option>
             <?php foreach ($pelanggan as $pelanggan) {?>
              <option value="<?=$pelanggan->id_pelanggan;?>"><?=$pelanggan->full_name;?></option>
            <?php }?>
          </select>
        </div> -->
        <div class="form-group">
            <label>Pilih Produk</label>
            <select name="produk" id="id_produk" class="form-control">
             <option selected disabled>Produk</option>
             <?php foreach ($produk as $produk) {?>
              <option value="<?=$produk->id_produk;?>"><?=$produk->nama_produk;?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
            <label>Pilih Toko</label>
            <select name="toko" id="id_toko" class="form-control">
             <option selected disabled>Toko</option>
             <?php foreach ($toko as $toko) {?>
              <option value="<?=$toko->id_penjual;?>"><?=$toko->nama_toko;?></option>
            <?php }?>
          </select>
        </div>
          <!-- <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_rating" placeholder="Nama Perating" class="form-control" required="required" >
          </div> -->
          <div>
            <label>Rating</label>
            <input type="text" name="rating" placeholder="Ungkapkan Perasaan Sampean" class="form-control">
          </div>
          <div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <button type="reset" class="btn btn-danger mt-3" data-dismiss="modal">Reset</button>
          </div>
          
        </form>
        
	          </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
						<div id="map"></div>
					</div>
        </div>
			</div>
		</section>