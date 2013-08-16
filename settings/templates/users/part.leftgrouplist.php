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
<ul ng-controller="grouplistController" id="group-list">
	<loading></loading>
	<li class="user-groups"
	ng-repeat="group in groups | orderBy:['isAdmin','name']"
	ng-class="{ 
		active: selectListGroup(group.id), 
		admin: !groupname.isAdmin
	}"
	ng-click="selectGroup(group.id)">
		<a ng-href="#/group/{{ group.id }}">{{ group.name }}</a>
		<span class="utils">
			<span class="usercount">{{ group.useringroup.length }}</span>
			<button class="svg action delete-icon delete-button" ng-click="deletegroup(group)" original-title="Delete Group" title="Delete Group"></button>
		</span>
	</li>
</ul>
