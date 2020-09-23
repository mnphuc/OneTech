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
        $link_image = '';

        if (!empty($_FILES['link_image']['name'])) {
          $f = $_FILES['link_image'];
          $f_name = time().'-'.$f['name'];

          if (move_uploaded_file($f['tmp_name'], '../images/'.$f_name)) {
            $link_image = $f_name;
          }
            // die;
        }
       
            if (isset($_POST['name'])) {
              $name = $_POST['name'];
              $link=$_POST['link'];
              $ordering=$_POST['ordering'];
               $status = $_POST['status'];

              $sql = "INSERT INTO banner(name,link_image,link,ordering,status) VALUES('$name','$link_image','$link','$ordering','$status')";

              if (mysqli_query($conn,$sql)) {
                header('location: banner.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST" class="form" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên banner</label>
              <input class="form-control" name="name" placeholder="Tên banner..">
            </div>
            <div class="form-group">
              <label for="">Ảnh banner</label>
              <input class="form-control" type="file" name="link_image">
            </div>
            <div class="form-group">
              <label for="">Link banner</label>
              <input class="form-control" name="link" placeholder="Link banner..">
            </div>
            <div class="form-group">
              <label for="">Sắp xếp</label>
              <input class="form-control" name="ordering" placeholder="Tên danh mục..">
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