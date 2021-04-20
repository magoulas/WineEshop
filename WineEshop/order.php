<?php
session_start();
$arr_oid=array();
require_once('../mysqli_connect.php');
$cid=$_SESSION['Cid'];
$arr=$_SESSION['cart'];
$sum=$_SESSION['total_price'];
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

?>