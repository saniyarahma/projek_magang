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
            <h1>PEMETAAN MAPS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemetaan Maps</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
   
    <section class="content">
        <div class="row">
              <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
    </section>

<script>
    var map = L.map('map').setView([-6.989025859864826, 110.42203282559893], 15);

    // var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    // maxZoom: 19,
    // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

  //   var baseLayers = {
  //   'OpenStreetMap': osm,
  // };

  // var layerControl = L.control.layers(baseLayers).addTo(map);

  var locations = <?= json_encode($lokasi) ?>;
  locations.forEach(function(location) {
    L.marker([location.latitude, location.longitude])
    .bindPopup("<b>" + location.nama_lokasi + "</b>" +
      "<br>Lat: " + location.latitude +
      "<br>Long: " + location.longitude + "<br>"+
      "<div class='text-center'><div class='col-sm-12'>" +
      "<a class='btn btn-xs btn-success'" +
      "href='<?= base_url('Home/edit_maps/') ?>" + location.id_lokasi + "'>Edit</a>    " +
      "<a class='btn btn-xs btn-warning'" +
      "href='<?= base_url('Home/detail_maps/') ?>" + location.id_lokasi + "'>Detail</a>    " +
      "<a onclick='return confirm()'  class='btn btn-xs btn-danger'" +
      "href='<?= base_url('Home/pemetaan_maps/delete_maps') ?>" + location.id_lokasi + "'>Delete</a>" +
      "</div></div>"
    ).addTo(map);
  });


</script>


<?php $this->load->view("_partials/footer.php") ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view("_partials/js.php") ?>

</body>
</html>