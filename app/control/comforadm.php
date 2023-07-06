  <?php

include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";
      //Все комментарии для админки
      $commentsForAdmin = selectAll('comments');

   
      $errMessage = [];
      $email = "";
      $comment = "";
      $publish = 0;

// публикация поста из админки
      if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
        $id = $_GET['pub_id'];
        $publish = $_GET['status'];
 
       $sql = UPDATE('comments', $id, ['status' => $publish]);
      
       header('location: ' . BASE_URL ."./admin/comments/index.php");
       exit();
    }  
    

        // Обновление коммента из админки
      if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_comment'])){
          $id = $_GET['id_comment'];
          $commentArray = SelectONE('comments', ['id' => $_GET['id_comment']]);
          $email = $commentArray['email'];
          $comment = $commentArray['comment'];
          $publish = $commentArray['status'];
         //test($commentArray);
       }


       if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment-edit'])){
      //  test($_POST);
        $email = trim($_POST['mail']);
        $comment = trim($_POST['comment']);
      if($email === '' || $comment === '' ){
        array_push($errMessage, "Не все поля заполнены!");
    }elseif(mb_strlen($comment, 'UTF8') < 3){
        array_push($errMessage,  "Слишком мало информации");
    }else{
 
// Массив значений           
        $post = [
            'email' => $email,
            'comment' => $comment,
            'status' => $publish,
        
        ]; 
        $id = $_POST['id'];
        $query = UPDATE('comments', $id, $post);
        header('location: ' . BASE_URL ."./admin/comments/index.php");
      }
    }
   



          // Удаление комментария 
          if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_comment'])){
            //test($_GET);
            $id = $_GET['delete_comment'];
            $query = DELETE('comments', $id);
             header('location: ' . BASE_URL ."./admin/comments/index.php");
        }   
        
        
      ?>