<?php
/**
 * @var array $_
 * @var \OCP\IL10N $l
 * @var OC_Defaults $theme
 */
script('core', 'setupchecks');
script('settings', 'panels/setupchecks');
?>
<div id="security-warning" class="section">
	<h2 class="app-name"><?php p($l->t('Security & setup warnings'));?></h2>
	<ul>
	<?php
	// is php setup properly to query system environment variables like getenv('PATH')
	if ($_['getenvServerNotWorking']) {
		?>
		<li>
			<?php p($l->t('php does not seem to be setup properly to query system environment variables. The test with getenv("PATH") only returns an empty response.')); ?><br>
			<?php print_unescaped($l->t('Please check the <a target="_blank" rel="noreferrer" href="%s">installation documentation ↗</a> for php configuration notes and the php configuration of your server, especially when using php-fpm.', link_to_docs('admin-php-fpm'))); ?>
		</li>
	<?php
	}
	// is read only config enabled
	if ($_['readOnlyConfigEnabled']) {
		?>
		<li>
			<?php p($l->t('The Read-Only config has been enabled. This prevents setting some configurations via the web-interface. Furthermore, the file needs to be made writable manually for every update.')); ?>
		</li>
	<?php
	}
	// Are doc blocks accessible?
	if (!$_['isAnnotationsWorking']) {
		?>
		<li>
			<?php p($l->t('PHP is apparently setup to strip inline doc blocks. This will make several core apps inaccessible.')); ?><br>
			<?php p($l->t('This is probably caused by a cache/accelerator such as Zend OPcache or eAccelerator.')); ?>
		</li>
	<?php
	}
	// Is the Transaction isolation level READ_COMMITED?
	if ($_['invalidTransactionIsolationLevel']) {
		?>
		<li>
			<?php p($l->t('Your database does not run with "READ COMMITED" transaction isolation level. This can cause problems when multiple actions are executed in parallel.')); ?>
		</li>
	<?php
	}
	// Warning if memcache is outdated
	foreach ($_['OutdatedCacheWarning'] as $php_module => $data) {
		?>
		<li>
			<?php p($l->t('%1$s below version %2$s is installed, for stability and performance reasons we recommend updating to a newer %1$s version.', $data)); ?>
		</li>
	<?php
	}
	// if module fileinfo available?
	if (!$_['has_fileinfo']) {
		?>
		<li>
			<?php p($l->t('The PHP module \'fileinfo\' is missing. We strongly recommend to enable this module to get best results with mime-type detection.')); ?>
		</li>
	<?php
	}
	// locking configured optimally?
	if ($_['fileLockingType'] === 'none') {
		?>
		<li>
			<?php print_unescaped($l->t('Transactional file locking is disabled, this might lead to issues with race conditions. Enable \'filelocking.enabled\' in config.php to avoid these problems. See the <a target="_blank" rel="noreferrer" href="%s">documentation ↗</a> for more information.', link_to_docs('admin-transactional-locking'))); ?>
		</li>
		<?php
	} elseif ($_['fileLockingType'] === 'db') {
		?>
		<li>
			<?php print_unescaped($l->t('Transactional file locking should be configured to use memory-based locking, not the default slow database-based locking. See the <a target="_blank" rel="noreferrer" href="%s">documentation ↗</a> for more information.', link_to_docs('admin-transactional-locking'))); ?>
		</li>
		<?php
	}
	// is locale working ?
	if (!$_['isLocaleWorking']) {
		?>
		<li>
			<?php
				$locales = 'en_US.UTF-8/fr_FR.UTF-8/es_ES.UTF-8/de_DE.UTF-8/ru_RU.UTF-8/pt_BR.UTF-8/it_IT.UTF-8/ja_JP.UTF-8/zh_CN.UTF-8';
		p($l->t('System locale can not be set to a one which supports UTF-8.')); ?>
			<br>
			<?php
				p($l->t('This means that there might be problems with certain characters in file names.')); ?>
				<br>
				<?php
				p($l->t('We strongly suggest installing the required packages on your system to support one of the following locales: %s.', [$locales])); ?>
		</li>
	<?php
	}
	if ($_['suggestedOverwriteCliUrl']) {
		?>
		<li>
			<?php p($l->t('If your installation is not installed in the root of the domain and uses system cron, there can be issues with the URL generation. To avoid these problems, please set the "overwrite.cli.url" option in your config.php file to the webroot path of your installation (Suggested: "%s")', $_['suggestedOverwriteCliUrl'])); ?>
		</li>
	<?php
	}

	// SQLite database performance issue
	if ($_['databaseOverload']) {
		?>
		<li>
			<?php p($l->t('SQLite is used as database. For larger installations we recommend to switch to a different database backend.')); ?><br>
			<?php p($l->t('Especially when using the desktop client for file syncing the use of SQLite is discouraged.')); ?><br>
			<?php print_unescaped($l->t('To migrate to another database use the command line tool: \'occ db:convert-type\', or see the <a target="_blank" rel="noreferrer" href="%s">documentation ↗</a>.', link_to_docs('admin-db-conversion'))); ?>
		</li>

		<?php
	}
	if ($_['backgroundjobs_mode'] !== "cron") {
		?>
		<li>
			<?php p($l->t('We recommend to enable system cron as any other cron method has possible performance and reliability implications.')); ?><br>
		</li>

		<?php
	}
	if ($_['cronErrors']) {
		?>
		<li>
				<?php p($l->t('It was not possible to execute the cronjob via CLI. The following technical errors have appeared:')); ?>
				<br>
				<ol>
					<?php foreach (\json_decode($_['cronErrors']) as $error) {
			if (isset($error->error)) {
				?>
						<li><?php p($error->error) ?> <?php p($error->hint) ?></li>
					<?php
			}
		}; ?>
				</ol>
		</li>
	<?php
	}
	?>
	</ul>

	<div id="postsetupchecks" data-check-wellknown="<?php if ($_['checkForWorkingWellKnownSetup']) {
		p('true');
	} else {
		p('false');
	} ?>">
		<div class="loading"></div>
		<ul class="errors hidden"></ul>
		<ul class="warnings hidden"></ul>
		<ul class="info hidden"></ul>
		<p class="hint hidden">
			<?php print_unescaped($l->t('Please double check the <a target="_blank" rel="noreferrer" href="%s">installation guides ↗</a>, and check for any errors or warnings in the <a href="#log-section">log</a>.', link_to_docs('admin-install'))); ?>
		</p>
	</div>
	<div id="security-warning-state">
		<span class="hidden icon-checkmark"><?php p($l->t('All checks passed.'));?></span>
	</div>
</div>
