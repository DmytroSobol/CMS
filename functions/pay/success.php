<?php
session_start();
$_SESSION['result'] = "Оплата успешно выполнена";
header('Location: /cabinet');
?>