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
            $articles = getArticleByUser($id);

            $hasArticles = $articles ?? null;

            $menu = template('user/v_user_menu', [
                'id_user' => $user['id_user']
            ]);
            $content = template('user/v_account', [
                'articles' => $articles,
                'user' => $user,
                'hasArticles' => $hasArticles
            ]);

            $pageTitle = $user['login'];
            $pageContent = template('base/v_con2col', [
                'left' => $menu,
                'content' => $content,
                'title' => $user['login']
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
