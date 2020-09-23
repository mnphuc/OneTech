<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa Khách hàng
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
           $id = isset($_GET['id']) ? $_GET['id'] : 0;
           $qr=mysqli_query($conn,"SELECT * FROM users WHERE id=$id AND group_name='customer'");
           $u=mysqli_fetch_assoc($qr);
           

        
       
            if (isset($_POST['name'])) {
              $name = $_POST['name'];
              $email=$_POST['email'];
              $phone=$_POST['phone'];
    

              $sql = "UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id=$id";

              if (mysqli_query($conn,$sql)) {
                header('location: customer.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST" class="form" role="form" >
            <div class="form-group">
              <label for="">Tên khách hàng</label>
              <input class="form-control" name="name" placeholder="Tên khách hàng.." value="<?php echo $u['name']; ?> ">
            </div>
            
            
           
            <div class="form-group">
              <label for="">Email</label>
              <input class="form-control" name="email" placeholder="Email.." value="<?php echo $u['email']; ?> ">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input class="form-control" name="phone" placeholder="Số điện thoại.." value="<?php echo $u['phone'] ?> ">
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