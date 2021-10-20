<!DOCTYPE html>
<html>
<head>
	<title>Ошибка</title>
</head>
<body>
	<div class="col-lg-9 col-md-9">
        <?php
			echo "Файл ".$file; if(!empty($ext)){echo ".".$ext;} echo " не найден";
		?>
	</div>
</body>
</html>