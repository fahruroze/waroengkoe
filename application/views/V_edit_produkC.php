<!-- <?php
//Error Upload

if (isset($error)) {
  echo'<p class="alert-warning alert">';
  echo $error;
  echo '</p>';
}

//notifikasi Error

echo validation_errors('<div class =" alert-warning alert">','</div>');

//form open
echo form_open_multipart(base_url('produk/editTabel/'.$produk->id_produk),' class="form-horizontal"');
?> -->

<div class="content-wrapper">
	<section class="content">
		<?php foreach($edit_produk_c as $tampilProduk) {?>

		<form action="<?php echo base_url().'produkC/update/'?>" method='post'>
			
			<div class="form-group">
				<label>Kode Produk</label>
				<input type="hidden" name="id_produk" class="form-control" value="<?php echo $tampilProduk->id_produk ?>">
				<input type="text" name="kode_produk" placeholder="Isikan Kode Produk" class="form-control" value="<?php echo $tampilProduk->kode_produk ?>" required="required">
			</div>

			<div class="form-group">
				<label>Nama Produk</label>
				<input type="text" name="nama" placeholder="Isikan Nama Produk" class="form-control" value="<?php echo $tampilProduk->nama ?>" required="required" >
			</div>

			<div class="form-group">
				<label>detail_produk</label>
				<input type="text" name="detail_produk" placeholder="Isikan Detail Produk" class="form-control" value="<?php echo $tampilProduk->detail_produk ?>" required="required" >
			</div>

			<div class="form-group">
				<label>Gambar</label>
				<input type="file" name="gambar" class="form-control" value="<?php echo $tampilProduk->gambar ?>" required="required">
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url().'ProdukC'; ?>" type="button" class="btn btn-danger">Reset</a>

		</form>
	<?php }?>
	</section>
</div>
