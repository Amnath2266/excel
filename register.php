
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
        box-shadow: 0 0 10px rgba(0 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.8);
        max-width: 800px;
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

      .btn-register {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 5px;
        font-weight: 600;
      }

      .btn-register:hover {
        background-color: #218838;
      }
    </style>
    <title> Register PHP </title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8"> <br>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">ສະໝັກສະມະຊິກ</h5>
            </div>
            <div class="card-body">
              <form action="register_db.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="username" class="form-label">ຊື່ຜູ້ໃໍຊ້ງານ</label>
                  <input type="text" class="form-control" id="username" name="m_username" placeholder=" username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">ລະຫັດ</label>
                  <input type="password" class="form-control" id="password" name="m_password" placeholder=" password">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">ຊື່</label>
                  <input type="text" class="form-control" id="name" name="m_name" placeholder=" name">
                </div>
                <div class="mb-3">
                  <label for="level" class="form-label">ລະດັບ</label>
                 <select class="form-control" id="level" name="m_level">
                    <option value="">ເລືອກ ລະດັບ</option>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                    <option value="boss">Boss</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">ພະແນກ</label>
                  <select class="form-control" id="department" name="d_id">
                    <option value="">ເລືອກ ພະແນກ</option>
                    <?php
include 'condb.php';
$stmt = $conn->prepare("SELECT * FROM tbl_department");
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    ?>
                    <option value="<?=$row['d_id'];?>"><?=$row['d_name'];?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">ຮູບພາບ</label>
                  <input type="file" class="form-control" id="image" name="m_img">
                </div>
                <button type="submit" class="btn btn-register">ສະໝັກສະມະຊິກ</button>
              </form>
            </div>
            <div class="card-footer text-center">
              ຖ້າມີບັນຊີແລ້ວ!!! <a href="login.php">ເຂົ້າສູ່ລະບົບເລີຍ</a>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </body>
</html>
