<?php 
require_once "controllers\bookUploadController.php";

?>


<html>
	<head></head>
	<body>
	    <center><img src="logo2.png"></center><br/>
		<fieldset style="width:1000px align: center" >
	    <legend align="center"><center><h1>Upload A Book</h1></center></legend>
		<br>
			 <?php
			 if(!empty($_SESSION['message'])){
				 echo $_SESSION['message'];
					 //$_SESSION['message']=""
				 }
				
			 ?>
		<br>
		<form action="" method="post">
			<table align="center">
			     <tr>
					<td><span><b>Book's Name</b>:</span></td>
					<td><input type="text" name="name" id ="name" value = "<?php echo $name;?>"><br>
					<td><span id="err_name"><font color="red"> <?php echo $err_name;?> </font></span></td>
				</tr>
				<tr>
					<td><span><b>Writter's Name</b>:</span></td>
					<td><input type="text" name="wname" id="wname" value = "<?php echo $wname;?>"><br>
					<td><span id="err_wname"><?php echo $err_wname;?></span></td>
				</tr>
				<tr>
					<td><span><b>Price</b>:</span></td>
					<td><input type="text" name="pri" id ="pri" value = "<?php echo $pri;?>"><br>
					<td><span id="err_pri"><?php echo $err_pri;?></span></td>
				</tr>
				
				<tr>
					<td><span><b>Email</b>:</span></td>
					<td><input type="text" name="email" id="email" value = "<?php echo $email;?>"><br>
					<td><span id="err_email"><?php echo $err_email;?></span></td>
				</tr>
				<tr>
				    <td><span><b>Phone</b>:</span></td>
					<td><input type="text" name="number" size="9" id="number" value="<?php echo $number;?>"><br>
					<td><span id="err_number"><?php echo $err_number;?></span></td>
				</tr>
			
				
  			
				
				
			</table>
			<br>
			<center><input type="submit" name="Register"></center>
			<br>
			
			<h5 style="text-align:center;"><a href="home_Seller.php">Home</a></h5><br>

			
			
		</form>
		</fieldset>
	</body>
		<script src="JS/Reg.js"></script>

</html>