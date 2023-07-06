<?php 
include "./app/include/header.php";
//include "./app/control/topics.php";
//include "./app/control/comments.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/cosmo/app/database/db.php";

// $post = SelectONE('posts', ['id' => $_GET['post']]);
$post = selectAllFromPostWithUsersOnSinglePage('posts', 'users', $_GET['id']);
$topics = selectALL('category');





?>


<!-- Основная часть -->

<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h4><?=$post['title'];?></h4>
            <div class="single_post row">
                <div class="img col-12">
                    <img class="img-thumbnail" src="<?=BASE_URL ."assets/image/postsImg/" . $post['image'] ?>"
                        alt="<?=$post['title'];?>">
                </div>
                <div class="single_post_text col-12">
                    <div class="info">
                        <i class="far fa-user"></i><?=$post['username'];?>
                        <i class="far fa-calendar"></i><?=$post['create_date'];?>
                    </div>
                    <?=$post['content'];?>

                </div>
 
                <!-- Блок комментариев -->
                <?php include "./app/include/comments.php"; ?>
            </div>

        </div>
        <!-- sidebar content -->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="search...">
                </form>
            </div>
            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach($topics as $key => $topic): ?>
                    <li><a href="<?=BASE_URL . "category.php?id=" . $topic['id']; ?>"><?=$topic['name']; ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Конец основной чсати -->
<!-- Footer -->
<?php 
include "./app/include/footer.php";
?>