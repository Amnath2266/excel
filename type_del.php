
<?php
if (isset($_GET['t_id'])) {
    include 'condb.php';

    $t_id = $_GET['t_id'];
    $stmt = $conn->prepare('DELETE FROM tbl_type WHERE t_id=:t_id');
    $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<script>
              window.location = "type.php";
              </script>';
    } else {
        echo '<script>
              window.location = "type.php";
             </script>';
    }
    $conn = null;
} //isset
?>