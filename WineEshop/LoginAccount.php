<html>
<head>
<title>Login to an existing Account</title>
</head>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<form action="http://localhost:80/Login.php" method="post">
 
<b>Login to an existing Account</b>
 
<p>Username:
<input type="text" name="Username" size="30" value="" />
</p>

<p>Password:
<input type="password" name="Password" size="30" value="" />
</p>
<p>
<input type="submit" name="Login" value="Send" />
</p> 
</form>
</body>
</html>