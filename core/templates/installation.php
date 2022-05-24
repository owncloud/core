<?php
script('core', [
	'jquery-showpassword',
	'installation'
]);
?>
<input type='hidden' id='hasMySQL' value='<?php p($_['hasMySQL']) ?>'>
<input type='hidden' id='hasSQLite' value='<?php p($_['hasSQLite']) ?>'>
<input type='hidden' id='hasPostgreSQL' value='<?php p($_['hasPostgreSQL']) ?>'>
<input type='hidden' id='hasOracle' value='<?php p($_['hasOracle']) ?>'>
<form action="index.php" method="post" autocapitalize="none">
<input type="hidden" name="install" value="true">
	<?php if (\count($_['errors']) > 0): ?>
	<div class="warning">
		<strong><?php p($l->t('Error'));?></strong>
		<?php foreach ($_['errors'] as $err): ?>
		<p>
			<?php if (\is_array($err)):?>
				<?php print_unescaped($err['error']); ?>
				<span class='hint'><?php print_unescaped($err['hint']); ?></span>
			<?php else: ?>
				<?php print_unescaped($err); ?>
			<?php endif; ?>
		</p>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<fieldset id="adminaccount">
		<legend><strong><?php print_unescaped($l->t('Create an <strong>admin account</strong>')); ?></strong></legend>
		<p class="grouptop">
			<label for="adminlogin" class="infield"><?php p($l->t('Username')); ?></label>
			<input type="text" name="adminlogin" id="adminlogin"
				placeholder="<?php p($l->t('Username')); ?>"
				value="<?php p($_['adminlogin']); ?>"
				autocomplete="off" autocorrect="off" autofocus required>
		</p>
		<p class="groupbottom">
			<label for="adminpass" class="infield"><?php p($l->t('Password')); ?></label>
			<input type="password" name="adminpass" data-typetoggle="#showadminpass" id="adminpass"
				placeholder="<?php p($l->t('Password')); ?>"
				value="<?php p($_['adminpass']); ?>"
				autocomplete="off" autocorrect="off" required>
			<input type="checkbox" id="showadminpass" name="showadminpass">
			<label for="showadminpass"></label>
		</p>
	</fieldset>

	<?php if (!$_['directoryIsSet'] or !$_['dbIsSet'] or \count($_['errors']) > 0): ?>
	<fieldset id="advancedHeader">
		<legend><a id="showAdvanced"><strong><?php p($l->t('Storage & database')); ?></strong> <img src="<?php print_unescaped(image_path('', 'actions/caret.svg')); ?>" /></a></legend>
	</fieldset>
	<?php endif; ?>

	<?php if (!$_['directoryIsSet'] or \count($_['errors']) > 0): ?>
	<fieldset id="datadirField">
		<div id="datadirContent">
			<label class="infield" for="directory"><?php p($l->t('Data folder')); ?></label>
			<input type="text" name="directory" id="directory"
				placeholder="<?php p(OC::$SERVERROOT.'/data'); ?>"
				value="<?php p($_['directory']); ?>"
				autocomplete="off" autocorrect="off">
		</div>
	</fieldset>
	<?php endif; ?>

	<?php if (!$_['dbIsSet'] or \count($_['errors']) > 0): ?>
	<fieldset id='databaseBackend'>
		<?php if ($_['hasMySQL'] or $_['hasPostgreSQL'] or $_['hasOracle']) {
	$hasOtherDB = true;
} else {
	$hasOtherDB =false;
} //other than SQLite?>
		<legend><strong><?php p($l->t('Configure the database')); ?></strong></legend>
		<div id="selectDbType">
		<?php foreach ($_['databases'] as $type => $label): ?>
		<?php if (\count($_['databases']) === 1): ?>
		<p class="info">
			<?php p($l->t('Only %s is available.', [$label])); ?>
			<?php p($l->t('Install and activate additional PHP modules to choose other database types.')); ?><br>
			<a href="<?php print_unescaped(link_to_docs(\OCP\Constants::DOCS_ADMIN_SOURCE_INSTALL)); ?>" target="_blank" rel="noreferrer">
				<?php p($l->t('For more details check out the documentation.')); ?> ↗</a>
		</p>
		<input type="hidden" id="dbtype" name="dbtype" value="<?php p($type) ?>">
		<?php else: ?>
		<input type="radio" name="dbtype" value="<?php p($type) ?>" id="<?php p($type) ?>"
			<?php print_unescaped($_['dbtype'] === $type ? 'checked="checked" ' : '') ?>/>
		<label class="<?php p($type) ?>" for="<?php p($type) ?>"><?php p($label) ?></label>
		<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</fieldset>

		<?php if ($hasOtherDB): ?>
		<fieldset id='databaseField'>
		<div id="use_other_db">
			<p class="grouptop">
				<label for="dbuser" class="infield"><?php p($l->t('Database user')); ?></label>
				<input type="text" name="dbuser" id="dbuser"
					placeholder="<?php p($l->t('Database user')); ?>"
					value="<?php p($_['dbuser']); ?>"
					autocomplete="off" autocorrect="off">
			</p>
			<p class="groupmiddle">
				<label for="dbpass" class="infield"><?php p($l->t('Database password')); ?></label>
				<input type="password" name="dbpass" id="dbpass" data-typetoggle="#showdbpass"
					placeholder="<?php p($l->t('Database password')); ?>"
					value="<?php p($_['dbpass']); ?>"
					autocomplete="off" autocorrect="off">
				<input type="checkbox" id="showdbpass" name="showdbpass">
				<label for="showdbpass"></label>
			</p>
			<p class="groupmiddle">
				<label for="dbname" class="infield"><?php p($l->t('Database name')); ?></label>
				<input type="text" name="dbname" id="dbname"
					placeholder="<?php p($l->t('Database name')); ?>"
					value="<?php p($_['dbname']); ?>"
					autocomplete="off" autocorrect="off"
					pattern="[0-9a-zA-Z$_-]+">
			</p>
			<?php if ($_['hasOracle']): ?>
			<div id="use_oracle_db">
				<p class="groupmiddle">
					<label for="dbtablespace" class="infield"><?php p($l->t('Database tablespace')); ?></label>
					<input type="text" name="dbtablespace" id="dbtablespace"
						placeholder="<?php p($l->t('Database tablespace')); ?>"
						value="<?php p($_['dbtablespace']); ?>"
						autocomplete="off" autocorrect="off">
				</p>
			</div>
			<?php endif; ?>
			<p class="groupbottom">
				<label for="dbhost" class="infield"><?php p($l->t('Database host')); ?></label>
				<input type="text" name="dbhost" id="dbhost"
					placeholder="<?php p($l->t('Database host')); ?>"
					value="<?php p($_['dbhost']); ?>"
					autocomplete="off" autocorrect="off">
			</p>
			<p class="info">
				<?php p($l->t('Please specify the port number along with the host name (e.g., localhost: 5432).')); ?>
			</p>
		</div>
		</fieldset>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (!$_['dbIsSet'] or \count($_['errors']) > 0): ?>
		<div id="sqliteInformation">
			<div class="warning">
				<?php p($l->t('Performance warning'));?>
				<p><?php p($l->t('SQLite will be used as database.'));?></p>
				<p><?php p($l->t('For larger installations we recommend to choose a different database backend.'));?></p>
				<p><?php p($l->t('Especially when using the desktop client for file syncing the use of SQLite is discouraged.')); ?></p>
			</div>
		</div>
	<?php endif ?>

	<div class="submit-wrap">
		<button type="submit" id="submit" class="login-button">
			<span><?php p($l->t('Finish setup')); ?></span>
			<div class="loading-spinner"><div></div><div></div><div></div><div></div></div>
		</button>
	</div>

	<p class="info">
		<span class="icon-info-white"></span>
		<?php p($l->t('Need help?'));?>
		<a target="_blank" rel="noreferrer" href="<?php p(link_to_docs(\OCP\Constants::DOCS_ADMIN_INSTALL)); ?>"><?php p($l->t('See the documentation'));?> ↗</a>
	</p>
</form>
