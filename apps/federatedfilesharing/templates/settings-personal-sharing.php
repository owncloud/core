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
script('federatedfilesharing', 'settings-personal-sharing');
?>

<form class="section" id="federatedfilesharing_settings">
	<h2 class="app-name"><?php p($l->t('Federated Cloud Sharing'));?></h2>
	<input type="checkbox" name="auto_accept_share_trusted" id="userAutoAcceptShareTrustedInput" class="checkbox"
			   value="1" <?php if ($_['userAutoAcceptShareTrustedEnabled'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
	<label for="userAutoAcceptShareTrustedInput">
		<?php p($l->t('Automatically accept remote shares from trusted servers'));?>
	</label><br/>
</form>