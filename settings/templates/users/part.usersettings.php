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
	customQuotaInput = false;"
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
			<label><?php p($l->t('Default Storage')); ?></label>
			<select>
				<option><?php p($l->t('Unlimited')); ?></option>
				<option><?php p($l->t('5 GB')); ?></option>
				<option><?php p($l->t('10 GB')); ?></option>
				<option><?php p($l->t('15 GB')); ?></option>
				<option ng-click="customQuotaInput = true; "><?php p($l->t('Custom')); ?></option>
			</select>
			<label><?php p($l->t('Custom')); ?></label>
			<input
				type="text"
				ng-model="customQuota"
				ng-blur="
					defaultQuota(customQuota);
					customQuotaInput = false;"
			/>
			<span><?php p($l->t('GB')); ?></span>
		</fieldset>
	</div>
</div>