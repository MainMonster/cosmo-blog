<?php
include ("./../../app/include/header-admin.php");
include ("./../../app/control/posts.php");
?>


<div class="container">

    <?php include './../../app/include/sidebar.php'; ?>

    <div class="posts col-9">
        <div class=" button row">
            <a href="<?= BASE_URL . "./admin/posts/create.php" ;?>" class="col-3 btn btn-secondary">Добавить</a>
            <span class=" col-1"></span>
            <a href="<?= BASE_URL . "./admin/posts/index.php";?>" class="col-3 btn btn-primary">Управление</a>
        </div>
        <div class="row ">
            <h3>Добавление записи</h3>
            <div class="col-md-12 col-12 errmsg">
               <!-- Вывод массива с ошибками -->
            <?php include "../../app/faq/error_info.php"; ?> 
            </div>

            <!-- <div class="created col-2">Дата публикации</div> -->
        </div>
        <div class="row add-post">
            <form action="create.php" method="post" enctype="multipart/form-data">
                <div class="col  mb-3">
                    <input value="<?=$title;?>" name="title" type="text" class="form-control" placeholder="Название статьи"
                        aria-label="Название статьи">
                </div>
                <div class="w-100"></div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Содержимое записи</label>
                    <textarea name="content" class="form-control" id="editor" rows="7"> <?=$content;?> </textarea>
                </div>

                <div class="input-group col mb-3">
                    <input name="img" type="file" class="form-control" id="img" >
                    <label class="input-group-text" for="img">Загрузить</label>
                </div>
                <div class="mb-3">
                    <select name="category_name" class="form-select" aria-label="Default select example">
                        <option selected>Выберите кaтегорию</option>

                        <?php foreach($categories as $key => $category): ?>

                        <option value="<?=$category['id']?>"> <?=$category['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value='1' name="publish" id="status" checked>
                        <label class="form-check-label" for="status">Публикация</label>

                    </div>

                    <div class="mb-3 col-6">
                        <button name="add-post" class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
            </form>

        </div>
    </div>


</div>



<?php
include("./../../app/include/footer.php");
?>