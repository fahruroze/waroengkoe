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
		<?php foreach($edit_produk as $tampilProduk) {?>

		<form action="<?php echo base_url().'admin/produk/update/'?>" method='post'>
			
			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id_produk" class="form-control" value="<?php echo $tampilProduk->id_produk ?>">
				<input type="text" name="nama" placeholder="isikan nama" class="form-control" value="<?php echo $tampilProduk->nama ?>" required="required">
			</div>

			<div class="form-group">
				<label>detail_produk</label>
				<input type="text" name="detail_produk" placeholder="isikan username" class="form-control" value="<?php echo $tampilProduk->detail_produk ?>" required="required" >
			</div>

			<div class="form-group">
				<label>gambar</label>
				<input type="file" name="gambar" class="form-control" value="<?php echo $tampilProduk->gambar ?>" required="required">
			</div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	<?php }?>
	</section>
</div>
