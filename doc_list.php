<?php
include 'condb.php';
$stmtDoc = $conn->prepare("
SELECT *
FROM tbl_doc_file AS f
INNER JOIN tbl_type AS t ON f.t_id=t.t_id
INNER JOIN tbl_department AS d ON f.d_id=d.d_id
ORDER BY f.fileID ASC
");
$stmtDoc->execute();
$resultDoc = $stmtDoc->fetchAll();
?>
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ລະຫັດເອກະສານ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ຊື່ເອກະສານ/ປະເພດເອກະສານ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ວັນທີ່ອັບໂຫລດ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ສະຖານະ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ພະແນກ/ພະແນກ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 17%;">ຈັດການຂໍ້ມູນ</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultDoc as $row_Doc) {?>
    <tr>
      <td>
        <?php echo $row_Doc['fileID']; ?>
      </td>
      <td>
        <?php echo $row_Doc['filename']; ?>
        <br>
        ປະເພດ: <font color="blue"><?php echo $row_Doc['t_name']; ?></font><br>
        <font color="red"><?php echo $row_Doc['doc_file']; ?></font>
      </td>
      <td>
        ວັນທີ່ເພີ່ມ: <?php echo date('d/m/Y', strtotime($row_Doc['date_get'])); ?> <br>
        ວັນທີ່ອັບໂຫລດ: <?php echo date('d/m/Y', strtotime($row_Doc['date_up'])); ?>
      </td>
      <td align="center"> <?php
$st = $row_Doc['status'];
    $us = $row_Doc['m_username'];
    if ($us != '' && $st == 0) {
        echo $row_Doc['m_username'];
        echo "<br><span class='badge badge-warning'>";
        echo "ຍັງບໍ່ໄດ້ອ່ານ";
        echo "</span>";
    } elseif ($st == 1) {
        echo $row_Doc['m_username'];
        echo "<br><span class='badge badge-success'>";
        echo "ອ່ານແລ້ວ";
        echo "</span>";
    }
    ?></td>
      <td>
        <?php echo $row_Doc['d_name']; ?>
      </td>
      <td>

        <a class="btn btn-info btn-sm" href="doc_file/<?php echo $row_Doc['doc_file']; ?>" target="_blank">
          <i class="fas fa-folder">
          </i>
          View
        </a>

        <a class="btn btn-warning btn-sm" href="doc.php?act=edit&fileID=<?php echo $row_Doc['fileID']; ?>">
          <i class="fas fa-pencil-alt">
          </i>
          Edit
        </a>
        <a class="btn btn-danger btn-sm" href="doc_del.php?fileID=<?=$row_Doc['fileID'];?>"  onclick="return confirm('ຢືນຢັນການລົບຂໍ້ມູນ !!');">
          <i class="fas fa-trash">
          </i>
          Delete
        </a>
      </td>
      <?php }?>
    </tr>
  </tbody>
</table>