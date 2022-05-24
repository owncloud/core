<div class="section">
	<h2 class="app-name"><?php p($l->t('Version'));?></h2>
	<p>
		<a href="<?php print_unescaped($theme->getBaseUrl()); ?>" target="_blank">
			<?php p($theme->getTitle()); ?>
		</a> <?php p(OC_Util::getHumanVersion()) ?>
	</p>
	<p><?php include('settings.development.notice.php'); ?></p>
</div>
