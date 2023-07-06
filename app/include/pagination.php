<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$offset = $limit * ($page - 1 );
$rows = countRow('posts');
$pages = ceil(countRow('posts')/$limit) ;
$posts = selectAllForPages('posts','users', $limit, $offset);
?>

<nav aria-label="Page navigation example">
  <ul class="pag justify-content-center">
    <li class="page_item disabled">
      <a class="page-link"></a>
    </li>
    <?php if($page = 1): ?> 
    <li class="page_item"><a class="page_link" href="?page=1">1</a></li>
    <? endif; ?>
    <?php if($page > 1): ?>
  <li class="page_item"><a class="page_link" href="?page=<?= ($page - 1) ;?>"><?=$page;?></a></li>
    <? endif; ?>
    <?php if($page < $pages): ?>
  <li class="page_item"><a class="page_link" href="?page=<?= ($page + 1) ;?>">>>></a></li>
    <? endif; ?>
 
<!-- 
    <li class="page_item"><a class="page-link" href="#">2</a></li>
    <li class="page_item"><a class="page-link" href="#">3</a></li>-->
    <li class="page_item">

      <a class="page-link" href="?page=<?=$pages;?>">>>></a>
    </li> 
  </ul>
</nav>
