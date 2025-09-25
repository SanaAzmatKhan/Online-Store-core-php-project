<?php

include_once('dbconnection.php');

extract($_REQUEST);



if($_POST['method']=='deleteuser'){
	$id=$_POST['id'];
	$sql="DELETE FROM user where USER_ID=".$id;
	$result=$con->query($sql);
	if($result==TRUE){
		echo "<script>alert('Delete Success')</script>";
	}
	else{
		echo "<script>alert('Delete Failed')</script>";
	}
	
}


if($_POST['method']=='deletecat'){
	
$cat_id=$_POST['cat_id'];

	$sql2="DELETE FROM category where ID=".$cat_id;
	$result2=$con->query($sql2);
	if($result2==TRUE){
		echo "Delete Success";
	}
	else{
		echo "Delete Failed";
	}
	
}

if($_POST['method']=='deletepro'){
	
$prod_id=$_POST['pro_id'];

	$sql2="DELETE FROM products where PRO_ID=".$prod_id;
	$result2=$con->query($sql2);
	if($result2==TRUE){
		echo "Delete Success";
	}
	else{
		echo "Delete Failed";
	}
	
}



if($_POST['method']=='deletesubcat'){
	
$sub_cat_id=$_POST['sub_cat_id'];

	$sql="DELETE FROM sub_catagory where SUB_CAT_ID=".$sub_cat_id;
	$result=$con->query($sql);
	if($result==TRUE){
		echo "Delete Success";
	}
	else{
		echo "Delete Failed";
	}
	
}

if($_POST['method']=='insertcat'){
	
	$cat_name=$_POST['catname'];
	$sql="INSERT INTO category VALUES(0,'$cat_name',0)";
	$result=$con->query($sql);
	if($result==TRUE){
		echo "<script>alert('Insert Successfully')</script>";
		
	}
	else{
		echo "<script>('FAILED')</script>";
	}
	
}


if($_POST['method']=='selectOrderDetail'){
	$ordeid=$_POST['oid'];
	$sql="SELECT *FROM order_detail where ORDER_ID=".$ordeid;
	$result=$con->query($sql);
	echo json_encode($result);

}



if($_POST['method']=='insertsubcat'){
	
	$sub_cat_name=$_POST['subcatname'];
	$catid=$_POST['catid'];
	$sql="INSERT INTO sub_catagory VALUES(0,'$sub_cat_name',$catid,0)";
	$result=$con->query($sql);
	if($result==TRUE){
		echo "<script>alert('Insert Successfully')</script>";
		
	}
	else{
		echo "<script>alert('FAILED')</script>";
	}
	
}

if($_POST['method']=='deleteOrder'){
	
	$orderid=$_POST['orderid'];
	$sql="DELETE FROM order_detail where ORDER_ID=".$orderid;
	$result=$con->query($sql);
	if($result==TRUE){
		echo "<script>alert('Deleted Successfully')</script>";
		
	}
	else{
		echo "<script>alert('FAILED')</script>";
	}
	
}
require 'PHPMailer\PHPMailerAutoload.php';
		

if($_POST['method']=='OrderDone'){
	
	$order_ID=$_POST['orderID'];
	$uid=$_POST['uid'];
	
	$sql2="SELECT *FROM user where USER_ID=".$uid;
	
	$result2=$con->query($sql2);
	
	foreach($result2 as $row2){
		$email=$row2['USER_EMAIL'];
		break;
	}
	
	$sql344="SELECT *FROM orderdone where OR_ID=".$order_ID;
	$result43=$con->query($sql344);
	if(mysqli_num_rows($result43)>0){
		echo"<script>alert('This Order Already Done')</script>";
	}
	
	else{
	
	$sql="INSERT INTO order_done VALUES(0,$order_ID,$uid,1)";
	
	$result=$con->query($sql);
	
	if($result==true){
		echo "Order Done Successfully";
		
		
		$mail = new PHPMailer;
                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'muzammilabid958@gmail.com';                 // SMTP username
$mail->Password = 'lamborghini@123456';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->setFrom($email, 'Order Successfully Delivered');
$mail->addAddress($email);     // Add a recipient

$mail->addReplyTo($email);

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject ="Your Order Done Successfully";
$mail->Body="<div style='border:2px solid yellow;color:black;'>Your Order Number is".$order_ID."</div>";

	$mail->Body='<div style="border:2px solid yellow;color:black;">You are order</div>';

$mail->AltBody = 'message';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<script>alert("Message has been sent")</script>';
	
}
		
		
		
	}
	else{
		echo "<script>alert('Failed')</script>";
	}
	}
}




?>