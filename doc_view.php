
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Document</title>
</head>
<body>
  <?php
  
  $dsn = 'mysql:host=localhost;dbname=doc_pdo;charset=utf8';
  $username = 'root';
  $password = 'root';

  try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    die('Could not connect to the database');
  }
  
  var_dump($_POST);
  $fileID = isset($_POST['fileID']) ? $_POST['fileID'] : 0;
  
  
  $stmt = $pdo->prepare("SELECT doc_pdo FROM tbl_doc_file WHERE fileID = ?");
  $stmt->execute([$fileID]);
  
  //var_dump($stmt);
  
  if ($stmt->rowCount() > 0) {
  
    $file_path = $stmt->fetchColumn();
  
    var_dump($file_path);
  
  
    $file_type = pathinfo($file_path, PATHINFO_EXTENSION);
  
    if ($file_type === 'pdf' || $file_type === 'docx' || $file_type === 'xls') {
 
      echo '<iframe src="https://docs.google.com/gview?url=' . urlencode($file_path) . '&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
    }
  }
  ?>
</body>
</html>