<?php
/**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/** @var $_ mixed[]|\OCP\IURLGenerator[] */
/** @var \OC_Defaults $theme */

style('settings', 'settings');
script('settings', 'settings');
script('settings', $_['type']);
script('files', 'jquery.fileupload');
vendor_script('select2/select2');
vendor_style('select2/select2');
script('core', 'multiselect');

if($_['type'] === 'admin') {
	script('core', ['multiselect', 'setupchecks']);
}
?>

<div id="app-navigation">
	<ul>
		<li class="divider"><?php p($l->t('Personal')); ?></li>
		<?php foreach($_['personalNav'] as $item) {
		$active = $item['active'] ? 'class="active"' : '';
		print_unescaped(
			sprintf(
				"<li><a %shref='%s'>%s</a></li>",
				$active,
				\OCP\Util::sanitizeHTML($item['link']),
				\OCP\Util::sanitizeHTML($item['name'])
			)
		);
	}
	if(!empty($_['adminNav'])) { ?>

		<li class="divider"><?php p($l->t('Admin')); ?></li>
		<?php

		foreach ($_['adminNav'] as $item) {
			$active = $item['active'] ? 'class="active"' : '';
			print_unescaped(
				sprintf(
					"<li><a %shref='%s'>%s</a></li>",
					$active,
					\OCP\Util::sanitizeHTML($item['link']),
					\OCP\Util::sanitizeHTML($item['name'])
				)
			);
		}
	}?>
	</ul>
</div>
<div id="app-content">
	<?php foreach($_['panels'] as $panel) { ?>
        <div id="<?php print($panel['id']); ?>">
            <?php print_unescaped($panel['content']); ?>
        </div>
	<?php }
	$numPanels = count($_['panels']);
	$firstPanel = $_['panels'][0];
	$legacyClass = OC\Settings\Panels\Personal\Legacy::class;
	if($numPanels === 1 && $firstPanel['id'] === $legacyClass && empty(trim($firstPanel['content']))) { ?>
		<div class="section">
			<h2><?php p($l->t('Error')); ?></h2>
			<p><?php p($l->t('No panels for this section.')); ?></p>
		</div>
	<?php } ?>
</div>
