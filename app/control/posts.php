<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";
//include ("./../../app/include/header-admin.php");
//include 'users.php'; 
//include  "./app/database/db.php";
if (!$_SESSION) {
    header('location: ' . BASE_URL ."autorization.php");
}


$errMessage = [];
$approve = "";
$id = "";
$title = "";
$content = "";
$img = "";
$category_name = "";



$categories = selectAll('category');
$posts = selectAll('posts');
$postsADM = selectAllFromPostWithUsers('users', 'posts');

// Код для формы Создания статьи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])){

 
// Загрузка изображания  
    if (!empty($_FILES['img']['name'])) {
       $img_name = time() . "_" . $_FILES['img']['name'];
       $fileTmpName = $_FILES['img']['tmp_name'];
       $destination = ROOT_PATH . '\assets\image\postsImg\\' . $img_name;
       $fileType = $_FILES['img']['type'];
       $fileSize = $_FILES['img']['size'];
       

 
// Проверка является ли файл изображением
            if (strpos($fileType, 'image') === false) {
                array_push($errMessage, "Можно загружать только изображения");
            }elseif($fileSize > 1024000){
                array_push($errMessage, "Слишком большой размер файла");
            }else{
                
            $result = move_uploaded_file($fileTmpName, $destination);

                if ($result) {
                        $_POST['img'] = $img_name;
                    }else{
                        array_push($errMessage, "Ошибка загрузки изображения на сервер");
                    }
                }
        }else{
            array_push($errMessage,  "Ошибка получения картинки");
    }

 
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category_name = $_POST['category_name'];
    $img = $_POST['img'];
    $publish = isset($_POST['publish']) ? : 0;

   
    
// Проверка на корректность  
    if($title === '' || $content === '' || $category_name === '' ){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif(mb_strlen($title, 'UTF8') < 5){
        array_push($errMessage,  "Название должно быть длиннее!");
    }else{
// Массив значений           
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'image' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $category_name,
        ]; 
        
          $query =  INSERT('posts', $post);
          $post_id = SelectONE('posts', ['id' => $id ] );
          header('location: ' . BASE_URL ."./admin/posts/index.php");
      }
 
    
    }else{
        $id = '';
        $title = '';
        $content = '';
        $publish = '';
        $category_name = '';
    }
  
     // Редактирование поста
     if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
      
      
            $post = SelectONE('posts', ['id' => $_GET['id']]);
           // test($post);
      
            $id = $post['id'];
            $title = $post['title'];
            $content = $post['content'];
            $category = $post['id_topic'];
            $publish = $post['status'];
            }

     // обновление поста
     if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-edit'])){
       
          
        if (!empty($_FILES['img']['name'])) {
        //  test($_FILES);
            $img_name = time() . "_" . $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $destination = ROOT_PATH . '\assets\image\postsImg\\' . $img_name;
            $fileType = $_FILES['img']['type'];
            $fileSize = $_FILES['img']['size'];
       
      
     // Проверка является ли файл изображением
                 if (strpos($fileType, 'image') === false) {
                     array_push($errMessage, "Можно загружать только изображения");
                 }elseif($fileSize > 1024000){
                     array_push($errMessage, "Слишком большой размер файла");
                 }else{
                     
                 $result = move_uploaded_file($fileTmpName, $destination);
     
                     if ($result) {
                             $_POST['img'] = $img_name;
                         }else{
                             array_push($errMessage, "Ошибка загрузки изображения на сервер");
                         }
                     }
             }else{
                 array_push($errMessage,  "Ошибка получения картинки");
         }

         $id = $_POST['id'];
         $title = trim($_POST['title']);
         $content = trim($_POST['content']);
         $category_name = $_POST['category_name'];
         $img = $_POST['img'];
         $publish = isset($_POST['publish']) ? 1 : 0;
      
    // Проверка на корректность  
        if($title === '' || $content === '' || $category_name === '' ){
            array_push($errMessage, "Не все поля заполнены!");
        }elseif(mb_strlen($title, 'UTF8') < 5){
            array_push($errMessage,  "Название должно быть длиннее!");
        }else{
    // Массив значений           
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'image' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $category_name,
            ]; 
      
              $query = UPDATE('posts', $id, $post);
              header('location: ' . BASE_URL ."./admin/posts/index.php");
          }
     
        
        }else{
         //   $title = $_POST['title'];
          //  $content = $_POST['content'];
          //  $publish = isset($_POST['publish']) ? : 0;
          //  $category_name =  $_POST['category_name'];;
        }

   // Публикация статьи 
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
            $id = $_GET['pub_id'];
            $publish = $_GET['status'];
     
           $sql = UPDATE('posts', $id, ['status' => $publish]);
           //test($sql);
           header('location: ' . BASE_URL ."./admin/posts/index.php");
           exit();
        }  
        

    // Удаление поста 
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
         DELETE('posts', $id);
         header('location: ' . BASE_URL ."./admin/posts/index.php");
    }   
    // pub_id