<?php
script('files_sharing', 'settings-personal');
?>
<div class="section" id="fileSharingSettings" >

	<h2><?php p($l->t('Federated Cloud Sharing'));?></h2>

	<form id="federatedCloudIdForm" class="section">
		<h3><?php p($l->t('Your unique identifier:'));?></h3>
		<br />
	<input type="text" id="federatedCloudId" name="federatedCloudId"
		value="<?php p($_['alias'])?>"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<?php p('@' . $_['domain']) ?>
    <span class="msg"></span>

</form>

</div>
