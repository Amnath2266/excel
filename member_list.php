<?php

include 'condb.php';

$stmtMem = $conn->prepare("
    SELECT m.*, d.d_name
    FROM tbl_member AS m
    INNER JOIN tbl_department AS d ON m.d_id=d.d_id
    ORDER BY m.m_id ASC
    ");
$stmtMem->execute();
$resultMem = $stmtMem->fetchAll();
?>

  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ຮູບ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ໄອດີ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ລະຫັດ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ຊື່</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ພະແນກ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ສະຖານະ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ແກ້ໄຂ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລົບ</th>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($resultMem as $row_member) {?>
      <tr>
        <td>
         <?php echo $row_member['m_id']; ?>
        </td>
        <td>
        <img src="./m_img/<?php echo $row_member['m_img']; ?>" width="100px">
        </td>
         <td>
         <?php echo $row_member['m_username']; ?>
        </td>
         <td>
         <?php echo $row_member['m_password']; ?>
        </td>
         <td>
         <?php echo $row_member['m_name']; ?>
        </td>
         <td>
         <?php echo $row_member['d_name']; ?>
        </td>
        <td>
         <?php
$st = $row_member['m_level'];
    if ($st == 'admin') {
        echo "ແອດມິນ";
    } elseif ($st == 'member') {
        echo "ສະມາຊິກ";
    } else {
        echo "ຜູ້ບໍລິຫານ";
    }
    ?>
        </td>
        <td>
          <a class="btn btn-warning btn-flat btn-sm" href="member.php?act=edit&m_id=<?php echo $row_member['m_id']; ?>">
           ແກ້ໄຂ
          </a>
        </td>
        <td>
          <a class="btn btn-danger btn-flat btn-sm" href="member_del.php?m_id=<?=$row_member['m_id'];?>"
            onclick="return confirm('ຢືນຢັນການລົບຂໍ້ມຸນ !!');">
           ລົບ
          </a>
        </td>
         <?php }?>
      </tr>
    </tbody>
  </table>