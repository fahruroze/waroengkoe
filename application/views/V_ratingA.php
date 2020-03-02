<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Rating 
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Rating</li>
      <li class="active">Data Rating</li>
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
      <th>produk</th>
      <th>Nama Toko</th>
      <th colspan="2">Aksi</th>
    </tr>
    <?php $no= 1;
    foreach ($data_rating_a as $tampilRating):
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tampilRating->email?></td>
        <td><?= $tampilRating->rating ?></td>
        <td><?= date('d F Y', $tampilRating->tanggal_rating);?></td>
        <td><?= $tampilRating->nama_produk?></td>
        <td><?= $tampilRating->nama_toko ?></td>
        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('RatingA/hapusTabel/'.$tampilRating->id_rating, '<div class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></div>' ) ?> </td> 
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
        <h3 class="modal-title" id="exampleModalLabel">Form Add Rating</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(). 'RatingA/tambahRating';?>">
          <div>
            <label>Email</label>
            <input type="text" name="email" placeholder="Masukan Email Anda" class="form-control">
            <?=form_error('email', '<div class="alert alert-danger" role="alert">', '</div>')?>
          </div>
            <!-- <div class="form-group">
            <label>Pilih Pelanggan</label>
            <select name="id_rating" id="id_rating" class="form-control">
             <option selected disabled>Pelanggan</option>
             <?php foreach ($pelanggan as $pelanggan) {?>
              <option value="<?=$pelanggan->id_pelanggan;?>"><?=$pelanggan->full_name;?></option>
            <?php }?>
          </select>
        </div> -->
        <div class="form-group">
          <label>Pilih Produk</label>
          <select name="produk" id="id_produk" class="form-control">
           <option selected disabled>Produk</option>
           <?php foreach ($produk as $produk) {?>
            <option value="<?=$produk->id_produk;?>"><?=$produk->nama_produk;?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label>Pilih Toko</label>
        <select name="toko" id="id_toko" class="form-control">
         <option selected disabled>Toko</option>
         <?php foreach ($toko as $toko) {?>
          <option value="<?=$toko->id_penjual;?>"><?=$toko->nama_toko;?></option>
        <?php }?>
      </select>
    </div>
          <!-- <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_rating" placeholder="Nama Perating" class="form-control" required="required" >
          </div> -->
          <div>
            <label>Rating</label>
            <input type="text" name="rating" placeholder="Ungkapkan Perasaan Sampean" class="form-control">
          </div>
          <div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <button type="reset" class="btn btn-danger mt-3" data-dismiss="modal">Reset</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
</div>
