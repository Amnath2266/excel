<?php

if (isset($_POST['t_name'])) {

    include 'condb.php';

    $t_id = $_POST['t_id'];
    $t_name = $_POST['t_name'];
    //sql update
    $stmt = $conn->prepare("UPDATE  tbl_type SET t_name=:t_name WHERE t_id=:t_id");
    $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
    $stmt->bindParam(':t_name', $t_name, PDO::PARAM_STR);
    $stmt->execute();
    // sweet alert
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() > 0) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ແກ້ໄຂຂໍ້ມູນສຳເລັດ",
                  type: "success"
              }, function() {
                  window.location = "type.php";
              });
            }, 1000);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ເກີດຂໍ້ຜິດຜາດ",
                  type: "error"
              }, function() {
                  window.location = "type.php";
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
} //isset
