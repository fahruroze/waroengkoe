<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Rating Mang Acong
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Rating</li>
      <li class="active">Data Rating Mang Acong</li>
    </ol>
  </section>
  <section class="content">
   <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></a><i class="fa fa-plus"></i> Tambah Data Rating</button>
   <table id="example2" class="table table-bordered table-striped">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Rating</th>
      <th>Tanggal</th>
      <th colspan="2">Aksi</th>
    </tr>
    <?php $no= 1;
    foreach ($data_rating_a as $tampilRating):
      ?>
      <tr>
        <td><?= $id_rating++; ?></td>
        <td><?= $tampilRating->nama_rating?></td>
        <td><?= $tampilRating->rating ?></td>
        <td><?= $tampilRating->tanggal_rating?></td>
        <!-- <td><?= $tampilProduk->gambar?></td> -->
        
        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('produkA/hapusTabel/'.$tampilRating->id_rating, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
        <td><?php echo anchor('produkA/editTabel/'.$tampilRating->id_,'<div class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></div>')?></td>  
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
        <h3 class="modal-title" id="exampleModalLabel">Form Add Produk</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(). 'produkA/tambahTabel';?>">
        <div class="form-group">
            <label>Kode Produk</label>
            <input type="text" name="kode_produk" placeholder="Isikan Kode Produk" class="form-control" required="required" >
        </div>
        <div>
            <label>Nama Produk</label>
            <input type="text" name="nama" placeholder="Isikan Nama Produk" class="form-control" required="required" >
        </div>

        <div>  
            <label>Detail Produk</label>
            <input type="text" name="detail_produk" placeholder="Isikan Detail Produk" class="form-control"  required="required">
        </div>

        <div>
            <label>Gambar</label>
            <input type="file" name="gambar" placeholder="Masukkan Gambar" class="form-control" required="required">            
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        </div>
          
        </form>
        
      </div>
    </div>
  </div>
</div>
</div>
