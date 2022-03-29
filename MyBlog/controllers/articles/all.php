<?php

$articles = articlesAll();
$isTable = ($_GET['view'] ?? '') === 'table'; // index.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';//выбор между отображение таблицей или блоками

$pageTitle = 'All articles';
$pageContent = template("articles/$template", [
	'articles' => $articles
]);