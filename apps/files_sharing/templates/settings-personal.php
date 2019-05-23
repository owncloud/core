<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

/** @var array $_ */
/** @var \OCP\IL10N $l */

script('files_sharing', 'settings-personal');
?>

<form class="section" id="files_sharing_settings">
	<h2 class="app-name"><?php p($l->t('Sharing'));?></h2>
	<?php foreach ($_['enabled_configs'] as $key => $value): ?>
		<?php if ($value['enabled'] === 'yes'): ?>
			<input type="checkbox" name="<?php p($key)?>" id="<?php p($key . '_input')?>" class="checkbox" value="1" checked="checked" />
		<?php else: ?>
			<input type="checkbox" name="<?php p($key)?>" id="<?php p($key . '_input')?>" class="checkbox" value="1" />
		<?php endif; ?>
		<label for="<?php p($key . '_input')?>">
			<?php p($l->t($value['label'])); ?>
		</label><br/>
	<?php endforeach;?>
	<h3><?php p($l->t('Configure share folder'));?></h3>
	<label for="share_folder_input"><?php p($l->t('Define a default folder for shared files and folders with you')) ?></label><br>
	<input id="share_folder_input" name="share_folder" type="text" value="<?php p($_['share_folder'])?>">
	<input type="button" id="share_folder_button" class="button" value="<?php p($l->t("Save")); ?>">
	<span id="share_folder_save_message" class="msg"></span>
</form>