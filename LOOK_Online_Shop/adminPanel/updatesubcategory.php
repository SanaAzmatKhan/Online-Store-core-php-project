<?php include_once("navbar.php");
$sc_id=$_GET['id'];

$sql="SELECT *FROM sub_category where SUB_CAT_ID=".$sc_id;
$result=$con->query($sql);
$obj=$result->fetch_object();

?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
            <h3>Update Sub Category</h3>
            <br/>
            <div class="col-sm-5">
        <form method="post">

            
        <label>Sub Category ID</label>
            <input type="text" class="form-control" id="txt_id" value="<?php echo $obj->SUB_CAT_ID?>" disabled />
            <br/>
            <label>Sub Category Name</label>
            <input type="text" class="form-control" id="txt_name" value="<?php echo $obj->SUB_CAT_NAME?>" />
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
        data:{scid:idd,scname:namee,method:'updatesubcate'},
        success:function(data){
            alert("Successfully Updated");
        }


    })


}

</script>

