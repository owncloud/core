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

<ul ng-controller="prioritygroupController" id="priority-list">
	<li
		class="user-groups"
		ng-click="getEveryone()"
		ng-class="{
			active: routeParams.groupId == '/'
		}"
	>
		<a href="#/group/">
			<?php p($l->t('Everyone')); ?>
		</a>
	</li>
	<li class="user-groups"
		ng-class="{
			active: routeParams.groupId == '/admin'
		}"
	>
		<a href="#/group/admin">
			<?php p($l->t('Admins')); ?>
		</a>
	</li>
	<li class="user-groups"
		ng-click="getSubadmins()"
		ng-class="{
			active: routeParams.groupId == '/admin'
		}"
	>
		<a href="#/group/subadmins">
			<?php p($l->t('Subadmins')); ?>
		</a>
	</li>
</ul>