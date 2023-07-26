<?php
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();
if (isset($_POST['filename'])) {
    include 'condb.php';

    echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    $date1 = date("Ymd_His");

    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload = $_FILES['doc_file']['name'];

    if ($upload != '') {

        $typefile = strrchr($_FILES['doc_file']['name'], ".");

        //if(in_array($typefile, array('.xlsx', '.pdf', '.docx'))){

        $path = "doc_file/";

        $newname = $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;

        move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);

        $fileID = $_POST['fileID'];
        $filename = $_POST['filename'];
        $t_id = $_POST['t_id'];
        $date_get = $_POST['date_get'];
        $m_username = $_POST['m_username'];
        $d_id = $_POST['d_id'];
        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_doc_file (fileID, filename, t_id, doc_file, date_get, m_username, d_id)
    VALUES (:fileID, :filename, :t_id, '$newname', :date_get, :m_username, :d_id)");
        $stmt->bindParam(':fileID', $fileID, PDO::PARAM_STR);
        $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);
        $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_get', $date_get, PDO::PARAM_STR);
        $stmt->bindParam(':m_username', $m_username, PDO::PARAM_STR);
        $stmt->bindParam(':d_id', $d_id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result) {
            echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ອັບໂຫລດເອກະສານສຳເລັດ",
                          text: "Redirecting in 1 seconds.",
                          type: "success",
                          timer: 1000,
                          showConfirmButton: false
                      }, function() {
                          window.location = "doc.php";
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
                          window.location = "doc.php";
                      });
                    }, 1000);
                </script>';
        } //else ของ if result
        //    }else{
        //        echo '<script>
        //                     setTimeout(function() {
        //                      swal({
        //                          title: "ອັບໂຫລດໄຟຮບໍ່ໄດ້",
        //                          type: "error"
        //                      }, function() {
        //                         window.location = "doc.php";
        //                      });
        //                    }, 1000);
        //                </script>';
    } //else
} // if($upload !='') {
$conn = null; //close connect db
//}
//} //isset
