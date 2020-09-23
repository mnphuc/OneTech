<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QL admin
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      $users = mysqli_query($conn,"SELECT * FROM users WHERE group_name='admin'");

      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header">
           <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input class="form-control" name="search_name" placeholder="Nhập tên tìm kiếm...">
            </div>
            <button type="submit" class="btn btn-primary">Tìm</button>
            <a href="admin-add.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
         
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $u) { ?>
              <tr>
                <td><?php echo $u['id'] ?></td>
                <td><?php echo $u['name'] ?></td>
                <td><?php echo $u['email'] ?></td>
                <td><?php echo $u['phone'] ?></td>
                <td>
                  <?php echo date('d-m-Y',strtotime($u['created_at'])) ?>
                </td>
                <td>
                  <a href="admin-edit.php?id=<?php echo $u['id']; ?>" class="btn btn-xs btn-success">Sửa</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>