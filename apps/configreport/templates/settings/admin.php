<?php
/**
 * @author Felix Boehm <felix@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

/** @var $l OC_L10N */
/** @var $_ array */
?>
<form action="" method="POST" class="section">
	<h2><?php p($l->t('Generate Config Report'));?></h2>
	<button id="download_config_report"><?php p($l->t('Download ownCloud config report'));?>
		<img class="hidden" src="<?php print_unescaped(\OC::$server->getURLGenerator()->imagePath('core', 'loading.gif')); ?>" style="width:16px;height:16px"></button>
	<input type="hidden" name="sendreport" value="ok">
	<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" id="requesttoken">
</form>
