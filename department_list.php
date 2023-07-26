<?php

include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_department");
$stmt->execute();
$result = $stmt->fetchAll();
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລຳດັບ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 85%;">ຊື່ພະແນກ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ແກ້ໄຂ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລົບ</th>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row_dm) {?>
      <tr>
        <td>
         <?php echo $row_dm['d_id']; ?>
        </td>
        <td>
         <?php echo $row_dm['d_name']; ?>
        </td>
        <td>
          <a class="btn btn-warning btn-flat btn-sm" href="department.php?act=edit&d_id=<?php echo $row_dm['d_id']; ?>">
           ແກ້ໄຂ
          </a>
        </td>
        <td>
          <a class="btn btn-danger btn-flat btn-sm" href="department_del.php?d_id=<?php echo $row_dm['d_id']; ?>" onclick="return confirm('ລົບຂໍ້ມູນ !!!!');" >
           ລົບ
          </a>
        </td>
         <?php }?>
      </tr>
    </tbody>
  </table>

