   <?php 
if (!empty($_POST)) {
  $username=$_POST['inputUsernameS'];
  $name=$_POST['inputNameS'];
  $email=$_POST['inputEmail'];
  $phone=$_POST['inputPhone'];
  $address=$_POST['inputAdd'];
  $birthday=$_POST['Bir'];
  $password=$_POST['inputPasswordS'];
  $sql="INSERT INTO users(username,name,email,phone,address,birthday,password) VALUES ('$username','$name','$email','$phone','$address',' $birthday','$password') ";
  if (mysqli_query($conn,$sql)) {
    header('location: index.php');
    }else{
      echo 'lỗi';
        }
} 
 ?>