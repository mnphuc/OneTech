<?php include 'header.php';
 $id=isset($_GET['id'])?$_GET['id']:0;
 $status=isset($_GET['status'])?$_GET['status']:0;
 mysqli_query($conn,"UPDATE orders SET status=$status WHERE id=$id");
 header('location:order_detail.php?id='.$id);
 ?>
  
