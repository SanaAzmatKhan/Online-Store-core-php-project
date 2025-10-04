<?php include_once("navbar.php");
$sql = "SELECT *FROM category";
$result = $con->query($sql);
?>
<div id="page-wrapper">
	<div class="container">
		<div></div>
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title">
				<h4>Add Sub Category :</h4>
			</div>
			<div class="form-body">
				<form>
					<div class="form-group">
						<label>Enter The Sub Category Name</label>
						<input type="text" name="sub_cat_name" style="width: 50%;" class="form-control" id="sub_cat_name" />
					</div>
					<div class="form-group">
						<label>Select the Category Name</label>
						<select id="cat" class="form-control" style="width: 50%;">
							<?php foreach ($result as $row) { ?>
								<option value="<?php echo $row['ID'] ?>"><?php echo $row['NAME'] ?></option>

							<?php } ?>
						</select>
					</div>
					<button onClick="Insert();" class="btn btn-success">Insert</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function Insert() {
		var scname = $("#sub_cat_name").val();
		var dropdownid = $("#cat").val();
		$.ajax({
			type: "POST",
			url: "AjaxOperation.php",
			data: {
				subcatname: scname,
				catid: dropdownid,
				method: 'insertsubcat'
			},
			success: function(data) {
				alert(data);
			}
		})
	}
</script>
<?php include_once("footer.php") ?>