<?php

return (function () {
	$intGT0 = '[1-9]+\d*';
	$normUrl = '[0-9aA-zZ_-]+';

	return [
		[
			'test' => '/^$/',
			'controller' => 'articles/all'
		],
		[
			'test' => "/^article\/($intGT0)\/?$/",
			'controller' => 'articles/article',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^articles\/delete\/($intGT0)\/?$/",
			'controller' => 'articles/delete',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^articles\/edit\/($intGT0)\/?$/",
			'controller' => 'articles/edit',
			'params' => ['id' => 1]
		],
		[
			'test' => '/^categories\/add\/?$/',
			'controller' => 'categories/add'
		],
		[
			'test' => "/^category\/($intGT0)\/?$/",
			'controller' => 'categories/category',
			'params' => ['id' => 1]
		],
		[
			'test' => '/^categories\/?$/',
			'controller' => 'categories/all'
		],
		[
			'test' => "/^categories\/delete\/($intGT0)\/?$/",
			'controller' => 'categories/delete',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^categories\/edit\/($intGT0)\/?$/",
			'controller' => 'categories/edit',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^user\/registration\/?$/",
			'controller' => 'auth/registration'
		],
		[
			'test' => "/^cabinet\/($intGT0)\/?$/",
			'controller' => 'auth/account',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^cabinet\/edit\/($intGT0)\/?$/",
			'controller' => 'auth/edit',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^cabinet\/add\/($intGT0)\/?$/",
			'controller' => 'articles/add',
			'params' => ['id' => 1]
		],
		[
			'test' => "/^user\/login\/?$/",
			'controller' => 'auth/login'
		],
		[
			'test' => "/^user\/logout\/($intGT0)\/?$/",
			'controller' => 'auth/logout',
			'params' => ['id' => 1]
		]
	];
})();
