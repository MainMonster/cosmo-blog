<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";


$page = $_GET['id'];
$email = "";
$comment = "";
$errMessage = [];
$status = 0;
$comments = selectAllMailUserForComments('users', 'comments', ['id' => $_GET['id']]);



// Код для формы Создания комментария

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subComment'])){
   

    
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
 
    if($email === '' || $comment === ''){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif(mb_strlen($comment, 'UTF8') < 2){
        array_push($errMessage,  "Комментарий должен быть длиннее");
    }else{

         $user = SelectONE('users', ['email' => $email]);
         if (!empty($user['email']) && $user['email'] === $email){
             $status = 1;
         }else{
             array_push($errMessage,  "Перед публикацией Ваше сообщение будет проверено модератором");
             
         }

// Массив значений           
        $comment = [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment,
        
        ]; 

        
         $query =  INSERT('comments', $comment);
         $page = $_GET['id'];
         $comments = selectAllMailUserForComments('users', 'comments', ['id' => $_GET['id']]);
         //$comments = selectAll('comments', ['page' => $page, 'status' => 1] );
       
      }
 
    
    }else{
      
        $email = '';
        $comment = ''; 
   //  $comments = selectAll('comments', ['page' => $page, 'status' => 1 ] );
     //$comments = [];
    }

   // $comments = selectAllMailUserForComments('users', 'comments', ['id' => $_GET['id']]);

    
