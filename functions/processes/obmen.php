<?php
session_start();
if (empty($_SESSION['login'])) {
	header('Location: /login');
}
$login = $_SESSION['login'];
include '../cabinet/userinfo.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Обмен валют</title>
	<link rel="stylesheet" href="functions/lc.css" type="text/css">
</head>
<body>
	<?php echo $_SESSION['result'] ?>
	<span class="name-rog">
		<div class="hr-line"></div> <h1>Обмен валют</h1>
	</span>
	<p>
		Количество йордов: <? echo getJords();?>
	</p>
<div class="hr-line"></div><h2>Обмен на монеты</h2>
	<form method="post" action="obrabotka.php">
		<p> Введите количество йордов для обмена на монеты</p>
  		<p>
  			<input type="number" name="jords" value="" placeholder="0">йордов
  		</p>
  		<input type="hidden" name="type" value="монеты">
  		<input type="submit" value="Обменять">
	</form>
<div class="hr-line"></div><h2>Обмен на привилегию</h2>
<span><font style="color: red">Внимание!</font> Если вы купите привилегию ниже вашей то вы потеряете текущую</span>
	<form method="post" action="obrabotka.php">
		<p> Выберите привилегию на которую хотите обменять йорды</p>
		<p>
			<select name="donate">
				<option value="Вип">Вип - 199й.</option>
				<option value="Премиум">Премиум - 399й.</option>
				<option value="Делюкс">Делюкс - 599й.</option>
				<option value="Легенда">Легенда - 799й.</option>
				<option value="Лорд">Лорд - 999й.</option>
				<option value="Ультра">Ультра - 1299й.</option>
				<option value="Пента">Пента - 1599й.</option>
				<option value="Мега">Мега - 1799й.</option>
			</select>
		</p>
		<input type="hidden" name="type" value="донат">
		<input type="submit" value="Обменять">
	</form>
	<?php $_SESSION['result'] = null ?>
</body>
</html>
