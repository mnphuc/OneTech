	<?php 
	include 'global/connect.php';
	// $img_or=mysqli_query($conn,"SELECT * FROM product_image");
	// print_r($img_or);
	// $ig=mysqli_fetch_all($img_or,MYSQLI_ASSOC);
 	//print_r($ig);
	$pro=mysqli_query($conn,"SELECT id FROM product");
	$pr=mysqli_fetch_all($pro,MYSQLI_ASSOC);
	// print_r($pr);
	$id=1000;
	$flag=false;
	for ($i = 0; $i < mysqli_num_rows($pro); $i++) {
		if (in_array($id, $pr[$i])) {
			$flag=true;
			break;
		}
	}
	var_dump($flag);

	 ?>