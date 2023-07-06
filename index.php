<?php 
include "./app/include/header.php";
include "./app/control/topics.php";


//
$posts = selectAllFromPostWithUsersOnIndex('posts', 'users');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$offset = $limit * ($page - 1 );
$rows = countRow('posts');
$pages = ceil(countRow('posts')/$limit) ;
$posts = selectAllForPages('posts','users', $limit, $offset);
$topposts = selectTopPostsOnIndex('posts');

?> 
<!-- Начало блока карусель -->

<div class="container">
    <div class=" row">
        <h3 class="slider-title">Топ публикаций</h3>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <?php foreach ($topposts as $key => $toppost) :?>
            <div class="carousel-item active">
                <img src="<?=BASE_URL ."assets/image/postsImg/" . $toppost['image'] ?>" class="d-block w-100 "
                    alt="<?=$toppost['title'];?>">
                <div class="carousel-caption carousel-caption-new d-none d-md-block">
                    <h5><a href="<?=BASE_URL ."single.php?id=" . $toppost['id'];?>"><?=$toppost['title'];?></a></h5>
                    <p><?=mb_substr($toppost['content'], 0, 50, 'UTF-8' ) . "..." ;?></p>

                </div>

            </div>

            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- КОнец блока карусель -->
<!-- Основная часть -->

<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h4>Последние публикации</h4>
            <?php foreach ($posts as $key => $post) :?>

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
            <!-- Пагинация -->
         <?php include './app/include/pagination.php'; ?>
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