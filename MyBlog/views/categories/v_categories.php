<main>
	<h1>Categories</h1>
	<hr>
	<div class="categories">
		<?php foreach ($categories as $category) : ?>
			<div class="category">
				<h2><?= $category['name'] ?></h2>
				<a href="<?= BASE_URL ?>category/<?= $category['id_category'] ?>">Read more</a>
			</div>
		<?php endforeach; ?>
	</div>
	<hr>
	<a href="<?= BASE_URL ?>categories/add">Add another Category</a>
</main>