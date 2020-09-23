<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QL sản phẩm
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header">
           <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input class="form-control" name="search_name" placeholder="Nhập tên tìm kiếm...">
            </div>
            <button type="submit" class="btn btn-primary">Tìm</button>
            <a href="product-add.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
         <?php 
          $limit=10;
          $sql_total=mysqli_query($conn,"SELECT id FROM product");
          $total=mysqli_num_rows($sql_total);
          $pages=ceil($total/$limit);
          $page=isset($_GET['page']) ? $_GET['page'] : 1;
          $start=($page-1)*$limit;
          $sql  = "SELECT p.*,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id  ORDER BY id DESC LIMIT $start,$limit";
          $products = mysqli_query($conn,$sql);
          ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($products as $pro) { ?>
              <tr>
                <td><?php echo $pro['id'] ?></td>
                <td>
                  <img src="../images/<?php echo $pro['image'] ?>" alt="" width="50">
                </td>
                <td><?php echo $pro['name'] ?></td>
                <td><?php echo $pro['cat_name'] ?></td>
                <td>
                <?php if($pro['status'] == 1) : ?>
                  <span>Hiển thị</span>
                <?php else: ?>
                   <span>Ẩn</span>
                <?php endif; ?>
                </td>
                <td>
                  <?php echo date('d-m-Y',strtotime($pro['created_at'])) ?>
                </td>
                <td>
                  <a href="product-edit.php?id=<?php echo $pro['id']; ?>" class="btn btn-xs btn-success">Sửa</a>
                  <a href="product-delete.php?id=<?php echo $pro['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc không')">Xóa</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <nav aria-label="Page navigation example" style="text-align: center">
              <ul class="pagination ">
                <li class="page-item"><a class="page-link" href="?page=<?= ($page-1) ?>">Previous</a></li>
                <?php for ($p = 1; $p <= $pages ; $p++) { ?>        
                <li class="page-item <?php if ($p==$page) { echo 'active'; } ?>"><a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a></li>
                  <?php } ?>
                <li class="page-item"><a class="page-link" href="?page=<?= ($page+1) ?>">Next</a></li>
              </ul>
            </nav>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>