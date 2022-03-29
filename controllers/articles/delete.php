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

        if (isset($articles['id_article'])) {
            removeArticle($id);
            header('Location:' . BASE_URL);
            exit();
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
