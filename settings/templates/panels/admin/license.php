<?php
script('settings', 'panels/license');
?>
<div class="section">
	<h2 class="app-name"><?php p($l->t('Enterprise license key'));?></h2>
	<div id="license_message_div" <?php print_unescaped($_['divMessageClass']); ?>>
	<?php foreach ($_['messageInfo']['translated_message'] as $lineNumber => $line): ?>
		<?php if (\in_array($lineNumber, $_['messageInfo']['contains_html'], true)): ?>
			<p><?php print_unescaped($line); ?></p>
		<?php else: ?>
			<p><?php p($line); ?></p>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>

	<div>
		<?php p($l->t('Enter a new license:')); ?>
		<input id="license_input_text" type="text" style="width: 350px; max-width: 100%" />
		<input id="license_input_button" type="button" value="<?php p($l->t('Save')); ?>"/>
	</div>
</div>