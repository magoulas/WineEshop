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
require_once('../mysqli_connect.php');
 if(isset($_POST['submit'])){
    
    $data_missing = array();
    if(empty($_POST['Name'])){
 
        // Adds Name to array
        $data_missing[] = 'Name';
 
    } else {
 
        // Trim white space from the Name and store the FirstName
        $Name = trim($_POST['Name']);
 
    }
	if(empty($_POST['Color'])){
 
        // Adds Color to array
        $data_missing[] = 'Color';
 
    } else {
 
        // Trim white space from the Color and store the Color
        $Color = trim($_POST['Color']);
 
    }
	if(empty($_POST['Discription'])){
 
        // Adds Discription to array
        $data_missing[] = 'Discription';
 
    } else {
 
        // Trim white space from the Discription and store the Discription
        $Discription = trim($_POST['Discription']);
 
    }
	if(empty($_POST['Type'])){
 
        // Adds Type to array
        $data_missing[] = 'Type';
 
    } else {
 
        // Trim white space from the Type and store the Type
        $Type = trim($_POST['Type']);
 
    }
	if(empty($_POST['Winery'])){
 
        // Adds Winery to array
        $data_missing[] = 'Winery';
 
    } else {
 
        // Trim white space from the Winery and store the Winery
        $Winery = trim($_POST['Winery']);
 
    }
	if(empty($_POST['Stock'])){
 
        // Adds Stock to array
        $data_missing[] = 'Stock';
 
    } else {
 
        // Trim white space from the Stock and store the Stock
        $Stock = trim($_POST['Stock']);
 
    }
	if(empty($_POST['Price'])){
 
        // Adds Price to array
        $data_missing[] = 'Price';
 
    } else {
 
        // Trim white space from the Price and store the Price
        $Price = trim($_POST['Price']);
 
    }
	if(empty($_POST['WineFrom'])){
 
        // Adds WineFrom to array
        $data_missing[] = 'WineFrom';
 
    } else {
 
        // Trim white space from the WineFrom and store the WineFrom
        $WineFrom = trim($_POST['WineFrom']);
 
    }
	
	if(empty($data_missing)){
		$arr_Wid=array();
		$query = "SELECT Wid FROM wine";
		$response = @mysqli_query($dbc, $query);
		if($response){
			while($row = mysqli_fetch_array($response)){
				array_push($arr_Wid, $row);
			}
			if(!empty($arr_Wid)){    
				$Wid=max($arr_Wid);
				$wine_id=$Wid[0]+1;
			}else{
				$wine_id=1;
			}
		}
        $query1 = "INSERT INTO wine (Name, Color, Discription, Type, Winery, Wid, Stock, Price, WineFrom) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query1);
        
        mysqli_stmt_bind_param($stmt, 'sssssdids', $Name, $Color, $Discription, $Type, $Winery, $wine_id, $Stock, $Price, $WineFrom);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Wine Added';
            
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