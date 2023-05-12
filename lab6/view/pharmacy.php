<?php 
	session_start();
	if(isset($_SESSION['admin']))
	{
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pharmacy List</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require "include/adminhead.php"; ?>
		<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="7">
									<h1 align="center"> Pharmacy List</h1>
								</td>
							</tr>  
					        <tr>  
					            <th>PharmacyId</th> 
					            <th>Name</th>  
					            <th>Address</th>  
					            <th>Contact</th>         
					            <th><a href="">Delete</a></th>       
					        </tr>  
					            <?php   
					            include '../controller/controller.php' ;
								$data = loadPharmacy();

					            foreach($data as $row)
					            {  
					            ?>
					        <tr>
					            <td><?php echo $row['PharId'] ?></td>
					            <td><?php echo $row['PharName'] ?></td>
					            <td><?php echo $row['PharAddress'] ?></td>
					            <td><?php echo $row['PharContact'] ?></td>
					            <td><a href="">Delete</a></td>
					        </tr>
					            <?php 
					            }  
					            ?>  
					        <tr>
					        	<td colspan="7">
					        		<div class="add">
					        			<center><a href="addpharmacy.php"><button>ADD Pharmacy</button></a></center>
					        		</div>
					        		
					        	</td>
					        </tr> 

					    </table> 
					    
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
	<br><br>
	<?php include "include/footer.php"; ?>
</body>
</html>




<?php
	}
	else{
		echo "Invalid request";
	}
?>
