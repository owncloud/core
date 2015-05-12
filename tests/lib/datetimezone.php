<?php
/**
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Test;

class DateTimeZone extends TestCase {
	protected $config;
	protected $session;
	protected $savedTimezone;

	protected function setUp() {
		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->getMock();
		$this->session = $this->getMockBuilder('\OCP\ISession')
			->getMock();
		$this->savedTimezone = \OC::$server->getServerDateTimeZone();
		\OC::$server->registerParameter('ServerDateTimeZone', new \DateTimeZone('UTC'));
	}

	protected function tearDown() {
		\OC::$server->registerParameter('ServerDateTimeZone', $this->savedTimezone);
	}

	public function userTimeZoneProvider() {
		return [
			[null, 'UTC'],
			['Europe/Berlin', 'Europe/Berlin'],
			['Mars/OlympusMons', 'UTC']
		];
	}

	/**
	 * @dataProvider userTimeZoneProvider
	 */
	public function testUserTimeZone($timezone, $expectedTimezone) {
		$this->session->expects($this->once())
			->method('get')
			->with('user_id')
			->willReturn('foobar');
		$this->session->method('exists')
			->with('timezone')
			->willReturn(false);
		$this->config->expects($this->once())
			->method('getUserValue')
			->with('foobar', 'core', 'timezone', null)
			->willReturn($timezone);

		$dateTimeZone = new \OC\DateTimeZone($this->config, $this->session);

		$this->assertEquals($expectedTimezone, $dateTimeZone->getTimeZone()->getName());
	}
}
