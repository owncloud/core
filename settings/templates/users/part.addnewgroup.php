<?php

/**
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
?>

<div ng-controller="creategroup">
	<fieldset>
		<form name="creategroup_form">
			<input type="text" placeholder="<?php p($l->t('Add Group'))?>" ng-model="newgroup" />
			<span class="error" id="nogroup" ng-show="" required>Group Name is required.</span>
			<button title="<?php p($l->t('Add')) ?>" ng-click="savegroup()" ng-disabled="disabledcreategroup()"><?php p($l->t('Add')); ?></button>
		</form>
	</fieldset>
</div>