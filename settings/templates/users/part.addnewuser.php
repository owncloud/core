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

<div>
	<fieldset>
		<form id="newuser" autocomplete="off" name="createuser_form">
			<input class="" id="newusername" type="text" name="loginnamefield" placeholder="<?php p($l->t('Login Name')) ?>" ng-minlength="3" ng-required/>
			<span class="error" id="nologinname" ng-show="createuser_form.loginnamefield.$error.required">Enter Login Name</span>
			<span class="error" id="nologinname" ng-show="createuser_form.loginnamefield.$error.minlength">Minimum 3 characters</span>
			<input id="newuserpassword" name="passwordfield" type="password" placeholder="<?php p($l->t('Password')) ?>" ng-required/>
			<span class="error" id="nologinname" ng-show="createuser_form.loginnamefield.$error.required">Enter Password</span>
			<select class="groupselect" id="newusergroups" title="<?php p($l->t('Groups'))?>">
				<option>
					<!--Retreive the list of groups, quota and other stuff.-->
				</option>
			</select>
			<input type="submit" ng-click="saveuser()" value="<?php p($l->t('Create'))?>" />
		</form>
	</fieldset>
</div>