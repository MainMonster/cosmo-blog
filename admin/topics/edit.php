<?php
include ("./../../app/include/header-admin.php");
include ("./../../app/control/topics.php");
?>


<div class="container">
    <?php include './../../app/include/sidebar.php'; ?>

    <div class="posts col-9">
        <div class=" button row">
            <a href="<?= BASE_URL . "./admin/topics/create.php" ;?>" class="col-3 btn btn-secondary"">Добавить</a>
                   <span class=" col-1"></span>
                <a href="<?= BASE_URL . "./admin/topics/index.php" ;?>" class="col-3 btn btn-primary">Управление</a>
        </div>
        <div class="row ">
            <h3>Редактирование категории</h3>
            <div class="col-md-12 col-12 errmsg">
                <!-- Вывод массива с ошибками -->
                <?php include "../../app/faq/error_info.php"; ?>
            </div>
            <!-- <div class="created col-2">Дата публикации</div> -->
        </div>
        <div class="row add-post">
            <form action="edit.php" method="post">
                <div class="col">
                    <input name="id" value="<?=$id;?>" type="hidden">
                </div>
                <div class="col">
                    <input name="name" value="<?=$name;?>" type="text" class="form-control"
                        placeholder="Название категории" aria-label="Название категории">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Описание категории</label>
                    <textarea name="description" class="form-control" id="content" rows="3"><?=$desc;?></textarea>
                </div>

                <div class="col-12">
                    <button name="topic-edit" class="btn btn-primary" type="submit">Обновить</button>
                </div>
            </form>

        </div>
    </div>




</div>
<?php
include("./../../app/include/footer.php");
?>