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
		<?php foreach($edit_karyawan as $tampilData) {?>

			<?= form_open_multipart('karyawan/editkaryawan');?>

			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $tampilData->id_karyawan ?>">
				<input type="text" name="nama_karyawan" placeholder="isikan nama" class="form-control" value="<?php echo $tampilData->nama_karyawan ?>" required="required">
			</div>
			<div class="form-group">
				<label>Nama Toko</label>
				<select name="nama_toko" id="id_toko" class="form-control">
					<option selected disabled>Pilih Toko</option>
					<?php foreach ($namatoko as $namatoko) {?>
						<option value="<?=$namatoko->nama_toko;?>"><?=$namatoko->nama_toko;?></option>
					<?php }?>
				</select>
			</div>

			<div class="form-group">
				<label>Motto Masak</label>
				<textarea name="motto_masak" class="form-control" placeholder="Motto">"<?php echo $tampilData->moto_masak ?>"	
				</textarea>
			</div>
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
