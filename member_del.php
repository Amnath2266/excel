
<?php
if (isset($_GET['m_id'])) {
    include 'condb.php';

    $m_id = $_GET['m_id'];
    $stmt = $conn->prepare('DELETE FROM tbl_member WHERE m_id=:m_id');
    $stmt->bindParam(':d_id', $d_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<script>
              window.location = "member.php";
              </script>';
    } else {
        echo '<script>
              window.location = "member.php";
             </script>';
    }
    $conn = null;
} //isset
?>