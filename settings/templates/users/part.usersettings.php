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

<div id="app-settings"
	ng-controller="setQuotaController"
	ng-init="
	showQuotaSettings = false;
	customQuotaInput = false;
	showQuotadropdown = false;
	customValInput = false;"
>
	<div id="app-settings-header">
		<button
			class="settings-button"
			ng-click="showQuotaSettings = !showQuotaSettings;"
			tabindex="0">
		</button>
	</div>
	<div 
		id="app-settings-content"
		ng-show="showQuotaSettings"
	>
		<fieldset class="default-storage">
			<label>
				<?php p($l->t('Default Storage : ')); ?>
			</label>
			<!-- Find a work around to get this value.-->
			<span>
				<?php p($_['default_quota']); ?>
			</span>
			<button ng-click="showQuotadropdown = true;">
				<?php p($l->t('Change'))?>
			</button>
			<select
				ng-show="showQuotadropdown"
				ng-options="quotavalue as quotavalue.show for quotavalue in quotavalues"
				ng-model="quotavalue"
				ng-change="selectdefaultQuota(quotavalue);
						 showQuotadropdown=false;">
				<option value=""><?php p($l->t('Default Value')); ?></option>
			</select>
			<div ng-show="customValInput">
				<input
					ng-model="customVal"
					type="text"
					ng-blur="blurCustomVal" 
					placeholder="<?php p($l->t('Enter Custom Value..')); ?>" 
				/>
				<button ng-click="sendCustomVal()"><?php p($l->t('Custom Quota'))?></button>
			</div>
		</fieldset>
	</div>
</div>