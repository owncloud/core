<?php declare(strict_types=1);
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

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use TestHelpers\IpHelper;

/**
 * Ip trait
 */
class IpContext implements Context {
	private FeatureContext $featureContext;

	/**
	 * The local source IP address from which to initiate API actions.
	 * Defaults to system-selected address matching IP address family and scope.
	 */
	private ?string $sourceIpAddress = null;

	/**
	 * The base URL parameter to use with the source IP address.
	 * Accesses the server on IPv4 or IPv6 matching the source IP.
	 */
	private ?string $baseUrlForSourceIp = null;

	private string $ipv4Url;
	private string $ipv6Url;

	private array $guzzleClientHeaders = [];

	/**
	 * @return string|null
	 */
	public function getSourceIpAddress():?string {
		return $this->sourceIpAddress;
	}

	/**
	 * returns the base URL that matches the currently selected source IP
	 * address (which might be an IPv4 or IPv6 address)
	 *
	 * @return string
	 */
	public function getBaseUrlForSourceIp():string {
		// Lazy init so we know that featureContext has been set up
		// by the time we need it here.
		if ($this->baseUrlForSourceIp === null) {
			$this->baseUrlForSourceIp = $this->featureContext->getBaseUrl();
		}
		return $this->baseUrlForSourceIp;
	}

	/**
	 * @return array
	 */
	public function getGuzzleClientHeaders():array {
		return $this->guzzleClientHeaders;
	}

	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function setGuzzleClientHeaders(array $guzzleClientHeaders):void {
		$this->guzzleClientHeaders = $guzzleClientHeaders;
	}

	/**
	 * @param array $guzzleClientHeaders ['X-Foo' => 'Bar']
	 *
	 * @return void
	 */
	public function addGuzzleClientHeaders(array $guzzleClientHeaders):void {
		$this->guzzleClientHeaders = \array_merge(
			$this->guzzleClientHeaders,
			$guzzleClientHeaders
		);
	}

	/**
	 * @When the client accesses the server from a :networkScope :ipAddressFamily address
	 *
	 * @param string $networkScope (loopback|routable)
	 * @param string $ipAddressFamily (ipv4|ipv6)
	 *
	 * @return void
	 */
	public function theClientAccessesTheServerFromAddress(
		string $networkScope,
		string $ipAddressFamily
	):void {
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
	public function theClientAccessesTheServerFromIpAddress(string $sourceIpAddress):void {
		$this->sourceIpAddress = $sourceIpAddress;

		if (\filter_var($sourceIpAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			$this->baseUrlForSourceIp = $this->ipv4Url;
		} elseif (\filter_var($sourceIpAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
			$this->baseUrlForSourceIp = $this->ipv6Url;
		} else {
			$this->baseUrlForSourceIp = $this->featureContext->getBaseUrl();
		}

		$this->featureContext->setSourceIpAddress($sourceIpAddress);
	}

	/**
	 * @When the client accesses the server from IP address :sourceIpAddress using X-Forwarded-For header
	 *
	 * @param string $sourceIpAddress an IPv4 or IPv6 address
	 *
	 * @return void
	 */
	public function theClientAccessesTheServerFromIpAddressUsingXForwardedForHeader(
		string $sourceIpAddress
	):void {
		$this->addGuzzleClientHeaders(["X-Forwarded-For" => $sourceIpAddress]);
		$this->featureContext->addGuzzleClientHeaders(["X-Forwarded-For" => $sourceIpAddress]);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenarioGetIpUrls(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');

		$this->ipv4Url = \getenv('IPV4_URL');
		$this->ipv6Url = \getenv('IPV6_URL');
	}
}
