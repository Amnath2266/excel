<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

//print_r($_SESSION);

if (empty($_SESSION['m_username']) && empty($_SESSION['m_password'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "ບໍ່ມີສິດເຂົ້າໜ້ານີ້",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "type";?>
<?php include "head.php";?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "navbar.php";?>
  <!-- /.navbar -->
  <?php include "menu.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

         <a href="type.php?act=add" class="btn btn-app bg-success">
            <i class="fas fa-users"></i> ເພີ່ມຂໍ້ມູນ</a>
          <!-- ./col -->
           <div class="col-md-12">
            <?php
$act = (isset($_GET['act']) ? $_GET['act'] : '');
if ($act == 'add') {
    include 'type_add.php';
} elseif ($act == 'edit') {
    include 'type_edit.php';
} else {
    include 'type_list.php';
}
?>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php //include("footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <?php include "script.php";?>
</body>
</html>
