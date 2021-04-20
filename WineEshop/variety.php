<?php
$id = $_GET['id'];

require_once('../mysqli_connect.php');

$query = "SELECT Description FROM variety WHERE wineID = $id"; 
$response = @mysqli_query($dbc, $query);

if($response){
 
echo '<table align="left"
cellspacing="6" cellpadding="10">
 
<tr><td align="left"><b>Description</b></td>';
 
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' .  
$row['Description'] ;
 
echo '</tr>';
}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br />";
 
echo mysqli_error($dbc);
 
}
 
// Close connection to the database
mysqli_close($dbc);
 
?>