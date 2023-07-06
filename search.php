<?php 
include "./app/include/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
$posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}else{
 
}

?>

<!-- Основная часть -->

<div class="container">
    <div class="content row">
        <div class="main-content col-12">
            <h4>Результаты поиска</h4>
            <?php foreach ($posts as $key => $post) :?>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img class="img-thumbnail" src="<?=BASE_URL ."assets/image/postsImg/" . $post['image'] ?>"
                        alt="<?=$post['title'];?>">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL ."single.php?post=" . $post['id'];?>">
                            <?=mb_substr($post['title'], 0, 50) . "...";?></a>
                    </h3>
                    <i class="far fa-user"></i> <?=$post['username'];?>
                    <i class="far fa-calendar"></i> <?=$post['create_date'];?>
                    <p class="preview-text"><?=mb_substr($post['content'], 0, 150, 'UTF-8' ) ;?></p>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
      
    </div>
</div>
<!-- Конец основной чсати -->
<!-- Footer -->
<?php 
include "./app/include/footer.php";
?>