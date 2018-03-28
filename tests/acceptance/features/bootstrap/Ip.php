<?php
/**
 * ownCloud
 *
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2017 Phillip Davis phil@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use TestHelpers\IpHelper;

/**
 * Ip trait
 */
trait Ip {

	/**
	 * The local source IP address from which to initiate API actions.
	 * Defaults to system-selected address matching IP address family and scope.
	 *
	 * @var string
	 */
	private $sourceIpAddress = null;

	/**
	 * The base URL parameter to use with the source IP address.
	 * Accesses the server on IPv4 or IPv6 matching the source IP.
	 *
	 * @var string
	 */
	private $baseUrlForSourceIp = null;

	private $ipv4Url;
	private $ipv6Url;
	private $baseUrl;

	/**
	 * @When the client accesses the server from a :networkScope :ipAddressFamily address
	 *
	 * @param string $networkScope (loopback|routable)
	 * @param string $ipAddressFamily (ipv4|ipv6)
	 *
	 * @return void
	 */
	public function theClientAccessesTheServerFromAddress(
		$networkScope, $ipAddressFamily
	) {
		$this->theClientAccessesTheServerFromIpAddress(
			IpHelper::ipAddress($networkScope, $ipAddressFamily)
		);
	}

	/**
	 * @When the client accesses the server from IP address :sourceIpAddress
	 *
	 * @param string $sourceIpAddress an IPv4 or IPv6 address
	 *
	 * @return void
	 */
	public function theClientAccessesTheServerFromIpAddress($sourceIpAddress) {
		$this->sourceIpAddress = $sourceIpAddress;

		if (filter_var($sourceIpAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			$this->baseUrlForSourceIp = $this->ipv4Url;
		} else if (filter_var($sourceIpAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
			$this->baseUrlForSourceIp = $this->ipv6Url;
		} else {
			$this->baseUrlForSourceIp = $this->baseUrl;
		}
	}

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function setUpScenarioGetIpUrls() {
		$this->ipv4Url = getenv('IPV4_URL');
		$this->ipv6Url = getenv('IPV6_URL');
		$this->baseUrl = $this->featureContext->baseUrlWithoutSlash();
		$this->baseUrlForSourceIp = $this->baseUrl;
	}
}
