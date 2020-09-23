<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QL danh mục
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php 
      $cats = mysqli_query($conn,"SELECT * FROM category");

      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header">
           <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input class="form-control" name="search_name" placeholder="Nhập tên tìm kiếm...">
            </div>
            <button type="submit" class="btn btn-primary">Tìm</button>
            <a href="category-add.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
         
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($cats as $cat) { ?>
              <tr>
                <td><?php echo $cat['id'] ?></td>
                <td><?php echo $cat['name'] ?></td>
                <td>
                <?php if($cat['status'] == 1) : ?>
                  <span>Hiển thị</span>
                <?php else: ?>
                   <span>Ẩn</span>
                <?php endif; ?>
                </td>
                <td>
                  <?php echo date('d-m-Y',strtotime($cat['created_at'])) ?>
                </td>
                <td>
                  <a href="category-edit.php?id=<?php echo $cat['id']; ?>" class="btn btn-xs btn-success">Sửa</a>
                  <a href="category-delete.php?id=<?php echo $cat['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc không')">Xóa</a>
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