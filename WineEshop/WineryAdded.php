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
    
    $data_missing = array();
    if(empty($_POST['Name'])){
 
        // Adds Name to array
        $data_missing[] = 'Name';
 
    } else {
 
        // Trim white space from the Name and store the FirstName
        $Name = trim($_POST['Name']);
 
    }
	if(empty($_POST['WineId'])){
 
        // Adds WineId to array
        $data_missing[] = 'WineId';
 
    } else {
 
        // Trim white space from the Color and store the Color
        $WineId = trim($_POST['WineId']);
 
    }
	if(empty($_POST['Photo'])){
 
        // Adds Photo to array
        $data_missing[] = 'Photo';
 
    } else {
 
        // Trim white space from the Photo and store the Photo
        $Photo = trim($_POST['Photo']);
 
    }
	if(empty($_POST['Info'])){
 
        // Adds Info to array
        $data_missing[] = 'Info';
 
    } else {
 
        // Trim white space from the Info and store the Info
        $Info = trim($_POST['Info']);
 
    }
	if(empty($_POST['History'])){
 
        // Adds History to array
        $data_missing[] = 'History';
 
    } else {
 
        // Trim white space from the History and store the History
        $History = trim($_POST['History']);
 
    }
	if(empty($_POST['Fax'])){
 
        // Adds Fax to array
        $data_missing[] = 'Fax';
 
    } else {
 
        // Trim white space from the Fax and store the Fax
        $Fax = trim($_POST['Fax']);
 
    }
	if(empty($_POST['Email'])){
 
        // Adds Email to array
        $data_missing[] = 'Email';
 
    } else {
 
        // Trim white space from the Email and store the Email
        $Email = trim($_POST['Email']);
 
    }
	if(empty($_POST['Phone'])){
 
        // Adds Phone to array
        $data_missing[] = 'Phone';
 
    } else {
 
        // Trim white space from the Phone and store the Phone
        $Phone = trim($_POST['Phone']);
 
    }
	
	if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO winery (Name, WineId, Photo, Info, History, Fax, Email, Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, 'sisssisi', $Name, $WineId, $Photo, $Info, $History, $Fax, $Email, $Phone);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Winery Added';
            
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