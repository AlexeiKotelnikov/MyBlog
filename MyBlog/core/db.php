<?php

function dbConnect(): PDO
{
    static $db;

    if ($db === null) {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //настройка для fetch(). Выводит только ассоциацивный массив
        ]); //Делаем для того чтобы было ровно одно подключение к БД. Вся фишка в static

        $db->exec('SET NAMES UTF8');
    }

    return $db;
}

function dbQuery(string $sql, array $params = []): PDOStatement
{
    $db = dbConnect();
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $query;
}

function dbQuery1(string $sql, array $params = []): PDOStatement
{
    $db = dbConnect();
    $query = $db->prepare($sql);
    $trueParams = ['title' => $params['title'], 'content' => $params['content'], 'categories' => $params['categories']]; //Сдается мне, что это ппц какой кастыль, но без него метод execute пытается впихнуть все имеющиеся ключи в $params в sql инъекцию. А надо поменять только 2
    $query->execute($trueParams);
    dbCheckError($query);
    return $query;
}
function dbQueryCategoryEdit(string $sql, array $params = []): PDOStatement
{
    $db = dbConnect();
    $query = $db->prepare($sql);
    $trueParams = ['name' => $params['name']]; //Сдается мне, что это ппц какой кастыль, но без него метод execute пытается впихнуть все имеющиеся ключи в $params в sql инъекцию. А надо поменять только 2
    $query->execute($trueParams);
    dbCheckError($query);
    return $query;
}

function dbCheckError(PDOStatement $query): bool
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

function dbLastId(): string
{
    $db = dbConnect();
    return $db->lastInsertId();
}
