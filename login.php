<?php session_start();?>
 <?php

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=doc_db;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//print_r($_POST);

if (isset($_POST['m_username']) && isset($_POST['m_password'])) {
    // sweet alert
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //require_once 'condb.php';

    $username = $_POST['m_username'];
    $password = $_POST['m_password'];

    $stmt = $conn->prepare("SELECT  m_username, m_name, m_level FROM tbl_member WHERE m_username = :m_username AND m_password = :m_password");
    $stmt->bindParam(':m_username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':m_password', $password, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['m_username'] = $row['m_username'];
        $_SESSION['m_name'] = $row['m_name'];
        $_SESSION['m_level'] = $row['m_level'];

        if ($_SESSION['m_level'] == 'admin' || $_SESSION['m_level'] == 'boss') {
            echo "<script> window.location.href='index.php'; </script>";
        } elseif ($_SESSION['m_level'] == 'member') {
            echo "<script> window.location.href='frontend/login.php'; </script>";
        } else {
            echo '<script>
                 setTimeout(function() {
                   swal({
                     title: "ບໍ່ມີສິດເຂົ້າ",
                     text: "ເຈົ້າບໍ່ມີສິດເຂົ້າໃຊ້ງານ",
                     type: "error"
                   }, function() {
                     window.location = "login.php";
                   });
                 }, 1000);
               </script>';
        }
    } else {

        echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ເກີດຂໍ້ຜິດພາດ",
                             text: "Username ຫຼື Password ບໍ່ຖືກ ກະລຸນາລອງໃໝ່",
                            type: "warning"
                        }, function() {
                            window.location = "login.php";
                        });
                      }, 1000);
                  </script>';

    }
    $conn = null;
} //isset

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP PDO </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
    html,
  body {
    height: 100%;
  }

  body {
    font-family: 'Noto Sans Lao', sans-serif;
    background-image: url('https://source.unsplash.com/random/1920x1080');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.8);
    max-width: 500px;
    width: 100%;
    margin: auto;
  }

  .card-header {
    background-color: #fff;
    border-bottom: none;
  }

  .card-title {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
  }

  .card-body {
    padding: 40px;
  }

  .form-control {
    border-radius: 5px;
  }

  .form-control:focus {
    box-shadow: none;
    border: 2px solid #007bff;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    font-weight: 600;
  }

  .btn-primary:hover {
    background-color: #0069d9;
  }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">ໜ້າເຂົ້າສູ່ລະບົບ</h4>
            </div>
            <div class="card-body">
              <form action="" method="post">
 <div class="mb-3">
                  <label for="m_username" class="form-label">ຊື່ຜູ້ໃໍຊ້ງານ</label>
                  <input type="text" id="m_username" name="m_username" class="form-control" required minlength="3" placeholder=" username">
                </div>
                <div class="mb-3">
                  <label for="m_password" class="form-label">ລະຫັດ</label>
                  <input type="password" id="m_password" name="m_password" class="form-control" required minlength="3" placeholder=" password">
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">ເຂົ້າສູ່ລະບົບ</button>
                </div>

              </form>
            </div>
            <div class="card-footer text-center">
                  ມີບັນຊີແລ້ວບໍ່? <a href="register.php">ລົງທະເບືອນ</a>
                </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-3rT/4+OjJUJnQlQjYpQj4s/5IY3t1XGOGqS80tXqE8qjK5Vv5jKf3lJkKlW/KlPC" crossorigin="anonymous"></script>
  </body>
</html>


