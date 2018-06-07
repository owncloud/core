<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
style('files_sharing', 'settings');
script('files_sharing', 'settings');
?>

<div class="section" id="files_sharing">
	<h2 class="app-name"><?php p($l->t('Files Sharing')); ?></h2>
	<p><?php p($l->t('Blacklist the following groups so noone can share with them. Use the format "{backendName}::{groupDisplayName}", one per line.')); ?></p>
	<div class="horizontal-layout">
		<div>
			<p><?php p($l->t('Available backends names are:')); ?></p>
			<ul class="groupBackends">
				<?php foreach($_['backendNames'] as $backendName): ?>
				<li><?php p($backendName); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<textarea placeholder="OC\Group\Database::localGroups&#10OCA\User_LDAP\Group_Proxy::ldapGroup" class="files_sharing_settings" name="blacklisted_group_displaynames"><?php p($_['blacklistedDisplaynames']); ?></textarea>
	</div>
</div>