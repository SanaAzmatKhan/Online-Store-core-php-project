
<?php
if(isset($_POST['logout'])){
  session_destroy();
  header('location:collection.php');
  }
?>

<?php include_once("navbar.php") ?>
<?php include_once("connection.php") ?>

<?php
$sub_Id=$_GET['ID'];

$sql="SELECT * FROM products where SUB_C_ID=$sub_Id";


$result=$con->query($sql);

?>


<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>LOOK'S <span>COLLECTION  </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>COLLECTION</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

<div class="banner-bootom-w3-agileits">
	<div class="container">
		<?php foreach($result as $row){?>
			<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo $row["PRO_IMAGE"]?>" style="width:100%;height:200px;" alt="" class="pro-image-front">
										<img src="<?php echo $row["PRO_IMAGE"]?>" alt="" style="width:100%;height:200px;" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.php?id=<?php echo $row['PRO_ID']?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.php"><?php echo $row["PRO_NAME"]?></a></h4>
										<div class="info-product-price">
											<span class="item_price">price: <?php echo $row["PRO_PRICE"]; ?></span>
											
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="cart.php?action=add&ID=<?php echo $row["PRO_ID"]; ?>" method="post">
																<fieldset>

																	
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
										</div>
																			
									</div>
								</div>
			</div>
		<?php } ?>
	</div>
</div>



<?php include_once("footer.php") ?>