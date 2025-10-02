<?php include_once("connection.php") ?>


<?php
if (isset($_POST['login_btn'])) {

	$name = $_POST['Name'];
	$pass = $_POST['password'];

	$q = "select * from user WHERE USER_NAME='$name' and USER_PASS='$pass'";
	$result = $con->query($q);

	$count = $result->num_rows;

	if ($count > 0) {
		$obj = $result->fetch_object();
		$_SESSION['username'] = $obj->USER_ID;
		header("Location:index.php");
	} else {

		echo '<script>alert("Log In FAiled");</script>';
	}
}

?>
<!-- 
<script>
$(document).ready(function(e){

	$('#btn').click(function(){
		if($('#name').val()!='' && $('#pass').val()!=''){
		var name=$('#name').val();
		var pass=$('#pass').val();
		$.get('class.php',{Name:name,Pass:pass,method:'login'},function(role) {

			if(role==1){
				
					window.location.href = "../index.php";
					
			}
			else if(role==2){
				window.location.href = "../admin/index.php";
				
			}
			else{
				alert('Login Failed');
			}


		});

		}

		else{
		alert('Fill All Field');

		}

	});


});

</script> -->


<?php

$sql = "SELECT * FROM category";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Look Online Shop</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="LOOK ONLINE SHOP" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<style>
		.ban-top ul li {
			float: left;
		}

		.ban-top ul li.break {
			clear: right;
		}
	</style>
</head>


<body>
	<div class="header" id="home">
		<div class="container">
			<ul>
				<?php if (isset($_SESSION['username'])) { ?>
					<form action="index.php" method="post">
						<li> <button type="submit" name="lbtn"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Log Out </button></li>
						<li> <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> My Account </a></li>
					</form>
				<?php } else { ?>
					<li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
					<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>

				<?php } ?>
				<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
			</ul>
		</div>
	</div>
	<!-- //header -->
	<!-- header-bot -->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<div class="col-md-4 header-middle">
				<form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required>
					<input type="submit" value=" ">
					<div class="clearfix"></div>
				</form>
			</div>
			<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="index.php"><img src="images/logo.png" class="logo_agile" alt=""><span>Look</span>
						<h6>ONLINE SHOP</h6><i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i>
					</a></h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-4 agileits-social top_content">
				<ul class="social-nav model-3d-0 footer-social w3_agile_social">
					<li class="share">Share On : </li>
					<li><a href="https://www.facebook.com/" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a></li>
					<li><a href="https://twitter.com/" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a></li>
					<li><a href="https://www.instagram.com/" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a></li>
					<li><a href="https://www.pinterest.com/" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a></li>
				</ul>


			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //header-bot -->
	<!-- banner -->
	<div class="ban-top">
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
								<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
								<?php foreach ($result as $row) { ?>

									<?php
									$catID = $row['ID'];
									$sql22 = "SELECT * FROM `sub_catagory` where CAT_ID=$catID";
									$result22 = $con->query($sql22);

									?>

									<li class="dropdown menu__item">
										<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row["NAME"] ?> <span class="caret"></span></a>

										<ul class="dropdown-menu multi-column columns-3">
											<div class="agile_inner_drop_nav_info">
												<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
													<a href="collection.php"><img src="images/top2.jpg" alt=" " /></a>
												</div>

												<?php $i = 0;
												foreach ($result22 as $row22) { ?>
													<?php if ($i % 2 == 1) { ?>

														<div class="col-sm-3 multi-gd-img">
															<ul class="multi-column-dropdown">
																<li><a href="collection.php?ID=<?php echo $row22["SUB_CAT_ID"] ?>"><?php echo $row22["SUB_CAT_NAME"] ?></a></li>
															</ul>
														</div>

													<?php } ?>

													<?php if ($i % 2 == 0) { ?>
														<div class="col-sm-3 multi-gd-img">
															<ul class="multi-column-dropdown">

																<li><a href="collection.php?ID=<?php echo $row22["SUB_CAT_ID"]; ?>"><?php echo $row22["SUB_CAT_NAME"]; ?></a></li>
															</ul>
														</div>
													<?php } ?>


												<?php $i++;
												} ?>



												<div class="clearfix"></div>
											</div>
										</ul>
									<?php  } ?>
									</li>

									<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>

							</ul>
						</div>
					</div>
				</nav>
			</div>
			<div class="top_nav_right">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1">
					<a class="w3view-cart btn" href="cart.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //banner-top -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="index.php" method="post" onsubmit="return login_btn();">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required>
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="password" required>
								<label>Password</label>
								<span></span>
							</div>
							<input type="submit" id="btn" name="login_btn" value="Sign In">
						</form>
						<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
							<li><a href="#" class="facebook">
									<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="twitter">
									<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="instagram">
									<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="pinterest">
									<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
								</a></li>
						</ul>
						<div class="clearfix"></div>
						<p><a href="#" data-toggle="modal" data-target="#myModal2"> Don't have an account?</a></p>

					</div>
					<div class="col-md-4 modal_body_right modal_body_right1">
						<img src="images/log_pic.jpg" alt=" " />
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required>
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required>
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="password" required>
								<label>Password</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="Confirm Password" required>
								<label>Confirm Password</label>
								<span></span>
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
							<li><a href="#" class="facebook">
									<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="twitter">
									<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="instagram">
									<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								</a></li>
							<li><a href="#" class="pinterest">
									<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
								</a></li>
						</ul>
						<div class="clearfix"></div>
						<p><a href="#">By clicking register, I agree to your terms</a></p>

					</div>
					<div class="col-md-4 modal_body_right modal_body_right1">
						<img src="images/log_pic.jpg" alt=" " />
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->


	<?php

	if (isset($_POST['lbtn'])) {
		session_destroy();
		echo "<script>window.location.href='index.php'</script>";
	}

	?>