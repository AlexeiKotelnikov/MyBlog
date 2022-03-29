<?php

$httpVer = $_SERVER['SERVER_PROTOCOL'];
$pageTitle = 'Ошибка 404';
$pageContent = template('errors/v_404');
header("$httpVer 404 Not Found");
