<!DOCTYPE html>
<html>
<?php include "head.php";?>
<body>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <?php

if (isset($_SESSION['m_username'])) {
    //  echo $_SESSION['m_username'];
} else {
    //  echo "ບໍ່ເຫັນຂໍ້ມູນ";
}
?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../m_img/<?php echo $profile_image; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> ສະບາຍດີ, <?php echo $_SESSION['m_username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Documentation</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if ($menu == "index") {echo "active";}?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="department.php" class="nav-link <?php if ($menu == "department") {echo "active";}?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ຈັດການພະແນກ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="member.php" class="nav-link <?php if ($menu == "member") {echo "active";}?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ຈັດການສະມາຊິກ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="type.php" class="nav-link <?php if ($menu == "type") {echo "active";}?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ຈັດການປະເພດ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="doc.php" class="nav-link<?php if ($menu == "doc") {echo "active";}?>">
              <i class="nav-icon fas fa-file"></i>
              <p>ຈັດການເອກະສານ</p>
            </a>
          </li>



          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">ອອກຈາກລະບົບ</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>
  </body>
</html>