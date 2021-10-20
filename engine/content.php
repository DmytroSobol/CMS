<?php
	$file = $_SERVER['REQUEST_URI'];
	switch ($file) {
		case '/':
			include 'template/header.tpl';
			include 'engine/template.php';
			include 'template/footer.tpl';
			break;
		case '/index':
			include 'template/header.tpl';
			include 'engine/template.php';
			include 'template/footer.tpl';
			break;
		case '/cabinet':
			include '../template/header.tpl';
			include 'cabinet.php';
			include '../template/footer.tpl';
			break;
		default:
			include '../template/header.tpl';
			include 'template.php';
			include '../template/footer.tpl';
			break;
	}
?>