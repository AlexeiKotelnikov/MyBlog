<?php

$id = (int)URL_PARAMS['id'];


$category = getCategory($id);
$articles = getArticlesFromCategory($id);

$cat = $category['id_category'] ?? null;
$hasCategory = ($cat !== null);

if ($hasCategory) {
	$menu = template('categories/v_category_menu', [
		'id_category' => $category['id_category']
	]);
	$content = template('categories/v_category', [
		'articles' => $articles,
		'category' => $category
	]);

	$pageTitle = $category['name'];
	$pageContent = template('base/v_con2col', [
		'left' => $menu,
		'content' => $content,
		'title' => $category['name']
	]);
} else {
	include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
}
