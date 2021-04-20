<html>
<head>
<title>Add New Winery</title>
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

<p>Wine Id:
<input type="text" name="WineId" size="30" value="" />
</p>

<p>Photo:
<input type="text" name="Photo" size="30" value="" />
</p>
 
<p>Info:
<input type="text" name="Info" size="100" value="" />
</p>

<p>History:
<input type="text" name="History" size="100" value="" />
</p>
 
<p>Fax:
<input type="text" name="Fax" size="30" value="" />
</p>

<p>Email:
<input type="text" name="Email" size="30" value="" />
</p>

<p>Phone:
<input type="text" name="Phone" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
</form>
</body>
</html>