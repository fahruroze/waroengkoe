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
		<?php foreach($edit_penjual as $tampilData) {?>

			<?= form_open_multipart('penjual/editpenjual');?>

				<div class="form-group">
					<label>Nama</label>
					<input type="hidden" name="id_penjual" class="form-control" value="<?php echo $tampilData->id_penjual ?>">
					<input type="text" name="nama" placeholder="isikan nama" class="form-control" value="<?php echo $tampilData->nama ?>" required="required">
				</div>

				<div class="form-group">
					<label>Lokasi Toko</label>
					<input type="text" name="lok_toko" placeholder="isikan lokasi toko" class="form-control" value="<?php echo $tampilData->lok_toko ?>" required="required" >
				</div>

				<div class="form-group">
					<label>Nama Toko</label>
					<input type="text" name="nama_toko" class="form-control" value="<?php echo $tampilData->nama_toko ?>" required="required">
				</div>

				<div class="form-group">
					<label>Jumlah Karyawan</label>
					<input type="text" name="jml_karyawan" class="form-control" value="<?php echo $tampilData->jml_karyawan ?>" required="required">
				</div>

				<div class="form-group">
					<label>Motto Penjual</label>
					<textarea name="motto" class="form-control" placeholder="Motto">"<?php echo $tampilData->motto ?>"	
					</textarea>
				</div>

						
		<!-- 		<div class="form-group">
					<label>Picture</label>
					<div class="col-sm-3">
						<img src="<?= base_url('assets/template/back/dist/img/') . $tampilData->gambar;?>" class="img-thumbnail">
					</div>
					<input type="file" name ="image" class="form-control"  placeholder="Upload Icon Baru" 
					value="">

				</div>  -->
				<div class="form-group">
					<label>Picture</label>
						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('assets/template/back/dist/img/') . $tampilData->image;?>" class="img-thumbnail">
							</div>
							<div class="col-sm-5">
								<div class="custom-file">
									<input type="file" name ="image" class="form-control"  placeholder="Upload Icon Baru" 
									value="">
								</div>
							</div>
						</div>      
				</div> 

				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		<?php }?>
	</section>
</div>
