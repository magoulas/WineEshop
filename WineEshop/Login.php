<?php
// Start the session
session_start();
?>
<html>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<?php
	if(isset($_POST['Login'])){
		$data_missing = array();
		if(empty($_POST['Username'])){
			
			// Adds Username to array
			$data_missing[] = 'Username';
	
		} else {
 
			// Trim white space from the Username and store the Username
			$Username = trim($_POST['Username']);
 
		}
		if(empty($_POST['Password'])){
			
			// Adds Password to array
			$data_missing[] = 'Password';
	
		} else {
 
			// Trim white space from the Password and store the Password
			$Password = trim($_POST['Password']);
 
		}
		if(empty($data_missing)){
			require_once('../mysqli_connect.php');
			$query = "SELECT Username, Password, Cid, Isa, Dept FROM client WHERE Username = '$Username'";
			$response = @mysqli_query($dbc, $query);
				if($response){
							$row = mysqli_fetch_array($response);
							//$query1 = "SELECT Password, cid FROM clients WHERE Username = $Username";
							//$response1 = @mysqli_query($dbc, $query);
							//$row1 = mysqli_fetch_array($response1);
							if($row['Password'] == $Password){
								echo "Login Successfull<br>";
								$_SESSION["Username"] = $Username;
								$_SESSION["Cid"] = $row['Cid'];
								$_SESSION["Isa"] = $row['Isa'];
								$_SESSION["Dept"] = $row['Dept'];
								mysqli_close($dbc);
							}else{
								echo "Wrong Password<br />";
								mysqli_close($dbc);
							}
				}else{
					echo 'Error Occurred<br />';
					echo mysqli_error($dbc);
					mysqli_close($dbc);
				}
		}else{
			 echo 'You need to enter the following data<br />';
        
			foreach($data_missing as $missing){
				
				echo "$missing<br />";
            
			}
			mysqli_close($dbc);
		}
	}
?>
<body>
<html>