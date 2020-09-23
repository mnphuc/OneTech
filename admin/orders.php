<?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý đơn hàng
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
         <?php 
                   
                    $sql="SELECT o.id,o.created_at,o.status,u.name,SUM(dt.price*dt.quantity) AS 'total' FROM orders o JOIN order_detail dt ON o.id=dt.order_id JOIN users u ON o.user_id=u.id  GROUP BY o.id,o.created_at,o.status,u.name ";
                    $orders=mysqli_query($conn,$sql);

                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ngày đặt</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $od) : ?>
                            <tr>
                                <td><?php echo $od['id']; ?></td>
                                <td><?php echo $od['created_at']; ?></td>
                                <td><?php echo $od['name']; ?></td>
                                <td><?php echo $od['total']; ?></td>
                                <td>
                                    <?php if($od['status']==1): ?>
                                        <span class="label label-success">Đã phê duyệt</span>
                                    <?php elseif($od['status']==2): ?>
                                        <span class="label label-primary">Đã giao hàng</span>
                                    <?php else: ?>
                                        <span class="label label-danger">Chưa phê duyệt</span>

                                    <?php endif; ?>
                                    

                                </td>
                                <td>
                                    <a href="order_detail.php?id=<?php echo $od['id']; ?>" class="label label-success">Chi tiết</a>
                                </td>
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