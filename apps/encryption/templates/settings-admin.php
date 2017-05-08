<?php
/** @var array $_ */
/** @var \OCP\IL10N $l */
script('encryption', 'settings-admin');
style('encryption', 'settings-admin');
?>
<form id="ocDefaultEncryptionModule" class="sub-section">
	<h2 class="app-name"><?php p($l->t('Default encryption module')); ?></h2>
	<?php if(!$_["initStatus"] and (\OC::$server->getAppConfig()->getValue('encryption', 'useMasterKey', '0') !== '0'
		or \OC::$server->getAppConfig()->getValue('encryption', 'encryptHomeStorage', '') !== '')): ?>
		<?php p($l->t("Encryption App is enabled but your keys are not initialized, please log-out and log-in again")); ?>
	<?php else: ?>
		<label id="encryptionType">
			<?php
			$masterKey = \OC::$server->getAppConfig()->getValue('encryption', 'useMasterKey', '0');
			$userSpecificKey = \OC::$server->getAppConfig()->getValue('encryption', 'userSpecificKey', '');
			if($masterKey !== '0') {
				p($l->t("Encryption type: Master Key"));
			} else {
				if($userSpecificKey !== "") {
					p($l->t("Encryption type: User Specific Key"));
				}
			}
			?>
		</label>
		<span id="encryptionKeySelection">
			<select id="keyTypeId" name="keyType">
				<option value="nokey"><?php p($l->t("Please select an encryption option"))?></option>
				<option value="masterkey" <?php \OC::$server->getAppConfig()->getValue('encryption', 'useMasterKey', '0') !== '0' ? print_unescaped('selected="selected"') : print_unescaped(''); ?>><?php p($l->t("Master Key"))?></option>
				<option value="customkey"><?php p($l->t("User-specific key"))?></option>
			</select>
			<button id="select-mode" type="button" class="hidden"><?php p($l->t("Permanently select this mode"));?></button>
			<div style="display:inline-block;margin-left: 20px;" class="hidden"></div>
			<div id="masterKeyVal" data-master-key="<?php echo \OC::$server->getAppConfig()->getValue("encryption", "useMasterKey", "");?>"></div>
			<div id="userSpecificKey" data-user-specific-key="<?php echo \OC::$server->getAppConfig()->getValue("encryption", "userSpecificKey", "");?>"></div>
		</span>
		<br />

		<p id="encryptHomeStorageSetting" class="hidden">
			<input type="checkbox" class="checkbox" name="encrypt_home_storage" id="encryptHomeStorage"
				   value="1" <?php if ($_['encryptHomeStorage']) print_unescaped('checked="checked"'); ?> />
			<label for="encryptHomeStorage"><?php p($l->t('Encrypt the home storage'));?></label></br>
			<em><?php p( $l->t( "Enabling this option encrypts all files stored on the main storage, otherwise only files on external storage will be encrypted" ) ); ?></em>
		</p>
		<br />
		<?php if($_['masterKeyEnabled'] === false): ?>
			<p id="encryptionSetRecoveryKey" class="hidden">
				<?php $_["recoveryEnabled"] === '0' ?  p($l->t("Enable recovery key")) : p($l->t("Disable recovery key")); ?>
				<span class="msg"></span>
				<br/>
				<em>
					<?php p($l->t("The recovery key is an extra encryption key that is used to encrypt files. It allows recovery of a user's files if the user forgets his or her password.")) ?>
				</em>
				<br/>
				<input type="password"
					   name="encryptionRecoveryPassword"
					   id="encryptionRecoveryPassword"
					   placeholder="<?php p($l->t("Recovery key password")); ?>"/>
				<input type="password"
					   name="encryptionRecoveryPassword"
					   id="repeatEncryptionRecoveryPassword"
					   placeholder="<?php p($l->t("Repeat recovery key password")); ?>"/>
				<input type="button"
					   name="enableRecoveryKey"
					   id="enableRecoveryKey"
					   status="<?php p($_["recoveryEnabled"]) ?>"
					   value="<?php $_["recoveryEnabled"] === '0' ?  p($l->t("Enable recovery key")) : p($l->t("Disable recovery key")); ?>"/>
			</p>
			<br/><br/>

			<p name="changeRecoveryPasswordBlock" id="encryptionChangeRecoveryKey" <?php if($_['recoveryEnabled'] === '0') print_unescaped('class="hidden"');?>>
				<?php p($l->t("Change recovery key password:")); ?>
				<span class="msg"></span>
				<br/>
				<input
					type="password"
					name="changeRecoveryPassword"
					id="oldEncryptionRecoveryPassword"
					placeholder="<?php p($l->t("Old recovery key password")); ?>"/>
				<br />
				<input
					type="password"
					name="changeRecoveryPassword"
					id="newEncryptionRecoveryPassword"
					placeholder="<?php p($l->t("New recovery key password")); ?>"/>
				<input
					type="password"
					name="changeRecoveryPassword"
					id="repeatedNewEncryptionRecoveryPassword"
					placeholder="<?php p($l->t("Repeat new recovery key password")); ?>"/>

				<button
					type="button"
					name="submitChangeRecoveryKey">
					<?php p($l->t("Change Password")); ?>
				</button>
			</p>
		<?php endif; ?>
	<?php endif; ?>
</form>
