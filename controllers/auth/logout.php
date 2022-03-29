<?php
/* Убираем возможность сделать выход другому юзеру вбив в строке другой айди. 
Проверяем наличие переменной user дабы не ловить ошибку об отсутствии токена. 
Далее проверяем сходство id user из таблицы sessions и id user из таблицы users*/
if (!$user == null) { //тянем переменную user со страницы index.php
    $id = (int)URL_PARAMS['id'];

    $trueUser = getUsersIdByToken($_SESSION['token']) ?? null;
    $user = getUserById($id);
    $accessGiven = $trueUser['id_user'] === $user['id_user']; //проверка на соответствие айди юзера в таблицах сессия и юзеры

    if ($accessGiven) {
        setcookie('token', '', time() - 42000, BASE_URL);
        unset($_COOKIE['token']);
        unset($_SESSION['token']);
        header('Location: ' . BASE_URL);
        exit();
    } else {
        include_once('controllers/errors/e404.php');
    }
} else {
    header('Location:' . BASE_URL);
    exit();
}
