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
if(empty($_SESSION["Username"])){
	echo "You Have to Login First In Order to Logout";
}else{
	$_SESSION["Username"] = '';
	$_SESSION["Cid"] = '';
	$_SESSION["Isa"] = '';
	$_SESSION["Dept"] = '';
	echo "You Successfully Logged Out<br />";
}
?>
<html>
<body>