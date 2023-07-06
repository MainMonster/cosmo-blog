<?php 
include ("./../../app/include/header-admin.php");
include ("./../../app/control/comforadm.php");
//include ("./app/control/comments.php");
//include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/control/comments.php";

//test($commentsForAdmin);


?>
<body>
    <div class="container">
       
          <?php include './../../app/include/sidebar.php'; ?>

            <div class="posts col-9">
               
                 <div class="row title-table">
                    <h3>Управление комментариями</h3>
               
                    <div class="col-1">ID</div>
                    <div class="col-4">Текст комментария</div>
                    <div class="col-2">Автор</div>
                    <div class="col-5">Управление</div>
                    
                    <!-- <div class="created col-2">Дата публикации</div> -->
                 </div>
                 <div class="row post">
                 <?php foreach($commentsForAdmin as $key => $comment): ?>

                    <div class="id col-1"><?=$comment['id'];?></div>
                    <div class="title col-6"><?=mb_substr($comment['comment'], 0, 50) . ".."; ?></div>
                  
                    <div class="author col-2"><a href="#"><?=$comment['email']; ?></a></div>
                  
                    <div class="edit col-1"><a href="edit.php?id_comment=<?=$comment['id'];?>">edit</a></div>
                    <div class="delete col-1"><a href="edit.php?delete_comment=<?=$comment['id'];?>">delete</a></div>
                  
                  <?php if ($comment['status']): ?>
                    <div class="status col-1"><a href="edit.php?status=0&pub_id=<?=$comment['id'];?>">published</a></div>
                        <?php else: ?>
                    <div class="status col-1"><a href="edit.php?status=1&pub_id=<?=$comment['id'];?>">unpublished</a></div>
                        <?php endif; ?>
                       
                  <?php endforeach; ?>
             
            </div> 
        </div>

    </div>
</body>

<?php 
include ("./../../app/include/footer.php");
?>