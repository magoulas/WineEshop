<html>
<body>
<div>
    <a href="InfoAccount.php">
        <button  id="close" >Return to Info</button>
    </a>
</div>
<br>
<?php
session_start();
require_once('../mysqli_connect.php');
if(isset($_GET['Oid'])){
	$Oid = $_GET['Oid'];
}
$query = "SELECT Cost FROM client_order WHERE Oid = '$Oid'";
$response = @mysqli_query($dbc, $query);
if($response){
	$row = mysqli_fetch_array($response);
	$Cost = $row['Cost'];
}else{
	echo 'Error Occurred<br />';
	echo mysqli_error($dbc);
	mysqli_close($dbc);
}
$Cid = $_SESSION["Cid"];
$query1 = "SELECT Dept, Spent FROM client WHERE Cid = '$Cid'";
$response1 = @mysqli_query($dbc, $query1);
if($response1){
	$row1 = mysqli_fetch_array($response1);
	$Dept = $row1['Dept'] - $Cost;
	$Spent = $row1['Spent'] + $Cost;
	$State = 1;
	$query2="UPDATE client SET Dept = $Dept WHERE Cid = $Cid";
    mysqli_query($dbc,$query2);
	$query3="UPDATE client SET Spent = $Spent WHERE Cid = $Cid";
	mysqli_query($dbc,$query3);
	$query4="UPDATE client_order SET State = $State WHERE Oid = $Oid";
    mysqli_query($dbc,$query4);
	echo "Your Order Has Been Paid Sucessfully.";
	mysqli_close($dbc);
}else{
	echo 'Error Occurred<br />';
	echo mysqli_error($dbc);
	mysqli_close($dbc);
}

?>
<html>
<body>