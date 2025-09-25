<?php include_once("navbar.php");

$sql="SELECT *FROM sub_catagory";
$result=$con->query($sql);
?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
		<table class="table table-responsive table-bordered">
														<tr>
															<th>Sub Category ID</th>
															<th>Sub Category Name</th>
															<th>Category ID</th>
															<th>Action</th>
														</tr>
													<?php foreach($result as $row){?>
													<tr>
															<td><?php echo $row['SUB_CAT_ID']?></td>
															<td><?php echo $row['SUB_CAT_NAME']?></td>
															<td><?php echo $row['CAT_ID']?></td>
																<td><button class="btn btn-danger" onClick="deletee(<?php echo $row['SUB_CAT_ID']?>)">Delete</button></td>
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
						data:{sub_cat_id:id,method:'deletesubcat'},
						success:function(data){
							alert(data);
							window.location.reload();
						}
						
						
					})
					
					
				}
	   
	   </script>
</body>
</html>