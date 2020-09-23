<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới quản trị viên
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          $image = '';

        if (!empty($_FILES['image']['name'])) {
          $f = $_FILES['image'];
          $f_name = time().'-'.$f['name'];

          if (move_uploaded_file($f['tmp_name'], 'public/images/'.$f_name)) {
            $image = $f_name;
          }
        }

          if (!empty($_POST)) {
            $name=$_POST['name'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $birthday=$_POST['birthday'];
            $address=$_POST['address'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];    
            $sql="INSERT INTO users(name,username,email,phone,birthday,address,password,group_name,image) VALUES('$name','$username','$email','$phone','$birthday','$address','$password','admin','$image')";
            if (mysqli_query($conn,$sql)) {
              header('location:admin.php');
            }else{
              echo '<div class="alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <strong>Error!</strong> Có lỗi thêm mới...
           </div>';
            }
            
          }

           ?>
           
          
          <form action="" method="POST" role="form" enctype="multipart/form-data">
         
          
            <div class="form-group">
              <label for="">Fullname</label>
              <input type="text" name="name" class="form-control" id="" placeholder="Nhập họ tên...">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control" id="" placeholder="hoangtrung9937">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" class="form-control" id="" placeholder="phamhaianh037@gmail.com">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" name="phone" class="form-control" id="" placeholder="0988974952">
            </div>
            <div class="form-group">
              <label for="">Birhday</label>
              <input type="date" name="birthday" class="form-control" id="" >
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" name="address" class="form-control" id="" >
            </div>
            <div class="form-group">
              <label for="">Avatar</label>
              <input type="file" name="image" class="form-control" id="" >
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Confirm-Password</label>
              <input type="password" name="confirm_password" class="form-control" id="" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>