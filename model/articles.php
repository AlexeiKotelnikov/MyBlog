<?php

function checkId($id): bool
{
    return !!preg_match('/^[1-9][0-9]*$/', $id);
}

function articlesAll(): array
{
    $sql = "SELECT * from articles ORDER BY dt_add DESC";
    $query = dbQuery($sql);
    return $query = $query->fetchAll();
}

function addArticle(array $fields): bool
{
    $sql = "INSERT INTO articles (title, content, id_category, id_user) VALUES (:title, :content, :categories, :user)";
    dbQuery($sql, $fields);
    return true;
}

function getArticles(int $id): ?array
{
    $sql = "SELECT * from articles where id_article = :id";
    $query = dbQuery($sql, ['id' => $id]);
    $article =  $query->fetch();
    return is_array($article) ? $article : null; // проверка на несуществующие страницы
}

function removeArticle(int $id): bool
{
    $sql = "DELETE from articles where id_article = :id";
    $query = dbQuery($sql, ['id' => $id]);
    return false;
}

function editArticle(array $fields, int $id): bool
{
    $sql = "UPDATE articles SET title = :title, content = :content, id_category = :categories WHERE id_article = $id";

    dbQuery1($sql, $fields);
    return true;
}

function getArticlesFromCategory(int $id): array
{
    $sql = "SELECT * FROM articles AS a
            JOIN categories AS c
            ON c.id_category = a.id_category
            WHERE c.id_category = :id";
    $query = dbQuery($sql, ['id' => $id]);
    return $query = $query->fetchAll();
}

function articlesValidate(array &$fields): array
{
    $errors = [];
    $textLen = mb_strlen($fields['content'], 'UTF-8');

    if (mb_strlen($fields['title'], 'UTF-8') < 2) {
        $errors[] = 'Имя не короче 2 символов!';
    }

    if ($textLen < 10 || $textLen > 140) {
        $errors[] = 'Текст от 10 до 140 символов!';
    }

    $fields['title'] = htmlspecialchars($fields['title']);
    $fields['content'] = htmlspecialchars($fields['content']);

    return $errors;
}
