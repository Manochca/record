<?php
require_once("dbconnect.php");
 
/* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные. Таким образом, мы застраховываемся от хостингов, которые не поддерживают глобальные переменные. */
if(isset($_POST["r_name"])){ $r_name = htmlspecialchars(addslashes(trim($_POST["r_name"]))); }
if(isset($_POST["r_username"])){ $r_username = htmlspecialchars(addslashes(trim($_POST["r_username"]))); }
if(isset($_POST["r_password"])){ $r_password = htmlspecialchars(addslashes(trim($_POST["r_password"]))); }
if(isset($_POST["r_send"])){ $r_send = $_POST["r_send"]; }

/* Проверяем если была нажата кнопка зарегистрироваться. Если да, то вводим информацию в БД, иначе, значит что кнопка не была нажата, и пользователь зашел на страницу напрямую. Поэтому выводим ему сообщение об этом. */
if(isset($r_send)){
	/* Формируем запрос к БД для ввода данных */
	$query = " INSERT INTO users (name,username,password) VALUES ('$r_name','$r_username','$r_password')";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() ); 

	// Если все нормально то выводим сообщение.
	if($result){
		echo"Регистрация прошла успешно! <a href='index.php'>Перейти на главную страницу.</a> ";
		exit();
	}
}else{
	echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href='index.php'> главную страницу </a>";
} 
?>