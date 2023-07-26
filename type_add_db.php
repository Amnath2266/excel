<?php

if (isset($_POST['t_name'])) {

    include 'condb.php';

    $t_name = $_POST['t_name'];
    //check data
    $stmt = $conn->prepare("SELECT t_id FROM tbl_type WHERE t_name = :t_name");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':t_name' => $t_name));

    echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() > 0) {
        echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ຂໍ້ມູນຊ້ຳ !! ",
                            text: "ຂໍ້ມູນຊ້ຳ!! ກະລຸນາໃສ່ຂໍ້ມູນໃໝ່",
                            type: "warning"
                        }, function() {
                            window.location = "type.php?act=add";
                        });
                      }, 1000);
                </script>';
    } else {
        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_type (t_name)
    VALUES (:t_name)");
        $stmt->bindParam(':t_name', $t_name, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            echo '<script>
             setTimeout(function() {
              swal({
                  title: "ເພີ່ມຂໍ້ມູນສຳເລັດ",
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
                  window.location = "department.php";
              });
            }, 1000);
        </script>';
        }
        $conn = null; //close connect db
    } //else check
} //isset
