<?php
//print_r($_POST);
// exit();
if (isset($_POST['m_name'])) {
    include 'condb.php';

    echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    $date1 = date("Ymd_His");

    $numrand = (mt_rand());
    $m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
    $upload = $_FILES['m_img']['name'];

    if ($upload != '') {

        $typefile = strrchr($_FILES['m_img']['name'], ".");

        if ($typefile == '.jpg' || $typefile == '.jpg' || $typefile == '.png') {

            $path = "m_img/";

            $newname = $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;

            move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);

            $m_username = $_POST['m_username'];
            $m_password = $_POST['m_password'];
            $m_name = $_POST['m_name'];
            $d_id = $_POST['d_id'];
            $m_level = $_POST['m_level'];

            $m_username_exist = false;
            $stmt_check = $conn->prepare("SELECT COUNT(*) FROM tbl_member WHERE m_username = :m_username");
            $stmt_check->bindParam(':m_username', $m_username, PDO::PARAM_STR);
            $stmt_check->execute();
            $count = $stmt_check->fetchColumn();
            if ($count > 0) {
                $m_username_exist = true;
            }

            //sql insert
            if (!$m_username_exist) {

                $stmt = $conn->prepare("INSERT INTO tbl_member (m_username, m_password, m_name, d_id, m_level, m_img)
    VALUES (:m_username, :m_password, :m_name, :d_id, :m_level, '$newname')");
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
                          title: "ເພີມຂໍ້ມູນສະມາຊິກສຳເລັດ",
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
            } else {
                echo '<script>
             setTimeout(function() {
              swal({
                  title: "ຊື້ຜູ້ໃຊ້ນີ້ມີແລ້ວ",
                  type: "error"
                    }, function() {
                        window.location = "member_add.php";
                    });
                }, 1000);
            </script>';
            }
        } else {
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "ອັບໂຫລດໄຟຮບໍ່ຖືກຕ້ອງ",
                              type: "error"
                          }, function() {
                              window.location = "member.php";
                          });
                        }, 1000);
                    </script>';
        }
    } // if($upload !='') {
    $conn = null; //close connect db
} //isset
