
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Admin Dashboard </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>30<sup style="font-size: 20px"></sup></h3>

              <p>Menu</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>10</h3>

              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>04</h3>

              <p>Warung</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>
      <!-- Default box -->
      <div class="box">
        <div class="container">
          <br>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo base_url('assets/template/back/dist/img/avatar.png') ?>" class="img-thumbnail" >
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h1 class="card-title"><?= $user['username'];?></h1>
        <p class="card-text"><?= $user['email'];?></p>
        <p class="card-text"><small class="text-muted">Admin since <?= $user['created_date']?> </small></p>
      </div>
    </div>
  </div>
</div>
        <!-- /.box-footer-->
      </div>
      <br>
      <!-- /.box -->

    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
