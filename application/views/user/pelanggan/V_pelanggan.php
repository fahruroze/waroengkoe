<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Pelanggan
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pelanggan</li>
      </ol>
    </section>
    <section class="content">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></a><i class="fa fa-plus"></i> Tambah Data Pelanggan</button></a>
      <br>
      <table id="example2" class="table table-bordered table-striped">
          <tr>
              <th>No</th>
              <th>Email</th>
              <th>Fullname</th>
              <th>Password</th>
              <th>Nomor Hp</th>
              <th colspan="2">Aksi</th>
          </tr>
            <?php $no= 1;
            foreach ($data_pelanggan as $tampilUser):
                  ?>
          <tr>
              <td><?= $no++; ?></td>
              <td><?= $tampilUser->email ?></td>
              <td><?= $tampilUser->full_name?></td>
              <td><?= $tampilUser->password?></td>
              <td><?= $tampilUser->no_hp?></td>
              <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('admin/pelanggan/hapusTabel/'.$tampilUser->id_pelanggan, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
             <td><?php echo anchor('admin/pelanggan/editTabel/'.$tampilUser->id_pelanggan,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>')?></td>         
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
        <form method="post" action="<?php echo base_url(). 'admin/pelanggan/tambahTabel';?>">
          <div class="form-group">
            <label>Email </label>
            <input type="text" name="email" placeholder="isikan email" class="form-control">
          </div>
          <div class="form-group">
            <label>Fullname </label>
            <input type="text" name="full_name" placeholder="isikan fullname" class="form-control">
          </div>
          <div class="form-group">
            <label>Password </label>
            <input type="text" name="password" placeholder="isikan password" class="form-control">
          </div>
          <div class="form-group">
            <label>Nomor Hp </label>
            <input type="text" name="no_hp" placeholder="isikan nomor hp" class="form-control">
          </div>
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

