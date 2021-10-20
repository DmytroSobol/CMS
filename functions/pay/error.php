<?php
session_start();
$_SESSION['result'] = "Ошибка оплаты";
header('Location: /cabinet');
?>