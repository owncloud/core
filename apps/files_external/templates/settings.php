<?php

	use OCP\Files\External\Auth\AuthMechanism;
	use OCP\Files\External\Backend\Backend;
	use OCP\Files\External\IStoragesBackendService;

	$l->t("Enable encryption");
	$l->t("Enable previews");
	$l->t("Enable sharing");
	$l->t("Check for changes");
	$l->t("Never");
	$l->t("Once every direct access");

	script('files_external', 'settings');
	style('files_external', 'settings');

	// load custom JS
	foreach ($_['backends'] as $backend) {
		/** @var Backend $backend */
		$scripts = $backend->getCustomJs();
		foreach ($scripts as $script) {
			if (\is_array($script)) {
				list($appName, $tmpScript) = $script;
			} else {
				$appName = 'files_external';
				$tmpScript = $script;
			}
			script($appName, $tmpScript);
		}
	}
	foreach ($_['authMechanisms'] as $authMechanism) {
		/** @var AuthMechanism $authMechanism */
		$scripts = $authMechanism->getCustomJs();
		foreach ($scripts as $script) {
			script('files_external', $script);
		}
	}

?>
<form id="files_external" class="section" data-encryption-enabled="<?php echo $_['encryptionEnabled']?'true': 'false'; ?>">
	<h2 class="app-name"><?php p($l->t('External Storage')); ?></h2>

	<?php if ($_['visibilityType'] === IStoragesBackendService::VISIBILITY_ADMIN): ?>
	<p>
		<input type="checkbox" name="enableExternalStorage" id="enableExternalStorageCheckbox" class="checkbox"
			   value="1" <?php if ($_['enableExternalStorage']) {
	print_unescaped('checked="checked"');
} ?> />
		<label for="enableExternalStorageCheckbox">
			<?php p($l->t('Enable external storage'));?>
		</label>
	</p>
	<?php endif; ?>
	<?php if (!$_['enableExternalStorage']): ?>
	<p><?php p($l->t('External storage has been disabled by the administrator')); ?></p>
	<?php endif; ?>

	<div id="files_external_settings" class=" <?php if (!$_['enableExternalStorage']) {
	print('hidden');
} ?>">

	<?php if (isset($_['dependencies']) and ($_['dependencies']<>'')) {
	print_unescaped(''.$_['dependencies'].'');
} ?>
	<table id="externalStorage" class="grid" data-admin='<?php print_unescaped(\json_encode($_['visibilityType'] === IStoragesBackendService::VISIBILITY_ADMIN)); ?>'>
		<thead>
			<tr>
				<th></th>
				<th><?php p($l->t('Folder name')); ?></th>
				<th><?php p($l->t('External storage')); ?></th>
				<th><?php p($l->t('Authentication')); ?></th>
				<th><?php p($l->t('Configuration')); ?></th>
				<?php if ($_['visibilityType'] === IStoragesBackendService::VISIBILITY_ADMIN) {
	print_unescaped('<th>'.$l->t('Available for').'</th>');
} ?>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr id="addMountPoint"
			<?php if ($_['visibilityType'] === IStoragesBackendService::VISIBILITY_PERSONAL && $_['allowUserMounting'] === false): ?>
				style="display: none;"
			<?php endif; ?>
			>
				<td class="status">
					<span></span>
				</td>
				<td class="mountPoint"><input type="text" name="mountPoint" value=""
					placeholder="<?php p($l->t('Folder name')); ?>">
				</td>
				<td class="backend">
					<select id="selectBackend" class="selectBackend" data-configurations='<?php p(\json_encode($_['backends'])); ?>'>
						<option value="" disabled selected
							style="display:none;">
							<?php p($l->t('Add storage')); ?>
						</option>
						<?php
							$sortedBackends = \array_filter($_['backends'], function ($backend) use ($_) {
								return $backend->isVisibleFor($_['visibilityType']);
							});
							\uasort($sortedBackends, function ($a, $b) {
								return \strcasecmp($a->getText(), $b->getText());
							});
						?>
						<?php
							$canCreateNewLocalStorage = \OC::$server->getConfig()->getSystemValue('files_external_allow_create_new_local', false);
						?>
						<?php foreach ($sortedBackends as $backend): ?>
							<?php if ($backend->getDeprecateTo()) {
							continue;
						} // ignore deprecated backends?>
							<?php if (!$canCreateNewLocalStorage && $backend->getIdentifier() == "local") {
							continue;
						} // if the "files_external_allow_create_new_local" config param isn't set to to true?>
							<option value="<?php p($backend->getIdentifier()); ?>"><?php p($backend->getText()); ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td class="authentication" data-mechanisms='<?php p(\json_encode($_['authMechanisms'])); ?>'></td>
				<td class="configuration"></td>
				<?php if ($_['visibilityType'] === IStoragesBackendService::VISIBILITY_ADMIN): ?>
					<td class="applicable" align="right">
						<input type="hidden" class="applicableUsers" style="width:20em;" value="" />
					</td>
				<?php endif; ?>
				<td class="mountOptionsToggle hidden">
					<img class="svg"
						title="<?php p($l->t('Advanced settings')); ?>"
						alt="<?php p($l->t('Advanced settings')); ?>"
						src="<?php print_unescaped(image_path('core', 'actions/settings.svg')); ?>"
					/>
					<input type="hidden" class="mountOptions" value="" />
				</td>
				<td class="hidden">
					<img class="svg"
						alt="<?php p($l->t('Delete')); ?>"
						title="<?php p($l->t('Delete')); ?>"
						src="<?php print_unescaped(image_path('core', 'actions/delete.svg')); ?>"
					/>
				</td>
			</tr>
		</tbody>
	</table>
	<br />

	<?php if ($_['visibilityType'] === IStoragesBackendService::VISIBILITY_ADMIN): ?>
		<br />
		<input type="checkbox" name="allowUserMounting" id="allowUserMounting" class="checkbox"
			value="1" <?php if ($_['allowUserMounting'] == 'yes') {
							print_unescaped(' checked="checked"');
						} ?> />
		<label for="allowUserMounting"><?php p($l->t('Allow users to mount external storage')); ?></label> <span id="userMountingMsg" class="msg"></span>

		<p id="userMountingBackends"<?php if ($_['allowUserMounting'] != 'yes'): ?> class="hidden"<?php endif; ?>>
			<?php p($l->t('Allow users to mount the following external storage')); ?><br />
			<?php
				$userBackends = \array_filter($_['backends'], function ($backend) {
					return $backend->isAllowedVisibleFor(IStoragesBackendService::VISIBILITY_PERSONAL);
				});
				\uasort($userBackends, function ($a, $b) {
					return \strcasecmp($a->getText(), $b->getText());
				});
			?>
			<?php $i = 0; foreach ($userBackends as $backend): ?>
				<?php if ($deprecateTo = $backend->getDeprecateTo()): ?>
					<input type="hidden" id="allowUserMountingBackends<?php p($i); ?>" name="allowUserMountingBackends[]" value="<?php p($backend->getIdentifier()); ?>" data-deprecate-to="<?php p($deprecateTo->getIdentifier()); ?>" />
				<?php else: ?>
					<input type="checkbox" id="allowUserMountingBackends<?php p($i); ?>" class="checkbox" name="allowUserMountingBackends[]" value="<?php p($backend->getIdentifier()); ?>" <?php if ($backend->isVisibleFor(IStoragesBackendService::VISIBILITY_PERSONAL)) {
				print_unescaped(' checked="checked"');
			} ?> />
					<label for="allowUserMountingBackends<?php p($i); ?>"><?php p($backend->getText()); ?></label> <br />
				<?php endif; ?>
				<?php $i++; ?>
			<?php endforeach; ?>
			<br/>
			<input type="checkbox" name="allowUserMountSharing" id="allowUserMountSharing" class="checkbox"
				value="1" <?php if ($_['allowUserMountSharing'] === 'yes') {
				print_unescaped(' checked="checked"');
			} ?> />
			<label for="allowUserMountSharing"><?php p($l->t('Allow sharing on user-mounted external storages')); ?></label> <span id="userMountSharingMsg" class="msg"></span>
		</p>
	<?php else: ?>
		<input type="hidden" name="allowUserMountSharing" id="allowUserMountSharing"
			value="<?php p($_['allowUserMountSharing']) ?>" />
	<?php endif; ?>
	</div>
</form>
