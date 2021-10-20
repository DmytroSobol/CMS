<?php
session_start();
echo '<head><meta name="interkassa-verification" content="ad51d10a11ebed664bfb8d7e427e1871" /></head>';
require_once('engine/rcon.php');

	include 'template/header.tpl';

echo "<div style=\"padding: 5%;\">
	<div id=\"container\">

            <div class=\"row\">";
$file = $_SERVER['REQUEST_URI'];

	include 'engine/template.php';
	include 'template/right.tpl';

echo "</div>
</div></div>";
	include 'template/footer.tpl';
?>
