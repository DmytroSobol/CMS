<html>
<head>
	<link rel="shortcut icon" href="template/img/favicon.png">
      <link rel="stylesheet" href="template/css/bootstrap.min.css">
      <link rel="stylesheet" href="template/icons/icomoon.css">
      <link rel="stylesheet" href="template/icons/fontawesome-all.min.css">
      <link rel="stylesheet" href="template/css/plugins.css">
      <link rel="stylesheet" href="template/css/main.css">
      <link rel="stylesheet" href="template/css/style.css">
      <link rel="stylesheet" href="template/dist/css/swiper.min.css">
</head>
<body>
	<nav id="main-nav" class="main-nav fixed" style="padding: 3%;">
            <div class="row">
                <div class="col-12">
                    <div class="nav-header d-flex justify-content-between align-items-center">
                    	<a href="/" class="logo" title="LOGO">
                        <img class="logo-img" src="template/img/favicon.png" alt="LOGO">
                        </a>
                    </div>

                    <div class="nav-wrap">
                        <ul id="nav" class="nav-wrap__list menu">
<?php
  $file = $_SERVER['REQUEST_URI'];

    switch ($file) {
      case '/':
        echo "
          <li class=\"current\"><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      case '/index.php':
        echo "
          <li class=\"current\"><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      case '/about':
        echo "
          <li><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li class=\"current\"><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      case '/donate':
        echo "
          <li><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li class=\"current\"><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      case '/contacts':
        echo "
          <li><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li class=\"current\"><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      case '/banlist':
        echo "
          <li><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li class=\"current\"><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
      default:
        echo "
          <li><a href=\"/\" title=\"Главная\">Главная</a></li>
          <li><a href=\"/about\" title=\"Проекте\">О Проекте</a></li>
          <li><a href=\"/donate\" title=\"Донат\"><span class=\"red-fox\">Донат</span></a></li>
          <li><a href=\"/contacts\" title=\"Контакты\">Контакты</a></li>
          <li><a href=\"/banlist\" title=\"Банлист\">Банлист</a></li>
                            ";
        break;
    }
?>
                        </ul>
                        <div class="riglt-floats-xs">
                          <?php 
                          if (empty($_SESSION['login']) or empty($_SESSION['id'])){
                          echo "<a href=\"/login\" class=\"btn-login\"><span class=\"ic-sx21\"></span> Войти в аккаунт</a>
                          <a href=\"/how-start\" class=\"btn-startgames\"><span class=\"ic-sx22\"></span> Начать играть</a>";
                        }
                           else{
                           echo "<a href=\"/cabinet\" class=\"btn-login\"><span class=\"ic-sx21\"></span> Личный кабинет</a>
                           <a href=\"/user/logout\" class=\"btn-startgames\"><span class=\"ic-sx22\"></span> Выйти</a>";
                         }
                         ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</body>
</html>