

<div class="content-wrapper">
	<section class="content">
		<?php foreach($edit_rating_b as $tampilRating) {?>

			<form action="<?php echo base_url().'ratingB/update/'?>" method='post'>
				
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
				<a href="<?php echo base_url().'ratingB'; ?>" type="button" class="btn btn-danger">Reset</a>
				<!-- <button type="reset" class="btn btn-danger" data-dismiss="content"><a href="<?php echo base_url().'produkA';?>"></a> Reset</button> -->

			</form>
		<?php }?>
	</section>
</div>
