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

		<form action="<?php echo base_url().'admin/penjual/update/'?>" method='post'>
			
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
              <label>Input JUmlah Karyawan </label>
              <select class="form-control" name="jml_karyawan">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	<?php }?>
	</section>
</div>
