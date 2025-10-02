<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<?php include_once("connection.php");
$pro_Id = $_GET['id'];

?>
<?php include_once('navbar.php') ?>

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Product <span>Detail </span></h3>
		<!--/w3_short-->
		<div class="services-breadcrumb">
			<div class="agile_inner_breadcrumb">

				<ul class="w3_short">
					<li><a href="index.html">Home</a><i>|</i></li>
					<li>Product Detail</li>
				</ul>
			</div>
		</div>
		<!--//w3_short-->
	</div>
</div>
<?php
$pquery = "select * from products where PRO_ID=$pro_Id";

$product = $con->query($pquery);
$obj = $product->fetch_object();
?>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container" id="proContainer">
		<div class="col-md-4 single-right-left ">
			<div class="thumb-image"><a><img src="<?php echo $obj->PRO_IMAGE; ?>" data-imagezoom="true" style="height:50%;width:120%" class="img-responsive" /></a></div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
			<h3><?php echo $obj->PRO_NAME; ?></h3>
			<p><span class="item_price">Price: <?php echo $obj->PRO_PRICE; ?></span></p>
			<div class="single_page_agile_its_w3ls">
				<h6>ABOUT THIS PRODUCT</h6>'
				<p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>'
			</div>
			<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
				<form action="cart.php?action=add&ID=<?php echo $obj->PRO_ID; ?>" method="post">
					<fieldset>


						<input type="submit" name="submit" value="Add to cart" class="button" />
					</fieldset>
				</form>
			</div>

		</div>
	</div>
	<div class="clearfix"> </div>

</div>
</div>
</div>
<!--//single_page-->


<?php include_once("footer.php") ?>