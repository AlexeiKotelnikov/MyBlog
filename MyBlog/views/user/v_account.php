<table width="100%">
    <tr>
        <td>Имя Фамилия</td>
        <td><?= $user['name'] ?></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><?= $user['email'] ?> </td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><?= $user['phone'] ?? '***' ?></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><?= $user['address'] ?? '***' ?></td>
    </tr>
</table>
<hr>
<?php if ($hasArticles) : ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Title</td>
                <td>Date ADD Article</td>
                <td>More Info</td>
                <td>Edit Article</td>
                <td>Delete Article</td>
            </tr>

            <?php foreach ($articles as $article) : ?>

                <tr>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['dt_add'] ?></td>
                    <td><a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>">Перейти к статье</a></td>
                    <td><a href="<?= BASE_URL ?>articles/edit/<?= $article['id_article'] ?>">Редактировать вашу Статью</a></td>
                    <td><a href="<?= BASE_URL ?>articles/delete/<?= $article['id_article'] ?>">Удалить статью</a></td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <p>У вас еще нет статей</p>
<?php endif ?>