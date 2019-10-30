<div id="app-navigation">
	<ul>
	<?php if ($_['admin']) {
	?>
		<li>
			<a class="<?php p($_['style1']); ?>" target="_blank"
				href="https://doc.owncloud.com/server/user_manual/index.html">
				<?php p($l->t('User documentation')); ?> ↗
			</a>
		</li>
		<li>
			<a class="<?php p($_['style2']); ?>" target="_blank"
				href="https://doc.owncloud.com/server/admin_manual/index.html">
				<?php p($l->t('Administrator documentation')); ?> ↗
			</a>
		</li>
		<li>
			<a class="<?php p($_['style1']); ?>" target="_blank"
			   href="https://doc.owncloud.com/server/developer_manual/index.html">
				<?php p($l->t('Developer documentation')); ?> ↗
			</a>
		</li>
	<?php
} ?>

		<li>
			<a href="https://owncloud.org/support" target="_blank" rel="noreferrer">
				<?php p($l->t('Online documentation')); ?> ↗
			</a>
		</li>
		<li>
			<a href="https://central.owncloud.org" target="_blank" rel="noreferrer">
				<?php p($l->t('Forum')); ?> ↗
			</a>
		</li>

	<?php if ($_['admin']) {
		?>
		<li>
			<a href="https://github.com/owncloud/core/blob/master/.github/CONTRIBUTING.md"
				target="_blank" rel="noreferrer">
				<?php p($l->t('Issue tracker')); ?> ↗
			</a>
		</li>
	<?php
	} ?>

	<li>
		<a href="https://owncloud.com/subscriptions/" target="_blank" rel="noreferrer">
			<?php p($l->t('Commercial support')); ?> ↗
		</a>
	</li>
</div>

<div id="app-content" class="help-includes">
	<iframe src="<?php print_unescaped($_['url']); ?>" class="help-iframe">
	</iframe>
</div>
