<?php
session_start();
require 'dbconnect.php';

if(isset($_SESSION['username'])){
	
	$sql = "SELECT * FROM test";
	$result = mysql_query($sql);
	require 'form.php';

	if(isset($_POST['add_form'])){
		$tema = $_POST['tema'];
		$tema = htmlentities(addslashes(trim($tema)));
		
		$text = $_POST['text'];
		$text = htmlentities(addslashes(trim($text)));
		
		$tip = $_POST['tip'];
		$author = $_SESSION['username'];
		
		$types = array('image/gif', 'image/png', 'image/jpeg');
		
		if($_FILES['image']['name']){		 			
			
			if($_FILE['image']['size'] < 1024*10*1024){
				
				if (in_array($_FILES['image']['type'], $types)){
				
					if(is_uploaded_file($_FILES['image']['tmp_name'])){
						$uploaddir = "images/";
						$filename = $_FILES['image']['name'];
						$filename = uniqid().'.jpg';
						$uploadfile = $uploaddir.basename($filename);
						move_uploaded_file($_FILES["image"]["tmp_name"], $uploadfile);
						echo "Файл успешно загружен на сервер";
					
						$query="INSERT INTO test (tema, text, tip, image, author)" ."VALUES('{$tema}', '{$text}', '{$tip}', '{$filename}', '{$author}')";
						mysql_query( $query );
					
					}
					else{
						echo "Ошибка! Не удалось загрузить файл на сервер"; 
						exit; 
					}
				}
				else{
					echo "Данный тип файла запрещен";
					exit;
				}				
			}
 			else{
				echo "Размер файла слишком большой. Выберите файл поменьше.";	
				exit;
			}						
		}
		else{
			$query="INSERT INTO test (tema, text, tip, author)" ."VALUES('{$tema}', '{$text}', '{$tip}', '{$author}')";
			mysql_query( $query );
			echo "<p>Новая запись вставлена в базу!</p>";
		}		
	}
}
else {
	echo "Не авторизованным пользователям доступа нет. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
}
	
?>