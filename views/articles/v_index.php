<main>
    <h1>Articles</h1>
    <hr>
    <a href="<?= BASE_URL ?>?view=table">View as table</a>
    <hr>
    <div class="articles">
        <?php foreach ($articles as $article) : ?>
            <div class="article">
                <h2><?= $article['title'] ?></h2>
                <time><?= $article['dt_add'] ?></time><br>
                <a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>