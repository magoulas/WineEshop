<html>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<?php
require_once('../mysqli_connect.php');
$query = "SELECT FirstName,LastName,Spent FROM client WHERE Dept=0 ORDER BY Spent DESC";
$response = @mysqli_query($dbc, $query);
if($response){
		echo nl2br("\n<strong>Client Info</strong>\n");
          while($row = mysqli_fetch_array($response)){
              echo '<tr><td align="left">'  
              ."<strong>Name:</strong>".$row['FirstName'] ." ". '</td><td align="left"><br />' 
			  ."<strong>Color:</strong>".$row['LastName'] ." ". '</td><td align="left"><br />'
			  ."<strong>Type:</strong>".$row['Spent'] ." ".'</td><td align="left"><br />'
              .'</td><br />';
	}
}
?>