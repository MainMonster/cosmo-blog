<?php 
include ("./../../app/include/header-admin.php");
include ("./../../app/control/users.php");
?>
<body>
    <div class="container">
        
        <?php include './../../app/include/sidebar.php'; ?>

            <div class="posts col-9">
                <div class=" button row">
                    <a href="<?= BASE_URL . "./admin/users/create.php" ;?>" class="col-3 btn btn-secondary"">Создать</a>
                   <span class="col-1"></span>
                    <a href="<?= BASE_URL . "./admin/users/index.php" ;?>" class="col-3 btn btn-primary">Редактировать</a>
                </div>
                 <div class="row title-table">
                    <h3>Управление пользователями</h3>
                    <div class="col-1">ID</div>
                    <div class="col-2">Login</div>
                    <div class="col-3">email</div>
                    <div class="col-2">Админ</div>
                    <div class="col-2">Управление</div>
                    
                    <!-- <div class="created col-2">Дата публикации</div> -->
                 </div>
                 <div class="row post">
                    <?php foreach($usersAll as $key => $user): ?>
                        <div class="col-1"><?=$user['id'];?></div>
                        <div class="col-2"><?=$user['username'];?></div>
                        <div class="col-3"><?=$user['email'];?></div>
                    <?php if ($user['admin']):?>

                        <div class="col-2"><a href="index.php?admin=0&user_id=<?=$user['id'];?>">admin</a></div>
                    <?php else: ?>
                         <div class="col-2"><a href="index.php?admin=1&user_id=<?=$user['id'];?>">user</a></div>
                    <?php endif; ?>
                        
                        <div class="edit col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">Редактировать</a></div>
                        <div class="delete col-2"><a href="index.php?delete_id=<?=$user['id'];?>">Удалить</a></div>
                    <?php endforeach; ?>
                 </div>
                
          
            </div>
        </div>


    </div>
</body>

<?php 
include ("./../../app/include/footer.php");
?>