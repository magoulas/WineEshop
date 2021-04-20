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
$arr_oid=array();
require_once('../mysqli_connect.php');
$cid=$_SESSION['Cid'];
$arr=$_SESSION['cart'];
$sum=$_SESSION['total_price'];
$quantity=$_SESSION['quantity'];
$query = "SELECT Oid FROM client_order";
$response = @mysqli_query($dbc, $query);
if($response){
while($row = mysqli_fetch_array($response)){
    array_push($arr_oid, $row);
}
if(!empty($arr_oid)){    
    $oid=max($arr_oid);
	$order_id=$oid[0]+1;
}else{
	$order_id=1;
}
}
$date=date("d F Y H:i A P");
$str1=implode(" ",$arr);
$query = "INSERT INTO client_order (Oid,Date,Cost, clientID, wineID) VALUES (?, ?, ?,?, ?)";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, 'dsdds', $order_id,$date,$sum,$cid, $str1);
mysqli_stmt_execute($stmt);
$query = "INSERT INTO client_history (Cid,Oid) VALUES (?, ?)";
$stmt1 = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt1, 'dd', $cid,$order_id);
mysqli_stmt_execute($stmt1);

foreach($quantity as $key=>$value1){
	if($value1!=0){
		$query1="SELECT Stock FROM wine WHERE Wid=$key";
		$response1 = @mysqli_query($dbc, $query1);
		if($response){
          while($row = mysqli_fetch_array($response1)){
          $stock=$row['Stock'];
        }
		}
		$stock=$stock-$value1;
		$query2="UPDATE wine SET Stock=$stock WHERE Wid=$key";
		mysqli_query($dbc,$query2);
	}
}
$query3="SELECT FirstName,LastName,IBAN,Address,PhoneNumber,Dept FROM client WHERE Cid=$cid";
$response3 = @mysqli_query($dbc, $query3);
if($response3){
	echo nl2br("<strong>Client Info:</strong>\n");
          while($row1 = mysqli_fetch_array($response3)){		  
			  echo '<tr><td align="left">' 
			  ."<strong>First Name:</strong>".$row1['FirstName'] ." ". '</td><td align="left"><br />'
			  ."<strong>Last Name:</strong>".$row1['LastName'] ." ". '</td><td align="left"><br />' 
			  ."<strong>IBAN:</strong>".$row1['IBAN'] ." ".'</td><td align="left"><br />' 
              ."<strong>Address:</strong>".$row1['Address']." " . '</td><td align="left"><br />' 
              ."<strong>Phone Number:</strong>".$row1['PhoneNumber']." " . '</td><td align="left">' .'</td><br />';
			  $dept=$row1['Dept']+$sum;
		  }
		  $query2="UPDATE client SET Dept=$dept WHERE Cid=$cid";
          mysqli_query($dbc,$query2);
}
foreach($quantity as $key=>$value1){
	if($value1!=0){
        $query1 = "SELECT Name, Color , Type ,Price FROM wine WHERE Wid=$key";
		$response1 = @mysqli_query($dbc, $query1);
		if($response){
		echo nl2br("\n<strong>Wine Info</strong>\n");
          while($row = mysqli_fetch_array($response1)){
              echo '<tr><td align="left">'  
              ."<strong>Name:</strong>".$row['Name'] ." ". '</td><td align="left"><br />' 
			  ."<strong>Color:</strong>".$row['Color'] ." ". '</td><td align="left"><br />'
			  ."<strong>Type:</strong>".$row['Type'] ." ".'</td><td align="left"><br />'
			  ."<strong>Quantity:</strong>".$value1 . '</td><td align="left">' .'</td><br />'
              ."<strong>Price:</strong>".$value1*$row['Price']." Euro" . '</td><td align="left">' .'</td><br />';
        }
		}
	}
}
echo nl2br("\n<strong>Total Cost of Order:</strong> $sum Euro\n");

unset($_SESSION['cart']);
unset($_SESSION['total_price']);
unset($_SESSION['quantity']);
?>































