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
		<?php foreach($edit_pelanggan as $tampilData) {?>

		<form action="<?php echo base_url().'admin/pelanggan/update/'?>" method='post'>
			
			<div class="form-group">
				<label>Email</label>
				<input type="hidden" name="id_pelanggan" class="form-control" value="<?php echo $tampilData->id_pelanggan ?>">
				<input type="email" name="email" placeholder="isikan email" class="form-control" value="<?php echo $tampilData->email ?>" required="required">
			</div>

			<div class="form-group">
				<label>Fullname</label>
				<input type="text" name="full_name" placeholder="isikan fullname" class="form-control" value="<?php echo $tampilData->full_name ?>" required="required" >
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" value="<?php echo $tampilData->password ?>" required="required">
			</div>

			<div class="form-group">
				<label>Nomor Hp</label>
				<input type="text" name="no_hp" class="form-control" value="<?php echo $tampilData->no_hp ?>" required="required">
			</div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	<?php }?>
	</section>
</div>
