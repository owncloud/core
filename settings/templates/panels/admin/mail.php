<?php
script('settings', 'panels/mail');
$mail_smtpauthtype = [
	''	=> $l->t('None'),
	'LOGIN'	=> $l->t('Login'),
	'PLAIN'	=> $l->t('Plain'),
	'NTLM'	=> $l->t('NT LAN Manager'),
];
$mail_smtpsecure = [
	''		=> $l->t('None'),
	'ssl'	=> $l->t('SSL/TLS'),
	'tls'	=> $l->t('STARTTLS'),
];
$mail_smtpmode = [
	'php',
	'smtp',
];
if ($_['sendmail_is_available']) {
	$mail_smtpmode[] = 'sendmail';
}
if ($_['mail_smtpmode'] == 'qmail') {
	$mail_smtpmode[] = 'qmail';
}
?><div class="section">
	<h2 class="app-name has-documentation"><?php p($l->t('Email server'));?></h2>
	<a target="_blank" rel="noreferrer" class="icon-info"
	   title="<?php p($l->t('Open documentation'));?>"
	   href="<?php p(link_to_docs('admin-email')); ?>"></a>
	<?php if ($_['read-only']) : ?>
		<p>
			<?php p($l->t('The config file is read only. Please adjust your setup by editing the config file manually.')); ?>
			<br>
			<?php p($l->t('In a clustered setup please make sure to sync the config.php file across all nodes.')); ?>
		</p>
	<?php else :?>
		<form id="mail_general_settings_form" class="mail_settings">

			<p><?php p($l->t('This is used for sending out notifications.')); ?> <span id="mail_settings_msg" class="msg"></span></p>

			<p>
				<label for="mail_smtpmode"><?php p($l->t('Send mode')); ?></label>
				<select name='mail_smtpmode' id='mail_smtpmode'>
					<?php foreach ($mail_smtpmode as $smtpmode):
						$selected = '';
						if ($smtpmode == $_['mail_smtpmode']):
							$selected = 'selected="selected"';
						endif; ?>
						<option value='<?php p($smtpmode)?>' <?php p($selected) ?>><?php p($smtpmode) ?></option>
					<?php endforeach;?>
				</select>

				<label id="mail_smtpsecure_label" for="mail_smtpsecure"
					   <?php if ($_['mail_smtpmode'] != 'smtp') {
							print_unescaped(' class="hidden"');
						} ?>>
					<?php p($l->t('Encryption')); ?>
				</label>
				<select name="mail_smtpsecure" id="mail_smtpsecure"
						<?php if ($_['mail_smtpmode'] != 'smtp') {
							print_unescaped(' class="hidden"');
						} ?>>
					<?php foreach ($mail_smtpsecure as $secure => $name):
						$selected = '';
						if ($secure == $_['mail_smtpsecure']):
							$selected = 'selected="selected"';
						endif; ?>
						<option value='<?php p($secure)?>' <?php p($selected) ?>><?php p($name) ?></option>
					<?php endforeach;?>
				</select>
			</p>

			<p>
				<label for="mail_from_address"><?php p($l->t('From address')); ?></label>
				<input type="text" name='mail_from_address' id="mail_from_address" placeholder="<?php p($l->t('mail'))?>"
					   value='<?php p($_['mail_from_address']) ?>' />@
				<input type="text" name='mail_domain' id="mail_domain" placeholder="example.com"
					   value='<?php p($_['mail_domain']) ?>' />
			</p>

			<p id="setting_smtpauth" <?php if ($_['mail_smtpmode'] != 'smtp') {
							print_unescaped(' class="hidden"');
						} ?>>
				<label for="mail_smtpauthtype"><?php p($l->t('Authentication method')); ?></label>
				<select name='mail_smtpauthtype' id='mail_smtpauthtype'>
					<?php foreach ($mail_smtpauthtype as $authtype => $name):
						$selected = '';
						if ($authtype == $_['mail_smtpauthtype']):
							$selected = 'selected="selected"';
						endif; ?>
						<option value='<?php p($authtype)?>' <?php p($selected) ?>><?php p($name) ?></option>
					<?php endforeach;?>
				</select>

				<input type="checkbox" name="mail_smtpauth" id="mail_smtpauth" class="checkbox" value="1"
					   <?php if ($_['mail_smtpauth']) {
							print_unescaped('checked="checked"');
						} ?> />
				<label for="mail_smtpauth"><?php p($l->t('Authentication required')); ?></label>
			</p>

			<p id="setting_smtphost" <?php if ($_['mail_smtpmode'] != 'smtp') {
							print_unescaped(' class="hidden"');
						} ?>>
				<label for="mail_smtphost"><?php p($l->t('Server address')); ?></label>
				<input type="text" name='mail_smtphost' id="mail_smtphost" placeholder="smtp.example.com"
					   value='<?php p($_['mail_smtphost']) ?>' />
				:
				<input type="text" name='mail_smtpport' id="mail_smtpport" placeholder="<?php p($l->t('Port'))?>"
					   value='<?php p($_['mail_smtpport']) ?>' />
			</p>
		</form>
		<form class="mail_settings" id="mail_credentials_settings">
			<p id="mail_credentials" <?php if (!$_['mail_smtpauth'] || $_['mail_smtpmode'] != 'smtp') {
							print_unescaped(' class="hidden"');
						} ?>>
				<label for="mail_smtpname"><?php p($l->t('Credentials')); ?></label>
				<input type="text" name='mail_smtpname' id="mail_smtpname" placeholder="<?php p($l->t('SMTP Username'))?>"
					   value='<?php p($_['mail_smtpname']) ?>' />
				<input type="password" name='mail_smtppassword' id="mail_smtppassword" autocomplete="off"
					   placeholder="<?php p($l->t('SMTP Password'))?>" value='<?php p($_['mail_smtppassword']) ?>' />
				<input id="mail_credentials_settings_submit" type="button" value="<?php p($l->t('Store credentials')) ?>">
			</p>
		</form>
	<?php endif; ?>
	<br />
	<em><?php p($l->t('Test email settings')); ?></em>
	<input type="submit" name="sendtestemail" id="sendtestemail" value="<?php p($l->t('Send email')); ?>"/>
	<span id="sendtestmail_msg" class="msg"></span>
</div>
