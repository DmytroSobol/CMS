<?php
	include 'config.php';
	include '../cabinet/userinfo.php';
	$login = getName();

	$donate = $_POST['donate'];

	switch ($donate) {
		case 'Вип':
			$price = 19;
			$name = $donate;
			$pex = "vip";
			break;
		case 'Премиум':
			$price = 39;
			$name = $donate;
			$pex = "premium";
			break;
		case 'Креатив':
			$price = 59;
			$name = $donate;
			$pex = "creativ";
			break;
		case 'Админ':
			$price = 79;
			$name = $donate;
			$pex = "admin";
			break;
		case 'Основатель':
			$price = 159;
			$name = $donate;
			$pex = "osnovatel";
			break;
		case 'Владелец':
			$price = 199;
			$name = $donate;
			$pex = "owner";
			break;
		default:
			$_SESSION['result'] = "Донат не найден";
			header('Location: /cabinet');
			break;
	}

	echo '	
			<!DOCTYPE html>
			<html>
			<head>
				<title>Перенаправление на оплату</title>
			</head>
			<body>
				<center>
					<span>
						<h1 style="margin-top: 10%;">Перенаправление на сайт оплаты</h1>
						<h2>Подождите 5 секунд</h2>
					</span>
					<img src="wait.gif" width="10%" height="10%"/>
					<form method="post" action="https://sci.interkassa.com/" accept-charset="UTF-8" id="form">
  						<input type="hidden" name="ik_co_id" value="'.$id_kassa.'">
  						<input type="hidden" name="ik_pm_no" value="'.time().'">
  						<input type="hidden" name="ik_am" value="'.$price.'">
  						<input type="hidden" name="ik_cur" value="rub">
  						<input type="hidden" name="ik_x_login" value="'.$login.'">
  						<input type="hidden" name="ik_x_pex" value="'.$pex.'">
  						<input type="hidden" name="ik_x_type" value="донат">
 						<input type="hidden" name="ik_desc" value="Покупка привилегии '.$donate.' для '.$login.'"/>
 						<p>Если перенаправление на произошло нажмите на кнопку ниже</p>
  						<input type="submit" value="Купить" style="width: 25%;">
					</form>
				</center>
				<script language="JavaScript">
					setTimeout(()=>{document.getElementById(\'form\').submit();},5000)
				</script>
			</body>
			</html>
	'
?>