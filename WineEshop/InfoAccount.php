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
if(empty($_SESSION["Username"])){
	echo "You Have to Login First In Order to See Your Account Info";
}else{
	$Cid = $_SESSION["Cid"];
	$query = "SELECT FirstName, LastName, IBAN, Address, Dept, Spent, Isa, PhoneNumber, Username FROM client WHERE Cid = '$Cid'";
	$response = @mysqli_query($dbc, $query);
	if($response){
		$row = mysqli_fetch_array($response);
		echo '<tr><td align="left">'
		."<strong>Account Info:</strong>\n". '</td><td align="left"><br />'
		."<strong>First Name:</strong>".$row['FirstName'] . '</td><td align="left"><br />'
		."<strong>Last Name:</strong>".$row['LastName'] . '</td><td align="left"><br />' 
		."<strong>Username:</strong>".$row['Username'] . '</td><td align="left"><br />' 
		."<strong>IBAN:</strong>".$row['IBAN'] .'</td><td align="left"><br />'
		."<strong>Dept:</strong>".$row['Dept']. '</td><td align="left"><br />'
		."<strong>Spent:</strong>".$row['Spent']. '</td><td align="left"><br />'
		."<strong>Merchant:</strong>"; 
		if($row['Isa'] == 0){
			echo "NO". '</td><td align="left"><br />';
		}else{
			echo "Yes". '</td><td align="left"><br />';
		}
        echo "<strong>Address:</strong>".$row['Address']. '</td><td align="left"><br />' 
        ."<strong>Phone Number:</strong>".$row['PhoneNumber']. '</td><td align="left">' .'</td><br />';
		$query1 = "SELECT Oid FROM client_history WHERE Cid = '$Cid'";
		$response1 = @mysqli_query($dbc, $query1);
		if($response1){
			echo '<br /><tr><td align="left">'
			."<strong>Order History:</strong>\n". '</td><td align="left"><br />';
			echo '<table align="left"
			cellspacing="6" cellpadding="10">
			<tr><td align="left"><b>Order Number</b></td>
			<td align="left"><b>Date</b></td>
			<td align="left"><b>State</b></td>
			<td align="left"><b>Cost</b></td>
			<td align="left"><b>Wine List</b></td></tr>';
			while($row1 = mysqli_fetch_array($response1)){
				$oid = $row1['Oid'];
				$query2 = "SELECT Oid, Date, State, Cost, wineID FROM client_order WHERE Oid = '$oid'";
				$response2 = @mysqli_query($dbc, $query2);
				if($response2){
					$row2 = mysqli_fetch_array($response2);
					echo '<tr><td align="left">' . 
					$row2['Oid'] . '</td><td align="left">'
					.$row2['Date'] . '</td><td align="left">';
					if($row2['State'] == 1){
						echo "Paid" .'</td><td align="left">';
					}else{
						echo "UnPaid" .'</td><td align="left">';
					}
					echo $row2['Cost'] .'</td><td align="left">'
					.$row2['wineID'].'</td><td align="left">';
					if($row2['State'] == 0){
						echo "<td><a href='PayOrder.php?Oid=".$row2['Oid']."&del=-1'>Pay Order</a></td>";
					}
					echo "<td><a href='returnOrder.php?Oid=".$row2['Oid']."'>Return Order</a></td>";
				}else{
					echo 'Error Occurred<br />';
					echo mysqli_error($dbc);
					mysqli_close($dbc);
				}
				
			}
		}
	}else{
		echo 'Error Occurred<br />';
		echo mysqli_error($dbc);
		mysqli_close($dbc);
	}
}
?>
<html>
<body>