<?php
if (isset($_GET['fileID'])) {
    include 'condb.php';
    $stmt = $conn->prepare("
      SELECT *, t.t_name FROM tbl_doc_file as doc
      INNER JOIN tbl_type as t ON doc.t_id=t.t_id
      INNER JOIN tbl_department as d ON doc.d_id=d.d_id
      WHERE fileID=?
      ");
    $stmt->execute([$_GET['fileID']]);
    $row_d = $stmt->fetch(PDO::FETCH_ASSOC);
   
    if ($stmt->rowCount() < 1) {
        header('Location: index.php');
        exit();
    }
}
?>
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">ແກ້ໄຂໄຟຮເອກະສານ</h3>
  </div>
  <div class="card-body">
    <form action="doc_edit_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ລະຫັດເອກະສານ</label>
            <input type="text" name="fileID" value="<?=$row_d['fileID']?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ຊື່ເອກະສານ</label>
            <input type="text" name="filename"  value="<?=$row_d['filename'];?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ປະເພດເອກະສານ</label>
            <select name="t_id" class="custom-select rounded-0" required>
            <option value="<?=$row_d['t_id'];?>"><?=$row_d['t_name'];?></option>
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
            <input type="file" name="doc_file" value="<?=$row_d['doc_file'];?>" class="form-control" accept="application/pdf">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ວັນທີ່ເພີ່ມ</label>
            <input type="date" name="date_get" value="<?=$row_d['date_get'];?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສົ່ງໃຫ້ຜູ້ໃສ່ ID</label>
            <input type="text" name="m_username" value="<?=$row_d['m_username'];?>" class="form-control is-warning">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ສົ່ງໃຫ້ພະແນກ</label>
            <select name="d_id" class="custom-select rounded-0" required>
              <option value="<?=$row_d['d_id'];?>"><?=$row_d['d_name'];?></option>
              <option value="">-ສົ່ງໃຫ້ພະແນກ-</option>
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