<div class="update" data-productname="<?php p($_['productName']) ?>" data-version="<?php p($_['version']) ?>">
	<div class="updateOverview">
		<?php if ($_['isAppsOnlyUpgrade']) {
			?>
		<h2 class="title"><?php p($l->t('App update required')); ?></h2>
		<?php
		} else {
			?>
		<h2 class="title"><?php p($l->t(
				'%s will be updated to version %s',
				[$_['productName'], $_['version']]
			)); ?></h2>
		<?php
		} ?>
		<?php if (!empty($_['appsToUpgrade'])) {
			?>
		<div class="infogroup">
			<span><?php p($l->t('These apps will be updated:')); ?></span>
			<ul class="content appList">
				<?php foreach ($_['appsToUpgrade'] as $appInfo) {
					?>
				<li><?php p($appInfo['name']) ?> (<?php p($appInfo['id']) ?>)</li>
				<?php
				} ?>
			</ul>
		</div>
		<?php
		} ?>
		<?php if (!empty($_['oldTheme'])) {
			?>
		<div class="infogroup">
			<?php p($l->t('The theme %s has been disabled.', [$_['oldTheme']])) ?>
		</div>
		<?php
		} ?>
		<div class="infogroup bold">
			<?php p($l->t('Please make sure that the database, the config folder and the data folder have been backed up before proceeding.')) ?>
		</div>
		<input class="updateButton" type="button" value="<?php p($l->t('Start update')) ?>">
		<div class="infogroup">
			<?php p($l->t('To avoid timeouts with larger installations, you can instead run the following command from your installation directory:')) ?>
			<pre>./occ upgrade</pre>
		</div>
	</div>

	<div class="update-progress hidden">
		<h2 id="update-progress-title"></h2>
		<div id="update-progress-icon" class="icon-loading-dark"></div>
		<p id="update-progress-message-error" class="warning hidden"></p>
		<ul id="update-progress-message-warnings" class="warning hidden"></ul>
		<p id="update-progress-message"></p>
		<a class="update-show-detailed"><?php p($l->t('Detailed logs')); ?> <img src="<?php print_unescaped(image_path('', 'actions/caret.svg')); ?>" /></a>
		<div id="update-progress-detailed" class="hidden warning"></div>
	</div>
</div>
