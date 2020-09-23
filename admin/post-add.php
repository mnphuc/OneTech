<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới banner
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

          if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
            $image = $f_name;
          }
            // die;
        }
       
            if (isset($_POST['name'])) {
              $name = $_POST['name'];
              
              $description=$_POST['description'];
               $status = $_POST['status'];

              $sql = "INSERT INTO post(name,image,description,status) VALUES('$name','$image','$description','$status')";

              if (mysqli_query($conn,$sql)) {
                header('location: post.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST" class="form" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên tin tức</label>
              <input class="form-control" name="name" placeholder="Tên tin tức..">
            </div>
            <div class="form-group">
              <label for="">Ảnh </label>
              <input class="form-control" type="file" name="image">
            </div>
            
            <div class="form-group">
              <label for="">Mô tả</label>
              <textarea name="description" class="form-control" rows="3" placeholder="Nhập nội dung mô tả"></textarea>
           </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="status"  value="1" checked>
                  Hiển thị
                </label>
                <label>
                  <input type="radio" name="status"  value="0">
                  Ẩn
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