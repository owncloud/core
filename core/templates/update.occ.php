<div class="update" data-productname="<?php p($_['productName']) ?>" data-version="<?php p($_['version']) ?>">
	<div class="updateOverview">
		<h2 class="title bold"><?php p($l->t('%s requires an update to version %s',
			array($_['productName'], $_['version']))); ?></h2>
		<div class="infogroup">
			<?php p($l->t('A configuration option has disabled the web upgrader, you must use the command line tool to upgrade:')) ?>
			<pre>./occ upgrade</pre>
		</div>
		<div class="infogroup">
			<?php p($l->t('Alternatively, where this is not possible, set the following parameter in config.php:')) ?>
			<pre><?php p('"upgrade.forceocc" => false') // easy handling of special characters ?></pre>
		</div>
	</div>
</div>
