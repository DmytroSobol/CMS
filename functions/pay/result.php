<?php
session_start();
include 'config.php';
include '../../engine/rcon.php';

	$host = "";
	$port = "";
	$password = "";
	$timeout = "";

	$rcon = new Rcon($host, $port, $password, $timeout);

$dataSet = $_POST;

if (!$dataSet) {
	$_SESSION['result'] = "Ошибка платежа";
	header('Location: /cabinet');
}

unset($dataSet['ik_sign']); // Delete string with signature from dataset
ksort($dataSet, SORT_STRING); // Sort elements in array by var names in alphabet queue
array_push($dataSet, $secret_key); // Adding secret key at the end of the string
$signString = implode(':', $dataSet); // Concatenation calues using symbol ":"
$sign = base64_encode(md5($signString, true)); // Get MD5 hash as binare view using generate string and code it in BASE64

if ($sign != $_POST['ik_sign']) {
	$_SESSION['result'] = "Ошибка обработки платежа";
	header('Location: /cabinet');
}

////////////////////////////////////
// Дальше код если оплата успешна //
////////////////////////////////////

$link = mysqli_connect("localhost", "root", "", "name");

$id = $_POST['ik_pm_no'];
$username = $_POST['ik_x_login'];
$type = $_POST['ik_x_type'];
$price = $_POST['ik_am'];
	$pex = $_POST['pex'];


$insert = mysqli_query($link, "INSERT INTO payments (id,username,dates,type,price) VALUES ('$id','$username',CURDATE(),'$type','$price')");
	

if ($type == "йорд") {
	$result = mysqli_query($link, "SELECT amount FROM jords WHERE username='$username'");
	$myrow = mysqli_fetch_array($result);

	$amount = $myrow['amount'];

	$bought = $_POST['ik_am'] * 10;
	$amount = $amount + $bought;

	$change = mysqli_query($link, "UPDATE jords SET amount='$bought' WHERE username = '$username'");
	
	if ($change=='TRUE'){
		$_SESSION['result'] = "Количество йордов увеличено";
	}
}

if ($type == "донат") {
	
	if ($rcon->connect())
	{
		$rcon->send_command("pex user " .$username. " group set " .$pex."");
		$_SESSION['result'] = "Донат выдан";
	}
}

header('Location: /cabinet');

?>