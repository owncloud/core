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
	<?php if (isset($_['userAutoAcceptShareEnabled'])): ?>
		<?php if ($_['userAutoAcceptShareEnabled'] === 'yes'): ?>
			<input type="checkbox" name="auto_accept_share" id="userAutoAcceptShareInput" class="checkbox" value="1" checked="checked" />
		<?php else: ?>
			<input type="checkbox" name="auto_accept_share" id="userAutoAcceptShareInput" class="checkbox" value="1" />
		<?php endif; ?>
		<label for="userAutoAcceptShareInput">
			<?php p($l->t('Automatically accept new incoming local user shares')); ?>
		</label><br/>
	<?php endif; ?>
</form>