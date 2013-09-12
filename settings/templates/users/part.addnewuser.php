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

<div ng-controller="addUserController">
	<fieldset>
		<form id="newuser" autocomplete="off" name="createuser_form">
			<input 
				id="newusername"
				type="text"
				name="loginnamefield"
				placeholder="<?php p($l->t('Username')) ?>"
				required ng-model="newuser" 
			/>
			<input
				id="newuserpassword" 
				name="passwordfield"
				type="password"
				placeholder="<?php p($l->t('Password')) ?>"
				ng-model="password"
			/>
			<select
				id="newusergroups"
				class="groupselect multiselect"
				title="<?php p($l->t('Groups'))?>"
				ng-model="selectedgroup"
				ng-options="pergroup.name for pergroup in allgroups.result"
				multiselect-dropdown>
			</select>
			<button
				title="<?php p($l->t('Create'))?>"
				ng-click="saveuser(newuser,password,selectedgroup)" 
				ng-disabled="createuser_form.$invalid">
					<?php p($l->t('Add User'))?>
			</button>
		</form>
	</fieldset>
</div>