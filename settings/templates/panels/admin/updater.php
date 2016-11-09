<?php if (!empty($_['updaterAppPanel'])): ?>
	<div class="section">
		<h2><?php p($l->t('Updater')); ?></h2>
		<div id="updater"><?php print_unescaped($_['updaterAppPanel']); ?></div>
	</div>
<?php endif; ?>
