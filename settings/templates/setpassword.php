<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
style('settings', 'setpassword');
script('settings', 'setpassword');
?>

<form action="<?php print_unescaped($_['link']) ?>" id="set-password" method="post" autocapitalize="none">
	<div class="grouptop<?php if (!empty($_['invalidpassword'])) {
	echo ' shake';
} ?>">
		<label for="password"><?php p($l->t('New password')); ?></label>
		<input type="password" name="password" id="password" value=""
				autocomplete="new-password" autocorrect="off"
				aria-label="<?php p($l->t('New password')); ?>"
				placeholder="<?php p($l->t('New password')); ?>"
				required autofocus />
	</div>
	<div class="groupbottom<?php if (!empty($_['invalidpassword'])) {?> shake<?php } ?>">
		<label for="retypepassword"><?php p($l->t('Confirm Password')); ?></label>
		<input type="password" name="retypepassword" id="retypepassword" value=""
				aria-label="<?php p($l->t('Confirm Password')); ?>"
				placeholder="<?php p($l->t('Confirm Password')); ?>"
				autocomplete="new-password" autocorrect="off"/>
	</div>
	<div class="submit-wrap">
		<span id="message"></span>
		<label id="error-message" class="warning" style="display:none"></label>
		<button type="submit" id="submit">
			<span><?php p($l->t('Set password')); ?></span>
			<div class="loading-spinner"><div></div><div></div><div></div><div></div></div>
		</button>
	</div>
</form>
