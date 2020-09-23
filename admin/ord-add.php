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
              $user_id = $_POST['user_id'];
              $status = $_POST['status'];
              
              
              

              $sql = "INSERT INTO orders(user_id,status) VALUES('$user_id','$status')";

              if (mysqli_query($conn,$sql)) {
                header('location: orders.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST">
            <div class="form-horizontal">
              <label for="">Tên thuộc tính</label>
              <input class="form-control" name="name" placeholder="Tên sản phẩmc..">
            </div>
            <div class="form-horizontal" style="padding-top: 20px;">
              <label for="">Giá trị thuộc tính</label>
              <input type="text" name="value" style="margin-left: 5px;">
            </div>
            <div class="form-horizontal"  style="padding-top: 20px;">
              <label for="">Kiểu thuộc tính</label>
              <input type="text" name="type" style="margin-left:15px;">
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