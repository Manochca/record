

<html>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php
session_start(); /* Создание сессий */
require_once("dbconnect.php"); /* Подключение файла dbconnect.php */
require 'logout.php';

?>
	
<form action="register.php" method="post" name="r_form" >
	<table>
		<tr>
			<td> Имя: </td>
			<td> <input type="text" name="r_name" required=" " /> </td>
		</tr>
		<tr>
			<td> Логин: </td>
			<td> <input type="text" name="r_username" required=" " /> </td>
		</tr>
		<tr>
			<td> Пароль: </td>
			<td> <input type="password" name="r_password" required=" " /> </td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="r_send" value="Зарегистрироватся!" /> </td>
		</tr>
	</table>
</form>

<form action="login.php" method="post" name="l_form" >
	<table>
		<tr>
			<td> Логин: </td>
			<td> <input type="text" name="l_username" required=" " /> </td>
		</tr>
		<tr>
			<td> Пароль: </td>
			<td> <input type="password" name="l_password" required=" " /> </td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="l_send" value="Войти" /> </td>
		</tr>
	</table>
</form>

</body>
</html>

