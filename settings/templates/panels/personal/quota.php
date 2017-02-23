<?php
	if ($_['quota'] === \OCP\Files\FileInfo::SPACE_UNLIMITED) {
		$totalSpace = $l->t('Unlimited');
	} else {
		$totalSpace = $_['total_human'];
	}
?>
<div id="quota" class="section">
	<div style="width:<?php p($_['usage_relative']);?>%"
		<?php if($_['usage_relative'] > 80): ?> class="quota-warning" <?php endif; ?>>
		<p id="quotatext">
			<?php print_unescaped($l->t('You are using <strong>%s</strong> of <strong>%s</strong>',
			[$_['usage'], $totalSpace ]));?>
		</p>
	</div>
</div>
