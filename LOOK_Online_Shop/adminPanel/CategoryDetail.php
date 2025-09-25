<?php include_once("navbar.php");

$sql="SELECT *FROM category";
$result=$con->query($sql);
?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
		<table class="table table-responsive table-bordered">
														<tr>
															<th>Category ID</th>
															<th>Category Name</th>
															<th>Action</th>
														</tr>
													<?php foreach($result as $row){?>
													<tr>
															<td><?php echo $row['ID']?></td>
															<td><?php echo $row['NAME']?></td>
															<td><a href="updatecategory.php?id=<?php echo $row['ID']?>" class="btn btn-info" >Update</a>
															<button class="btn btn-danger" onClick="deletee(<?php echo $row['ID']?>)">Delete</button></td>
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
						data:{cat_id:id,method:'deletecat'},
						success:function(data){
							alert(data);
						}
						
						
					})
					
					
				}
	   
	   </script>

<?php include_once("footer.php")?>
