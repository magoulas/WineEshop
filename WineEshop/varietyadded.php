<html>
<head>
<title>Add Variety</title>
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
 
        // Adds name to array
        $data_missing[] = 'Name';
 
    } else {
 
        // Trim white space from the name and store the name
        $name = trim($_POST['Name']);
 
    }
 
    if(empty($_POST['Photo'])){
 
        // Adds name to array
        $data_missing[] = 'Photo';
 
    } else{
 
        // Trim white space from the name and store the name
        $photo = trim($_POST['Photo']);
 
    }

    if(empty($_POST['Description'])){
 
        // Adds name to array
        $data_missing[] = 'Description';
 
    } else{
 
        // Trim white space from the name and store the name
        $description = trim($_POST['Description']);
 
    }

    if(empty($_POST['Color'])){
 
        // Adds name to array
        $data_missing[] = 'Color';
 
    } else{
 
        // Trim white space from the name and store the name
        $Color = trim($_POST['Color']);
 
    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO variety (Name, Photo, Description, Color) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $photo, $description, $Color);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Variety Entered';
            
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