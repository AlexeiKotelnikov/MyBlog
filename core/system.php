<?php

function checkControllerName(string $name): bool
{
	return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
}

function template(string $path, array $vars = []): string
{
	$systemTemplateRenererIntoFullPath = "views/$path.php";
	extract($vars);
	ob_start();
	include($systemTemplateRenererIntoFullPath);
	return ob_get_clean();
}

function parseUrl(string $url, array $routes): array
{
	$res = [
		'controller' => 'errors/e404',
		'params' => []
	];

	foreach ($routes as $route) {
		$matches = [];

		if (preg_match($route['test'], $url, $matches)) {
			$res['controller'] = $route['controller'];

			if (isset($route['params'])) {
				foreach ($route['params'] as $name => $num) {
					$res['params'][$name] = $matches[$num];
				}
			}

			break;
		}
	}

	return $res;
}

function getUriParts(string $uri): array
{
	$parts = explode('?', $uri);

	return [
		'url' => $parts[0] ?? '',
		'get' => $parts[1] ?? '',
	];
}

function hasDoubleSlashes(string $uri): bool
{
	$pattern = '/\/{2,}/';
	return !!preg_match($pattern, $uri);
}
