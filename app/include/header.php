<?php 
include "setting.php";
//include "app/control/topics.php";
//include "./app/control/users.php";



?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosmos</title>
 
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<link rel="stylesheet" href=" ./assets/css/style.css"> 
</head>
  <body >
    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                   <h2><a href="<?php echo BASE_URL . "index.php" ?>">Galactic</a></h2>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-house"></i>Главная</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Услуги</a></li>
                        <li>
                            <?php if (isset($_SESSION['id'])): ?>
                                <a href="#"><i class="fa-solid fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                                </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                <li><a href="<?php echo BASE_URL . "/admin/posts/index.php"; ?>">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a></li>
                            </ul>
                            <?php else:   ?>
                               
                                <a href="<?php echo BASE_URL . "autorization.php"; ?>"> <i class="fa-solid fa-user"></i>
                                Вход
                                </a>
                                <ul>
                                <li><a href="<?php echo BASE_URL . "registration.php"; ?>">Регистрация</a></li>
                                
                            </ul>
                            <?php endif;   ?>
                            
                        </li>
                    </ul>
                </nav>

    
            </div>
        </div>
    </header>
