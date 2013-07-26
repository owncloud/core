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

<table id="userlist" ng-controller="userlistController">
	<thead>
		<tr>
			<!--Do something with the static hmtl here in the view.-->
			<th class="table-head thumbnail"></th>
			<th class="table-head login-name">Login Name</th>
			<th class="table-head display-name">Display Name</th>
			<th class="table-head user-pass">Password</th>
			<th class="table-head groups">Groups</th>
			<th class="table-head local-storage">Local Storage</th>
			<th class="table-head user-actions"></th>
		</tr>
	</thead>
	<tbody>
		<loading></loading>
		<!-- The Filter Goes here with the ngRepeat.-->
		<tr ng-repeat="user in users"
			ng-init="viewname = true; editname = false;
				 viewdisplayname = true; editdisplayname = false;
				 viewpassword = true; editpassword = false;
				 viewgroup = true; editgroup = false;
				 viewls = true; editls = false;
				 ">
			<td class="thumbnail">
				<img src="http://placehold.it/30X30" />
			</td> <!--Temporary till we have gravatars up!-->
			<td class="login-name">
				<span ng-show="viewname" ng-click="viewname = !viewname; editname = !editname;">{{ user.name }}</span>
				<input ng-show="editname" value="{{user.name}}" ng-focus="editname" ng-blur="editname = !editname; viewname = !viewname" />
			</td>
			<td class="display-name">
				<span ng-show="viewdisplayname" ng-click="viewdisplayname = !viewdisplayname; editdisplayname = !editdisplayname;">{{ user.displayname }}</span>
				<input type="text" ng-show="editdisplayname" value="{{ user.displayname }}" ng-focus="editdisplayname" ng-blur="editdisplayname = !editdisplayname; viewdisplayname = !viewdisplayname" />
			</td>
			<td class="user-pass">
				<span ng-show="viewpassword" ng-click="viewpassword = !viewpassword; editpassword = !editpassword">●●●●●●●</span>
				<input type="password" ng-show="editpassword" placeholder="●●●●●●●" ng-focus="editpassword" ng-blur="editpassword = !editpassword; viewpassword = !viewpassword" />
			</td>
			<td class="groups">
				<span ng-show="viewgroup" ng-click="viewgroup = !viewgroup; editgroup = !toggleditgroup">{{user.groups}}</span>
			    <select chosen multiple ng-show="editgroup" allow-single-deselect="true" no-results-text="'No Such Group..'" class="chzn-done" ng-focus="editgroup" ng-blur="editgroup = !editgroup; viewgroup = !viewgroup" style="height:30px;"><!--Temporary, till everything is fixed on chosen is-->
			      <option value="{{user.groups}}">{{user.groups}}</option>
			    </select>
			</td>
			<td class="local-storage">
				<span ng-show="viewls" ng-click="viewls = !viewls; editls = !editls">{{ user.quota }}</span>
				<select ng-show="editls" ng-focus="editls" ng-blur="editls = !editls; viewls = !viewls">
					<option>Default</option>
					<option>1 GB</option>
					<option>5 GB</option>
					<option>10 GB</option>
					<option>Unlimited..</option>
					<option>Other..</option>
				</select>
			</td>
			<td class="delete-column">
				<button class="svg action delete-icon delete-button delete-user-icon" ng-click="deleteuser(user.name)"></button>
			</td>
		</tr>
	</tbody>
</table>