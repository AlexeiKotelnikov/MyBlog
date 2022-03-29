<main>
    <h1>Articles in table</h1>
    <hr>
    <a href="<?= BASE_URL ?>">View as list</a>
    <hr>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Title</td>
                <td>Date ADD Article</td>
                <td>ID Category</td>
                <td>More Info</td>
            </tr>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['dt_add'] ?></td>
                    <td><?= $article['id_category'] ?></td>
                    <td><a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>">Read more</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>