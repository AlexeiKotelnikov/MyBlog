<main>
	<div class="form">
		<form method="post">
			TITLE:<br>
			<input type="text" name="name" value="<?= $fields['name'] ?>"><br>
			<!-- Content:<br>
			<textarea type="text" name="content"><?= $fields['content'] ?></textarea><br> -->
			<button>Send</button>
			<div class="alert error-list">
				<?php foreach ($validateErrors as $error) : ?>
					<p class="text-danger"><?= $error ?></p>
				<?php endforeach; ?>
			</div>
		</form>
	</div>
	<hr>
	<a href="<?= BASE_URL ?>">Move to main page</a><br>
	<a href="<?= BASE_URL ?>/categories">Move to categories page</a>
</main>