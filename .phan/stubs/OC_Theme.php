<?php

/**
 * @author Patrick Jahns <github@patrickjahns.de>
 *
 * @copyright Copyright (c) 2018, Patrick Jahns.
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 */

class OC_Theme {
	public function getBaseUrl() {}

	public function getSyncClientUrl() {}

	public function getDocBaseUrl() {}

	public function getTitle() {}

	public function getName() {}

	public function getHTMLName() {}

	public function getEntity() {}

	public function getSlogan() {}

	public function getLogoClaim() {}

	public function getShortFooter() {}

	public function getLongFooter() {}

	public function buildDocLinkToKey($key) {}

	public function getMailHeaderColor() {}

	public function getiOSClientUrl() {}

	public function getiTunesAppId() {}

	public function getAndroidClientUrl() {}
}
