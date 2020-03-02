<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Penjual
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Penjual</li>
    </ol>
  </section>
  <section class="content">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></a><i class="fa fa-plus"></i> Tambah Data Penjual</button></a>
    <br>
    <table id="example2" class="table table-bordered table-striped">
      <tr>
        <th>no</th>
        <th>Nama</th>
        <th>Lokasi Toko</th>
        <th>Nama Toko</th>
        <th>Jumlah Karyawan</th>
        <th>Motto Dagang</th>
        <th>Gambar</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php $no= 1;
      foreach ($data_penjual as $tampilUser):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tampilUser->nama ?></td>
          <td><?= $tampilUser->lok_toko?></td>
          <td><?= $tampilUser->nama_toko?></td>
          <td><?= $tampilUser->jml_karyawan?></td>
          <td><?= $tampilUser->motto?></td>
          <td>
            <img src="<?php echo base_url('assets/template/back/dist/img/'.$tampilUser->image) ?>"class = "img img-responsive img-thumbnail " width = "60">
          </td>
          <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('penjual/hapusTabel/'.$tampilUser->id_penjual, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
          <td><?php echo anchor('penjual/editTabel/'.$tampilUser->id_penjual,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>')?></td>         
        </tr>
      <?php endforeach; ?>
    </table>
    <div class="card-footer small text-muted">
      <?php
      $tanggal= mktime(date("m"),date("d"),date("Y"));
      echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
      date_default_timezone_set('Asia/Jakarta');
      $jam=date("H:i:s");
      echo "| Pukul : <b>". $jam." "."</b>";
      $a = date ("H");
      ?> 
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Form Add User</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('penjual/tambahpenjual');?>
          <div class="form-group">
            <label>Nama </label>
            <input type="text" name="nama" placeholder="isikan nama" class="form-control">
            <?=form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          <div class="form-group">
            <label>Lokasi Toko </label>
            <input type="text" name="lok_toko" placeholder="isikan Lokasi Toko" class="form-control">
            <?=form_error('lok_toko', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          <div class="form-group">
            <label>Nama Toko </label>
            <input type="text" name="nama_toko" placeholder="isikan nama toko" class="form-control">
            <?=form_error('nama_toko', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          <div class="form-group">
            <label>Jumlah Karyawan </label>
            <input type="Control" name="jml_karyawan" placeholder="Pilih Jumlah Karyawan" class="form-control">
            <?=form_error('jml_karyawan', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          <div class="form-group">
            <label>Motto Dagang </label>
            <input type="Control" name="motto" placeholder="Pilih Jumlah Karyawan" class="form-control">
            <?=form_error('motto', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          <div class="form-group">
            <label>Picture</label>
            <div class="row">
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" name ="image" class="form-control"  placeholder="Upload Icon Baru" 
                  value="">
                </div>
              </div>
            </div>      
          </div> 

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

