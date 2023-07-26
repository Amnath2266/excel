<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">ເພີ່ມຂໍ້ມູນເອກະສານ</h3>
  </div>
  <div class="card-body">
    <form action="doc_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ລະຫັດເອກະສານ</label>
            <input type="text" name="fileID" class="form-control is-warning" placeholder="ລະຫັດເອກະສານ">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຂໍ້ມູນເອກະສານ</label>
            <input type="text" name="filename" class="form-control is-warning" placeholder="ຂໍ້ມູນເອກະສານ">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ປະເພດເອກະສານ</label>
            <select name="t_id" class="custom-select rounded-0" required>
              <option value="">-ເລືອກປະເພດເອກະສານ-</option>
              <?php
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_type");
$stmt->execute();
$result_t = $stmt->fetchAll();
foreach ($result_t as $row_t) {
    ?>
              <option value="<?=$row_t['t_id'];?>"><?=$row_t['t_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>*ໄຟຮເອກະສານ .pdf .doc .xlsx*</label>
            <input type="file" name="doc_file" class="form-control" accept=".pdf,.docx,.xlsx">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ວັນທີ່ເພີ່ມ</label>
            <input type="date" name="date_get" class="form-control" placeholder="กรอกข้อมูลชื่อเอกสาร">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສົ່ງໃຫ້ຜູ້ໃສ່ ID</label>
            <input type="text" name="m_username" class="form-control is-warning" placeholder="ໃສ່ຂໍ້ມູນ ID ຜູ້ໃຊ້">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສົ່ງໃຫ້ພະແນກ</label>
            <select name="d_id" class="custom-select rounded-0" required>
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
      <div class="row" align="left">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">ບັນທຶກຂໍ້ມູນ</button>
          <a href="doc.php" class="btn btn-danger" data-dismiss="modal">ຍົກເລິກ</a>
        </div>
      </div>
    </form>
  </div>
</div>