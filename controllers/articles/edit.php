<?php

if (!$user == null) {
    $id = (int)URL_PARAMS['id'];
    $trueUser = getUsersIdByToken($_SESSION['token']);
    $articles = getArticles($id);
    $user = getUserById($articles['id_user']);
    $verify = $user['id_user'] ?? null;
    $hasUser = ($verify !== null);
    $accessGiven = $trueUser['id_user'] === $user['id_user']; //проверка на соответствие айди юзера в таблицах сессия и юзеры
    $showForm = true;

    if ($hasUser && $accessGiven) {

        $categories = categoriesAll();
        $category = getCategoryFromArticle($id);

        if (isset($articles['id_article'])) {
            $pageTitle = 'Edit ' . $articles['title'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fields = extractFields($_POST, ['title', 'content', 'categories']);
                $validateErrors = articlesValidate($fields);
                $pageTitle = 'Check your mistakes!';
                if (empty($validateErrors)) {
                    editArticle($fields, $id);
                    $showForm = false;
                    $pageTitle = 'Success!';
                }
            } else {
                $fields = ['title' => '', 'content' => '', 'categories' => ''];
                $validateErrors = [];
                $showForm = true;
            }
            $pageContent = template('articles/v_edit', [
                'showForm' => $showForm,
                'validateErrors' => $validateErrors,
                'articles' => $articles,
                'fields' => $fields,
                'categories' => $categories,
                'category' => $category
            ]);
        } else {
            include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
        }
    } else {
        header('Location:' . BASE_URL);
        exit();
    }
} else {
    header('Location:' . BASE_URL);
    exit();
}
