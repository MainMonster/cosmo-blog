<?php
include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";
// include   "./app/database/db.php";
//include  "../app/include/header.php";
//include './app/database/db.php'; 
 // include "topics.php";


$errMessage = [];
$approve = '';
$usersAll = selectAll('users');
$id = "";

function LoginUser($existance){
    $_SESSION['id'] = $existance['id'];
    $_SESSION['admin'] = $existance['admin'];
    $_SESSION['login'] = $existance['username'];

    if ($_SESSION['admin']) {
        header('location: '. BASE_URL . 'admin/posts/index.php');
     }   else{
        header('location: '. BASE_URL);
    }
}


// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;    
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['password-first']);
    $passS = trim($_POST['password-second']);
    
  
    if($login === '' || $email === '' || $passF === '' ){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif( mb_strlen($login, 'UTF8') < 3){
        array_push($errMessage, "Слишком короткий логин!");
    }elseif($passF !== $passS){
        array_push($errMessage, "Пароли не совпадают!");
    }else{
        $exist = SelectONE('users', ['email' => $email]);
      
        if (!empty($exist['email']) && $exist['email'] === $email) {
            array_push($errMessage, "Такой пользователь уже зарегистрирован!");
        }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $params = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass,
            ]; 
   
      $id = INSERT('users', $params);
      $user = SelectONE('users', ['id' => $id ] );
        LoginUser($user);
      }
    }
  } 
  
  // Код для формы авторизации 
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
        $email = trim($_POST['mail']);
        $pass = trim($_POST['password']);

        if($email === '' || $pass === '' ){
            array_push($errMessage, "Не все поля заполнены!");

        }else{
            $exist = SelectONE('users', ['email' => $email]);
            // $existP = SelectONE('users', ['password' => $pass]);
            if($exist && password_verify($pass, $exist['password'])){
            LoginUser($exist);
              
            }else{
                array_push($errMessage, "Ошибка авторизации");
            }

         }
}else{
    $login = '';
    $email = '';
}
//Добавление пользователей внутри админки
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-create'])){
  

    $admin = 0;    
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['password-first']);
    $passS = trim($_POST['password-second']);
    
  
    if($login === '' || $email === '' || $passF === '' ){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif( mb_strlen($login, 'UTF8') < 3){
        array_push($errMessage, "Слишком короткий логин!");
    }elseif($passF !== $passS){
        array_push($errMessage, "Пароли не совпадают!");
    }else{
        $exist = SelectONE('users', ['email' => $email]);
      
        if (!empty($exist['email']) && $exist['email'] === $email) {
            array_push($errMessage, "Такой пользователь уже зарегистрирован!");
        }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $admin = isset($_POST['admin']) ? 1 : 0;
        //   if (isset($_POST['admin'])) $admin = 1; // так тоже работает

        $params = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass,
            ]; 
   
      $id = INSERT('users', $params);
      $user = SelectONE('users', ['id' => $id ] );
        header('location: ' . BASE_URL ."./admin/users/index.php");
       
      }
    }
  } else{
    $login = '';
    $email = '';
  }


// Редактирование пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
          
    $user = SelectONE('users', ['id' => $_GET['edit_id']]);

    //test($user);
  
    $id = $user['id'];
    $admin = $user['admin'];
    $login = $user['username'];
    $mail = $user['email'];

 }
// обновление пользователя
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-edit'])){
    

    $id = $_POST['id'];
    $admin = isset($_POST['admin']) ? 1 : 0;
    $login = trim($_POST['login']);
    $mail = trim($_POST['email']);
    $passF = trim($_POST['password-first']);
    $passS = trim($_POST['password-second']);
    $UserPass = SelectONE('users', ['id' => $_POST['id']]);
//test($UserPass['password']);

// Проверка на корректность  вводимых данных
if($login === '' ){
    array_push($errMessage, "Поле не заполнено");
}elseif(mb_strlen($login, 'UTF8') < 3){
    array_push($errMessage,  "Пожалуйста придумайте логин длиннее 2х символов");
}elseif($passF !== $passS){
    array_push($errMessage, "Пароли не совпадают!");
}else{
        if ($passF=== '' || $passS=== '') {
            $pass = $UserPass['password'];
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
        }
// Массив значений    
    $user = [
        'admin' => $admin,
        'username' => $login,
        'password' => $pass,
        
    ]; 
   $query = UPDATE('users', $id, $user);
      header('location: ' . BASE_URL ."./admin/users/index.php");
    }
}else{
//  //   $title = $_POST['title'];
//   //  $content = $_POST['content'];
//   //  $publish = isset($_POST['publish']) ? : 0;
//   //  $category_name =  $_POST['category_name'];;
}








// Смена роли
  if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])){
    //  test($_GET);
    $admin = $_GET['admin'];
    $id = $_GET['user_id'];
   
   $sql = UPDATE('users', $id, ['admin' => $admin]);
   //test($sql);
   header('location: ' . BASE_URL ."./admin/users/index.php");
   exit();
}  

      // Удаление пользователя
      if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
        //test($_GET['delete_id']);
        $id = $_GET['delete_id'];
        $query = DELETE('users', $id);
        header('location: ' . BASE_URL ."./admin/users/index.php");
    }   