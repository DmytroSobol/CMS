<?php

$login = $_SESSION['login'];
if(empty($login)){
  header('Location: /login');
}

$username = "u722919_admin";
$password = "ae3802aa";

try {
    $connect = new PDO('mysql:host=localhost;dbname=u722919_project', $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if(isset($_POST['submit'])){

$title = $_POST['title'];
$short = $_POST['short'];
$full = $_POST['full'];


if(empty($title)){ 
echo "Введите название";
exit(); 
}

$sql = "INSERT INTO news (title, dtime, short, full) VALUES (:title, CURDATE(), :short, :full)";
         $stmt = $connect->prepare($sql);
         $stmt->bindParam(':title', $title, PDO::PARAM_STR);
         $stmt->bindParam(':short', $short, PDO::PARAM_STR);
         $stmt->bindParam(':full', $full, PDO::PARAM_STR);
         $stmt->execute();


echo "<b>Новость успешно добавлена</b>";


}
?>

<br>
<h3>Добавление новости</h3>

<form method="post" action="<?php echo $PHP_SELF ?>">
Название: <input name="title" size="40" maxlength="255">
<br>
Краткое содержание: <textarea name="short" rows="3" cols="30"></textarea>
<br>
Полное содержание: <textarea name="full" rows="7" cols="30"></textarea>
<br>
<input type="submit" name="submit" value="Добавление новости">
</form>
