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
		<?php foreach($_['personalNav'] as $item) {
			$active = $item['active'] ? ' active ' : '';
			print_unescaped(
				sprintf(
					"<li><a class=\"svg %s %s\" href='%s'>%s</a></li>",
					$active,
					'icon-'.\OCP\Util::sanitizeHTML($item['icon']),
					\OCP\Util::sanitizeHTML($item['link']),
					\OCP\Util::sanitizeHTML($item['name'])
				)
			);
		}
		if(!empty($_['adminNav'])) { ?>

			<li class="divider"><?php p($l->t('Admin')); ?></li>
			<?php

			foreach ($_['adminNav'] as $item) {
				$active = $item['active'] ? ' active ' : '';
				print_unescaped(
					sprintf(
						"<li><a class=\"svg %s %s\" href='%s'>%s</a></li>",
						$active,
						'icon-'.\OCP\Util::sanitizeHTML($item['icon']),
						\OCP\Util::sanitizeHTML($item['link']),
						\OCP\Util::sanitizeHTML($item['name'])
					)
				);
			}
		}
		?>
	</ul>
</div>
<div id="app-content">
	<?php foreach($_['panels'] as $panel) { ?>
        <div id="<?php print($panel['id']); ?>">
            <?php print_unescaped($panel['content']); ?>
        </div>
	<?php }
	$numPanels = count($_['panels']);
	$legacyClass = OC\Settings\Panels\Personal\Legacy::class;
	if($numPanels === 0 || ($numPanels === 1 && $_['panels'][0]['id'] === $legacyClass && empty(trim($_['panels'][0]['content'])))) { ?>
		<div class="section">
			<h2><?php p($l->t('Error')); ?></h2>
			<p><?php p($l->t('No panels for this section.')); ?></p>
		</div>
	<?php } ?>
</div>
