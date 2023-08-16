<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php $this->load->view("_partials/navbar.php") ?>
  <?php $this->load->view("_partials/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekap Fasilitasi Internet 2023</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Summary</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $all; ?></h3>

                <p>Total Fasilitasi</p>
              </div>
              <div class="icon">
                <!-- <i class="fa-regular fa-globe"></i> -->
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <h3><?php echo $jol; ?></h3>

                <p>JOL</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $telkom; ?></h3>

                <p>Telkom</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#465c7d">
              <div class="inner">
              <h3 style="color: white"><?php echo $nexa; ?></h3>

                <p style="color: white">Nexa</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#e858cb">
              <div class="inner">
              <h3 style="color: white"><?php echo $la; ?></h3>

                <p style="color: white">LA</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
             
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#bd9b59">
              <div class="inner">
              <h3 style="color: white"><?php echo $metro; ?></h3>

                <p style="color: white">Metro</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">List Fasilitasi 2023</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th style="width: 5%">No.</th>
                              <th>Tanggal</th>
                              <th>Acara</th>
                              <th>Instansi</th>
                              <th>Lokasi</th>
                              <th>ISP</th>
                              <th>Petugas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            <?php if ($events): ?>
                            <?php foreach ($events as $data): ?>
                            <tr>
                              <td > <?php echo $count ?> </td>
                              <td> <?php echo $data['start'] ?> </td>
                              <td> <?php echo $data['title'] ?> </td>
                              <td> <?php echo $data['nama_instansi'] ?> </td>
                              <td> <?php echo $data['lokasi'] ?> </td>
                              <td> <?php echo $data['isp'] ?> </td>
                              <td> <?php echo $data['petugas1'] .' - '. $data['petugas2'] ?> </td>
                            </tr>
                            <?php $count=$count+1; ?>
                            <?php endforeach ?>
                            <?php else: ?>
                            <tr>
                              <td class="c-table__cell u-text-center" colspan="8">No Content</td>
                            </tr>
                            <?php endif ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
              </section>
              <!-- /.content -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

   <!-- /.content-wrapper -->
 
   <?php $this->load->view("_partials/footer.php") ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view("_partials/js.php") ?>

</body>
</html>
