<?php
/**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/** @var $_ mixed[]|\OCP\IURLGenerator[] */
/** @var \OC_Defaults $theme */

script('settings', 'settings');
script('settings', $_['type']);
script('files', 'jquery.fileupload');
vendor_script('select2/select2');
vendor_style('select2/select2');
script('core', 'multiselect');
style('settings', 'settings');

?>

<div id="app-navigation">
	<ul class="with-icon">
		<li class="divider"><?php p($l->t('Personal')); ?></li>
		<?php foreach ($_['personalNav'] as $item): ?>
		<li>
			<?php if (\strpos($item['icon'], '/', 1) !== false): ?>
				<a class="svg <?php $item['active'] ? p(' active ') : p('') ?>" style="background-image: url(<?php p($item['icon']) ?>)" href='<?php p($item['link']); ?>'><?php p($item['name']) ?></a>
			<?php else: ?>
				<a class="svg <?php $item['active'] ? p(' active ') : p('') ?> icon-<?php p($item['icon']) ?>" href='<?php p($item['link']); ?>'><?php p($item['name']) ?></a>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>

		<?php if (!empty($_['adminNav'])): ?>
			<li class="divider"><?php p($l->t('Admin')); ?></li>
			<?php foreach ($_['adminNav'] as $item): ?>
				<li>
					<?php if (\strpos($item['icon'], '/', 1) !== false): ?>
						<a class="svg <?php $item['active'] ? p(' active ') : p('') ?>" style="background-image: url(<?php p($item['icon']) ?>)" href='<?php p($item['link']); ?>'><?php p($item['name']) ?></a>
					<?php else: ?>
						<a class="svg <?php $item['active'] ? p(' active ') : p('') ?> icon-<?php p($item['icon']) ?>" href='<?php p($item['link']); ?>'><?php p($item['name']) ?></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
<div id="app-content">
	<?php foreach ($_['panels'] as $panel) {
	?>
        <div id="<?php print($panel['id']); ?>">
            <?php print_unescaped($panel['content']); ?>
        </div>
	<?php
}
	$numPanels = \count($_['panels']);
	$legacyClass = OC\Settings\Panels\Personal\Legacy::class;
	if ($numPanels === 0 || ($numPanels === 1 && $_['panels'][0]['id'] === $legacyClass && empty(\trim($_['panels'][0]['content'])))) {
		?>
		<div class="section">
			<h2><?php p($l->t('Error')); ?></h2>
			<p><?php p($l->t('No panels for this section.')); ?></p>
		</div>
	<?php
	} ?>
</div>
