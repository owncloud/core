<?php
/**
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Ilja Neumann <ineumann@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Vincent Petry <pvince81@owncloud.com>
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
// We only can count up. The 4. digit is only for the internal patch-level to trigger DB upgrades
// between betas, final and RCs. This is _not_ the public version number. Reset minor/patch-level
// when updating major/minor version number.
$OC_Version = [10, 15, 3, 0];

// The human-readable string
$OC_VersionString = '10.15.3';

$OC_VersionCanBeUpgradedFrom = [[8, 2, 11],[9, 0, 9],[9, 1]];

// The ownCloud channel
$OC_Channel = 'git';

// The build number
$OC_Build = '';

// Vendor of this package
$vendor = 'owncloud';
