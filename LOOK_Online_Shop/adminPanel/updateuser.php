<?php include_once("navbar.php");
$u_id=$_GET['id'];

$sql="SELECT *FROM user where USER_ID=".$u_id;
$result=$con->query($sql);
$obj=$result->fetch_object();

?>


<div id="page-wrapper">
	<div class="container">
		<div class="row">
            <h3>Update USER</h3>
            <br/>
            <div class="col-sm-5">
        <form method="post">

            
        <label>USER ID</label>
            <input type="text" class="form-control" id="txt_id" value="<?php echo $obj->USER_ID?>" disabled />
            <br/>
            <label>USER Name</label>
            <input type="text" class="form-control" id="txt_name" value="<?php echo $obj->USER_NAME?>" />
            <br/>

            <label>USER Email</label>
            <input type="text" class="form-control" id="txt_email" value="<?php echo $obj->USER_EMAIL?>" />
            <br/>


            <label>USER Password</label>
            <input type="text" class="form-control" id="txt_pass" value="<?php echo $obj->USER_PASS?>" />
            <br/>

            <label>User Contact</label>
            <input type="text" class="form-control" id="txt_contact" value="<?php echo $obj->USER_CONTACT?>" />
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
    var email=$('#txt_email').val();
    var pass=$('#txt_pass').val();
    var contact=$('#txt_contact').val();



    $.ajax({
        type:"POST",
        url:"AjaxOperation.php",
        data:{userid:idd,username:namee,useremail:email,usercontact:contact,userpassword:pass,method:'userupdate'},
        success:function(data){
            alert("Successfully Updated");
        }


    })


}

</script>

