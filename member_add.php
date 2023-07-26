<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">ເພີ່ມຂໍ້ມູນສະມາຊິກ</h3>
  </div>
  <div class="card-body">
    <form action="member_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຍູເຊີຜູ້ໃຊ້</label>
            <input type="text" name="m_username" class="form-control" placeholder="ໃສ່ຍູເຊີຜູ້ໃຊ້">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>ລະຫັດ</label>
            <input type="text" name="m_password" class="form-control" placeholder="ໃສ່ລະຫັດ">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຊື່ ແລະ ນາມສະກຸນ</label>
            <input type="text" name="m_name" class="form-control" placeholder="ໃສ່ຊື່ ແລະ ນາມສະກຸນ">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສະຖານະ</label>
            <select name="m_level" class="form-control" required>
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
            <label>*ຮູບ .jpg .png*</label>
            <input type="file" name="m_img" class="form-control">
          </div>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">ບັນທຶກຂໍ້ມູນ</button>
          <a href="member.php" class="btn btn-danger" data-dismiss="modal">ຍົກເລິກ</a>
        </div>
      </div>
    </form>
  </div>
</div>