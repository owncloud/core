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
use InvalidArgumentException;

class IpHelper
{
	const IPV6_LOOPBACK_ADDRESS = '::1';
	const IPV6_LOOPBACK_ADDRESS_SUBNET = '::0';
	const IPV4_LOOPBACK_ADDRESS_TOP = '127.';
	
	/**
	 * parse the output of ifconfig to find matching items such as IP addresses
	 * @param string $regex that will match the desired text in the ifconfig output
	 * @throws Exception
	 * @return array of elements that match the inner part of the regex
	 */
	private static function parseIfconfigOutput($regex)
	{
		$output = [];
		$return_var = null;
		exec('ifconfig', $output, $return_var);
		if ($return_var) {
			throw new \Exception("parseIfconfigOutput: Error $return_var calling exec ifconfig");
		}
		preg_match_all($regex, implode($output, ' '), $matches);
		return $matches[1];
	}

	/**
	 * @return array of IPv4 addresses found on the local system
	 */
	private static function systemIpv4Addresses()
	{
		// IPv4 addresses are like 192.168.12.34
		return self::parseIfconfigOutput('/inet addr:([\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3})/');
	}

	/**
	 * @return array of IPv6 addresses found on the local system
	 */
	private static function systemIpv6Addresses()
	{
		// IPv6 addresses are like fe80::6e26:388d:7bf:15d1
		return self::parseIfconfigOutput('/inet6 addr: ([0123456789abcdef:]+)/');
	}

	/**
	 * calculate the base address of the subnet with the given CIDR that contains the given IPv4 address
	 * @param string $ipv4Address with format like "192.168.1.1"
	 * @param int $cidr the CIDR "mask" size for the subnet (0 to 32)
	 * @throws InvalidArgumentException
	 * @return string IPv4 subnet base address
	 */
	private static function ipv4AddressSubnet($ipv4Address, $cidr)
	{
		$cidr = (int) $cidr;
		if (($cidr < 0) || ($cidr > 32)) {
			throw new \InvalidArgumentException("ipv4AddressSubnet: CIDR $cidr invalid. CIDR must be from 0 to 32");
		}
		$addressMask = ip2long($ipv4Address);
		$cidrMask = -1 << (32 - $cidr);
		$netMask = $addressMask & $cidrMask;
		return long2ip($netMask);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR that contains the given IPv6 address
	 * @param string $ipv6Address with format like "a:b:c::1"
	 * @param int $cidr the CIDR "mask" size for the subnet (0 to 128)
	 * @throws InvalidArgumentException
	 * @return string IPv6 subnet base address
	 */
	private static function ipv6AddressSubnet($ipv6Address, $cidr)
	{
		$cidr = (int) $cidr;
		if (($cidr < 0) || ($cidr > 128)) {
			throw new \InvalidArgumentException("ipv6AddressSubnet: CIDR $cidr invalid. CIDR must be from 0 to 128");
		}
		// TODO: calculate the bottom address of the subnet based on the CIDR
		$addressMask = ip2long($ipv4Address);
		$cidrMask = -1 << (128 - $cidr);
		$netMask = $addressMask & $cidrMask;
		return long2ip($netMask);
	}

	/**
	 * find the first IPv4 address on the local system that is a loopback address
	 * @throws Exception
	 * @return string IPv4 loopback address
	 */
	private static function loopbackIpv4Address()
	{
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) === 0) {
				return $ipv4Address;
			}
		}

		throw new \Exception("loopbackIpv4Address: No IP address found");
	}

	/**
	 * get the IPv6 loopback address
	 * Note: for IPv6 the loopback address is a well-defined constant value
	 * @return string IPv6 loopback address
	 */
	private static function loopbackIpv6Address()
	{
		return self::IPV6_LOOPBACK_ADDRESS;
	}

	/**
	 * get a loopback address for the given IP address family
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @throws InvalidArgumentException
	 * @return string IP loopback address
	 */
	private static function loopbackIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address();
			case 'ipv6':
				return self::loopbackIpv6Address();
		}
		
		throw new \InvalidArgumentException("loopbackIpAddress: Invalid IP address family");
	}

	/**
	 * calculate the base address of the subnet with the given CIDR that contains the loopback IPv4 address
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @return string IPv4 loopback subnet base address
	 */
	private static function loopbackIpv4AddressSubnet($cidr)
	{
		return self::ipv4AddressSubnet(self::loopbackIpv4Address(), $cidr);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR that contains the loopback IPv6 address
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @return string IPv6 loopback subnet base address
	 */
	private static function loopbackIpv6AddressSubnet($cidr)
	{
		return self::IPV6_LOOPBACK_ADDRESS_SUBNET;
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the loopback address of the given IP address family
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @throws InvalidArgumentException
	 * @return string IP of loopback subnet base address
	 */
	private static function loopbackIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address($cidr);
			case 'ipv6':
				return self::loopbackIpv6Address($cidr);
		}
		
		throw new \InvalidArgumentException("loopbackIpAddressSubnet: Invalid IP address family");
	}

	/**
	 * find the first IPv4 address on the local system that is not a loopback address
	 * i.e. a "real" IPv4 address on some network interface
	 * @throws InvalidArgumentException
	 * @return string IPv4 address
	 */
	private static function localIpv4Address()
	{
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) !== 0) {
				return $ipv4Address;
			}
		}

		throw new \InvalidArgumentException("localIpv4Address: No IP address found");
	}

	/**
	 * find the first IPv6 address on the local system that is not a loopback address
	 * i.e. a "real" IPv6 address on some network interface
	 * @throws InvalidArgumentException
	 * @return string IPv6 address
	 */
	private static function localIpv6Address()
	{
		foreach (self::systemIpv6Addresses() as $ipv6Address) {
			if ($ipv6Address !== self::IPV6_LOOPBACK_ADDRESS) {
				return $ipv6Address;
			}
		}

		throw new \InvalidArgumentException("localIpv6Address: No IP address found");
	}

	/**
	 * get a non-loopback address on the local system for the given IP address family
	 * i.e. a "real" IP address on some network interface
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @throws InvalidArgumentException
	 * @return string IP address
	 */
	private static function localIpAddress($ipAddressFamily)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::localIpv4Address();
			case 'ipv6':
				return self::localIpv6Address();
		}
		
		throw new \InvalidArgumentException("localIpAddress: Invalid IP address family");
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the IPv4 address of the first local IPv4 subnet
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @return string IPv4 local subnet base address
	 */
	private static function localIpv4AddressSubnet($cidr)
	{
		return self::ipv4AddressSubnet(self::localIpv4Address(), $cidr);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the IPv6 address of the first local IPv6 subnet
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @return string IPv6 local subnet base address
	 */
	private static function localIpv6AddressSubnet($cidr)
	{
		return self::ipv6AddressSubnet(self::localIpv6Address(), $cidr);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the first local IP address of the given IP address family
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @throws InvalidArgumentException
	 * @return string IP of local subnet base address
	 */
	private static function localIpAddressSubnet($ipAddressFamily, $cidr)
	{
		switch (strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::localIpv4AddressSubnet($cidr);
			case 'ipv6':
				return self::localIpv6AddressSubnet($cidr);
		}
		
		throw new \InvalidArgumentException("localIpAddressSubnet: Invalid IP address family");
	}

	/**
	 * find an IP address on the local system that is either a loopback address
	 * or a real local IP address of the given IP address family.
	 * @param $localOrLoopback which type of address to return - "local" or "loopback"
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @throws InvalidArgumentException
	 * @return string IP address
	 */
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
				throw new \InvalidArgumentException("ipAddress: Invalid local or loopback passed");
				break;
		}
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the local or loopback IP address of the given IP address family
	 * @param $localOrLoopback which type of address to return - "local" or "loopback"
	 * @param string IP address family IPv4 or IPv6 (not case sensitive)
	 * @param int $cidr the CIDR "mask" size for the subnet
	 * @throws InvalidArgumentException
	 * @return string IP of base address
	 */
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
				throw new \InvalidArgumentException("ipAddressSubnet: Invalid local or loopback passed");
				break;
		}
	}
}