<?php include_once("navbar.php");

$sql="SELECT * FROM `order_detail`,`order_done`,`user`,`products`,`status` WHERE order_detail.ORDER_ID=order_done.OR_ID AND order_detail.U_ID=user.USER_ID AND products.PRO_ID=order_done.PRO_ID AND order_detail.Status=status.S_ID;";
$result=$con->query($sql);
?>

<link href="css/datatables.css" type="text/css" rel="StyleSheet" />

<link href="css/datatables.min.css" type="text/css" rel="StyleSheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/jquery.dataTables.min.js"></script>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
		<div  class="col-sm-9">
		<table id="zero_config" class="table table-bordered table-hover table-responsive table-dark">
		<thead>
														<tr>
	
															<th>Order ID</th>
															<th>Order Date</th>
															<th>Order Email</th>
															<th>Order Name</th>
															<th>Order Price</th>
															<th>Order Total</th>
															<th>Order Quantity</th>
															<th>Order Image</th>
															<th>Order Status</th>
															
															<th>Action</th>
														</tr>
														</thead>
														<tbody>
													<?php foreach($result as $row){?>
													<tr>
														
														
													
															<td><?php echo $row['ORDER_ID']?></td>
															<td><?php echo $row['ORDER_DATE']?></td>
															<td><?php echo $row['USER_EMAIL']?></td>
															<td><?php echo $row['PRO_NAME']?></td>
															<td><?php echo $row['PRO_PRICE']?></td>
															<td><?php echo $row['ORDER_COST']?></td>
															<td><?php echo $row['PRO_QTY']?></td>

															<td><img src="../<?php echo $row['PRO_IMAGE']?>" width="100" height="100" /></td>
															<td><?php echo $row['S_Name']?></td>
														<td><button class="btn btn-danger" onClick="orderdone('<?php echo $row['ORDER_ID']; ?>',<?php echo $row['U_ID']?>)">Order Done</button>
															<button class="btn btn-danger" onClick="deletee('<?php echo $row['ORDER_ID']; ?>')">Delete</button></td>
														</tr>
													<?php } ?>
													</tbody>
												<tfoot>
												<th>Order ID</th>
															<th>Order Date</th>
															<th>Order Email</th>
															<th>Order Name</th>
															<th>Order Price</th>
															<th>Order Total</th>
															<th>Order Quantity</th>
															<th>Order Image</th>
															<th>Order Status</th>
															
															<th>Action</th>
												
												
												</tfoot>
													
														
													
													</table>
													</div>
													<div class="col-sm-3">
													<div id="DetailShow">


</div>
</div>

</div>


	</div>
	
	
</div>

<script>


			$(document).ready(function(){
				$("#DetailShow").hide();
				$("#zero_config").DataTable();

			})
				function ShowDetail(id){
					var iddd=id;
					var row='';
				
					$.get("AjaxOperation.php",{method:'selectOrderDetail',oid:iddd},function(data){

						var jsondata=JSON.parse(data);
						row+=jsondata.QUANTITY;
						alert(row);
						// $.each(jsondata,function(i,j){
						// 	row+='<p>'+j.QUANTITY+'</p>';
						// })

						$("#DetailShow").append(row);
					})




					
						

				}

				function hideDetail(){
					$("#DetailShow").hide();
				

}

	   			function deletee(id){
					var idd=id;
				
					
					$.ajax({
						
						type:"POST",
						url:"AjaxOperation.php",
						data:{orderid:id,method:'deleteOrder'},
						success:function(data){
							alert(data);
							window.location.reload();
						}
						
						
					})
					
					
				}
	
	
		function orderdone(oid,uid){
			
			var idd=oid;
	

			var uidd=uid;
			$.ajax({
				
						type:"POST",
						url:"AjaxOperation.php",
						data:{orderID:oid,uid:uidd,method:'OrderDone'},
						success:function(data){
							alert(data);
							window.location.reload();
						}
				
				
				
				
			})
			
			
			
		}
		
		
	
	   
	   </script>




<?php include_once("footer.php")?>
