<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới sản phẩm
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 

            if (isset($_POST['name'])) {
              $name = $_POST['name'];
              $value = $_POST['value'];
              $type = $_POST['type'];
              

              $sql = "INSERT INTO attributes(name,value,type) VALUES('$name','$value','$type')";

              if (mysqli_query($conn,$sql)) {
                header('location: product-attr.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST" class="form-inline">
            <div class="form-group">
              
              <input class="form-control" name="name" placeholder="Tên thuộc tính..">
            </div>
            <div class="form-group">
              
              <input class="form-control" type="text" name="value" placeholder="Giá trị thuộc tính...">
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="type"  value="color" checked>
                  Color
                </label>
                <label>
                  <input type="radio" name="type"  value="size">
                  Size
                </label>
              </div>
            </div>
            
            
            

            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>