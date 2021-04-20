<?php
session_start();
if(empty($_SESSION["Username"])){
	?>
	<div>
    <a href="MainUI.php">
        <button  id="close" >Return to Menu</button>
    </a>
</div>
<br>
	<?php
	echo "You Have to Login First In Order to Close Your Account<br />";
}else{
	if($_SESSION["Dept"] == 0){
		echo "Are You Sure You Want to Close Your Account?<br />";
		?>
		<div>
		<a href= "AccountClosed.php">
			<button  id="close" >Yes</button>
		</a>
		</div>
		<br>
		<div>
		<a href= "MainUI.php">
			<button  id="close" >No</button>
		</a>
		</div>
		<br>
		<?php
	}else{
		?>
		<div>
		<a href="MainUI.php">
			<button  id="close" >Return to Menu</button>
		</a>
		</div>
		<br>
		<?php
		echo "You Have to Pay Your Dept First in Order to Close Your Account<br />";
	}
}

?>
