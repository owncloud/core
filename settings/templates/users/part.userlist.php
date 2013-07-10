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

<table id="userlist" ng-controller="userlist">
	<thead>
		<tr>
			<th class="table-head thumbnail"></th>
			<th class="table-head login-name"><?php p($l->t('Login Name')); ?></th>
			<th class="table-head display-name"><?php p($l->t('Display Name')); ?></th>
			<th class="table-head user-pass"><?php p($l->t('Password')); ?></th>
			<th class="table-head groups"><?php p($l->t('Groups')); ?></th>
			<th class="table-head local-storage"><?php p($l->t('Local Storage')); ?></th>
			<th class="table-head delete-user"></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="user in users">
			<td class="thumbnail"><img src="http://placehold.it/30X30" /></td> <!--Temporary till we have gravatars up!-->
			<td class="login-name">{{ user.name }}</td>
			<td class="display-name">{{ user.displayname }}</td>
			<td class="user-pass"></td>
			<td class="groups"> {{user.groups}}</td>
			<td class="local-storage">{{ user.quota }}</td>
			<th class="delete-column">
				<button class="svg action delete-icon delete-button delete-user-icon" ng-click="deleteuser(user.name)"></button>
			</td>
		</tr>
	</tbody>
</table>