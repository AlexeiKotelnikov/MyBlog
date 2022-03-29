<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="canonical" href="<?= $canonical ?>">

	<link rel="stylesheet" href="<?= BASE_URL ?>src/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?= BASE_URL ?>src/css/main.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>src/css/registration.css">


</head>

<body>
	<header class="site-header">
		<div class="container">
			<div class="logo">
				<div class="logo__title h3">My site</div>
				<div class="logo__subtitle h6">About some themes</div>
			</div>
		</div>
	</header>
	<nav class="site-nav">
		<div class="container">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= BASE_URL ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= BASE_URL ?>categories">Categories</a>
				</li>
				<?php if (!is_array($user)) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>user/login">Log In</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>user/registration">Registration</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>cabinet/<?= $user['id_user'] ?>">Cabinet</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>user/logout/<?= $user['id_user'] ?>">Log Out</a>
					</li>
				<?php endif ?>
			</ul>
		</div>
	</nav>
	<div class="site-content">
		<div class="container">
			<?= $content ?>
		</div>
	</div>
	<footer class="site-footer">
		<div class="container">
			&copy; site about all
		</div>
	</footer>
</body>

</html>