<?php
if (isset($_GET['fileID'])) {
    include 'condb.php';

    $fileID = $_GET['fileID'];
    $stmt = $conn->prepare('DELETE FROM tbl_doc_file WHERE fileID=:fileID');
    $stmt->bindParam(':fileID', $fileID, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<script>
              window.location = "doc.php";
              </script>';
    } else {
        echo '<script>
              window.location = "doc.php";
             </script>';
    }
    $conn = null;
} //isset
