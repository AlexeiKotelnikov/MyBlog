<?php

function addCategory(array $fields): bool
{
    $sql = "INSERT INTO categories (name) VALUES (:name)";
    dbQuery($sql, $fields);
    return true;
}

function categoriesAll(): array
{
    $sql = "SELECT * from categories";
    $query = dbQuery($sql);
    return $query = $query->fetchAll();
}

function getCategory(int $id): ?array
{
    $sql = "SELECT * FROM categories
            WHERE id_category = :id";
    $query = dbQuery($sql, ['id' => $id]);
    $article =  $query->fetch();
    return is_array($article) ? $article : null;
}

function getCategoryFromArticle(int $id): ?array
{
    $sql = "SELECT * FROM categories AS c
            JOIN articles AS a 
            ON c.id_category = a.id_category
            WHERE a.id_article = :id";
    $query = dbQuery($sql, ['id' => $id]);
    $category =  $query->fetch();
    return is_array($category) ? $category : null; // проверка на несуществующие страницы
}

function removeCategory(int $id): bool
{
    $sql = "DELETE FROM categories WHERE id_category = :id";
    $query = dbQuery($sql, ['id' => $id]);
    return false;
}

function editCategory(array $fields, int $id): bool
{
    $sql = "UPDATE categories SET name = :name WHERE id_category = $id";

    dbQueryCategoryEdit($sql, $fields);
    return true;
}

function categoriesValidate(array &$fields): array
{
    $errors = [];
    /* $textLen = mb_strlen($fields['content'], 'UTF-8'); */

    if (mb_strlen($fields['name'], 'UTF-8') < 2) {
        $errors[] = 'Имя не короче 2 символов!';
    }

    /* if ($textLen < 10 || $textLen > 140) {
        $errors[] = 'Текст от 10 до 140 символов!';
    } */

    $fields['name'] = htmlspecialchars($fields['name']);
    /* $fields['content'] = htmlspecialchars($fields['content']); */

    return $errors;
}
