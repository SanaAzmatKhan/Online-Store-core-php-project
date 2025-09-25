<?php include_once("navbar.php");

$sql="SELECT *FROM products";
$result=$con->query($sql);
?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
		<table class="table table-responsive table-bordered">
														<tr>
															<th>PRO ID</th>
															<th>PRO NAME</th>
															<th>PRO PRICE</th>
															<th>PRO IMAGE</th>
															<th>PRO SUB CAT ID</th>
															<th>Action</th>
														</tr>
													<?php foreach($result as $row){?>
													<tr>
															<td><?php echo $row['PRO_ID']?></td>
															<td><?php echo $row['PRO_NAME']?></td>
															<td><?php echo $row['PRO_PRICE']?></td>
															<td style="width: 20%;"><img src="<?php echo $row['PRO_IMAGE']?>" width="100%" height="120px"/></td>
															<td><?php echo $row['SUB_C_ID']?></td>
															
															
														
														
																<td>
																<a class="btn btn-info" href="updateProduct.php?id=<?php echo $row['PRO_ID']?>">Update</a>
																
																<button class="btn btn-danger" onClick="deletee(<?php echo $row['PRO_ID']?>)">Delete</button>
																
																</td>
														</tr>
													<?php } ?>
													
													</table>
</div>
	</div>
	
	
</div>


<script>
	   
	   			function deletee(id){
					var idd=id;
				
					alert(idd);
					
					$.ajax({
						
						type:"POST",
						url:"AjaxOperation.php",
						data:{pro_id:id,method:'deletepro'},
						success:function(data){
							alert(data);
							window.location.reload();
						}
						
						
					})
					
					
				}
	   
	   </script>
</body>
</html>