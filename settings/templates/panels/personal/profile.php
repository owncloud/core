<?php if ($_['enableAvatars']): ?>
<form id="avatar" class="section" method="post" action="<?php p(\OC::$server->getURLGenerator()->linkToRoute('core.avatar.postAvatar')); ?>">
	<h2><?php p($l->t('Profile picture')); ?></h2>
	<div id="displayavatar">
		<div class="avatardiv"></div>
		<div class="warning hidden"></div>
		<?php if ($_['avatarChangeSupported']): ?>
		<label for="uploadavatar" class="inlineblock button icon-upload" id="uploadavatarbutton" title="<?php p($l->t('Upload new')); ?>"></label>
		<div class="inlineblock button icon-folder" id="selectavatar" title="<?php p($l->t('Select from Files')); ?>"></div>
		<div class="hidden button icon-delete" id="removeavatar" title="<?php p($l->t('Remove image')); ?>"></div>
		<input type="file" name="files[]" id="uploadavatar" class="hiddenuploadfield">
		<p><em><?php p($l->t('png or jpg, max. 20 MB')); ?></em></p>
		<?php else: ?>
		<?php p($l->t('Picture provided by original account')); ?>
		<?php endif; ?>
	</div>

	<div id="cropper" class="hidden">
		<div class="inlineblock button" id="abortcropperbutton"><?php p($l->t('Cancel')); ?></div>
		<div class="inlineblock button primary" id="sendcropperbutton"><?php p($l->t('Choose as profile picture')); ?></div>
	</div>
</form>
<?php endif; ?>

<?php
if($_['displayNameChangeSupported']) {
?>
<form id="displaynameform" class="section">
	<h2>
		<label for="displayName"><?php echo $l->t('Full name');?></label>
	</h2>
	<input type="text" id="displayName" name="displayName"
		value="<?php p($_['displayName'])?>"
		autocomplete="on" autocapitalize="off" autocorrect="off" />
    <span class="msg"></span>
	<input type="hidden" id="oldDisplayName" name="oldDisplayName" value="<?php p($_['displayName'])?>" />
</form>
<?php
} else {
?>
<div id="displaynameform" class="section">
	<h2><?php echo $l->t('Full name');?></h2>
	<span><?php if(isset($_['displayName'][0])) { p($_['displayName']); } else { p($l->t('No display name set')); } ?></span>
</div>
<?php
}
?>

<?php
if($_['displayNameChangeSupported']) {
?>
<form id="lostpassword" class="section">
	<h2>
		<label for="email"><?php p($l->t('Email'));?></label>
	</h2>
	<input type="email" name="email" id="email" value="<?php p($_['email']); ?>"
		placeholder="<?php p($l->t('Your email address'));?>"
		autocomplete="on" autocapitalize="off" autocorrect="off" />
	<span class="msg"></span><br />
	<em><?php p($l->t('For password recovery and notifications'));?></em>
</form>
<?php
} else {
?>
<div id="lostpassword" class="section">
	<h2><?php echo $l->t('Email'); ?></h2>
	<span><?php if(isset($_['email'][0])) { p($_['email']); } else { p($l->t('No email address set')); }?></span>
</div>
<?php
}
?>

<div id="groups" class="section">
	<h2><?php p($l->t('Groups')); ?></h2>
	<p><?php p($l->t('You are member of the following groups:')); ?></p>
	<p>
	<?php p(implode(', ', $_['groups'])); ?>
	</p>
</div>

<?php
if($_['passwordChangeSupported']) {
	script('jquery-showpassword');
?>
<form id="passwordform" class="section">
	<h2 class="inlineblock"><?php p($l->t('Password'));?></h2>
	<div class="hidden icon-checkmark" id="password-changed"></div>
	<div class="hidden msg error" id="password-error"><?php p($l->t('Unable to change your password'));?></div>
	<br>
	<label for="pass1" class="hidden-visually"><?php echo $l->t('Current password');?>: </label>
	<input type="password" id="pass1" name="oldpassword"
		placeholder="<?php echo $l->t('Current password');?>"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<label for="pass2" class="hidden-visually"><?php echo $l->t('New password');?>: </label>
	<input type="password" id="pass2" name="personal-password"
		placeholder="<?php echo $l->t('New password');?>"
		data-typetoggle="#personal-show"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<input type="checkbox" id="personal-show" name="show" /><label for="personal-show"></label>
	<input id="passwordbutton" type="submit" value="<?php echo $l->t('Change password');?>" />
</form>
<?php
}
?>

<form id="language" class="section">
	<h2>
		<label for="languageinput"><?php p($l->t('Language'));?></label>
	</h2>
	<select id="languageinput" name="lang" data-placeholder="<?php p($l->t('Language'));?>">
		<option value="<?php p($_['activelanguage']['code']);?>">
			<?php p($_['activelanguage']['name']);?>
		</option>
		<?php foreach($_['commonlanguages'] as $language):?>
			<option value="<?php p($language['code']);?>">
				<?php p($language['name']);?>
			</option>
		<?php endforeach;?>
		<optgroup label="––––––––––"></optgroup>
		<?php foreach($_['languages'] as $language):?>
			<option value="<?php p($language['code']);?>">
				<?php p($language['name']);?>
			</option>
		<?php endforeach;?>
	</select>
	<?php if (OC_Util::getEditionString() === ''): ?>
	<a href="https://www.transifex.com/projects/p/owncloud/"
		target="_blank" rel="noreferrer">
		<em><?php p($l->t('Help translate'));?></em>
	</a>
	<?php endif; ?>
</form>
