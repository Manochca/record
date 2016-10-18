<html>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
	session_start();
	require_once("dbconnect.php");

	if(isset($_SESSION['username'])){
		
		require 'new_form.php';
		
		$result = mysql_query("SELECT * FROM test");
		$row = mysql_fetch_array($result);
		$n = mysql_num_rows($result);		
	
		echo "<table border=1>
		<tr><th>№</th><th>Наименование</th><th>Описание</th><th>Тип</th><th>Изображение</th><th>Автор</th><th>Действие</th></tr>"; 	
		for($i=0;$i<$n;$i++)
		{
			if(mysql_result($result,$i,'author')===$_SESSION['username']){	
			
				if(mysql_result($result,$i,'image') === NULL){
					$id = mysql_result($result,$i,'id');
					echo "<tr><td>",$id,
					"</td><td>",mysql_result($result,$i,'tema'),	
					"</td><td>",mysql_result($result,$i,'text'),
					"</td><td>",mysql_result($result,$i,'tip'),
					"</td><td>",
					"</td><td>",mysql_result($result,$i,'author'),
					"</td><td>
					<form method='post' action='delete.php'>
						<input type='hidden' name='delete' value='$id'>
						<input type='submit' value='Удалить'>
					</form>		
					<a href='update.php?update=$id'><button>Редактировать</button></a>
					</td></tr>";
				}
				else{
					$id = mysql_result($result,$i,'id');
					echo "<tr><td>",$id,
					"</td><td>",mysql_result($result,$i,'tema'),	
					"</td><td>",mysql_result($result,$i,'text'),
					"</td><td>",mysql_result($result,$i,'tip'),
					"</td><td> <img src=images/",mysql_result($result,$i,'image')," width='100' height='100'>",
					"</td><td>",mysql_result($result,$i,'author'),
					"</td><td> 
					<form method='post' action='delete.php'>
						<input type='hidden' name='delete' value='$id'>
						<input type='submit' value='Удалить'>
					</form>		
					<a href='update.php?update=$id'><button>Редактировать</button></a>
					</td></tr>";
				}
			}
			else{
				if(mysql_result($result,$i,'image') === NULL){
					$id = mysql_result($result,$i,'id');
					echo "<tr><td>",$id,
					"</td><td>",mysql_result($result,$i,'tema'),	
					"</td><td>",mysql_result($result,$i,'text'),
					"</td><td>",mysql_result($result,$i,'tip'),
					"</td><td>",
					"</td><td>",mysql_result($result,$i,'author'),
					"</td><td>
					</td></tr>";
				}
				else{
					$id = mysql_result($result,$i,'id');
					echo "<tr><td>",$id,
					"</td><td>",mysql_result($result,$i,'tema'),	
					"</td><td>",mysql_result($result,$i,'text'),
					"</td><td>",mysql_result($result,$i,'tip'),
					"</td><td> <img src=images/",mysql_result($result,$i,'image')," width='100' height='100'>",
					"</td><td>",mysql_result($result,$i,'author'),
					"</td><td>
					</td></tr>";
				}
			}
			
		}
		echo "</table>";
		echo "<a href=test.php>Просмотреть свои записи</a>";
		
	}
	else {
		echo "Не авторизованным пользователям доступа нет. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
	}
	
?>
	
</body>
</html>