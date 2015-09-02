<div class="update" data-productname="<?php p($_['productName']) ?>" data-version="<?php p($_['version']) ?>">
	<div class="updateOverview">
		<h2 class="title bold"><?php p($l->t('%s requires an update to version %s',
			array($_['productName'], $_['version']))); ?></h2>
		<div class="infogroup">
			<?php p($l->t('Upgrading must be done with the command line tool:')) ?>
			<pre>./occ upgrade</pre>
		</div>
	</div>
</div>
