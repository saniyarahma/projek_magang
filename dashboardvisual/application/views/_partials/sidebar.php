 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>Home/dashboard" class="nav-link">
              <i class="nav-icon fa-solid fa-chart-line"></i>
              <p>
                Dashboard
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Home" class="nav-link">
              <i class="nav-icon fa-solid fa-chart-line"></i>
              <p>
                Summary
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Home/calendar_view" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Home/maps" class="nav-link">
              <i class="nav-icon fa-solid fa-map-location-dot"></i>
              <p>
                Peta
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>Home/pemetaan_maps" class="nav-link">
              <i class="nav-icon fa-solid fa-map-location-dot"></i>
              <p>
                Pemetaan Peta
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>