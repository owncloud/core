<?php script('files', 'admin'); ?>

<div id="filesForm" class="section">
	<h2 class="app-name"><?php p($l->t('File handling')); ?></h2>
	<label for="maxUploadSize"><?php p($l->t( 'Maximum upload size' )); ?> </label>
	<input type="text" name='maxUploadSize' id="maxUploadSize" value='<?php p($_['uploadMaxFilesize']) ?>' <?php if(!$_['uploadChangeable']) { p('disabled'); } ?> />
	<?php if($_['displayMaxPossibleUploadSize']):?>
		(<?php p($l->t('max. possible: ')); p($_['maxPossibleUploadSize']) ?>)
	<?php endif;?>
	<?php if($_['uploadChangeable']): ?>
		<input type="submit" name="submitFilesAdminSettings" id="submitFilesAdminSettings"
			   value="<?php p($l->t( 'Save' )); ?>"/>
		<p><em><?php p($l->t('With PHP-FPM it might take 5 minutes for changes to be applied.')); ?></em></p>
	<?php else: ?>
		<p><em><?php p($l->t('Missing permissions to edit from here.')); ?></em></p>
	<?php endif; ?>
</div>
