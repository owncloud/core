<?php /**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */?>
<script
	type="text/javascript"
	src="<?php print_unescaped(OC_Helper::linkToRoute('apps_custom'));?>?appid=<?php p($_['appid']); ?>">
</script>
<script 
	type="text/javascript"
	src="<?php print_unescaped(OC_Helper::linkTo('settings/js', 'apps.js'));?>">
</script>
<div id="app-navigation">
	<?php print_unescaped($this->inc('apps/part.applist')) ?>
</div>
<div id="app-content">
	<?php print_unescaped($this->inc('apps/part.appdetails')); ?>
</div>