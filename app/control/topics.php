<?php 
//include "comments.php";
include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";
//include 'users.php'; 
//include  "./app/database/db.php";

//test(SelectONE('category'));
$errMessage = [];
$approve = "";
$topics = selectALL('category');
$id = " ";
$name = " ";
$desc = " ";



// Код для формы Создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){
   
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
  
    if($name === '' || $description === ''){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif(mb_strlen($name, 'UTF8') < 4){
        array_push($errMessage, "Короткое название категории!");
    }else{
        $exist = SelectONE('category', ['name' => $name]);
       
        if (!empty($exist['name']) && $exist['name'] === $name) {
            array_push($errMessage, "Такая категория уже есть!"); 
        }else{
   
        $topic = [
            'name' => $name,
            'description' => $description
        ]; 
     
   $query = INSERT('category', $topic);
     $category = SelectONE('category', ['id' => $id ] );
     $approve = "Категория успешно добавлена";
     header('location: ' . BASE_URL ."./admin/topics/index.php");
     }
    }
    }else{
        $name = '';
        $description = '';
     }
  
     // Редактирование категории
     if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
     
       //$id = $_GET['id'];
       $topic = SelectONE('category', ['id' => $_GET['id']]);
       $id = $topic['id'];
       $name = $topic['name'];
       $desc = $topic['description']; 
       
        
      } 

     // обновление категории
     if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
      
        if($name === '' || $description === ''){
            array_push($errMessage, "Не все поля заполнены!");
        }elseif(mb_strlen($name, 'UTF8') < 2){
            array_push($errMessage, "Короткое название категории!");
        }else{
                       
            $topic = [
                'name' => $name,
                'description' => $description
            ]; 
          $id = $_POST['id'];
          $query =  UPDATE('category', $id, $topic);
          header('location: ' . BASE_URL ."./admin/topics/index.php");
         }
        }
        
    // Удаление категории 
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $query = DELETE('category', $id);
         header('location: ' . BASE_URL ."./admin/topics/index.php");
    }   

