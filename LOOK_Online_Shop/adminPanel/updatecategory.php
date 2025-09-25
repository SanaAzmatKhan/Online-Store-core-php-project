<?php include_once("navbar.php");
$c_id=$_GET['id'];

$sql="SELECT *FROM category where ID=".$c_id;
$result=$con->query($sql);
$obj=$result->fetch_object();

?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
            <h3>Update Category</h3>
            <br/>
            <div class="col-sm-5">
        <form method="post">

            
        <label>Category ID</label>
            <input type="text" class="form-control" id="txt_id" value="<?php echo $obj->ID?>" disabled />
            <br/>
            <label>Category Name</label>
            <input type="text" class="form-control" id="txt_name" value="<?php echo $obj->NAME?>" />
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

    $.ajax({
        type:"POST",
        url:"AjaxOperation.php",
        data:{cid:idd,cname:namee,method:'updatecate'},
        success:function(data){
            alert("Successfully Updated");
        }


    })


}

</script>

