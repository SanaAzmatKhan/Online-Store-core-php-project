<?php include_once("navbar.php");
$sql="SELECT *FROM sub_catagory";
$result=$con->query($sql);
									
?>
	<div id="page-wrapper">
<div class="container">
	<div></div>
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Product :</h4>
						</div>
						<div class="form-body">
						
							
							<form enctype="multipart/form-data">
														<div class="form-group">
															<label>Enter The Product ID</label>
														
															<input type="text" name="product_id" style="width: 50%;" class="form-control" id="product_id"/>
														</div>
														<div class="form-group">
															<label>Enter The Product Name</label>
															<input type="text" name="product_name" style="width: 50%;" class="form-control" id="product_name"/>
														</div>
														
														<div class="form-group">
															<label>Enter The Product Price</label>
															<input type="text" name="product_price" style="width: 50%;" class="form-control" id="product_price"/>
														</div>
														
														<div class="form-group">
															<label>Select The Product Picture</label>
															<input type="file" name="product_pic" style="width: 50%;" class="form-control" id="product_pic"/>
														</div>
														
														<div class="form-group">
															<label>Select the Sub Category Name</label>
														</div>
														
														<div class="form-group">
															<select id="sub_cat" >
																<?php foreach($result as $row){?>
																	<option value="<?php echo $row['SUB_CAT_ID']?>"><?php echo $row['SUB_CAT_NAME']?></option>
																	
																<?php }?>
															</select>
														
														</div>
														
														
														
														<button onClick="Insert();" class="btn btn-success">Insert</button>
												
													</form>
							
						</div>
					</div>
	
						<script>
		   							function Insert(){
										
										var pid=$("#product_id").val();
										var pname=$("#product_name").val();
										var pprice=$("#product_price").val();
										var pfile=$("#product_pic")[0].files[0];
										
										
										var dropdownid=$("#sub_cat").val();
										
										var fdata=new FormData();
										
										fdata.append('id',pid);
										fdata.append('name',pname);
										fdata.append('price',pprice);
										fdata.append('subcid',dropdownid);
										fdata.append('pfilename',pfile);
										
										
										$.ajax({
											
											type:"POST",
											url:"ProductInsert.php",
											data:fdata,
											contentType: false, 
                    						processData: false,
											success:function(data){
												alert(data);
											}
											
											
										})
										
										
									}
		   
		   
		   					</script>
		
	
</div>
</div>
