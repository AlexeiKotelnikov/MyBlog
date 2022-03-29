<?php
// сделать проверку на наличие повторения имени  категории в бд
$id = (int)URL_PARAMS['id'];

$showForm = true;

$category = getCategory($id);
$articles = getArticlesFromCategory($id);


if (isset($category['id_category'])) {
    $pageTitle = 'Edit ' . $category['name'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['name']);
        $validateErrors = categoriesValidate($fields);
        $pageTitle = 'Check your mistakes!';
        if (empty($validateErrors)) {
            editCategory($fields, $id);
            $showForm = false;
            $pageTitle = 'Success!';
        }
    } else {
        $fields = ['name' => ''];
        $validateErrors = [];
        $showForm = true;
    }
    $pageContent = template('categories/v_edit', [
        'showForm' => $showForm,
        'validateErrors' => $validateErrors,
        'articles' => $articles,
        'fields' => $fields,
        'category' => $category
    ]);
} else {
    include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
}
