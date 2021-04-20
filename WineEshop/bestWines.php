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
$query = "SELECT Name,Color,Type,Winery FROM wine ORDER BY Stock ASC LIMIT 10 ";
$response = @mysqli_query($dbc, $query);
if($response){
		echo nl2br("\n<strong>Wine Info</strong>\n");
          while($row = mysqli_fetch_array($response)){
              echo '<tr><td align="left">'  
              ."<strong>Name:</strong>".$row['Name'] ." ". '</td><td align="left"><br />' 
			  ."<strong>Color:</strong>".$row['Color'] ." ". '</td><td align="left"><br />'
			  ."<strong>Type:</strong>".$row['Type'] ." ".'</td><td align="left"><br />'
			  ."<strong>Name:</strong>".$row['Winery'] ." ". '</td><td align="left"><br />'
              .'</td><br />';
	}
}
?>