<div class="content">
	<?php if ($showForm && empty($validateErrors)) : ?>
		<div class="form">
			<form method="post">
				TITLE:<br>
				<input type="text" name="name" value="<?= isset(URL_PARAMS['id']) ? $category['name'] : '' ?>"><br>
				<!-- Content:<br>
				<textarea type="text" name="content"><?= isset(URL_PARAMS['id']) ? $articles['content'] : '' ?></textarea><br> -->
				<button>Send</button>
			</form>
		</div>
		<hr>
		<a href="<?= BASE_URL ?>">Move to main page</a><br>
		<a href="<?= BASE_URL ?>category/<?= $category['id_category'] ?>">Back to the category</a>

	<?php elseif ($showForm && !empty($validateErrors)) : ?>
		<div class="form">
			<form method="post">
				TITLE:<br>
				<input type="text" name="name" value="<?= isset(URL_PARAMS['id']) ? $fields['name'] : '' ?>"><br>
				<!-- Content:<br>
				<textarea type="text" name="content"><?= isset(URL_PARAMS['id']) ? $fields['content'] : '' ?></textarea><br> -->
				<button>Send</button>
				<div class="error-list">
					<?php foreach ($validateErrors as $error) : ?>
						<p class="text-danger"><?= $error ?></p>
					<?php endforeach; ?>
				</div>
			</form>
		</div>
		<hr>
		<a href="<?= BASE_URL ?>">Move to main page</a><br>
		<a href="<?= BASE_URL ?>category/<?= $category['id_category'] ?>">Back to the category</a>
	<?php else : ?>
		This category was edited successfully!
		<hr>
		<a href="<?= BASE_URL ?>">Move to main page</a><br><br>
		<a href="<?= BASE_URL ?>category/<?= $category['id_category'] ?>">Back to the category</a><br>
		<a href="<?= BASE_URL ?>/categories">Move to categories page</a>

	<?php endif; ?>