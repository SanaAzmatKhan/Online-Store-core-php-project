<?php include_once("navbar.php");

$sql="SELECT *FROM feedback";
$result=$con->query($sql);

?>
		<!--left-fixed -navigation-->
		
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

            <center><h2>COUSTOMER'S FEEDBACK</h2></center>
            <br />
                <table class="table table-bordered table-hover table-responsive table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                      
                    </tr>
                    <?php foreach($result as $row){?>
                        <tr>
                            <td><?php echo $row["NAME"]?></td>
                            <td><?php echo $row["EMAIL"]?></td>
                            <td><?php echo $row["SUBJECT"]?></td>
                            <td><?php echo $row["MESSAGE"]?></td>
                            
                        </tr>
                    
                    <?php } ?>
                </table>
			</div>
        	<div class="clearfix"> </div>
		</div>
		
<?php include_once("footer.php")?>