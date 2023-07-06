<?php 
include "./app/include/header.php";
include "./app/control/topics.php";

$catygories = selectAllFromPostsWithUsersOnCategory('posts','users',['id_topic' => $_GET['id']]  );
$name = SelectONE('category', ['id' => $_GET['id']] );



?>

<!-- Основная часть -->

<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            
           <?php if (empty($catygories)): ?> 
            <h5> В этом разделе нет постов</h5>
            <?php else: ?>

                <h4>Раздел  <?=$name['name'];?> </h4>
            <h5>  <?=$name['description'];?> </h5>
            <?php foreach ($catygories as $key => $post) :?>
            
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img class="img-thumbnail" src="<?=BASE_URL ."assets/image/postsImg/" . $post['image'] ?>"
                        alt="<?=$post['title'];?>">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL ."single.php?id=" . $post['id'];?>">
                            <?=mb_substr($post['title'], 0, 50) . "...";?></a>
                    </h3>
                    <i class="far fa-user"></i> <?=$post['username'];?>
                    <i class="far fa-calendar"></i> <?=$post['create_date'];?>
                    <p class="preview-text"><?=mb_substr($post['content'], 0, 150, 'UTF-8' ) ;?></p>
                </div>
            </div>

            <?php endforeach; ?>
            <?php endif; ?>

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
<?php include './app/include/pagination.php'; ?>
<!-- Конец основной чсати -->
<!-- Footer -->
<?php 
include "./app/include/footer.php";
?>