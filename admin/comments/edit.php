<?php
include ("./../../app/include/header-admin.php");
include ("./../../app/control/comforadm.php");



?>


<div class="container">

    <?php include './../../app/include/sidebar.php'; ?>

    <div class="posts col-9">
        <div class="row ">
            <h3>Редактирование комментария</h3>
            <div class="col-md-12 col-12 errmsg">
                <!-- Вывод массива с ошибками -->
                <?php include "../../app/faq/error_info.php"; ?>
            </div>

            <!-- <div class="created col-2">Дата публикации</div> -->
        </div>
        <div class="row add-post">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="col">
                    <input type="hidden" name="id" value="<?=$id;?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input name="mail" value="<?=$email;?>" type="email" class="form-control" id="exampleFormControlInput1">


                </div>
                <div class="w-100"></div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Содержимое записи</label>
                    <textarea name="comment" class="form-control" id="editor" rows="7"> <?=$comment;?> </textarea>
                </div>


                <div class="mb-3">
             

                    <div class="form-check mb-3">
                        <?php if (empty($publish) && $publish == 0) : ?>
                        <input class="form-check-input" type="checkbox" name="publish" id="status">
                        <label class="form-check-label" for="status">unpublish</label>
                        <?php else: ?>
                        <input class="form-check-input" type="checkbox" name="publish" id="status" checked>
                        <label class="form-check-label" for="status">publish</label>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 col-6">
                        <button name="comment-edit" class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
            </form>

        </div>
    </div>


</div>



<?php
include("./../../app/include/footer.php");
?>