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
			<input class="" id="newusername" type="text" name="loginnamefield" placeholder="<?php p($l->t('Username')) ?>" ng-minlength="3" required ng-model="newuser"/>
			<span class="error" id="nologinname" ng-show="createuser_form.loginnamefield.$error.minlength">Minimum 3 characters</span>
			<input id="newuserpassword" name="passwordfield" type="password" placeholder="<?php p($l->t('Password')) ?>" ng-model="password" required/>
			<select
				chosen multiple id="newusergroups"
				class="groupselect" title="<?php p($l->t('Groups'))?>"
				allow-single-deselect="true"
				data-placeholder="Select Group.."
				no-result-text="No Such Group.."
				ng-model="selectedgroup"
				ng-options="pergroup.name for pergroup in allgroups.result">
				<option value=""></option>
			</select>
			<button title="<?php p($l->t('Create'))?>" ng-click="saveuser()" ng-disabled="createuser_form.$invalid"><?php p($l->t('Add User'))?></button>
		</form>
	</fieldset>
</div>