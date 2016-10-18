<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h3>Редактировать запись</h3>
<form action="update.php?update=<?php echo $row['id'];?>" method="post" name="forma" enctype="multipart/form-data">
<fieldset>
	<label for="tema">Наименование:</label><br/>
	<input type="text" name="tema" value="<?php echo $row['tema'];?>" size="30"><br/>
	<label for="text">Описание:</label><br/>
	<input type="text" name="text" value="<?php echo $row['text'];?>" size="30"><br/>	
	<label for="tip">Выберите тип:</label><br/>
	<select size="1" name='tip'>
		<option value="<?php echo $row['tip'];?>"><?php echo $row['tip'];?></option>
		<option>Тип1</option>
		<option>Тип2</option>
		<option>Тип3</option>
		<option>Тип4</option>
   	</select><br/>
	<label for="image">Ранее выбранная картинка:</label><br/>
	<img src=images/<?php echo $row['image'];?> ><br/>
	<label for="image">Выберите новую картинку:</label><br/>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input type="file" name="image" />
	
</fieldset>	
	
<br/>
<fieldset>
<input id="submit" type="submit" name="up" value="Отправить данные"><br/>
</fieldset>
</form>
<a href="test.php">Вернуться к списку</a><br/><br/>
</body>
</html>