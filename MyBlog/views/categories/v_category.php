<div>
    <ul>
        <h3>Список Статей</h3>
        <?php foreach ($articles as $article) : ?>
            <li><a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>"><?= $article['title']; ?></a></li>
        <?php endforeach ?>
    </ul>
</div>
<hr>