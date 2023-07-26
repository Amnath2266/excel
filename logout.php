<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logout</title>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
 

  <?php
session_start();

if (isset($_SESSION['m_username'])) {

    echo "<script>
            Swal.fire({
              title: 'ຕ້ອງການອອກຈາກລະບົບແທ້ບໍ່?',
              text: 'ການກົດຕົກລົງຈະເຮັດໃຫ້ອອກຈາກລະບົບທັນທີ',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'ຍົກເລີກ',
              confirmButtonText: 'ຕົກລົງ'
            }).then((result) => {
                if (result.isConfirmed) {
                  // ลบ session และ redirect ไปยังหน้า Login
                  window.location.href = 'login.php';
                } else {
                  // กลับไปยังหน้า index.php
                  window.location.href = 'index.php';
                }
            });
          </script>";
}
session_destroy();
?>

</body>
</html>