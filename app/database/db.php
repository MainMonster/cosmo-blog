<?php


require 'connect.php';


function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit();
};


// проверка выполнения запросов к БД
function dbCheckErr($query){
// возвращает ошибки(если есть)
    $errInfo = $query->errorInfo();
// проверка на ошибки
    if ($errInfo[0] !==PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запрос на получение данных из таблицы
function selectAll($table, $params = []){
// обращаемся к экземпляру класса
    global $pdo;
// сам запрос
    $sql = "SELECT * FROM $table";    
// проверка параметров
if(!empty($params)){
    $i=0;
    foreach($params as $key => $value){
        if (!is_numeric($value)){
            $value = "'". $value ."'";
        }
        if($i === 0){
            $sql = $sql . " WHERE " . " $key = $value";
        }else{
            $sql = $sql . " AND " . " $key = $value"; 

        } 
    $i++; 
      }
    }
   
// подготовка
    $query = $pdo->prepare($sql);
//  выполнение
    $query->execute();

    dbCheckErr($query);

// возвращает значение
    return $query->fetchAll();
}

// Запрос на получение одной строки из таблицы
function SelectONE($table, $params = []){
    // обращаемся к экземпляру класса
        global $pdo;
    // сам запрос
        $sql = "SELECT * FROM $table";    
    // проверка параметров
    if(!empty(is_array($params))){
        $i=0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'". $value ."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE " . " $key = $value";
            }else{
                $sql = $sql . " AND " . " $key = $value"; 
    
            } 
        $i++; 
          }
        }
    //    $sql = $sql . " LIMIT 1";
    // подготовка
        $query = $pdo->prepare($sql);
    //  выполнение
        $query->execute();
        dbCheckErr($query);
    // возвращает значение
        return $query->fetch();
    }
  

// Запись в таблицу БД
function INSERT($table, $params){
    // обращаемся к экземпляру класса
    global $pdo;

 // INSERT INTO `users` ( `admin`, `username`, `email`, `password`)VALUES ('0', 'Alester', 'Alester@mail.com', '123');
     $i=0;
     $column = "";
     $mask =""; 
 foreach ($params as $key => $value){
        if($i === 0){
            $column = $column . $key ;
            $mask = $mask . "'" . $value . "'" ;
        }else{
    
    $column =  $column . ", $key";
    $mask = $mask . ", " . "'" . $value . "'" ;
       }
    $i++;}

    $sql = "INSERT INTO $table ($column) VALUES ( $mask)";

  
     $query = $pdo->prepare($sql);
      $query->execute($params);
    dbCheckErr($query);
    return $pdo->lastInsertId();
}


 // Обновление строки в таблице
    function UPDATE($table, $id, $params){
        global $pdo;

         $i=0;
         $str = '';
         
        foreach ($params as $key => $value){
                if($i === 0){
                    $str =  "$key = ". "'" . $value . "'" ;
                    
                }else{
                    $str = $str . ", $key = ". "'" . $value . "'";
                   
        
            }
           $i++;
        } 
            $sql = "UPDATE $table SET $str WHERE id = $id";
                
            $query = $pdo->prepare($sql);
            $query->execute($params);
            dbCheckErr($query);
    }


    // Удаление строки в таблице
    function DELETE($table, $id){
        global $pdo;
         
            $sql = "DELETE FROM $table WHERE id = $id";
                
            $query = $pdo->prepare($sql);
            $query->execute();
            dbCheckErr($query);
    }
// Выборка записей (posts) с автором в админку
 function selectAllFromPostWithUsers($table1, $table2){
         global $pdo;

         $sql =
         
         "SELECT 
         t1.username,
         t2.id,
         t2.title,
         t2.image,
         t2.content,
         t2.status,
         t2.id_topic,
         t2.create_date

         
         FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id = t2.id_user"; 

         $query = $pdo->prepare($sql);
         $query->execute();
         dbCheckErr($query);    
         return $query->fetchAll();
}
// Выборка авторов в топ постов на главной странице 
function selectAllFromPostWithUsersOnIndex($table1, $table2){
    global $pdo;

    $sql =
    
    "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 "; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
// Выборка категорий с авторами для категорий 
function selectAllFromPostsWithUsersOnCategory($table1, $table2, $id){
    $id = $_GET['id'];
    global $pdo;

    $sql =
    
    "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 AND p.id_topic = $id"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
// Выборка авторов в топ постов на главной странице (+пагинация)
function selectAllForPages($table1, $table2, $limit, $offset){
    global $pdo;

    $sql =
    
    "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 LIMIT $limit OFFSET $offset"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}

// Выбор постов на главной странице в слайдер
function selectTopPostsOnIndex($table1){
    global $pdo;

    $sql =  "SELECT * FROM $table1 AS P WHERE p.id_topic = 28"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}

// Поиск по заголовкам и содержимому
function searchInTitleAndContent($text, $table1, $table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));

    global $pdo;
    $sql = "SELECT 
    p.*, u.username 
    FROM $table1 AS p 
    JOIN $table2 AS u 
    ON p.id_user = u.id 
    WHERE p.status = 1
    AND p.title LIKE '%$text%'
    OR p.content LIKE '%$text%' "; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();

}
// Выборка записи (posts) c автором для sinlepage
function selectAllFromPostWithUsersOnSinglePage($table1, $table2, $id){
    $id = $_GET['id'];
    global $pdo;

    $sql =
    
    "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id = $id"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetch();

}
// вывод страниц
function countRow($table){
global $pdo;
$sql = 
"SELECT COUNT(*) FROM $table as p WHERE p.status =1 ";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckErr($query);    
return $query->fetchColumn();
}

//Вывод комментариев

function selectAllMailUserForComments($table1, $table2, $page){
    $page = $_GET['id'];
    global $pdo;
    

    $sql =
    
    "SELECT 
    u.username,
    com.status,
    com.page,
    com.email,
    com.comment,
    com.create_date
   
    
    FROM $table1 AS u JOIN $table2 AS com ON u.email = com.email WHERE com.status = 1 AND com.page = $page"; 

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckErr($query);    
    return $query->fetchAll();
}