<div align=right>
	<?php 
		require_once("dbconnect.php");
		echo "Здравствуйте, ".$_SESSION['username']."!";	
	?>
	<form method="post" action="exit.php">
		<input type="submit" name="exit" value="Выйти" />
	</form>
</div>

<div align=left>
	<form method="post" action="add_form.php">
	<input type="submit" name="add" value="Добавить новую запись" />
	</form>
</div>