<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<script src="js/jquery-3.3.1.min.js"></script>
</head>

<body >

<div class="super_container">
	<!-- Header -->
	 <?php 
ob_start();
session_start();
include 'global/connect.php';
include 'users/header-user.php';
$id = $u['id'];
if (!empty($_FILES['image']['name'])) {
          $f = $_FILES['image'];
          $f_name = time().'-'.$f['name'];
          if (move_uploaded_file($f['tmp_name'], 'users/images/'.$f_name)) {
            $image = $f_name;
            unlink('users/images/'.$u['image']);
          }
           mysqli_query($conn,"UPDATE users SET image='$images' WHERE id=$id ");
           $_SESSION['login']['image']=$image;
        }
if (isset($_POST['edit_btn'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$birthday=$_POST['birthday'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$sql=mysqli_query($conn,"UPDATE users SET name='$name', phone='$phone',email='$email',birthday='$birthday',address='$address',gender='$gender' WHERE id=$id ");
		if ($sql) {
			$_SESSION['login']['name']=$name;
			$_SESSION['login']['phone']=$phone;
			$_SESSION['login']['email']=$email;
			$_SESSION['login']['birthday']=$birthday;
			$_SESSION['login']['address']=$address;
			$_SESSION['login']['gender']=$gender;
			header('location:users.php');
		} else {
			echo 'lỗi';
		}
}
 ?>
		<div class="container">
		 <div class="panel panel-info" id="info_user">
			<div class="panel-heading">
				<h3 class="panel-title">Information Account</h3>
			</div>
			<div class="panel-body">
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4">
						<h4>Avatar</h4>
						<?php if (empty($u['image'])): ?>
							<img src="users/images/no_avatar.jpg" alt="" width="120" height="120" style="border-radius: 100%;margin-bottom: 10px">
						 	<p>You have not updated your avatar</p>
						 	<?php else :  ?>
						 		<img src="users/images/<?php echo $u['image']; ?>" alt="" width="120" height="120" style="border-radius: 100%;margin-bottom: 10px">
						<?php endif ?>
					</div>
				</div>
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4">
						<h4>Username</h4>
						<?php echo $u['username']; ?>
				</div>
				</div>
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4">
						<h4>Full name</h4>
						<?php echo $u['name']; ?>
					</div>
					<div class="col-md-4">
						<h4>Phone</h4>
						<?php echo $u['phone']; ?>
					</div>
					<div class="col-md-4">
						<h4>Email</h4>
						<?php echo $u['email']; ?>
					</div>
				</div>
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4">
						<h4>Birthday</h4>
						<?php echo $u['birthday']; ?>
					</div>
					<div class="col-md-4">
						<h4>Address</h4>
						<?php echo $u['address']; ?>
					</div>
					<div class="col-md-4">
						<h4>Gender</h4>
						<?php if ($u['gender']==1) : 
							echo 'Nam';
						else :
							echo 'nữ';
						endif;
							?>
					</div>
				</div>

			<h3 style="display: inline; margin-right: 30px;"><button type="button" class="btn btn-primary btn_edit">Edit Information</button></h3>
			<h3 style="display: inline"><button class="btn btn-primary edit_pass" >Change Password</button></h3>
			</div>
		</div>
		<div class="panel panel-info" style="display: none;" id="edit_user">
		<div class="panel-heading">
		<h3 class="panel-title">Edit Information Account</h3>
	</div>
	<div class="panel-body" >
		<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
				<div class="col-md-4">
					<h4>Avatar</h4>
					<?php if (empty($u['image'])): ?>
						<img src="users/images/no_avatar.jpg" alt="" width="120" height="120" style="border-radius: 100%;margin-bottom: 10px">
					 	<p>You have not updated your avatar</p>
					 	<input type="file" name="image" value="">
					 	<?php else :  ?>
					 		<img src="users/images/<?php echo $u['image']; ?>" alt="" width="120" height="120" style="border-radius: 100%;margin-bottom: 10px">
					 		<input type="file" name="image" value="">
					<?php endif ?>
				</div>
				</div>
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4">
						<h4>Username</h4>
						<?php echo $u['username']; ?>
						<p>You can not change Username</p>
				</div>
				</div>
		<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
			<div class="col-md-4">
				<h4>Full name</h4>
				<input type="text" name="name" value="<?php echo $u['name']; ?>"  class="form-control">
			</div>
			<div class="col-md-4">
				<h4>Phone</h4>
				<input type="text" name="phone" value="<?php echo $u['phone']; ?>"  class="form-control">
			</div>
			<div class="col-md-4">
				<h4>Email</h4>
				<input type="text" name="email" value="<?php echo $u['email']; ?>"  class="form-control">
			</div>
		</div>
		<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
			<div class="col-md-4">
				<h4>Birthday</h4>
				<input type="date" name="birthday" value="<?php echo $u['birthday']; ?>"  class="form-control">
			</div>
			<div class="col-md-4">
				<h4>Address</h4>
				<input type="text" name="address" value="<?php echo $u['address']; ?>"  class="form-control">
			</div>
			<div class="col-md-4">
				<h4>Gender</h4>
				<div class="radio">
					<label style="padding: 5px;margin: 5px">
						<input type="radio" name="gender" id="inputGender" value="1" checked="checked">
						Nam
					</label>
					<label style="padding: 5px;margin: 5px">
						<input type="radio" name="gender" id="inputGender" value="0">
						Nữ
					</label>
				</div>
			</div>
		</div>
	<button type="submit" class="btn btn-primary" name="edit_btn">Edit Information</button>
	</form>
	</div>
	
</div>
<?php 
if (!empty($_POST['cpassword'])) {
	$pass=$_POST['cpassword'];
	$newpass=$_POST['cnewpass'];
	if($pass== $u['password']) {
		mysqli_query($conn,"UPDATE users SET password='$newpass' WHERE id=$id");
		$_SESSION['login']['password']=$newpass;
	} else
	{	
		echo "
      <script>
	 $(function(){
    $('#edit_pass').show();
    $('#info_user').hide();
    });
      </script>
      ";
		$er='Old password is incorrect !';
	}
}
 ?>
<div class="panel panel-info" style="display: none;text-align: center" id="edit_pass">
		<div class="panel-heading">
		<h3 class="panel-title">Change Password</h3>
		      <?php if(isset($er)) : ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <?php echo $er; ?>
              </div>               
            <?php endif; ?>
	</div>
	<div class="panel-body" >
		<form action="" method="POST" accept-charset="utf-8">	
				<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h4>Current Password</h4>
						<input type="password" name="cpassword" value=""  class="form-control">	
						<h4>New Password</h4>
						<input type="password" name="cnewpass" value=""  id="inp" class="form-control">	
						<h4>Comfirm New Password</h4>
						<input type="password" name="crepass" value=""  id="rinp" class="form-control">	
						<div class="help-block" id="ErrorRPass" style="display: none;">
             			Retype password does not match !
            			</div>
				</div>
				<div class="col-md-4"></div>
				</div>				
	<button type="submit" class="btn btn-primary btn_change" name="pass">Change Password</button>
	</form>
	</div>
	
</div>
		</div>
	<!-- Footer -->
	<?php include 'layouts/footer.php'; ?>
</div>
<script  type="text/javascript">
	$('.btn_edit').click(function(event) {
    	$('#edit_user').show();
    	$('#info_user').hide();
    });
    $('.edit_pass').click(function(event) {
    	$('#edit_pass').show();
    	$('#info_user').hide();
    });
    $('.btn_change').click(function(event) {
      /* Act on the event */
      if ($('#inp').val()!=$('#rinp').val()) {
        $('#ErrorRPass').show(500);
          return false;
      } else {
        $('#ErrorRPass').hide(500);
      }
    });
</script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>