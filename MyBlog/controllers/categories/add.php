<?php
// сделать проверку на наличие повторения имени  категории в бд
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = extractFields($_POST, ['name']);
    $validateErrors = categoriesValidate($fields);

    if (empty($validateErrors)) {
        addCategory($fields);
        $id = dbLastId();
        header('Location:' . BASE_URL . '/category/' . "$id");
        exit();
    }
} else {
    $fields = ['name' => ''];
    $validateErrors = [];
}

$pageTitle = 'Add category';
$pageContent = template('categories/v_add', [
    'fields' => $fields,
    'validateErrors' => $validateErrors
]);
