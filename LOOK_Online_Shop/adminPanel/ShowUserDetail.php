<?php include_once("navbar.php");

$sql="SELECT *FROM user";
$result=$con->query($sql);

?>
		<!--left-fixed -navigation-->
		
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

            <center><h2>User Detail</h2></center>
                <table class="table table-bordered table-hover table-responsive table-dark">
                    <tr>
                        <th>USER ID</th>
                        <th>USER NAME</th>
                        <th>USER EMAIL</th>
                        <th>USER CONTACT</th>
                        <th>USER PASSWORD</th>
                        <th>ROLE ID</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php foreach($result as $row){?>
                        <tr>
                        <td><?php echo $row['USER_ID']?></td>
                        <td><?php echo $row['USER_NAME']?></td>
                        <td><?php echo $row['USER_EMAIL']?></td>
                        <td><?php echo $row['USER_CONTACT']?></td>
                        <td><?php echo $row['USER_PASS']?></td>
                        <td><?php echo $row['ROLE_ID']?></td>
                        <td>
                            <a class="btn btn-info" href="updateuser.php?id=<?php echo $row['USER_ID']?>">Update</a>
                            <button class="btn btn-danger" onclick="deleteee(<?php echo $row['USER_ID']?>)" value="<?php echo $row['USER_ID']?>">Delete</button>
                            
                    </td> 
                        </tr>
                    
                    <?php } ?>
                </table>
			</div>
        	<div class="clearfix"> </div>
		</div>
        
        	
<script>

function deleteee(id){

    var idd=id;
        $.ajax({

            type:"POST",
            url:"AjaxOperation.php",
            data:{userid:id},
            success:function(data){
                alert(data);
            }




        })




}



</script>


<?php include_once("footer.php")?>
		
			