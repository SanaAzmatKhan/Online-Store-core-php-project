<?php include_once("navbar.php")?>
	

<div id="page-wrapper">
<div class="container">
	<div></div>
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Category :</h4>
						</div>
						<div class="form-body">
						
							
							<form>
														<div class="form-group">
														<label>Enter The Category Name</label>
														<input type="text" name="cat_name" style="width: 50%;" class="form-control" id="cat_name"/>
														</div>
														<button onClick="Insert();" class="btn btn-success">Insert</button>
													
													</form>
							
						</div>
					</div>
	
</div>
</div>

<script>
		   							function Insert(){
										
										var cname=$("#cat_name").val();
										
										$.ajax({
											
											type:"POST",
											url:"AjaxOperation.php",
											data:{catname:cname,method:'insertcat'},
											success:function(data){
												alert(data);
											}
											
											
										})
										
										
									}
		   
		   
		   					</script>
	
</body>
</html>