<?php 
	session_start();
	include 'user.php';
	$_SESSION['name']=$_POST['name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['date']=$_POST['date'];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>2nd step</title>
</head>
<body>
	
	<?php 
		$examErr= $genderErr=$bgErr = "";
		$user=new User();
	?>
	<form method="POST" action="confirm.php">
		<table>
			
			<tr>
				<td><b>Gender :</b></td>
				<td>
					<input type="radio" value="Male" name="gender"/>Male
					<input type="radio" value="Female" name="gender"/>Female
					<input type="radio" value="Other" name="gender"/>Others</td>
				<td><span style="color:red;">* <?php echo $genderErr;?></span></td>
			</tr>
			<tr>
				<td><b>Degree :</b></td>
				<td>
					<input type="checkbox" name="ssc" value="SSC"/>SSC
					<input type="checkbox" name="hsc" value="HSC"/>HSC
					<input type="checkbox" name="bsc" value="BSC"/>BSC
					<input type="checkbox" name="msc" value="MSC"/>MSC
				</td>
				<td><span style="color:red;">* <?php echo $examErr;?></span></td>
			</tr>
			<tr>
				<td><b>Blood Group :</b></td>
				<td>
					<select name="bloodGroup">
						<option value="none"></option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				</td>
				<td><span style="color:red;">* <?php echo $bgErr;?></span></td>
			</tr>
			<tr>
				<td align="center" ><input type="submit" value="Submit form" name="submit" id="sform"/></td>
				
			</tr>
			
		</table>
		
		<hr/>
		
		
		
		
		
		
		
		
		
		
	</form>
	<br><br>
	<?php
		
		/*
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if (empty($_POST["gender"])){
				$genderErr = "Gender is required";
			} 
			else {
				$user->set_gender($_POST["gender"]);
			}
			
			if (($_POST["bloodGroup"])=="none"){
				$bgErr = "BloodGroup is required";
			} 
			else {
				$user->set_bloodGroup($_POST["bloodGroup"]);
			}
			
			if (empty($_POST["ssc"]) || empty($_POST["hsc"])){
				$examErr = "SSC and HSC are requird";
			} 
			else {
				
				$examm = $_POST["ssc"].",".$_POST["hsc"];
				$user->set_exam($examm);
				if(!empty($_POST["bsc"]))
				{
					$exam =$user->$get_exam().", ".$_POST["bsc"];
					$user->set_exam($examm);
				}
					
				
				if(!empty($_POST["msc"]))
				{
					$exam =$user->$get_exam().", ".$_POST["msc"];
					$user->set_exam($examm);
				}
			}
			
			
		}
		*/
		
	?>
	
</body>
</html>