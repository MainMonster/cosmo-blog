<?php
include "./app/control/comments.php";
?>



<div class="col-md-12 col-12 comments">
    <h3>Оставить комменетарий</h3>
    <div class="col-md-12 col-12 errmsg">
        <!-- Вывод массива с ошибками -->
       
         <?php include "./app/faq/error_info.php"; ?> 
    </div>
    <form action="<?= BASE_URL . "single.php?id=$page";?>" method="post">
        <div class="m-3">
            <input name="page" value="<?=$page;?>" type="hidden">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Напишите комментарий</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-12">
            <button name="subComment" type="submit" class="btn btn-light">Отправить</button>
        </div>

    </form>
    <?php if(!empty($comments))  : 0 ?>

    <h4>Комментарии к записи</h4>
    <div class="row all-comments">

        <?php foreach ($comments as $key => $comment) :?>
        <div class="one-comment col-12">
               
           <i class="fa-solid fa-user"></i> <span class="autor"> <?=$comment['username'];?></span>
              
            <span class="create-date"><?=$comment['create_date'];?></span>
            <div class="text col-12">
                <li class="comment"><?=$comment['comment'];?></li>

            </div>
        </div>
        <? endforeach; ?>
    </div>
    <? endif ;?>

</div>