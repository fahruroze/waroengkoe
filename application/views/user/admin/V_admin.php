<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Admin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Admin</li>
      </ol>
    </section>
    <section class="content">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></a><i class="fa fa-plus"></i> Tambah Data Admin</button></a>
      <br>
      <table id="example2" class="table table-bordered table-striped">
          <tr>
              <th>no</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Email</th>
              <th>Role</th>
              <th colspan="2">Aksi</th>
          </tr>
            <?php $no= 1;
            foreach ($data_admin as $tampilUser):
                  ?>
          <tr>
              <td><?= $no++; ?></td>
              <td><?= $tampilUser->nama ?></td>
              <td><?= $tampilUser->username?></td>
              <td><?= $tampilUser->password?></td>
              <td><?= $tampilUser->email?></td>
              <td><?= $tampilUser->role?></td>
              <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('admin/admin/hapusTabel/'.$tampilUser->id_user, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
             <td><?php echo anchor('admin/admin/editTabel/'.$tampilUser->id_user,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>')?></td>         
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
        <form method="post" action="<?php echo base_url(). 'admin/admin/tambahTabel';?>">
          <div class="form-group">
            <label>Nama </label>
            <input type="text" name="nama" placeholder="isikan nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Username </label>
            <input type="text" name="username" placeholder="isikan username" class="form-control">
          </div>
          <div class="form-group">
            <label>Password </label>
            <input type="text" name="password" placeholder="isikan password" class="form-control">
          </div>
          <div class="form-group">
            <label>Email </label>
            <input type="text" name="email" placeholder="isikan email" class="form-control">
          </div>
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

