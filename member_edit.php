<?php
if (isset($_GET['m_id'])) {
    include 'condb.php';
    $stmt_m = $conn->prepare("
        SELECT m.*, d.d_name
        FROM tbl_member AS m
        INNER JOIN tbl_department AS d ON m.d_id=d.d_id
        WHERE m.m_id=?
        ORDER BY m.m_id ASC
        ");
    $stmt_m->execute([$_GET['m_id']]);
    $row_em = $stmt_m->fetch(PDO::FETCH_ASSOC);

    if ($stmt_m->rowCount() < 1) {
        header('Location: index.php');
        exit();
    }
}
?>
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">ແກ້ໄຂ ຂໍ້ມູນສະມາຊິກ</h3>
  </div>
  <div class="card-body">
    <form action="member_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຍູເຊີຜູ້ໃຊ້</label>
            <input type="text" name="m_username" value="<?=$row_em['m_username'];?>" class="form-control" placeholder="ຍູເຊີຜູ້ໃຊ້" disabled>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>ລະຫັດ</label>
            <input type="text" name="m_password" value="<?=$row_em['m_password'];?>" class="form-control" placeholder="ລະຫັດ">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຊື່ ແລະ ນາມສະກຸນ</label>
            <input type="text" name="m_name" value="<?=$row_em['m_name'];?>" class="form-control" placeholder="ຊື່ ແລະ ນາມສະກຸນ">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສະຖານະ</label>
            <select name="m_level" class="form-control" required>
              <option value="เลือกสถานะ"><?=$row_em['m_level'];?></option>
              <option value="เลือกสถานะ">-ເລືອກສະຖານະ-</option>
              <option value="admin">ແອດມິນ</option>
              <option value="member">ສະມາຊິກ</option>
              <option value="boss">ຜູ້ບໍລິຫານ</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ພະແນກ</label>
            <select name="d_id" class="form-control" required>
              <option value="<?=$row_em['d_id'];?>"><?=$row_em['d_name'];?></option>
              <option value="">-ເລືອກພະແນກ-</option>
              <?php
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_department");
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    ?>
              <option value="<?=$row['d_id'];?>"><?=$row['d_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>*ຮູບພາບ .jpg .png*</label>
            <input type="file" name="m_img" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <img src="m_img/<?=$row_em['m_img'];?>" width="200px">
          </div>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-sm-6">
        <input type="hidden" name="m_id" value="<?=$row_em['m_id'];?>">
        <input type="hidden" name="m_img2" value="<?=$row_em['m_img'];?>">
          <button type="submit" class="btn btn-success">ບັນທຶກຂໍ້ມູນ</button>
          <a href="member.php" class="btn btn-danger" data-dismiss="modal">ຍົກເລິກ</a>
        </div>
      </div>
    </form>
  </div>
</div>