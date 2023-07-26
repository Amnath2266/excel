<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">ຈັດການປະເພດ</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="type_add_db.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ຊື່ປະເພດ</label>
                        <input type="text" name="t_name" class="form-control" placeholder="ໃສ່ຊື່ປະເພດ">
                      </div>
                    </div>

                  </div>
                  <div class="row" align="left">
                    <div class="col-sm-6">
                         <button type="submit" class="btn btn-success">ບັນທຶກຂໍ້ມູນ</button>
                         <a href="department.php" class="btn btn-danger" data-dismiss="modal">ຍົກເລິກ</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
