<html>
<head>
<title>Add New Wine</title>
</head>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<form action="http://localhost:80/WineAdded.php" method="post">
 
<b>Add a new Wine</b>
 
<p>Name:
<input type="text" name="Name" size="30" value="" />
</p>

<p>Color:
<input type="text" name="Color" size="30" value="" />
</p>
 
<p>Discription:
<input type="text" name="Discription" size="100" value="" />
</p>

<p>Type:
<input type="text" name="Type" size="30" value="" />
</p>
 
<p>Winery:
<input type="text" name="Winery" size="30" value="" />
</p>

<p>Stock:
<input type="text" name="Stock" size="30" value="" />
</p>

<p>Price:
<input type="text" name="Price" size="30" value="" />
</p>

<p>Wine From:
<input type="text" name="WineFrom" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

 
</form>
</body>
</html>