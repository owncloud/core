<?php
	if ($_['quota'] === \OCP\Files\FileInfo::SPACE_UNLIMITED) {
		$totalSpace = $l->t('Unlimited');
	} else {
		$totalSpace = $_['total_human'];
	}
?>
<div class="section">
	<div id="quota">
		<div style="width:<?php p($_['usage_relative']);?>%"
			<?php if($_['usage_relative'] > 80): ?> class="quota-warning" <?php endif; ?>>
			<p id="quotatext">
				<?php if ($_['quota'] === \OCP\Files\FileInfo::SPACE_UNLIMITED): ?>
					<?php p($l->t('You are using %s of %s',
						[$_['usage'], $totalSpace]));?>
				<?php else: ?>
					<?php p($l->t('You are using %s of %s (%s %%)',
						[$_['usage'], $totalSpace,  $_['usage_relative']]));?>
				<?php endif ?>
			</p>
		</div>
	</div>
</div>
