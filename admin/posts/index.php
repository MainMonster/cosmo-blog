<?php 
include ("./../../app/include/header-admin.php");
include ("./../../app/control/posts.php");
?>
<body>
    <div class="container">
       
          <?php include './../../app/include/sidebar.php'; ?>

            <div class="posts col-9">
                <div class=" button row">
                    <a href="<?= BASE_URL . "./admin/posts/create.php" ;?>" class="col-3 btn btn-secondary"">Создать</a>
                   <span class="col-1"></span>
                    <a href=""<?= BASE_URL . "./admin/posts/index.php" ;?>"index.php" class="col-3 btn btn-primary">Редактировать</a>
                </div>
                 <div class="row title-table">
                    <h3>Управление записями</h3>
                    <div class="col-1">ID</div>
                    <div class="col-4">Название</div>
                    <div class="col-2">Автор</div>
                    <div class="col-5">Управление</div>
                    
                    <!-- <div class="created col-2">Дата публикации</div> -->
                 </div>
                 <div class="row post">
                 <?php foreach($postsADM as $key => $post): ?>

                    <div class="id col-1"><?=$key+1;?></div>
                    <div class="title col-4"><?=mb_substr($post['title'], 0, 50) . "..."; ?></div>
                  
                    <div class="author col-2"><a href="#"><?=$post['username']; ?></a></div>
                  
                    <div class="edit col-2"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                    <div class="delete col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                  
                  <?php if ($post['status']): ?>
                    <div class="status col-1"><a href="edit.php?status=0&pub_id=<?=$post['id'];?>">published</a></div>
                        <?php else: ?>
                    <div class="status col-1"><a href="edit.php?status=1&pub_id=<?=$post['id'];?>">unpublished</a></div>
                        <?php endif; ?>
                       
                  <?php endforeach; ?>
             
            </div> 
        </div>

    </div>
</body>

<?php 
include ("./../../app/include/footer.php");
?>