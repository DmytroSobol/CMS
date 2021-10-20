<?php
	include '../cabinet/userinfo.php';
	include '../engine/rcon.php';

	$host = "127.0.0.1";
	$port = "25575";
	$password = "277030dima";
	$timeout = "30";

	$rcon = new Rcon($host, $port, $password, $timeout);

	session_start();
	$username = $_SESSION['login'];
	$jords = getJords();

	$type = $_POST['type'];

	$link = mysqli_connect("localhost","root","","server");

	if ($type == "монеты") {
		$change = $_POST['jords'];
		if ($jords >= $change) {
			$money = $change * 10;
			if ($rcon->connect()){
				$rcon->send_command("eco give " .$username. " " .$money."");

				$have = $jords - $change;
				$change = mysqli_query($link, "UPDATE jords SET amount='$have' WHERE username = '$username'");

				$_SESSION['result'] = "Успешный обмен";
				header('Location: /obmen');
			}
			else{
				$_SESSION['result'] = "Не успешный обмен";
				header('Location: /obmen');
			}
		}
		else{
			$_SESSION['result'] = "Недостаточно йордов";
			header('Location: /obmen');
		}
	}
	if ($type == "донат") {
		$donate = $_POST['donate'];

		switch ($donate) {
			case 'Вип':
				$price = 199;
				$name = $donate;
				$pex = "Vip";
				break;
			case 'Премиум':
				$price = 399;
				$name = $donate;
				$pex = "Premium";
				break;
			case 'Делюкс':
				$price = 599;
				$name = $donate;
				$pex = "Deluxe";
				break;
			case 'Легенда':
				$price = 799;
				$name = $donate;
				$pex = "Legend";
				break;
			case 'Лорд':
				$price = 999;
				$name = $donate;
				$pex = "Lord";
				break;
			case 'Ультра':
				$price = 1299;
				$name = $donate;
				$pex = "Ultra";
				break;
			case 'Пента':
				$price = 1599;
				$name = $donate;
				$pex = "Penta";
				break;
			case 'Мега':
				$price = 1799;
				$name = $donate;
				$pex = "Mega";
				break;
			default:
				$_SESSION['result'] = "Донат не найден";
				header('Location: /obmen');
				break;
		}
		if ($jords >= $price) {
			
			if ($rcon->connect()){
				$rcon->send_command("pex user " .$username. " group set " .$pex."");

				$have = $jords - $price;
				$change = mysqli_query($link, "UPDATE jords SET amount='$have' WHERE username = '$username'");

				$_SESSION['result'] = "Успешный обмен";
				header('Location: /obmen');
			}
			else{
				$_SESSION['result'] = "Не успешный обмен";
				header('Location: /obmen');
			}
		}
		else{
			$_SESSION['result'] = "Недостаточно йордов";
			header('Location: /obmen');
		}
	}
?>
