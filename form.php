<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h3>Добавить запись</h3>
<form action="add_form.php" method="post" name="forma" enctype="multipart/form-data">
<fieldset>
	<label for="tema">Наименование:</label><br/>
	<input type="text" name="tema" size="30"><br/>
	<label for="text">Описание:</label><br/>
	<input type="text" name="text" size="30"><br/>	
	<label for="tip">Выберите тип:</label><br/>
	<select size="1" name='tip'>
		<option value="Тип1">Тип1</option>
		<option>Тип2</option>
		<option>Тип3</option>
		<option>Тип4</option>
   	</select><br/>
	<label for="image">Выберите картинку:</label><br/>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input type="file" name="image"> 
</fieldset>		
<br/>
<fieldset>
<input id="submit" type="submit" name="add_form" value="Отправить данные"><br/>
</fieldset>
</form>
<a href="test.php">Вернуться к списку</a><br/><br/>
</body>
</html>