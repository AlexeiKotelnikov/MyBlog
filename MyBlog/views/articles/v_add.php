<main>
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
			<input type="text" name="title" value="<?= $fields['title'] ?>"><br>
			Content:<br>
			<textarea type="text" name="content"><?= $fields['content'] ?></textarea><br>
			<button>Send</button>
			<div class="alert error-list">
				<?php foreach ($validateErrors as $error) : ?>
					<p class="text-danger"><?= $error ?></p>
				<?php endforeach; ?>
			</div>
		</form>
	</div>
	<hr>
	<a href="<?= BASE_URL ?>">Move to main page</a>
</main>