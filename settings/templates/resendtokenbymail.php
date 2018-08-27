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

?>

<form action="<?php print_unescaped($_['link']) ?>" id="resendtoken" method="post">
	<fieldset>
		<p>
			<label><?php p($l->t('The activation link has expired. Click the button below to request a new one and complete the registration.')); ?></label>
		</p>
		<input type="submit" id="submit" value="<?php
			p($l->t('Resend activation link'));
		?>" />
	</fieldset>
</form>
