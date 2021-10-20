<?
$db = mysqli_connect ("localhost","u722919_admin","ae3802aa");
mysqli_select_db ($db, "u722919_project");

$login = $_GET['login'];
$password = $_GET['password'];

$result = mysqli_query($db, "SELECT * FROM users WHERE username='$login'");
$myrow = mysqli_fetch_array($result);

$salt = $myrow['salt'];
$salted2md5 = md5(md5($password).$salt);

if ($myrow['password']==$salted2md5) {
	$result = true;
}

echo($result ? 'OK:' . $username : 'Incorrect login or password');
?>