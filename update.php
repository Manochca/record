<?php
session_start();
require 'dbconnect.php';

if(isset($_SESSION['username'])){
	$id = $_GET['update'];
	$sql = "SELECT * FROM test WHERE id='$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	require 'up_form.php';

	if(isset($_POST['up'])){	
		$tema=$_POST['tema'];
		$tema = htmlentities(addslashes(trim($tema)));
		
		$text=$_POST['text'];
		$text = htmlentities(addslashes(trim($text)));
		
		$tip=$_POST['tip'];
		
		$author = $_SESSION['username'];
		
		$types = array('image/gif', 'image/png', 'image/jpeg');
		
		if($_FILES['image']['name']){
			
				if($_FILE['image']['size'] < 1024*10*1024){
					
					if (in_array($_FILES['image']['type'], $types)){
				
						if(is_uploaded_file($_FILES['image']['tmp_name'])){
						
							if($row['image']!=NULL){
								if(file_exists("images/".$row['image']))
								unlink("images/".$row['image']);	
								else echo "Файл не найден.";
							}
							$uploaddir = "images/";
							$filename = $_FILES['image']['name'];
							$filename = uniqid().'.jpg';
							$uploadfile = $uploaddir.basename($filename);
							move_uploaded_file($_FILES["image"]["tmp_name"], $uploadfile);
							echo "Файл успешно загружен на сервер";
					
							$update_sql = "UPDATE test SET tema='$tema', text='$text', tip='$tip', image='$filename', author= '$author' WHERE id='$id'";
							mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
							echo '<p>Запись успешно обновлена!</p>';						
					
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
			$update_sql = "UPDATE test SET tema='$tema', text='$text', tip='$tip', author='$author' WHERE id='$id'";
			mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
			echo '<p>Запись успешно обновлена!</p>';
		}			

	}			
}
else {
	echo "Не авторизованным пользователям доступа нет. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
}
?>
