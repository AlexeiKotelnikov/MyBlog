<div class="content">
	<?php if ($showForm && empty($validateErrors)) : ?>
		<div class="form">
			<form method="post">
				Category:
				<select name="categories">
					<?php foreach ($categories as $category) : ?>
						<option value="<?= $category['id_category'] ?>" <?= ($articles['id_category'] == $category['id_category'] ? 'selected' : '') ?>>
							<?= $category['name'] ?>
						</option>
					<?php endforeach; ?>
				</select><br>
				TITLE:<br>
				<input type="text" name="title" value="<?= isset(URL_PARAMS['id']) ? $articles['title'] : '' ?>"><br>
				Content:<br>
				<textarea type="text" name="content"><?= isset(URL_PARAMS['id']) ? $articles['content'] : '' ?></textarea><br>
				<button>Send</button>
			</form>
		</div>
		<hr>
		<a href="<?= BASE_URL ?>">Move to main page</a><br>
		<a href="<?= BASE_URL ?>article/<?= $articles['id_article'] ?>">Back to the Article</a>

	<?php elseif ($showForm && !empty($validateErrors)) : ?>
		<div class="form">
			<form method="post">
				Category:
				<select name="categories">
					<?php foreach ($categories as $category) : ?>
						<option value="<?= $category['id_category'] ?>" <?= ($category['id_category'] == $fields['categories'] ? 'selected' : '') ?>>
							<?= $category['name'] ?>
						</option>
					<?php endforeach; ?>
				</select><br>
				TITLE:<br>
				<input type="text" name="title" value="<?= isset(URL_PARAMS['id']) ? $fields['title'] : '' ?>"><br>
				Content:<br>
				<textarea type="text" name="content"><?= isset(URL_PARAMS['id']) ? $fields['content'] : '' ?></textarea><br>
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
		<a href="<?= BASE_URL ?>article/<?= $articles['id_article'] ?>">Back to the Article</a>
	<?php else : ?>
		This article was edited successfully!
		<hr>
		<a href="<?= BASE_URL ?>">Move to main page</a><br>
		<a href="<?= BASE_URL ?>article/<?= $articles['id_article'] ?>">Back to the Article</a>

	<?php endif; ?>