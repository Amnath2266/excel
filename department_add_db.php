<?php

if (isset($_POST['d_name'])) {

    include 'condb.php';

    $d_name = $_POST['d_name'];
    //check data
    $stmt = $conn->prepare("SELECT d_id FROM tbl_department WHERE d_name = :d_name");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':d_name' => $d_name));

    echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() > 0) {
        echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ຂໍ້ມູນຊ້ຳກັນ !! ",
                            text: "ຂໍ້ມູນຊ້ຳກັນ!! ກະລຸນາໃ່ສ່ຂໍ້ມູນໃໝ່",
                            type: "warning"
                        }, function() {
                            window.location = "department.php?act=add";
                        });
                      }, 1000);
                </script>';
    } else {
        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_department (d_name)
    VALUES (:d_name)");
        $stmt->bindParam(':d_name', $d_name, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            echo '<script>
             setTimeout(function() {
              swal({
                  title: "ເພີ່ມຂໍ້ມູນສຳເລັດ",
                  type: "success"
              }, function() {
                  window.location = "department.php";
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
                  window.location = "department.php";
              });
            }, 1000);
        </script>';
        }
        $conn = null; //close connect db
    } //else check
} //isset
