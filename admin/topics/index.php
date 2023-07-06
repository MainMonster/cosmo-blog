<?php
include ("./../../app/include/header-admin.php");
include ("./../../app/control/topics.php");


?>

<body>
    <div class="container">

        <?php include './../../app/include/sidebar.php'; ?>

        <div class="posts col-9">
            <div class=" button row">
                <a href="<?= BASE_URL . "./admin/topics/create.php" ;?>" class="col-3 btn btn-secondary"">Создать</a>
                   <span class=" col-1"></span>
                    <a href="<?= BASE_URL . "./admin/topics/index.php" ;?>"
                        class="col-3 btn btn-primary">Редактировать</a>
            </div>
            <div class="row title-table">
                <h3>Управление категориями</h3>
                <div class="col-md-12 col-12 errmsg">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/faq/error_info.php"; ?>
                </div>
                <div class="col-1">ID</div>
                <div class="col-2">Название</div>
                <div class="col-3">Описание</div>
                <div class="col-2">Управление</div>

                <!-- <div class="created col-2">Дата публикации</div> -->
            </div>
            <?php foreach($topics as $key => $topic): ?>

            <div class="row post">
                <div class="id col-1"><?=$key+1; ?></div>
                <div class="title col-2"><?=$topic['name']; ?></div>
                <div class="title col-5"><?=$topic['description']; ?></div>
                <div class="edit col-1"><a href="edit.php?id=<?=$topic['id'];?>">edit</a></div>
                <div class="delete col-1"><a href="edit.php?delete_id=<?=$topic['id'];?>">delete</a></div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>


    </div>
</body>

<?php 
include ("./../../app/include/footer.php");
?>