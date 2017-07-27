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
	private static function parseIfconfigOutput($regex)
	{
		$output = [];
		$return_var = null;
		exec('ifconfig', $output, $return_var);
		if ($return_var) {
			throw new Exception("parseIfconfigOutput: Error {$return_var} calling exec ifconfig");
		}
		preg_match_all($regex, implode($output, ' '), $matches);
		return $matches[1];
	}

	private static function systemIpv4Addresses()
	{
		// IPv4 addresses are like 192.168.12.34
		return self::parseIfconfigOutput('/inet addr:([\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3})/');
	}

	private static function systemIpv6Addresses()
	{
		// IPv6 addresses are like fe80::6e26:388d:7bf:15d1
		return self::parseIfconfigOutput('/inet6 addr: ([0123456789abcdef:]+)/');
	}

	private static function ipv4AddressSubnet($ipv4Address, $cidr)
	{
		$addressMask = ip2long($ipv4Address);
		$cidrMask = -1 << (32 - $cidr);
		$netMask = $addressMask & $cidrMask;
		return long2ip($netMask);
	}

	private static function loopbackIpv4Address()
	{
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) === 0) {
				return $ipv4Address;
			}
		}

		throw new Exception("loopbackIpv4Address: No IP address found");
	}

	private static function loopbackIpv6Address()
	{
		return self::IPV6_LOOPBACK_ADDRESS;
	}

	private static function loopbackIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address();
			case 'ipv6':
				return self::loopbackIpv6Address();
		}
		
		throw new Exception("loopbackIpAddress: Invalid IP address family");
	}

	private static function loopbackIpv4AddressSubnet($cidr)
	{
		return self::ipv4AddressSubnet(self::loopbackIpv4Address(), $cidr);
	}

	private static function loopbackIpv6AddressSubnet($cidr)
	{
		return self::IPV6_LOOPBACK_ADDRESS_SUBNET;
	}

	private static function loopbackIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address($cidr);
			case 'ipv6':
				return self::loopbackIpv6Address($cidr);
		}
		
		throw new Exception("loopbackIpAddressSubnet: Invalid IP address family");
	}

	private static function localIpv4Address()
	{
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) !== 0) {
				return $ipv4Address;
			}
		}

		throw new Exception("localIpv4Address: No IP address found");
	}

	private static function localIpv6Address()
	{
		foreach (self::systemIpv6Addresses() as $ipv6Address) {
			if ($ipv6Address !== self::IPV6_LOOPBACK_ADDRESS) {
				return $ipv6Address;
			}
		}

		throw new Exception("localIpv6Address: No IP address found");
	}

	private static function localIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::localIpv4Address();
			case 'ipv6':
				return self::localIpv6Address();
		}
		
		throw new Exception("localIpAddress: Invalid IP address family");
	}

	private static function localIpv4AddressSubnet($cidr)
	{
		return self::ipv4AddressSubnet(self::localIpv4Address(), $cidr);
	}

	private static function localIpv6AddressSubnet($cidr)
	{
		// TODO: calculate the bottom address of the subnet based on the CIDR
		return self::localIpv6Address();
	}

	private static function localIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::localIpv4AddressSubnet($cidr);
			case 'ipv6':
				return self::localIpv6AddressSubnet($cidr);
		}
		
		throw new Exception("localIpAddressSubnet: Invalid IP address family");
	}

	public static function ipAddress($localOrLoopback, $ipAddressFamily)
	{
		switch (strtolower($localOrLoopback)) {
			case 'local':
				return self::localIpAddress($ipAddressFamily);
				break;
			case 'loopback':
				return self::loopbackIpAddress($ipAddressFamily);
				break;
			default:
				throw new Exception("ipAddress: Invalid local or loopback passed");
				break;
		}
	}

	public static function ipAddressSubnet($localOrLoopback, $ipAddressFamily, $cidr)
	{
		switch (strtolower($localOrLoopback)) {
			case 'local':
				return self::localIpAddressSubnet($ipAddressFamily, $cidr);
				break;
			case 'loopback':
				return self::loopbackIpAddressSubnet($ipAddressFamily, $cidr);
				break;
			default:
				throw new Exception("ipAddressSubnet: Invalid local or loopback passed");
				break;
		}
	}
}