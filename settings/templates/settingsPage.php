<?php /**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/** @var $_ mixed[]|\OCP\IURLGenerator[] */
/** @var \OC_Defaults $theme */
?>

<div id="app-navigation">
	<ul>
	<?php foreach($_['nav'] as $item) {
		print_unescaped(sprintf("<li><a href='%s'>%s</a></li>", \OCP\Util::sanitizeHTML($anchor), \OCP\Util::sanitizeHTML($sectionName)));
	}?>
	</ul>
</div>
<div id="app-content">
  <?php print_unescaped($_['content']); ?>
</div>
