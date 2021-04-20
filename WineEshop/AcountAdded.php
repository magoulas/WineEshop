<html>
<head>
<title>Add Account</title>
</head>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<?php
 
 if(isset($_POST['submit'])){
    require_once('../mysqli_connect.php');
    $data_missing = array();
    if(empty($_POST['FirstName'])){
 
        // Adds FirstName to array
        $data_missing[] = 'FirstName';
 
    } else {
 
        // Trim white space from the FirstName and store the FirstName
        $FirstName = trim($_POST['FirstName']);
 
    }
	if(empty($_POST['LastName'])){
 
        // Adds LastName to array
        $data_missing[] = 'LastName';
 
    } else {
 
        // Trim white space from the LastName and store the LastName
        $LastName = trim($_POST['LastName']);
 
    }
	if(empty($_POST['IBAN'])){
 
        // Adds IBAN to array
        $data_missing[] = 'IBAN';
 
    } else {
 
        // Trim white space from the IBAN and store the IBAN
        $IBAN = trim($_POST['IBAN']);
 
    }
	if(empty($_POST['Address'])){
 
        // Adds Address to array
        $data_missing[] = 'Address';
 
    } else {
 
        // Trim white space from the Address and store the Address
        $Address = trim($_POST['Address']);
 
    }
	if(empty($_POST['PhoneNumber'])){
 
        // Adds PhoneNumber to array
        $data_missing[] = 'PhoneNumber';
 
    } else {
 
        // Trim white space from the PhoneNumber and store the PhoneNumber
        $PhoneNumber = trim($_POST['PhoneNumber']);
 
    }
	if($_POST['ISA'] == 'YES'){
 
        //Do nothing (Means that he is not a Merchant)
		$ISA = 1;
    } else {
 
        // Trim white space from the ISA and store the ISA
        $ISA = 0;
 
    }
	if(empty($_POST['Password'])){
 
        // Adds Password to array
        $data_missing[] = 'Password';
 
    } else {
 
        // Trim white space from the Password and store the Password
        $Password = trim($_POST['Password']);
 
    }
	if(empty($_POST['Username'])){
 
        // Adds Username to array
        $data_missing[] = 'Username';
 
    } else {
		$u = $_POST['Username'];
		$query = "SELECT Username FROM client WHERE Username = '$u'";
		$response = @mysqli_query($dbc, $query);
		if($response){
			echo 'Username Already Taken<br />';
			$data_missing[] = 'Username';
		}else{
			// Trim white space from the Username and store the Username
        $Username = trim($_POST['Username']);
		}
        
 
    }
	if(empty($data_missing)){
        
        $query = "INSERT INTO client (FirstName, LastName, IBAN, Address, PhoneNumber, ISA, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, 'ssdsdiss', $FirstName, $LastName, $IBAN, $Address, $PhoneNumber, $ISA, $Username, $Password);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Account Created<br />';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
 }
 ?>
</form>
</body>
</html>