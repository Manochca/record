<?php
session_start();
require_once("dbconnect.php");

$l_username = htmlspecialchars(addslashes(trim($_POST["l_username"]))); 
$l_password = htmlspecialchars(addslashes(trim($_POST["l_password"]))); 
$l_send = $_POST["l_send"]; 

if(isset($l_send)){
	// делаем запрос к БД для выбора данных.
	$query = " SELECT * FROM users WHERE username = '$l_username' AND password = '$l_password'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() ); 

	// Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке 
	if(mysql_num_rows($result) !== 1){
		echo "Неправильный логин или пароль. Нажмите <a href='index.php'>здесь</a> для того чтобы перейти на страницу авторизации";
	}else{
		// Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
		$_SESSION['username'] = $l_username;
		$_SESSION['password'] = $l_password;

		// Выводим сообщение
		echo "Авторизация прошла успешно! Нажмите <a href='test.php'>здесь</a> для того чтобы перейти дальше";
		
	}
}else{
	echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
}
	

?>



