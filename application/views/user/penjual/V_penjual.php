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
        <th>Gambar</th>
        <th>Nama Toko</th>
        <th>Jumlah Karyawan</th>
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
          <td>
          <img src="<?php echo base_url('assets/template/front/images/'.$data_penjual->gambar) ?>"class = "img img-responsive img-thumbnail " width = "60">
        </td>
          <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('admin/penjual/hapusTabel/'.$tampilUser->id_penjual, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
          <td><?php echo anchor('admin/penjual/editTabel/'.$tampilUser->id_penjual,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>')?></td>         
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
          <form method="post" action="<?php echo base_url(). 'admin/penjual/tambahTabel';?>">
            <div class="form-group">
              <label>Nama </label>
              <input type="text" name="nama" placeholder="isikan nama" class="form-control">
            </div>
            <div class="form-group">
              <label>Lokasi Toko </label>
              <input type="text" name="lok_toko" placeholder="isikan Lokasi Toko" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Toko </label>
              <input type="text" name="nama_toko" placeholder="isikan nama toko" class="form-control">
            </div>
            <div class="form-group">
              <label>Input JUmlah Karyawan </label>
              <select class="form-control" name="jml_karyawan">

                <!-- <option>Pilih Jumlah Karyawan</option> -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <!-- <option value="6">5</option> -->
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            <!-- <label>Jumlah Karyawan </label>
              <input type="Control" name="jml_karyawan" placeholder="Pilih Jumlah Karyawan" class="form-control"> -->
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

