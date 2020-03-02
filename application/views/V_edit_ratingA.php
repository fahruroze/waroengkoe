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
		<?php foreach($edit_rating_a as $tampilRating) {?>

		<form action="<?php echo base_url().'ratingA/update/'?>" method='post'>
			
			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id_rating" class="form-control" value="<?php echo $tampilRating->id_rating ?>">
				<input type="text" name="nama_rating" placeholder="Edit Nama" class="form-control" value="<?php echo $tampilRating->nama_rating ?>" required="required">
			</div>

			<div class="form-group">
				<label>Rating</label>
				<input type="text" name="rating" placeholder="edit rating anda" class="form-control" value="<?php echo $tampilRating->rating ?>" required="required" >
			</div>

			<div class="form-group">
				<label>Tanggal Rating</label>
				<input type="text" name="tanggal_rating" placeholder="edit tanggal rating" class="form-control" value="<?php echo $tampilRating->tanggal_rating ?>" required="required" >
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url().'ratingA'; ?>" type="button" class="btn btn-danger">Reset</a>
			<!-- <button type="reset" class="btn btn-danger" data-dismiss="content"><a href="<?php echo base_url().'produkA';?>"></a> Reset</button> -->

		</form>
	<?php }?>
	</section>
</div>
