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
              $email = $_POST['email'];
              $username = $_POST['username'];
              $phone = $_POST['phone'];
              $address = $_POST['address'];
              $gender = $_POST['gender'];
              $birthday = $_POST['birthday'];
              $password = $_POST['password'];
              

              $sql = "INSERT INTO users(name,username,email,phone,address,gender,birthday,password) VALUES('$name','$username','$email','$phone','$address','$gender','$birthday','$password')";

              if (mysqli_query($conn,$sql)) {
                header('location: customer.php');
              }else{
                echo "Có lỗi thêm mới";
                echo $_POST['gender'];
              }
            }

          ?>
          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên khách hàng</label>
              <input class="form-control" name="name" placeholder="Tên khách hàng..">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input class="form-control" name="username" placeholder="Tên khách hàng..">
            </div>
            <div class="form-group" >
              <label for="">Email</label>
              <input type="text" name="email"  class="form-control">
            </div>
            <div class="form-group"   class="form-control">
              <label for="">Phone</label>
              <input type="text" name="phone"  class="form-control">
            </div>
            <div class="form-group"  >
              <label for="">Address</label>
              <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Giới tính</label>
              <div class="radio">
                <label>
                  <input type="radio" name="gender"  value="1" checked >
                  Nam
                </label>
                <label>
                  <input type="radio" name="gender"  value="0" >
                  Nữ
                </label>
              </div>
            </div>
            <div class="form-group" style="padding-top: 20px;">
              <label for="">Birthday</label>
              <input type="date" name="birthday" style="margin-left:10px;" class="form-control">
            </div>
            <div class="form-group"  style="padding-top: 20px;">
              <label for="">Password</label>
              <input type="text" name="password" style="margin-left:3px;" class="form-control">
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