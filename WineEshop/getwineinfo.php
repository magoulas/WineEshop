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

$sum=0;
// Get a connection for the database
require_once('../mysqli_connect.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	if(isset($_GET['del'])){
	  $del=$_GET['del'];
	}
if((isset($_SESSION['cart'])&&!isset($_GET['del']))||(isset($_SESSION['cart'])&&$del!=-1)){
	$arr=$_SESSION['cart'];
	array_push($arr, $id); 
	$_SESSION['cart']=$arr;
}
else if(!isset($_SESSION['cart'])){
	$arr=array($id);
    $_SESSION['cart']=$arr;
}else if($del==-1){
	$arr=$_SESSION['cart'];
	$index=0;
	while($index<count($arr)&&$id!=$arr[$index]){
		$index++;
	}
	while($index<count($arr)-1){
		$arr[$index]=$arr[$index+1];
		$index++;
	}
	$x=array_pop($arr);
	$_SESSION['cart']=$arr;
	$del=-5;
}
echo '<table align="left"
cellspacing="6" cellpadding="10">
 
<tr><td align="left"><b>Name</b></td>
<td align="left"><b>Color</b></td>
<td align="left"><b>Type</b></td>
<td align="left"><b>Price</b></td>
<td align="left"><b>Total</b></td></tr>';
foreach($arr as $value ){
	$query = "SELECT Name, Color , Type, Price,Wid FROM wine WHERE Wid=$value";
	$response = @mysqli_query($dbc, $query);
    if($response){
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
	if(!empty($_SESSION["Username"])){	
if($_SESSION["Isa"]==1){
	$price=$row['Price']-$row['Price']*0.24;
}else{
	$price=$row['Price'];
} 	
}else{
	$price=$row['Price'];
}
  $sum+=$price;
echo '<tr><td align="left">' . 
$row['Name'] . '</td><td align="left">' .
$row['Color'] . '</td><td align="left">' .
$row['Type'] . '</td><td align="left">' . 
$price . '</td><td align="left">' .
$sum.'</td>';
echo "<td><a href='getwineinfo.php?id=".$row['Wid']."&del=-1'>Remove from Cart</a></td>";
$_SESSION['total_price']=$sum;

        }
      }
    }
}
if(!empty($_SESSION["Username"])&&isset($_GET['id'])){
	if($_SESSION["Isa"]==0){
		$quantity=array_fill(1,$_SESSION["max_id"],0);
	    $arr=$_SESSION['cart'];
		foreach($_SESSION["cart"] as $value1){
			$quantity[$value1]=$quantity[$value1]+1;
		}
			$_SESSION['quantity']=$quantity;
?>	
<html>
<body>
 <div>
    <a href="OrderComplete.php">
        <button  id="" >Complete Order</button>
    </a>
</div>
<br>
<?php
}else if($_SESSION["Isa"]==1){
	$counter=0;
	$quantity=array_fill(1,$_SESSION["max_id"],0);
	$arr=$_SESSION['cart'];
	if(count($arr)>=18){
		foreach($_SESSION["cart"] as $value1){
			$quantity[$value1]=$quantity[$value1]+1;
		}
		foreach($quantity as $value2){
			if($value2>=6){
				$counter++;
			}
		}
	}
	$_SESSION['quantity']=$quantity;
	if($counter>=3){
		?>
		<html>
<body>
 <div>
    <a href="OrderComplete.php">
        <button  id="" >Complete Order</button>
    </a>
</div>
<br>
?>

<?php
	}
}
}
// Create a query for the database
$query = "SELECT Name, Color , Type , Discription, Winery, Stock,Price,Wine_From,Photo,Wid FROM wine";
$query2 = "SELECT MAX(Wid)FROM wine";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
$response2 = @mysqli_query($dbc, $query2);
if($response2){
	while($row2 = mysqli_fetch_array($response2)){
		$_SESSION["max_id"]=$row2[0];
	}
}

// If the query executed properly proceed
if($response){
 
echo '<table align="left"
cellspacing="6" cellpadding="10">
 
<tr><td align="left"><b>Name</b></td>
<td align="left"><b>Color</b></td>
<td align="left"><b>Discription</b></td>
<td align="left"><b>Type</b></td>
<td align="left"><b>Winery</b></td>
<td align="left"><b>Wid</b></td>
<td align="left"><b>Stock</b></td>
<td align="left"><b>Price</b></td>
<td align="left"><b>Wine_From</b></td>
<td align="left"><b>Photo</b></td></tr>';
 
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
if(!empty($_SESSION["Username"])){	
if($_SESSION["Isa"]==1){
	$price=$row['Price']-$row['Price']*0.24;
}else{
	$price=$row['Price'];
} 	
}else{
	$price=$row['Price'];
}
echo '<tr><td align="left">' . 
$row['Name'] . '</td><td align="left">' .
$row['Color'] . '</td><td align="left">' .
$row['Discription'] . '</td><td align="left">' .
$row['Type'] . '</td><td align="left">' .
$row['Winery'] . '</td><td align="left">' .
$row['Wid'] . '</td><td align="left">' . 
$row['Stock'] . '</td><td align="left">' . 
$price . '</td><td align="left">' . 
$row['Wine_From'] . '</td><td align="left">'. 
'<img src="data:image/jpeg;base64,'.base64_encode( $row['Photo'] ).'"/>'.'</td>';
echo "<td><a href='variety.php?id=".$row['Wid']."'>Get Varieties</a></td>";
echo "<td><a href='winery.php?id=".$row['Wid']."'>Get Winery</a></td>";
if(!empty($_SESSION["Username"])){
echo "<td><a href='getwineinfo.php?id=".$row['Wid']."'>Add to Cart</a></td>";
}    
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
<html>
<body>
