	<?php OCP\Util::addscript('files', 'admin'); ?>

	<form name="filesForm" class="section" action="#" method="post">
		<h2><?php p($l->t('File handling')); ?></h2>
		<label for="maxUploadSizeValue"><?php p($l->t( 'Maximum upload size' )); ?> </label>
		<input type="text" name='maxUploadSizeValue' id="maxUploadSizeValue"
			<?php if (!$_['uploadChangable']): ?>
				value="<?php p($_['uploadMaxFileSizeValue'] . ' ' . $_['uploadMaxFileSizeUnit']) ?>" disabled="disabled"
			<?php else: ?>
				value="<?php p($_['uploadMaxFileSizeValue']); ?>"
			<?php endif;?> />

		<?php if ($_['uploadChangable']): ?>
		<select name="maxUploadSizeUnit" id="maxUploadSizeUnit" <?php if(!$_['uploadChangable']) { p('disabled'); } ?>>
			<?php foreach ($_['maxFileSizeUnits'] as $unit):
				$selected = '';
				if ($unit == $_['uploadMaxFileSizeUnit']):
					$selected = ' selected="selected"';
				endif;
			?>
				<option value="<?php p($unit)?>" <?php p($selected) ?>><?php p($unit) ?></option>
			<?php endforeach;?>
		</select>
		<?php endif;?>

		<?php if($_['displayMaxPossibleUploadSize']):?>
			(<?php p($l->t('max. possible: ')); p($_['maxPossibleUploadSize']) ?>)
		<?php endif;?>
		<br />
		<input type="hidden" value="<?php p($_['requesttoken']); ?>" name="requesttoken" />
		<?php if($_['uploadChangable']): ?>
			<input type="submit" name="submitFilesAdminSettings" id="submitFilesAdminSettings"
				   value="<?php p($l->t( 'Save' )); ?>"/>
		<?php else: ?>
			<?php p($l->t('Can not be edited from here due to insufficient permissions.')); ?>
		<?php endif; ?>
	</form>
