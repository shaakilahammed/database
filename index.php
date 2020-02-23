<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>1st step</title>
</head>
<body>
	<?php 
		include 'user.php';
	?>
	<?php
	
		$user=new User();
		
		$nameErr = $emailErr = $dateErr = "";
		
		
	?>
	<form method="post" action="index2.php">
		<table>
			<tr>
				<td><b>Name :</b></td>
				<td><input type="text" name="name"/></td>
				<td><span style="color:red;">* <?php echo $nameErr;?></span></td>
			</tr>
			<tr>
				<td><b>Email :</b></td>
				<td><input type="email" name="email"/></td>
				<td><span style="color:red;">* <?php echo $emailErr;?></span></td>
			</tr>
			<tr>
				<td><b>Date of Birth :</b></td>
				<td><input type="Date" name="date"/></td>
				<td><span style="color:red;">* <?php echo $dateErr;?></span></td>
			</tr>
			<tr>
				<td align="center" colspan ="2"><input type="submit" value="Next" name="submit" id="sform"/></td>
				
			</tr>
			
			
			
		</table>
		
		<hr/>
	
	</form>
	<br><br>
	<?php
			/*
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (empty($_POST["name"])){
						$nameErr = "Name is required";
					} 
					else {
						$user->set_name($_POST["name"]);
					}
					if (empty($_POST["email"])){
						$emailErr = "Email is required";
					} 
					else {
						$user->set_email($_POST["email"]);
					}
					
					if (empty($_POST["date"])){
						$dateErr = "Date is required";
					} 
					else {
						$user->set_date($_POST["date"]);
					}
			
				}
				
				*/
			?>
	
	
</body>
</html>