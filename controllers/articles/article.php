<?php

$id = (int)URL_PARAMS['id'];

$articles = getArticles($id);
$category = getCategoryFromArticle($id);

$post = $articles['id_article'] ?? null;
$hasPost = ($post !== null);

if ($hasPost) {

	$content = template('articles/v_article', [
		'articles' => $articles,
		'category' => $category
	]);
	$pageTitle = $articles['title'];

	if (!$user == null) {

		$trueUser = getUsersIdByToken($_SESSION['token']);
		$user = getUserById($articles['id_user']);
		$verify = $user['id_user'] ?? null;
		$hasUser = ($verify !== null);

		if ($hasUser) {

			$accessGiven = $trueUser['id_user'] === $user['id_user']; //проверка на соответствие айди юзера в таблицах сессия и юзеры

			if ($accessGiven) {

				$menu = template('articles/v_article_menu_access', [
					'id_articles' => $articles['id_article']
				]);
			} else {

				$menu = template('articles/v_article_menu', [
					'id_articles' => $articles['id_article']
				]);
			}
		}
		$pageContent = template('base/v_con2col', [
			'left' => $menu,
			'content' => $content,
			'title' => $articles['title']
		]);
	} else {

		$pageContent = template('base/v_article', [
			'content' => $content,
			'title' => $articles['title']
		]);
	}
} else {
	include_once('controllers/errors/e404.php'); //подумать над лучшим подключением
}
