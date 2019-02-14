<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OCA\DAV\Connector\Sabre\ValidateRequestPlugin;
use Test\TestCase;

/**
 * Class ValidateRequestPluginTest
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 */
class ValidateRequestPluginTest extends TestCase {
	/** @var \Sabre\DAV\Server */
	private $server;

	/** @var ValidateRequestPlugin */
	private $plugin;

	public function setUp(): void {
		parent::setUp();

		$this->server = new \Sabre\DAV\Server();
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\ServiceUnavailable
	 * @expectedExceptionMessage Specified  header (HTTP_OC_CHUNKED/OC-Chunked header) is allowed only in webdav endpoint
	 */
	public function testOldChunkingInNewEndpoint1() {
		$headers['HTTP_OC_CHUNKED'] = 1;

		$this->plugin = new ValidateRequestPlugin('dav');
		$this->server->httpRequest = new \Sabre\HTTP\Request('PUT', 'http://server/root_url/remote.php/dav/files/user/testnew.txt', $headers);
		$this->plugin->initialize($this->server);

		$this->plugin->checkValidityPut();
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\ServiceUnavailable
	 * @expectedExceptionMessage Specified  header (HTTP_OC_CHUNKED/OC-Chunked header) is allowed only in webdav endpoint
	 */
	public function testOldChunkingInNewEndpoint2() {
		$headers['OC-Chunked'] = 1;

		$this->plugin = new ValidateRequestPlugin('dav');
		$this->server->httpRequest = new \Sabre\HTTP\Request('PUT', 'http://server/root_url/remote.php/dav/files/user/testnew.txt', $headers);
		$this->plugin->initialize($this->server);

		$this->plugin->checkValidityPut();
	}
}
