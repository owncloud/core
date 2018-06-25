<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\Unit\JobStatus;

use OCA\DAV\JobStatus\EventStreamPlugin;
use OCA\DAV\JobStatus\JobStatus;
use OCA\DAV\Tree;
use Sabre\DAV\Exception\NotImplemented;
use Sabre\DAV\Server;
use Sabre\HTTP\Request;
use Sabre\HTTP\Response;
use Test\TestCase;

interface TestSapi {
	public function sendResponse(Response $response);
}

/**
 * Class EventStreamPluginTest
 *
 * @package OCA\DAV\Tests\Unit\JobStatus
 */
class EventStreamPluginTest extends TestCase {

	/**
	 * @expectedException \Sabre\DAV\Exception\NotImplemented
	 */
	public function testSSE() {
		// mock dav server
		$server = $this->createMock(Server::class);
		$tree = $this->createMock(Tree::class);
		$sapi = $this->createMock(TestSapi::class);
		$server->tree = $tree;
		$server->sapi = $sapi;

		// init plugin
		$plugin = new EventStreamPlugin();
		$plugin->initialize($server);

		// perform http get
		$request = $this->createMock(Request::class);
		$response = $this->createMock(Response::class);

		$request->method('getQueryParameters')->willReturn(['sse' => 1]);
		$jobStatus = $this->createMock(JobStatus::class);
		$jobStatus->method('refreshStatus')->willThrowException(new NotImplemented());
		$tree->method('getNodeForPath')->willReturn($jobStatus);

		//expectations
		$response->expects($this->exactly(4))->method('setHeader')->withConsecutive(
			['Content-Type', 'text/event-stream'],
			['Connection', 'keep-alive'],
			['Cache-Control', 'no-cache'],
			['X-Accel-Buffering', 'no']);
		$response->expects($this->once())->method('setStatus')->with(200);
		$sapi->expects($this->once())->method('sendResponse')->with($response);

		$plugin->httpGet($request, $response);
	}
}
