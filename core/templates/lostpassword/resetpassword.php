<?php
/**
 * @author Jan-Christoph Borchardt <hey@jancborchardt.net>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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
style('core', 'lostpassword/resetpassword');
script('core', 'lostpassword');
?>

<form action="<?php print_unescaped($_['link']) ?>" id="reset-password" method="post">
		<div class="grouptop<?php if (!empty($_['invalidpassword'])) {
	echo ' shake';
} ?>">
			<label for="password"><?php p($l->t('New password')); ?></label>
			<input type="password" name="password" id="password" value="" autocomplete="off" required autofocus aria-label="<?php p($l->t('New password')); ?>" placeholder="<?php p($l->t('New password')); ?>" />
		</div>

		<div class="groupbottom<?php if (!empty($_['invalidpassword'])) {
	echo ' shake';
} ?>">	
			<label for="password"><?php p($l->t('Confirm Password')); ?></label>
			<input type="password" name="retypepassword" id="retypepassword" value="" aria-label="<?php p($l->t('Confirm password')); ?>" placeholder="<?php p($l->t('Confirm Password')); ?>" />
		</div>
		<div class="submit-wrap">
			<span id="message"></span>
			<button type="submit" id="submit">
				<span><?php p($l->t('Reset password')); ?></span>
				<div class="loading-spinner"><div></div><div></div><div></div><div></div></div>
			</button>
		</div>
</form>
