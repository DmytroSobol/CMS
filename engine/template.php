<?php
$dir = 'template/';

$file = $_SERVER['REQUEST_URI'];

$ext = pathinfo($file, PATHINFO_EXTENSION);
$file = pathinfo($file, PATHINFO_FILENAME);

//Проверяет существует ли файл
switch ($file) {
	case 'cabinet':
		echo "<div class=\"col-lg-9 col-md-9\">";
		include 'functions/cabinet/cabinet.php';
		echo "</div>";
		break;
	case 'obmen':
		echo "<div class=\"col-lg-9 col-md-9\">";
		include 'functions/processes/obmen.php';
		echo "</div>";
		break;
	case 'register':
		echo "<div class=\"col-lg-9 col-md-9\">";
		include 'functions/user/reg.php';
		echo "</div>";
		break;
	case 'recover':
		echo "<div class=\"col-lg-9 col-md-9\">";
		include 'functions/user/recover.php';
		echo "</div>";
		break;
	case 'login':
		echo "<div class=\"col-lg-9 col-md-9\">";
		include 'functions/user/index.php';
		echo "</div>";
		break;
	case '':
		include 'template/index.tpl';
		break;
	case 'index':
		include 'template/index.tpl';
		break;
	default:
		switch ($file) {
			case 'cabinet/':
				echo "<div class=\"col-lg-9 col-md-9\">";
				include 'functions/cabinet/cabinet.php';
				echo "</div>";
				break;
			case 'obmen/':
				echo "<div class=\"col-lg-9 col-md-9\">";
				include 'functions/processes/obmen.php';
				echo "</div>";
				break;
			case 'register/':
				echo "<div class=\"col-lg-9 col-md-9\">";
				include 'functions/user/reg.php';
				echo "</div>";
				break;
			case 'recover/':
				echo "<div class=\"col-lg-9 col-md-9\">";
				include 'functions/user/recover.php';
				echo "</div>";
				break;
			case 'login/':
				echo "<div class=\"col-lg-9 col-md-9\">";
				include 'functions/user/index.php';
				echo "</div>";
				break;
			case '/':
				include 'template/index.tpl';
				break;
			case 'index/':
				include 'template/index.tpl';
				break;
			default:
				if (file_exists($dir.$file.'.tpl')) {
					include $dir.$file.'.tpl';
				}
				else {
					include 'error.php';
				}
			break;
		break;
}

?>
