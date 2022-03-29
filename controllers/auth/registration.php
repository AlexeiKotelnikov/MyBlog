<?php

if ($user == null) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['name', 'email', 'username', 'password', 'confirm']);
        $validateErrors = registerUserValidate($fields);

        if (empty($validateErrors) && getUserByLogin($_POST['username'])) {
            addUser($_POST['name'], goodPass($_POST['password']), $_POST['email'], $_POST['username']);
            $token = substr(bin2hex(random_bytes(128)), 0, 128);
            $id = dbLastId();
            sessionsAdd($id, $token);
            $_SESSION['token'] = $token;
            header('Location:' . BASE_URL . '/cabinet/' . "$id");
            exit();
        }
    } else {
        $fields = ['name' => '', 'email' => '', 'username' => '', 'password' => '', 'confirm' => ''];
        $validateErrors = [];
    }

    $pageTitle = 'Registration';
    $pageContent = template('user/v_registration', [
        'fields' => $fields,
        'validateErrors' => $validateErrors
    ]);
} else {
    header('Location:' . BASE_URL);
    exit();
}
