<?php

$id = (int)URL_PARAMS['id'];

$category = getCategory($id);
$articles = getArticlesFromCategory($id);

if (isset($category['id_category'])) {

    if (empty($articles)) {
        removeCategory($id);
        header('Location:' . BASE_URL . '/categories');
        exit();
    } else {
        $pageTitle = 'Error';
        $pageContent = template('errors/v_hasArticle', [
            'articles' => $articles,
            'category' => $category
        ]);
    }
} else {
    include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
}
