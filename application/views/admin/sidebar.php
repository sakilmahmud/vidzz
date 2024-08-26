<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>" target="_blank" class="brand-link">
    <img src="<?php echo base_url('assets/frontend/images/logo.png') ?>" alt="AP Logo" class="brand-image img-circle elevation-3"><br>
    <span class="brand-text font-weight-light">Vidzz</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <?php
    //echo "<pre>"; print_r($this->session->userdata); die;
    ?>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?php echo strtoupper($this->session->userdata('full_name')); ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link <?php echo ($activePage === 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('admin/users'); ?>" class="nav-link <?php echo ($activePage === 'users') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>Users</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('admin/countries'); ?>" class="nav-link <?php echo ($activePage === 'countries') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-flag"></i>
            <p>Countries</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/price_wise_view'); ?>" class="nav-link <?php echo ($activePage === 'price_wise_view') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>Price Wise View</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?php echo base_url('admin/settings'); ?>" class="nav-link <?php echo ($activePage === 'settings') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>Settings</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/password'); ?>" class="nav-link <?php echo ($activePage === 'password') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-key"></i>
            <p>Change Password</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>