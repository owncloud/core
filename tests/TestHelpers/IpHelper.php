<?php
/**
 * ownCloud
 *
 * @author Phillip Davis
 * @copyright 2017 Phillip Davis phil@jankaritech.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace TestHelpers;

use Exception;
use GuzzleHttp\Client as GClient;
use InvalidArgumentException;
use Sabre\DAV\Client as SClient;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Stream;

class IpHelper
{
	const IPV6_LOOPBACK_ADDRESS = '::1';
	const IPV6_LOOPBACK_ADDRESS_SUBNET = '::0';
	const IPV4_LOOPBACK_ADDRESS_TOP = '127.';
	
	/**
	 * parse the output of ifconfig to find matching items such as IP addresses
	 * @param string $regex that will match the desired text in the ifconfig output
	 * @return array of elements that match the inner part of the regex
	 */
	private function parseIfconfigOutput($regex)
	{
		$interfaceConfig = shell_exec('ifconfig');
		preg_match_all($regex, $interfaceConfig, $matches);
		return $matches[1];
	}

	private function systemIpv4Addresses()
	{
		// IPv4 addresses are like 192.168.12.34
		return $this->parseIfconfigOutput('/inet addr:([\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3})/');
	}

	private function systemIpv6Addresses()
	{
		// IPv6 addresses are like fe80::6e26:388d:7bf:15d1
		return $this->parseIfconfigOutput('/inet6 addr: ([0123456789abcdef:]+)/');
	}

	private function ipv4AddressSubnet($ipv4Address, $cidr)
	{
		$addressMask = ip2long($ipv4Address);
		$cidrMask = -1 << (32 - $cidr);
		$netMask = $addressMask & $cidrMask;
		return long2ip($netMask);
	}

	private function loopbackIpv4Address()
	{
		foreach ($this->systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) === 0) {
				return $ipv4Address;
			}
		}

		throw new Exception("No IPv4 loopback address found");
	}

	private function loopbackIpv6Address()
	{
		return self::IPV6_LOOPBACK_ADDRESS;
	}

	private function loopbackIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return $this->loopbackIpv4Address();
			case 'ipv6':
				return $this->loopbackIpv6Address();
		}
		
		throw new Exception("loopbackIpAddress: Invalid IP address family");
	}

	private function loopbackIpv4AddressSubnet($cidr)
	{
		return $this->ipv4AddressSubnet($this->loopbackIpv4Address(), $cidr);
	}

	private function loopbackIpv6AddressSubnet($cidr)
	{
		return self::IPV6_LOOPBACK_ADDRESS_SUBNET;
	}

	private function loopbackIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return $this->loopbackIpv4Address($cidr);
			case 'ipv6':
				return $this->loopbackIpv6Address($cidr);
		}
		
		throw new Exception("loopbackIpAddressSubnet: Invalid IP address family");
	}

	private function localIpv4Address()
	{
		foreach ($this->systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) !== 0) {
				return $ipv4Address;
			}
		}

		throw new Exception("No local IPv4 address found");
	}

	private function localIpv6Address()
	{
		foreach ($this->systemIpv6Addresses() as $ipv6Address) {
			if ($ipv6Address !== self::IPV6_LOOPBACK_ADDRESS) {
				return $ipv6Address;
			}
		}

		throw new Exception("No local IPv6 address found");
	}

	private function localIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return $this->localIpv4Address();
			case 'ipv6':
				return $this->localIpv6Address();
		}
		
		throw new Exception("localIpAddress: Invalid IP address family");
	}

	private function localIpv4AddressSubnet($cidr)
	{
		return $this->ipv4AddressSubnet($this->localIpv4Address(), $cidr);
	}

	private function localIpv6AddressSubnet($cidr)
	{
		// TODO: calculate the bottom address of the subnet based on the CIDR
		return $this->localIpv6Address();
	}

	private function localIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return $this->localIpv4AddressSubnet($cidr);
			case 'ipv6':
				return $this->localIpv6AddressSubnet($cidr);
		}
		
		throw new Exception("localIpAddressSubnet: Invalid IP address family");
	}

	public function ipAddress($localOrLoopback, $ipAddressFamily)
	{
		switch (strtolower($localOrLoopback)) {
			case 'local':
				return $this->localIpAddress($ipAddressFamily);
				break;
			case 'loopback':
				return $this->loopbackIpAddress($ipAddressFamily);
				break;
			default:
				throw new Exception("ipAddress: Invalid local or loopback passed");
				break;
		}
	}

	public function ipAddressSubnet($localOrLoopback, $ipAddressFamily, $cidr)
	{
		switch (strtolower($localOrLoopback)) {
			case 'local':
				return $this->localIpAddressSubnet($ipAddressFamily, $cidr);
				break;
			case 'loopback':
				return $this->loopbackIpAddressSubnet($ipAddressFamily, $cidr);
				break;
			default:
				throw new Exception("ipAddressSubnet: Invalid local or loopback passed");
				break;
		}
	}
}
