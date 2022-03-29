<?php

function addUser(string $login, string $password, string $email, string $name): bool
{
    $sql = "INSERT INTO users (login, password, email, name) VALUES (:login, :password, :email, :name)";
    dbQuery($sql, [
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'name' => $name,
    ]);
    return true;
}

function getUserByLogin(string $login): ?bool
{
    $sql = "SELECT login FROM users WHERE login = :login";
    $query = dbQuery($sql, ['login' => $login]);
    $user = $query->fetch();
    if (is_array($user)) {
        return false;
    } else {
        return true;
    }
}

function getUserById(string $id): ?array
{
    $sql = "SELECT id_user,login,email,name FROM users WHERE id_user=:id";
    $query = dbQuery($sql, ['id' => $id]);
    $user = $query->fetch();
    return is_array($user) ? $user : null;
}

function getUsersIdByToken(string $token): ?array
{
    $sql = "SELECT id_user FROM sessions WHERE token = :token";
    $query = dbQuery($sql, ['token' => $token]);
    $user = $query->fetch();
    return is_array($user) ? $user : null;
}

function usersOne(string $login): ?array
{
    $sql = "SELECT id_user,password FROM users WHERE login=:login";
    $query = dbQuery($sql, ['login' => $login]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

function getArticleByUser(int $id): ?array
{
    $sql = "SELECT * from articles where id_user = :id";
    $query = dbQuery($sql, ['id' => $id]);
    return $query = $query->fetchAll();
}

function editUser(string $login, string $password, string $email, string $name, int $id): bool
{
    $sql = "UPDATE users SET login = :login, password = :password, email = :email, name = :name WHERE id_user = $id";
    dbQuery($sql, [
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'name' => $name,
    ]);
    return true;
}

function goodPass(string $pass): string
{
    return $pass = password_hash(htmlspecialchars($pass), PASSWORD_BCRYPT);
}

function registerUserValidate(array &$fields): array
{
    $errors = [];
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $textLen = mb_strlen($fields['username'], 'UTF-8');
    $email = htmlspecialchars($fields['email']);
    $passVerify = htmlspecialchars($fields['confirm']);
    if (mb_strlen($fields['name'], 'UTF-8') < 2) {
        $errors[] = 'Имя не короче 2 символов!';
    }

    if ($textLen < 2 || $textLen > 25) {
        $errors[] = 'Логин от 2 до 25 символов!';
    } elseif (!getUserByLogin($fields['username'])) {
        $errors[] = 'Такой логин уже используется!';
    }

    if (!preg_match($regex, $email)) {
        $errors[] = 'Неверный формат email!';
    }

    if (mb_strlen($fields['password'], 'UTF-8') < 5) {
        $errors[] = 'Пароль должен быть не короче 5 символов!';
    }

    $hashPass = goodPass($fields['password']);
    if (!password_verify($passVerify, $hashPass)) {
        $errors[] = 'Пароли не совпадают!';
    }

    $fields['username'] = htmlspecialchars($fields['username']);
    $fields['email'] = $email;
    $fields['name'] = htmlspecialchars($fields['name']);
    $fields['password'] = $hashPass;

    return $errors;
}

function editUserValidate(array &$fields): array
{
    $errors = [];
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $textLen = mb_strlen($fields['username'], 'UTF-8');
    $email = htmlspecialchars($fields['email']);
    $passVerify = htmlspecialchars($fields['confirm']);
    if (mb_strlen($fields['name'], 'UTF-8') < 2) {
        $errors[] = 'Имя не короче 2 символов!';
    }

    if ($textLen < 2 || $textLen > 25) {
        $errors[] = 'Логин от 2 до 25 символов!';
    }

    if (!preg_match($regex, $email)) {
        $errors[] = 'Неверный формат email!';
    }

    if (mb_strlen($fields['password'], 'UTF-8') < 5) {
        $errors[] = 'Пароль должен быть не короче 5 символов!';
    }

    $hashPass = goodPass($fields['password']);
    if (!password_verify($passVerify, $hashPass)) {
        $errors[] = 'Пароли не совпадают!';
    }

    $fields['username'] = htmlspecialchars($fields['username']);
    $fields['email'] = $email;
    $fields['name'] = htmlspecialchars($fields['name']);
    $fields['password'] = $hashPass;

    return $errors;
}
