<?php include_once("navbar.php");
$pro_id=$_GET['id'];

$sql="SELECT *FROM products where PRO_ID=".$pro_id;
$result=$con->query($sql);
$obj=$result->fetch_object();

?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
            <h3>Update Product</h3>
            <br/>
            <div class="col-sm-5">
        <form method="post">

            
        <label>Product ID</label>
            <input type="text" class="form-control" id="txt_id" value="<?php echo $obj->PRO_ID?>" disabled />
            <br/>
            <label>Product Name</label>
            <input type="text" class="form-control" id="txt_name" value="<?php echo $obj->PRO_NAME?>" />
            <br/>

            <label>Product Price</label>
            <input type="text" class="form-control" id="txt_price" value="<?php echo $obj->PRO_PRICE?>" />
            <br/>


            <button class="btn btn-info" onclick="updatee();">Update</button>
        </form>
        </div>




</div>
</div>
</div>

<script>
function updatee(){

    var idd=$('#txt_id').val();
    var namee=$('#txt_name').val();
    var price=$('#txt_price').val();

    $.ajax({
        type:"POST",
        url:"AjaxOperation.php",
        data:{proid:idd,proname:namee,proprice:price,method:'updatepro'},
        success:function(data){
            alert("Successfully Updated");
        }


    })


}

</script>

