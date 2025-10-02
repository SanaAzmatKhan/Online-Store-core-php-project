<?php
$con = mysqli_connect("localhost", "root", "", "look_online_store");

$proid = $_POST['id'];
$proname = $_POST['name'];
$proprice = $_POST['price'];
$prosubcid = $_POST['subcid'];

$propicture = $_FILES['pfilename']['name'];

$propicturetempname = $_FILES['pfilename']['tmp_name'];


$imagePath = "UploadedImage/" . $propicture;



move_uploaded_file($propicturetempname, $imagePath);

$sql = "INSERT INTO products(PRO_ID,PRO_NAME,PRO_PRICE,PRO_IMAGE,SUB_C_ID) VALUES ($proid,'$proname',$proprice,'$imagePath',$prosubcid)";
$result = $con->query($sql);
if ($result) {
	echo "Product Successfully Added";
} else {
	echo "Failed";
}
