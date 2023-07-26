<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if (isset($_POST['m_name'])) {
    include 'condb.php';

    echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    $m_id = $_POST['m_id'];
    $m_username = $_POST['m_username'];
    $m_password = $_POST['m_password'];
    $m_name = $_POST['m_name'];
    $d_id = $_POST['d_id'];
    $m_level = $_POST['m_level'];
    $m_img2 = $_POST['m_img2'];
    $date1 = date("Ymd_His");

    $numrand = (mt_rand());
    $m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
    $upload = $_FILES['m_img']['name'];

    $typefile = strrchr($_FILES['m_img']['name'], ".");

    if ($upload != '') {

        $path = "m_img/";

        $newname = $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;

        move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);
    } else {
        $newname = $m_img2;
    }
    //sql insert
    $stmt = $conn->prepare("UPDATE tbl_member SET
    m_username=:m_username,
    m_password=:m_password,
    m_name=:m_name,
    d_id=:d_id,
    m_level=:m_level,
    m_img='$newname'
    WHERE m_id =:m_id");
    $stmt->bindParam(':m_id', $m_id, PDO::PARAM_INT);
    $stmt->bindParam(':m_username', $m_username, PDO::PARAM_STR);
    $stmt->bindParam(':m_password', $m_password, PDO::PARAM_STR);
    $stmt->bindParam(':m_name', $m_name, PDO::PARAM_STR);
    $stmt->bindParam(':d_id', $d_id, PDO::PARAM_INT);
    $stmt->bindParam(':m_level', $m_level, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ແກ້ໄຂຂໍ້ມູນສະມາຊິກ",
                          type: "success"
                      }, function() {
                          window.location = "member.php";
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
                          window.location = "member.php";
                      });
                    }, 1000);
                </script>';
    }
    $conn = null; //close connect db
} //isset
