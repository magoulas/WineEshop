<html>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<?php
session_start();
require_once('../mysqli_connect.php');
$u = $_SESSION["Username"];
$query = "DELETE FROM client WHERE Username = '$u'";
$response = @mysqli_query($dbc, $query);
if($response){
	$_SESSION["Username"] = '';
	$_SESSION["Cid"] = '';
	$_SESSION["Isa"] = '';
	echo "You Have Sucessfully Closed Your Account";
	mysqli_close($dbc);
}else{
	echo 'Error Occurred<br />';
	echo mysqli_error($dbc);
	mysqli_close($dbc);
}
?>
<html>
<body>