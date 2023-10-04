<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">The Logistic</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Utama
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="data-barang.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Barang</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="data-toko.php">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Data Toko</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="data-pesanan.php">
          <i class="fas fa-fw fa-school"></i>
          <span>Pesan Barang</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="data-pengiriman.php">
          <i class="fas fa-fw fa-futbol"></i>
          <span>Data Pengiriman</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lain-lain
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKon" aria-expanded="true" aria-controls="collapseKon">
          <i class="fas fa-fw fa-folder"></i>
          <span>Konfirmasi</span>
        </a>
        <div id="collapseKon" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="data-kon-pembayaran.php">Konfirmasi Pembayaran</a>
            <a class="collapse-item" href="data-kon-kirim.php">Konfirmasi Pengiriman</a>
            <a class="collapse-item" href="data-kon-sampai.php">Konfirmasi Diterima</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="data-kendaraan.php">Data Kendaraan</a>
            <a class="collapse-item" href="data-jenis-barang.php">Jenis Barang</a>
            <a class="collapse-item" href="data-gudang.php">Data Gudang</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="data-metode-pembayaran.php">
          <i class="fas fa-fw fa-images"></i>
          <span>Metode Pembayaran</span></a>
      </li>
      <!-- Nav Item - Charts -->
      
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <li class="nav-item">
        <a class="nav-link" href="data-admin.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data-pelanggan.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Pelanggan</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu --><!-- 
      <?php
        include "../../koneksi/koneksi.php";
        $sql = mysqli_query($koneksi,"SELECT * from tb_hak_akses order by id_hak_akses asc");
        while ($data = mysqli_fetch_array($sql)){
      ?>
      <li class="nav-item">
        <a class="nav-link" href="data-user.php?hk=<?php echo $data['id_hak_akses']; ?>">
          <i class="fas fa-fw fa-users"></i>
          <span><?php echo $data["jenis_hak_akses"]; ?></span></a>
      </li>
      <?php } ?> -->

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="data-laporan.php">
          <i class="fas fa-fw fa-print"></i>
          <span>Data Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>