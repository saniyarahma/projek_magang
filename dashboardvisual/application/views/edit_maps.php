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
            <h1>EDIT MAPS</h1>
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
        <form method="post" action="<?php echo base_url('Home/edit_maps/'.$lokasi->id_lokasi) ?>">
          <div class="form-group">
            <label>Nama Lokasi</label>
            <input value="<?php echo $lokasi->nama_lokasi; ?>" class="form-control" name="nama_lokasi" placeholder="Nama Lokasi">
          </div>
          <div class="form-group">
            <label>Latitude</label>
            <input  value="<?php echo $lokasi->latitude; ?>" class="form-control" name="latitude" id="Latitude" placeholder="Latitude">
          </div>
          <div class="form-group">
            <label>Longitude</label>
            <input  value="<?php echo $lokasi->longitude; ?>" class="form-control" name="longitude" id="Longitude" placeholder="Longitude">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?=base_url("Home/pemetaan_maps") ?>" class="btn btn-warning">Back</a>
        
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

  var marker = new L.marker(curLocation, {
    draggable: 'true',
  });

  // Get coordinat saat marker di geser/pindah
  marker.on('dragend', function (e) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      curLocation
    }).bindPopup(position).update();
    $("#Latitude").val(position.lat);
    $("#Longitude").val(position.lng);
    // var lat = position.lat;
    // var lng = position.lng;
    // latInput.value = lat;
    // lngInput.value = lng;
  });

  //mengambil coordinat saat maps diklik
  map.on("click", function(e){
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marke = L.marker(e.latlng).addTo(map);
    } else {
      marker.setLatLng(e.latlng);
    }
    // latInput.value= lat;
    // lngInput.value = lng;
  })

  map.addLayer(marker);

  // Define the input fields for latitude and longtude
  var latInput = document.querySelector("[name=latitude]");
  var lngInput = document.querySelector("[name=longitude]");

  map.attributionControl.setPrefix(false);

  var baseLayers = {
    'OpenStreetMap': osm,
  };

  var layerControl = L.control.layers(baseLayers).addTo(map);

</script>

<?php $this->load->view("_partials/footer.php") ?>
</div>
<!-- ./wrapper -->

<?php $this->load->view("_partials/js.php") ?>

</body>
</html>