<html>
<head>
<title>Add Variety</title>
</head>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<form action="http://localhost:80/varietyadded.php" method="post">
 
<b>Add a New Variety</b>
 
<p>Name:
<input type="text" name="Name" size="30" value="" />
</p>
 
<p>Photo:
<input type="text" name="Photo" size="30" value="" />
</p>

<p>Description:
<input type="text" name="Description" size="100" value="" />
</p>
 
<p>Color:
<input type="text" name="Color" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
</form>
</body>
</html>