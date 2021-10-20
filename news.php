<?php
session_start();
	$id = $_GET['id'];

$link = mysqli_connect("localhost", "root", "", "server");

$query = mysqli_query($link, "SELECT * FROM `news` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($query);
$title = "Статьи не существует";

include 'template/header.tpl';
if ($row) {
    echo '<title>'.$row['title'].'</title>';
    echo '<div class="row" style="padding: 5%;"><div class="col-lg-9 col-md-9">
                  <div class="news-link" style="width:90%; margin-left: 10%;">
                     <h3 class="news-log" style="margin-left: 3%;">'.$row['title'].'</h3>
                     <p class="description" style="margin-left: 1%;">
                        '.$row['full'].'
                     </p>
                     <a href="/" class="btn-view"><span class="ic-sx24"></span> Назад</a>
                     <span class="time-data" style="margin-left: 1%;">'.$row['dtime'].'</span>
                  </div></div>';
                  include 'template/right.tpl';
                  echo '</div>
            ';
}
else{
    echo '<title>'.$title.'</title>';
    echo '<div style="padding: 5%;"><div class="container"><div class="row"><div class="col-lg-9 col-md-9">Статьи не существует</div>';
    include 'template/right.tpl';
    echo '</div></div><div>';
}
            


include 'template/footer.tpl';
?>