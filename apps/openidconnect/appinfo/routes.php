<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

// @codeCoverageIgnoreStart
return [
	'routes' => [
		// openid config endpoint
		['name' => 'loginFlow#config', 'url' => '/config', 'verb' => 'GET'],
		// auth flow
		['name' => 'loginFlow#login', 'url' => '/login', 'verb' => 'GET'],
		['name' => 'loginFlow#login', 'url' => '/redirect', 'verb' => 'GET'],
		// front channel logout url
		['name' => 'loginFlow#logout', 'url' => '/logout', 'verb' => 'GET'],
	]
];
