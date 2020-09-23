<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa sp
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
           $id = isset($_GET['id']) ? $_GET['id'] : 0;
           $qr=mysqli_query($conn,"SELECT* FROM product WHERE id=$id");
           $pro=mysqli_fetch_assoc($qr);
           $image = $pro['image'];

        if (!empty($_FILES['image']['name'])) {
          $f = $_FILES['image'];
          $f_name = time().'-'.$f['name'];

          if (move_uploaded_file($f['tmp_name'], '../images/'.$f_name)) {
            $image = $f_name;
          }
            // die;
        }
       
            if (isset($_POST['name'])) {
              $name = $_POST['name'];
              $cat_name=$_POST['cat_name'];
               $status = $_POST['status'];

              $sql = "UPDATE product SET image='$image' ,name='$name',category_id='$cat_name',status='$status',note='$note' WHERE id=$id";

              if (mysqli_query($conn,$sql)) {
                header('location: product.php');
              }else{
                echo "Có lỗi thêm mới";
              }
            }

          ?>
          <form action="" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Ảnh sp</label>
              <div class="col-md-3 thumbnail">
                <img src="../images/<?php echo $pro['image']; ?> " alt="">
              </div>
              <input  type="file" name="image" >
            </div>
             <div class="clearfix"></div>
            <div class="form-group">
              <label for="">Tên sp</label>
              <input class="form-control" name="name" placeholder="Tên sp.." value=" <?php echo $pro['name']; ?> ">
            </div>
            <div class="form-group">
              <?php 
              $cats = mysqli_query($conn,"SELECT * FROM category");

              ?>
              <label for="">Danh mục</label>
              <select name="cat_name" class="form-control" required="required">
                <option value="">Chọn danh mục</option>
                <?php foreach($cats as $c) : ?>
                  <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
          <label for="">Note</label>
            <select name="note" class="form-control">
              <option value="0">Ghi chú thêm</option>
              <option value="new">Sản phẩm new</option>
              <option value="sale">Sản phẩm có khuyến mãi</option>
               <option value="trends">Sản phầm Trends</option>
               <option value="adv">Sản phầm quảng cáo</option>
               <option value="best">Sản phầm best sale</option>
            </select>
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="status"  value="1" <?php if($pro['status']==1) echo 'checked'; ?> >
                  Hiển thị
                </label>
                <label>
                  <input type="radio" name="status"  value="0" <?php if($pro['status']==0) echo 'checked'; ?>>
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