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

<div id="user-settings" ng-app="usersmanagement">
	
	<div id="app-navigation">
		<?php print_unescaped($this->inc('users/part.addnewgroup')); ?>
		<?php print_unescaped($this->inc('users/part.leftgrouplist')); ?>
	</div>
	<div id="user-content">
		<div id="hascontrols">
			<?php print_unescaped($this->inc('users/part.addnewuser')); ?>
		</div>
		<div id="user-table">
			<?php print_unescaped($this->inc('users/part.userlist')); ?>
		</div>
	</div>
</div>