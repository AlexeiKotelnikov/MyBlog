<div>
    <div><?= $articles['content'] ?></div>
    <div>Категория: <a href="<?= BASE_URL ?>category/<?= $category['id_category'] ?>"><?= $category['name'] ?></a></div>
    <time><?= $articles['dt_add'] ?></time>
</div>
<hr>