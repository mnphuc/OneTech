  <?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết đơn hàng
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <?php 
        
         $order_id=isset($_GET['id'])?$_GET['id']:0;
         //Thông tin đơn hàng
         $sql_od="SELECT o.id,o.created_at,o.status,u.name,u.email,u.phone,u.address,SUM(dt.price*dt.quantity) AS 'total' FROM orders o JOIN order_detail dt ON o.id=dt.order_id JOIN users u ON o.user_id=u.id   WHERE o.id=$order_id GROUP BY o.id,o.created_at,o.status,u.name,u.email,u.phone,u.address";
         $res=mysqli_query($conn,$sql_od);
         $od=mysqli_fetch_assoc($res);
         //Chi tiết đơn hàng
        
         ?>

      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <h4>Thông tin đơn hàng</h4>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td><?php echo $od['id']; ?></td>
                  </tr>
                  <tr>
                    <td>Ngày đặt</td>
                    <td><?php echo $od['created_at']; ?></td>
                  </tr>
                  <tr>
                    <td>Tổng tiền</td>
                    <td><?php echo number_format($od['total']);?></td>
                  </tr>
                  <tr>
                    <td>Trạng thái</td>
                    <td>
                    <?php if($od['status']==2): ?>
                        <span class="label label-primary">Đã giao hàng</span>
                        <?php elseif($od['status']==1): ?>
                        <span class="label label-success">Đã duyệt</span>
                        <a href="order_status.php?id=<?php echo $od['id']; ?>&status=0" class="label label-danger">Bỏ duyệt</a>
                        <a href="order_status.php?id=<?php echo $od['id']; ?>&status=2" class="label label-warning">Đã giao hàng</a>
                      <?php else: ?>
                        <span class="label label-danger">Chưa phê duyệt</span>
                        <a href="order_status.php?id=<?php echo $od['id']; ?>&status=1" class="label label-success">Duyệt</a>
                        <?php endif; ?>
                                        
                    </td>
                  </tr>
              
                </tbody>
              </table>
            </div>
            <div class="col-md-4">
              <h4>Thông tin người mua</h4>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Họ tên</td>
                    <td><?php echo $od['name']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $od['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $od['address']; ?></td>
                  </tr>
              
                </tbody>
              </table>
            </div>
            <div class="col-md-4">
              <?php 
              $receiver="SELECT * FROM receiver WHERE id=$order_id";
              $receive=mysqli_query($conn,$receiver);
              $rec=mysqli_fetch_assoc($receive);
               ?>
              <h4>Thông tin người nhận</h4>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Họ tên</td>
                    <td><?php echo $rec['name']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $rec['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td><?php echo $rec['phone']; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $rec['address']; ?></td>
                  </tr>
                  <tr>
                    <td>Payment method</td>
                    <td>
                      <?php if($rec['payment_method'] == 2) : ?>
                  <span>Ship COD</span>
                <?php else: ?>
                   <span>Payment on delivery</span>
                <?php endif; ?>
                    </td>
                  </tr>
                   
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-body">
          <h4>Chi tiết các sản phẩm</h4>
          <?php 
          
          $sql="SELECT dt.quantity,dt.price,p.name,p.image FROM order_detail dt JOIN product p ON dt.product_id=p.id WHERE dt.order_id=$order_id";
          $order_detail=mysqli_query($conn,$sql);

           ?>
         <table class="table table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ảnh</th>
              <th>Tên</th>
              <th>Giá</th>
              <th>Số lượng</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($order_detail as $k => $dt) : ?>
              <tr>
                <td><?php echo $k+1; ?></td>
                <td>
                  <img src="../images/<?php echo $dt['image']; ?>" width="50">
                </td>
                <td><?php echo $dt['name']; ?></td>
                <td><?php echo $dt['price']; ?></td>
                <td><?php echo $dt['quantity']; ?></td>
              </tr>
            <?php endforeach; ?>
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