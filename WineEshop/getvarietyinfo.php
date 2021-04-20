<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
 
// Create a query for the database
$query = "SELECT wineID, Photo , Color , Description, Vid FROM variety GROUP BY Description";
 
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
 
// If the query executed properly proceed
if($response){
 
echo '<table align="left"
cellspacing="6" cellpadding="10">
 
<tr><td align="left"><b>wineID</b></td>
<td align="left"><b>Photo</b></td>
<td align="left"><b>Description</b></td>
<td align="left"><b>Color</b></td>
<td align="left"><b>Vid</b></td></tr>';
 
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' . 
$row['wineID'] . '</td><td align="left">' . 
$row['Photo'] . '</td><td align="left">' . 
$row['Description'] . '</td><td align="left">' . 
$row['Color'] . '</td><td align="left">'.
$row['Vid'].'</td>';
 
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