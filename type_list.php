<?php

include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_type");
$stmt->execute();
$result = $stmt->fetchAll();
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລຳດັບ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 85%;">ຊື່ປະເພດ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ແກ້ໄຂ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລົບ</th>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row_dm) {?>
      <tr>
        <td>
         <?php echo $row_dm['t_id']; ?>
        </td>
        <td>
         <?php echo $row_dm['t_name']; ?>
        </td>
        <td>
          <a class="btn btn-warning btn-flat btn-sm" href="type.php?act=edit&t_id=<?php echo $row_dm['t_id']; ?>">
           ແກ້ໄຂ
          </a>
        </td>
        <td>
          <a class="btn btn-danger btn-flat btn-sm" href="type_del.php?t_id=<?php echo $row_dm['t_id']; ?>" onclick="return confirm('ຢືນຢັນການລົບຂໍ້ມູນ !!!!');" >
           ລົບ
          </a>
        </td>
         <?php }?>
      </tr>
    </tbody>
  </table>

