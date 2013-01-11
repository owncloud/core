<?php
/**
 * Copyright (c) 2012, Tom Needham <tom@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */
?>
<div id="oauth-request" class="guest-container">
	<p><strong><?php echo $_['consumer']['name']; ?></strong> <?php echo $l->t('is requesting your permission to read, write, modify and delete data from the following apps:');?></p>
	<ul>
		<?php
		// Foreach requested scope
		foreach($_['consumer']['scopes'] as $app){
			echo '<li>'.$app.'</li>';
		}
		?>
	</ul>
	<a href="#" class="button"><?php echo $l->t('Allow');?></a>
	<a href="#" class="button"><?php echo $l->t('Disallow');?></a>
</div>
