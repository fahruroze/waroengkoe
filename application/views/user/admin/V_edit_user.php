<div class="content-wrapper">
	<section class="content">
		<?php foreach($edit_user as $tampilUser) {?>

		<form action="<?php echo base_url().'admin/admin/update/'?>" method='post'>
			
			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id_user" class="form-control" value="<?php echo $tampilUser->id_user ?>">
				<input type="text" name="nama" placeholder="isikan nama" class="form-control" value="<?php echo $tampilUser->nama ?>">
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="isikan username" class="form-control" value="<?php echo $tampilUser->username ?>">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" placeholder="isikan password" class="form-control" value="<?php echo $tampilUser->password ?>">
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" placeholder="isikan email" class="form-control" value="<?php echo $tampilUser->email ?>">
			</div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	<?php }?>
	</section>
</div>
