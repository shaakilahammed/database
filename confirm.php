<?php 
	session_start();
	include 'user.php';
	
	$user=new User();
	$user->set_name($_SESSION['name']);
	$user->set_email($_SESSION['email']);
	$user->set_date($_SESSION['date']);
	
	
	
	if(!empty($_POST['gender']))
	{
		$user->set_gender($_POST['gender']);
	}
	$user->set_bloodGroup($_POST['bloodGroup']);
	
	
	
	if(!empty($_POST["ssc"]))
	{
		$examm =$_POST["ssc"];
		$user->set_exam($examm);
	}
	if(!empty($_POST["hsc"]))
	{
		$examm =$user->get_exam().", ".$_POST["hsc"];
		$user->set_exam($examm);
	}
	if(!empty($_POST["bsc"]))
	{
		$examm =$user->get_exam().", ".$_POST["bsc"];
		$user->set_exam($examm);
	}
					
				
	if(!empty($_POST["msc"]))
	{
		$examm =$user->get_exam().", ".$_POST["msc"];
		$user->set_exam($examm);
	}
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Confirm page</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<table>
			<tr>
				<td align="center" ><input type="submit" value="Submit form" name="submit" id="sform"/></td>
				
				<td align="center"><input type="submit" value="Submit xml" name="submit" id="sxml"/></td>
				
				<td align="center"><input type="submit" value="Submit file" name="submit" id="sfile"/></td>
				
				<td align="center"><input type="submit" value="Submit Database" name="submit" id="sdb"/></td>
				
			</tr>
			
		</table>
		
		<hr/>
	</form>
	
	<?php
		if($_POST["submit"]=="Submit form")
			{
				echo "<h3> Name :". $user->get_name()."</h3>";
				echo "<h3>Email :". $user->get_email()."</h3>";
				echo "<h3>Date of Birth :". $user->get_date()."</h3>";
				echo "<h3>Gender :". $user->get_gender()."</h3>";
				echo "<h3>Degree :". $user->get_exam()."</h3>";
				echo "<h3>Blood group :". $user->get_bloodGroup()."</h3>";
				echo "<hr/>";
			}
			
			elseif($_POST["submit"]=="Submit file")
			{
				$filename=$user->get_name().".txt";
				$myfile = fopen($filename, "w") or die("Unable to open file!");
				
				$txt = "Name :".$user->get_name()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Email :".$user->get_email()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Date of Birth :". $user->get_date()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Gender :". $user->get_gender()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Degree :". $user->get_exam()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Blood group :". $user->get_bloodGroup()."\n";
				fwrite($myfile, $txt);
				
				
				
				fclose($myfile);
				
				echo "<h2>"."Read From File"."</h2>";
				
				$myfile = fopen($filename, "r") or die("Unable to open file!");
				
				while(!feof($myfile)) {
					echo fgets($myfile) . "<br>";
				}
				fclose($myfile);
			
			}
		
			elseif($_POST["submit"]=="Submit xml")
			{
				//XML file
				$dom = new DOMDocument();

				$dom->encoding = 'utf-8';

				$dom->xmlVersion = '1.0';

				$dom->formatOutput = true;

				$xml_file_name = 'users_list.xml';

					$root = $dom->createElement('users');

					$user_node = $dom->createElement('user');

					$attr_user_id = new DOMAttr('user_id', '5467');

					$user_node->setAttributeNode($attr_user_id);
					
					

					$child_node_name = $dom->createElement('name', $user->get_name());

					$user_node->appendChild($child_node_name);
					

					$child_node_email = $dom->createElement('email', $user->get_email());

					$user_node->appendChild($child_node_email);
					
					
					$child_node_dob = $dom->createElement('email', $user->get_date());

					$user_node->appendChild($child_node_dob);
					
					
					
					$child_node_gender = $dom->createElement('email', $user->get_date());

					$user_node->appendChild($child_node_gender);
					
					$child_node_degree = $dom->createElement('email', $user->get_exam());

					$user_node->appendChild($child_node_degree);
					
					$child_node_bg = $dom->createElement('email', $user->get_bloodGroup());

					$user_node->appendChild($child_node_bg);
				

					$root->appendChild($user_node);

					$dom->appendChild($root);

				$dom->save($xml_file_name);

				echo "$xml_file_name has been successfully created";
			}
			else
			{
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "myDB";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				// Create database
				//$sql = "CREATE DATABASE myDB";
				/*$sql = "CREATE TABLE users (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30),
				email VARCHAR(30),
				dob VARCHAR(50),
				gender VARCHAR(20),
				degree VARCHAR(20),
				blood_group VARCHAR(20),
				
				reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				)";*/
				
				$sql = "INSERT INTO users (name, email, dob,degree, gender,blood_group)
				VALUES ('".$user->get_name()."','".$user->get_email()."', '".$user->get_date()."','".$user->get_exam()."', '".$user->get_gender()."','".$user->get_bloodGroup()."')";
				if ($conn->query($sql) == TRUE) 
				{
					echo "Inserted successfully";
				}
				else 
				{
					echo "Error creating database: " . $conn->error;
				}

				$conn->close();
				
			}
	?>
	
</body>
</html>