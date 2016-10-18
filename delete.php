<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	
<?php 
session_start();
require 'dbconnect.php';
	
if(isset($_SESSION['username'])){
	
	$id = $_POST['delete'];
	  
	$sql = "SELECT image FROM test WHERE id='$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	if($row['image']!=NULL){
		if(file_exists("images/".$row['image'])){
			unlink("images/".$row['image']);	
			$query ="DELETE FROM test WHERE id = '$id'";
			mysql_query($query);
		}
		else echo "Файл не найден.<br>";
	}
	else{	
		$query ="DELETE FROM test WHERE id = '$id'";
		mysql_query($query);	
		
	}
	echo "Запись удаленна<br>";
}
else {
	echo "Не авторизованным пользователям доступа нет. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
}
?>
	

<a href="test.php">Вернуться к списку</a><br/><br/>
</body>
</html>
