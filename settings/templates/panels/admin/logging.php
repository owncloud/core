<?php
/**
 * @var array $_
 * @var \OCP\IL10N $l
 * @var OC_Defaults $theme
 */
?>
<div class="section">
	<h2 class="app-name"><?php p($l->t('Log'));?></h2>
	<?php if ($_['showLog'] && $_['doesLogFileExist']): ?>
		<p><?php p($l->t('What to log'));?> <select name='loglevel' id='loglevel'>
		<?php for ($i = 0; $i < 5; $i++):
			$selected = '';
			if ($i == $_['loglevel']):
				$selected = 'selected="selected"';
			endif; ?>
				<option value='<?php p($i)?>' <?php p($selected) ?>><?php p($levelLabels[$i])?></option>
		<?php endfor;?>
		</select></p>
		<br/>
		<?php if ($_['logFileSize'] > 0): ?>
			<a href="<?php print_unescaped(OC::$server->getURLGenerator()->linkToRoute('settings.LogSettings.download')); ?>" class="button" id="downloadLog"
			><?php p($l->t('Download logfile (%s)', [\OCP\Util::humanFileSize($_['logFileSize'])]));?></a>
		<?php endif; ?>
		<?php if ($_['logFileSize'] > (100 * 1024 * 1024)): ?>
			<br>
			<em>
				<?php p($l->t('The logfile is bigger than 100 MB. Downloading it may take some time!')); ?>
			</em>
		<?php endif; ?>
	<?php endif; ?>
</div>
