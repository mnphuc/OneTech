<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+84 1234 26 01 99</div>
						<div class="footer_contact_text">
							<p>297 Tran Cung Road, Ha Noi</p>
							<p>Ha Noi City, VN</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by Colorlib edit By Group 3 Class C1709I
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--  Đăng nhập và đăng kí -->
    <!-- Modal Đăng nhập-->
    <?php 
  if(isset($_POST['login_btn']))
  {
    $username= $_POST['inputUsername'];
    $password= $_POST['inputPassword'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' AND password = '$password' ");

    $kt = mysqli_num_rows($sql);
    if($kt==1)
    {
      $kh = mysqli_fetch_assoc($sql);
      $_SESSION['login']= $kh;
      header('location:index.php');
    }
    else
    {
      echo "
      <script>
 $(function(){
    $('#myModal').modal('show');
    });
      </script>
      ";
      $errors = 'The account or password is incorrect !';
    }
  }

  
 ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title text-center" id="myModalLabel" style="font-weight: bold;font-size: 18px;">Log In</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if(isset($errors)) : ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <?php echo $errors; ?>
              </div>               
            <?php endif; ?>
      <div class="modal-body">
      <form action="" method="POST" role="form">
          <div class="form-group row">
          <label for="inputUsername" class="col-sm-3 col-form-label" style="padding: 3px;font-size: 20px;text-align: center;">Username </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="hoangtrung9937">
            <div class="help-block" id="ErrorUserame" style="display: none;">
             Account must not be empty !
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label" style="padding: 3px;font-size: 20px;text-align:center;">Password </label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="***********">
            <div class="help-block" id="ErrorPassword" style="display: none;">
              Password can not be left blank !
            </div>
          </div>
        </div>  
        <p class="text-center">No Account ? <a href="" data-toggle="modal" data-target="#myModal1" id="btn-sign">Sign Up</a></p>        
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-default btn-log" name="login_btn"><i class="fas fa-sign-in-alt"></i> Sign In</button>
              <button type="submit" class="btn btn-primary" title="đăng nhập với Facebook"><i class="fab fa-facebook-square"></i> Facebook</button>
              <button type="submit" class="btn btn-danger" title="đăng nhập với Google"><i class="fab fa-google"></i> Google</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!--End log in-->
<!-- Modal Đăng kí-->
    <?php 
    $error = [];
if (isset($_POST['signup_btn'])) {
  $username=$_POST['inputUsernameS'];
  $name=$_POST['inputNameS'];
  $email=$_POST['inputEmail'];
  $phone=$_POST['inputPhone'];
  $address=$_POST['inputAdd'];
  $birthday=$_POST['Bir'];
  $pass=$_POST['inputPasswordS'];
  $sql="INSERT INTO users(username,name,email,phone,address,birthday,password) VALUES ('$username','$name','$email','$phone','$address',' $birthday','$pass') ";
  if (mysqli_query($conn,$sql)) {
    echo "
      <script>
 $(function(){
    $('#myModal2').modal('show');
    });
      </script>
      ";
    }
    else
    {
      echo "
      <script>
 $(function(){
    $('#myModal1').modal('show');
    });
      </script>
      ";
     if (isset($_POST['inputEmail'])) {
       $error['email'] = 'Email has been used !';
     }
     if (isset($_POST['inputUsernameS'])) {
       $error['inputUsernameS'] = 'Username has been used !';
     }
    }
} 
 ?>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title text-center" id="myModalLabel" style="font-weight: bold;font-size: 18px;">Sign Up</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <?php if(count($error)) : foreach($error as $er) : ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $er; ?>
              </div>
            <?php endforeach; endif; ?>
      <div class="modal-body">
      <form action="" method="POST" role="form">
        <div class="form-group row">
          <label for="inputNameS" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Full name </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputNameS" name="inputNameS" placeholder="Nguyễn Hoàng Trung">
            <div class="help-block" id="ErrorNameS" style="display: none;">
              Name can not be left empty !
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNameS" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Birthday </label>
          <div class="col-sm-9">
            <input type="date" class="form-control" name="Bir">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNameS" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Address </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="inputAdd" placeholder="Trần Cung, Cổ Nhuế 1, Bắc Từ Liêm, Hà Nội">
          </div>
        </div>
          <div class="form-group row">
          <label for="inputUsernameS" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Username </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUsernameS" name="inputUsernameS" placeholder="hoangtrung9937">
            <div class="help-block" id="ErrorUserameS" style="display: none;">
             Account must not be empty !
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="inputPasswordS" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Password </label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPasswordS" name="inputPasswordS" placeholder="">
            <div class="help-block" id="ErrorPasswordS" style="display: none;">
              Password can not be left blank !
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="inputRepass" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Re-Password </label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputRepass" name="inputRepass" placeholder="">
            <div class="help-block" id="ErrorRepass" style="display: none;">
              password must be the same !
            </div>
          </div>
        </div> 
        <div class="form-group row">
          <label for="inputEmail" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Email </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="trung@example.com">
            <div class="help-block" id="ErrorEmail1" style="display: none;">
              Email is not vacant !
            </div>
            <div class="help-block" id="ErrorEmail2" style="display: none;">
              Email must be in the correct format!
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="inputPhone" class="col-sm-3 col-form-label text-right" style="padding:3px;font-size: 16px;margin-top: 3px">Phone </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="01684693524">
            <div class="help-block" id="ErrorPhone1" style="display: none;">
              Phone number can not be empty!
            </div>
            <div class="help-block" id="ErrorPhone2" style="display: none;">
              The phone number must be in the correct format!
            </div>
          </div>
        </div>
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-default btn-sign" name="signup_btn"><i class="fas fa-sign-in-alt"></i> Sign Up </button>
              <p style="margin-top: 3px;font-weight: bold;color: black">OR</p>
              <button type="submit" class="btn btn-primary" title="đăng kí với Facebook"><i class="fab fa-facebook-square"></i> Facebook</button>
              <button type="submit" class="btn btn-danger" title="đăng kí với Google"><i class="fab fa-google"></i> Google</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Thành công</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--   Kết thúc đăng nhập đăng kí -->
<script type="text/javascript">
        $('#btn-sign').click(function(event) {
      $('#myModal').modal('hide');
      });
  </script>
<script type="text/javascript">
    $('.btn-log').click(function(event) {
      /* Act on the event */
      if ($('#inputUsername').val()=="") {
        $('#ErrorUserame').show(500);
          return false;
      } else {
        $('#ErrorUserame').hide(500);
      }
      if ($('#inputPassword').val()=="") {
        $('#ErrorPassword').show(500);
          return false;
      } else {
        $('#ErrorPassword').hide(500);
      }
    });
  </script>
  <script type="text/javascript">
    $('.btn-sign').click(function(event) {
    var reg_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var reg_phone = /^(09|(01[268]{1}))+([0-9]{8})$/;
      /* Act on the event */
      if ($('#inputNameS').val()=="") {
        $('#ErrorNameS').show(500);
          return false;
      } else {
        $('#ErrorNameS').hide(500);
      }
      if ($('#inputUsernameS').val()=="") {
        $('#ErrorUserameS').show(500);
          return false;
      } else {
        $('#ErrorUserameS').hide(500);
      }
      if ($('#inputPasswordS').val()=="") {
        $('#ErrorPasswordS').show(500);
          return false;
      } else {
        $('#ErrorPasswordS').hide(500);
      }
      if ($('#inputRepass').val()!=$('#inputPasswordS').val()) {
        $('#ErrorRepass').show(500);
          return false;
      } else {
        $('#ErrorRepass').hide(500);
      }
      if ($('#inputEmail').val()=="") {
        $('#ErrorEmail1').show(500);
        return false;
      } else {
        $('#ErrorEmail1').hide(500);
        if (!reg_email.test($('#inputEmail').val())) {
          $('#ErrorEmail2').show(500);
          return false;
        } else {
          $('#ErrorEmail2').hide(500);
        }
      }
       if ($('#inputPhone').val()=="") {
        $('#ErrorPhone1').show(500);
        return false;
      } else {
        $('#ErrorPhone1').hide(500);
        if (!reg_phone.test($('#inputPhone').val())) {
          $('#ErrorPhone2').show(500);
          return false;
        } else {
          $('#ErrorPhone2').hide(500);
        }
      }
    });
  </script>