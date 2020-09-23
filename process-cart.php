<?php 
session_start();
require 'global/connect.php';
$id=isset($_GET['id']) ? $_GET['id'] : 0;
$quantity=isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$qr=mysqli_query($conn,"SELECT * FROM product WHERE id=$id");
$action=isset($_GET['action']) ? $_GET['action'] : 'null';
$row=mysqli_fetch_assoc($qr);
if ($row) {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity']+=$quantity;
	} else {
	$_SESSION['cart'][$id]=[
		'id' => $row['id'],
		'name' => $row['name'],
		'image' => $row['image'],
		'price' => $row['sale_price'] ? $row['sale_price'] : $row['price'],
		'quantity' => $quantity,
	];
	}
	
}

if (isset($_POST['id'])) {
	$id1=isset($_POST['id']) ? $_POST['id'] : [];
	$quantity1=isset($_POST['quantity']) ? $_POST['quantity'] : [];
	for ($i = 0; $i < count($id1); $i++) {
		if (isset($_SESSION['cart'][$id1[$i]])) {
			$_SESSION['cart'][$id1[$i]]['quantity'] = $quantity1[$i];
		}
	}
}
if ($action=='delete') {
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
}
}


// print_r($_SESSION['cart']);
header('location:cart.php');
 ?>