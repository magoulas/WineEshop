<html>
<head>
<title>Create new Acount</title>
</head>
<body>
<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
<form action="http://localhost:80/AcountAdded.php" method="post">
 
<b>Create a new Acount</b>
 
<p>First Name:
<input type="text" name="FirstName" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="LastName" size="30" value="" />
</p>

<p>Username:
<input type="text" name="Username" size="30" value="" />
</p>

<p>Password:
<input type="password" name="Password" size="30" value="" />
</p>
 
<p>IBAN:
<input type="text" name="IBAN" size="30" value="" />
</p>

<p>Address:
<input type="text" name="Address" size="30" value="" />
</p>
 
<p>Phone Number:
<input type="text" name="PhoneNumber" size="30" value="" />
</p>

<p>Are you a Merchant:
<input type="checkbox" name="ISA" value="YES" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p> 
</form>
</body>
</html>