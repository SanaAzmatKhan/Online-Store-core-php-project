<?php include_once("navbar.php");

$sql = "SELECT *FROM order_detail";
$result = $con->query($sql);
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<table id="zero_config" class="display">
					<tr>
						<th>#</th>
						<th>Order ID</th>
						<th>Order Date</th>

						<th>Action</th>
					</tr>
					<?php foreach ($result as $row) { ?>
						<tr>

							<td><button class="btn btn-info" onclick="ShowDetail(<?php echo $row['ORDER_ID'] ?>);"><img src="images/icons8-plus-64.png" height="66px" /></button>
								<button class="btn btn-info" onclick="hideDetail();"><img src="images/icons8-minus-48.png" height="66px" /></button>
							</td>

							<td><?php echo $row['ORDER_ID'] ?></td>
							<td><?php echo $row['ORDER_DATE'] ?></td>


							<td><button class="btn btn-danger" onClick="orderdone(<?php echo $row['ORDER_ID'] ?>,<?php echo $row['U_ID'] ?>)">Order Done</button>
								<button class="btn btn-danger" onClick="deletee(<?php echo $row['ORDER_ID'] ?>)">Delete</button>
							</td>
						</tr>
					<?php } ?>


				</table>
			</div>
			<div class="col-sm-3">
				<div id="DetailShow">

					<p>tjojojo</p>

				</div>
			</div>

		</div>


	</div>


</div>

<script>
	$(document).ready(function() {
		$("#DetailShow").hide();


	})

	function ShowDetail(id) {
		var iddd = id;
		var row = '';

		$.get("AjaxOperation.php", {
			method: 'selectOrderDetail',
			oid: iddd
		}, function(data) {

			var jsondata = JSON.parse(data);
			row += jsondata.QUANTITY;
			alert(row);
			// $.each(jsondata,function(i,j){
			// 	row+='<p>'+j.QUANTITY+'</p>';
			// })

			$("#DetailShow").append(row);
		})







	}

	function hideDetail() {
		$("#DetailShow").hide();


	}

	function deletee(id) {
		var idd = id;

		alert(idd);

		$.ajax({

			type: "POST",
			url: "AjaxOperation.php",
			data: {
				orderid: id,
				method: 'deleteOrder'
			},
			success: function(data) {
				alert(data);
				window.location.reload();
			}


		})


	}


	function orderdone(oid, uid) {

		var idd = oid;

		var uidd = uid;
		$.ajax({

			type: "POST",
			url: "AjaxOperation.php",
			data: {
				orderID: oid,
				uid: uidd,
				method: 'OrderDone'
			},
			success: function(data) {
				alert(data);
				window.location.reload();
			}




		})



	}
</script>
</body>

</html>