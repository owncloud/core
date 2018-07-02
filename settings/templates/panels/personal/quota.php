<div class="section">
	<div id="quota">
		<div style="width:<?php p($_['usage_relative']);?>%"
			<?php if ($_['usage_relative'] > 80): ?> class="quota-warning" <?php endif; ?>>
			<p id="quotatext">
				<?php if ($_['quota'] === \OCP\Files\FileInfo::SPACE_UNLIMITED): ?>
					<?php p($l->t('You are using %s',
						[$_['usage']]));?>
				<?php else: ?>
					<?php p($l->t('You are using %s of %s (%s %%)',
						[$_['usage'], $_['total_human'],  $_['usage_relative']]));?>
				<?php endif ?>
			</p>
		</div>
	</div>
</div>
