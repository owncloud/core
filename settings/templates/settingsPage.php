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

if($_['type'] === 'admin') {
	script('core', ['multiselect', 'setupchecks']);
	vendor_script('select2/select2');
	vendor_style('select2/select2');
}
?>

<div id="app-navigation">
	<ul>
	<?php foreach($_['nav'] as $item) {
		print_unescaped(sprintf("<li><a href='%s'>%s</a></li>", \OCP\Util::sanitizeHTML($item['link']), \OCP\Util::sanitizeHTML($item['name'])));
	}?>
	</ul>
</div>
<div id="app-content">
	<?php foreach($_['panels'] as $panel) { ?>
        <div class="section" id="<?php print($panel['id']); ?>">
            <?php print_unescaped($panel['content']); ?>
        </div>
    <?php } ?>
</div>
