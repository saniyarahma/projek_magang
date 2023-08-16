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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DETAIL LOKASI MAPS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Maps</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="row">
      <div class="col-sm-8">
        <div id="map" style="height: 400px;"></div>
      </div>  
      <div class="col-sm-4">
        <table class="table table-bordered">
            <tr>
                <th>Nama Lokasi</th>
                <th>:</th>
                <td><?= $lokasi->nama_lokasi ?></td>
            </tr>
            <tr>
                <th>Latitude</th>
                <th>:</th>
                <td><?= $lokasi->latitude ?></td>
            </tr>
            <tr>
                <th>Longitude</th>
                <th>:</th>
                <td><?= $lokasi->longitude ?></td>
            </tr>
        </table>
        <a href="<?=base_url("Home/pemetaan_maps") ?>" class="btn btn-success">Back</a>
      </div>
    </div>
    </section>

<script>
  var map = L.map('map').setView([-6.989025859864826, 110.42203282559893], 16);

  var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 16,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  var curLocation = [<?php echo $lokasi->latitude; ?>, <?php echo $lokasi->longitude; ?>];

  L.marker([<?php echo $lokasi->latitude; ?>, <?php echo $lokasi->longitude; ?>])
    .addTo(map)
    .bindPopup("<b><?php echo $lokasi->nama_lokasi; ?></b>" +
        "<br>Lat: <?php echo $lokasi->latitude; ?>" +
        "<br>Long: <?php echo $lokasi->longitude; ?><br>")
    .openPopup();

</script>

<?php $this->load->view("_partials/footer.php") ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view("_partials/js.php") ?>

</body>
</html>