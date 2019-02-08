<div class="update" data-productname="<?php p($_['productName']) ?>" data-version="<?php p($_['version']) ?>">
	<div class="updateOverview">
		<h2 class="title"><?php p($l->t('Update needed')) ?></h2>
		<div class="infogroup">
			<?php if ($_['tooBig']) {
	p($l->t('It looks like your instance may host many files and/or users. To ensure a smooth upgrade process, please use the command line updater (occ upgrade).'));
} else {
	p($l->t('Automatic updating is disabled in config.php. To upgrade your instance, please use the command line updater (occ upgrade).'));
} ?><br><br>
			<?php
			print_unescaped($l->t('For help, see the  <a target="_blank" rel="noreferrer" href="%s">documentation</a>.', [link_to_docs('admin-cli-upgrade')])); ?><br><br>
		</div>
	</div>
</div>
