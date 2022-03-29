<?php

if (!$user == null) {

    $id = (int)URL_PARAMS['id'];
    $trueUser = getUsersIdByToken($_SESSION['token']);
    $user = getUserById($id);

    $verify = $user['id_user'] ?? null;
    $hasUser = ($verify !== null);

    if ($hasUser) {
        $accessGiven = $trueUser['id_user'] === $user['id_user']; //проверка на соответствие айди юзера в таблицах сессия и юзеры

        if ($accessGiven) {

            $category = categoriesAll();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fields = extractFields($_POST, ['title', 'content', 'categories']);
                $fields['user'] = $user['id_user']; // все так же берем со страницы index.php
                $validateErrors = articlesValidate($fields);

                if (empty($validateErrors)) {
                    addArticle($fields);
                    $id = dbLastId();
                    header('Location:' . BASE_URL . '/article/' . "$id");
                    exit();
                }
            } else {
                $fields = ['title' => '', 'content' => '', 'categories' => ''];
                $validateErrors = [];
            }

            $pageTitle = 'Add article';
            $pageContent = template('articles/v_add', [
                'fields' => $fields,
                'categories' => $category,
                'validateErrors' => $validateErrors
            ]);
        } else {
            header('Location:' . BASE_URL);
            exit();
        }
    } else {
        header('Location:' . BASE_URL);
        exit();
    }
} else {
    header('Location:' . BASE_URL);
    exit();
}
