    
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Tentang kami</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Tentang Kami <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-wrap-about ftco-no-pb">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10 wrap-about ftco-animate text-center">
				<div class="heading-section mb-4 text-center">
					<span class="subheading">Tentang</span><br>
					<h2 class="mb-4">Priwe sih?</h2>
				</div>
				<p>Waroengku iku sistem informasi soal warung-warung sing ana ning Polindra.</p>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Pelayanan</span><br>
				<h2 class="mb-4">Ngelakuna apa bae?</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-cake"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Gawe Acara</h3>
						<p>Bisa gawe Acara ning Waroengku, sing penting ngomong dikit karo acarane kudu positif.</p>
					</div>
				</div>      
			</div>
			<div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-meeting"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Mangan Langsung</h3>
						<p>Bisa mangan langsung ning kene, murah lan enak. ora perlu miang adoh meng singapur.</p>
					</div>
				</div>    
			</div>
			<div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-tray"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Bisa Dianteraken</h3>
						<p>Bisa dianteraken panganane ora usah pusing atau pegel, sing penting bayar ongkos kirim boss.</p>
					</div>
				</div>      
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Chef</span>
				<h2 class="mb-4">Our Master Chef</h2>
			</div>
		</div>	
		<div class="row">
			<?php foreach ($karyawan as $karyawan):?>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url(<?php echo base_url('assets/template/back/dist/img/'.$karyawan['image']);?>"></div>
					<div class="text pt-4">
						<h3><?=$karyawan['nama_karyawan']?></h3>
						<span class="position mb-2"><?=$karyawan['nama_toko']?></span>
						<p><?=$karyawan['moto_masak']?></p>
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
	
	
	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container-fluid px-0">
			<div class="row no-gutters">
				<div class="col-md">
					<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/celi.jpg);">
						<span class="ion-logo-instagram"></span>
					</a>
				</div>
				<div class="col-md">
					<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/acong.jpg);">
						<span class="ion-logo-instagram"></span>
					</a>
				</div>
				<div class="col-md">
					<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/pojok.jpg);">
						<span class="ion-logo-instagram"></span>
					</a>
				</div>
				<div class="col-md">
					<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/kopsis.jpg);">
						<span class="ion-logo-instagram"></span>
					</a>
				</div>
				<div class="col-md">
					<a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>assets/template/front/images/acong2.jpg);">
						<span class="ion-logo-instagram"></span>
					</a>
				</div>
			</div>
		</div>
	</section>