<?php
$link = mysqli_connect("localhost", "u722919_admin", "ae3802aa", "u722919_project");

$query = mysqli_query($link, "SELECT * FROM `news` ORDER BY `id` desc");
$row_count = mysqli_num_rows($query);
if($row_count > 0){
  while ($row = mysqli_fetch_assoc($query)){
    echo '
      <div class="news-link" style="padding: 2.5%; width: 90%; margin-left: 10%;">
         <h3 class="news-log" style="margin-left: 3%;">'.$row['title'].'</h3>
         <p class="description" style="margin-left: 1%;">
            '.$row['short'].'
         </p>
         <a href="news?id='.$row['id'].'" class="btn-view"><span class="ic-sx24"></span> Подробнее</a>
         <span class="time-data" style="margin-left: 1%;">'.$row['dtime'].'</span>
      </div>
      ';}
} else {  
  echo 'Error!';
}
?>
