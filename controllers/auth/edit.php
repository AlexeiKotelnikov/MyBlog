<?php
if (!$user == null) {
    $id = (int)URL_PARAMS['id'];
    $trueUser = getUsersIdByToken($_SESSION['token']);
    $showForm = true;
    $user = getUserById($id);
    $verify = $user['id_user'] ?? null;
    $hasUser = ($verify !== null);

    // сделать проверку на соответствие пароля при редактировании

    if ($hasUser) {
        $accessGiven = $trueUser['id_user'] === $user['id_user']; //проверка на соответствие айди юзера в таблицах сессия и юзеры

        if ($accessGiven) {
            $pageTitle = 'Edit your information ';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fields = extractFields($_POST, ['name', 'email', 'username', 'password', 'confirm']);
                $validateErrors = editUserValidate($fields);
                $pageTitle = 'Check your mistakes!';
                if (empty($validateErrors)) {
                    editUser($_POST['name'], goodPass($_POST['password']), $_POST['email'], $_POST['username'], $id);
                    $showForm = false;
                    $pageTitle = 'Success!';
                }
            } else {
                $fields = ['name' => '', 'email' => '', 'username' => '', 'password' => '', 'confirm' => ''];
                $validateErrors = [];
                $showForm = true;
            }
            $pageContent = template('user/v_edit', [
                'showForm' => $showForm,
                'validateErrors' => $validateErrors,
                'user' => $user,
                'fields' => $fields
            ]);
        } else {
            include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
        }
    } else {
        include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
    }
} else {
    header('Location:' . BASE_URL);
    exit();
}
