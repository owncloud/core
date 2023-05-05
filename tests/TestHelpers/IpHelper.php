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
namespace TestHelpers;

use Exception;
use InvalidArgumentException;

/**
 * Helper to get run-time IP addresses and make IP calculations
 *
 * @author Phillip Davis <phil@jankaritech.com>
 *
 */
class IpHelper {
	public const IPV6_LOOPBACK_ADDRESS = '::1';
	public const IPV4_LOOPBACK_ADDRESS_TOP = '127.';
	public const IPV6_LINK_LOCAL_ADDRESS_TOP = 'fe80';
	// The docker bridged device does not work as a routable IP address
	public const UNUSABLE_NETWORK_DEVICES_REGEX = 'docker\d';

	/**
	 * parse the output of ifconfig to find matching items such as IP addresses
	 *
	 * @param string|null $regex matching the desired text in the ifconfig output
	 * @param string|null $except regex that matches devices not to be included
	 *
	 * @return array of elements that match the inner part of the regex
	 * @throws Exception
	 */
	private static function parseIfconfigOutput(?string $regex, ?string $except = null):array {
		if ($except !== null) {
			// device names are at the start of a line
			$invalid_device_regex = '/^\d+:\s' . $except . '/';
		}

		$output_lines = [];
		$return_var = null;
		\exec('ip a show', $output_lines, $return_var);
		if ($return_var) {
			throw new \Exception(
				"parseIfconfigOutput: Error $return_var calling exec ifconfig"
			);
		}

		$valid_network_device = true;
		$all_matches = [];
		foreach ($output_lines as $output_line) {
			if (isset($invalid_device_regex)
				&& \preg_match('/^\w+/', $output_line)
			) {
				// line starts with a string like docker0 eth0 lo
				// this is the start of a set of network device data
				if (\preg_match($invalid_device_regex, $output_line)) {
					$valid_network_device = false;
				} else {
					$valid_network_device = true;
				}
			}

			if ($valid_network_device) {
				if (\preg_match_all($regex, $output_line, $matches)) {
					$all_matches = \array_merge($all_matches, $matches[1]);
				}
			}
		}
		return $all_matches;
	}

	/**
	 * @return array of IPv4 addresses found on the local system
	 * @throws Exception
	 */
	private static function systemIpv4Addresses():array {
		// IPv4 addresses are like 192.168.12.34
		return self::parseIfconfigOutput(
			'/inet\s*(?:addr)?:?\s*([\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3})/',
			self::UNUSABLE_NETWORK_DEVICES_REGEX
		);
	}

	/**
	 * @return array of IPv6 addresses found on the local system
	 * @throws Exception
	 */
	private static function systemIpv6Addresses():array {
		// IPv6 addresses are like fe80::6e26:388d:7bf:15d1
		return self::parseIfconfigOutput(
			'/inet6\s*(?:addr)?:?\s+([0123456789abcdef:]+)/',
			self::UNUSABLE_NETWORK_DEVICES_REGEX
		);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the given IPv4 address
	 *
	 * @param string|null $ipv4Address with format like "192.168.1.1"
	 * @param int|null $cidr the CIDR "mask" size for the subnet (0 to 32)
	 *
	 * @return string IPv4 subnet base address
	 */
	private static function ipv4AddressSubnet(?string $ipv4Address, ?int $cidr):string {
		$cidr = (int) $cidr;
		if (($cidr < 0) || ($cidr > 32)) {
			throw new \InvalidArgumentException(
				"ipv4AddressSubnet: CIDR $cidr is invalid. CIDR must be 0 to 32."
			);
		}

		$addressMask = \ip2long($ipv4Address);
		if ($addressMask === false) {
			throw new \InvalidArgumentException(
				"ipv4AddressSubnet: IPv4 address $ipv4Address is invalid."
			);
		}

		$cidrMask = -1 << (32 - $cidr);
		$netMask = $addressMask & $cidrMask;
		return \long2ip($netMask);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the given IPv6 address
	 *
	 * @param string|null $ipv6Address with format like "a:b:c::1"
	 * @param int|null $cidr the CIDR "mask" size for the subnet (0 to 128)
	 *
	 * @throws InvalidArgumentException
	 * @return string IPv6 subnet base address
	 */
	private static function ipv6AddressSubnet(?string $ipv6Address, ?int$cidr):string {
		$cidr = (int) $cidr;
		if (($cidr < 0) || ($cidr > 128)) {
			throw new \InvalidArgumentException(
				"ipv6AddressSubnet: CIDR $cidr is invalid. CIDR must be 0 to 128."
			);
		}

		$ipBin = \inet_pton($ipv6Address);
		if ($ipBin === false) {
			throw new \InvalidArgumentException(
				"ipv6AddressSubnet: IPv6 address $ipv6Address is invalid."
			);
		}

		$hexString = \bin2hex($ipBin);

		// Turn the hex string into a string of 128 "binary" characters "0" and "1"
		$binNumber = '';
		for ($i = 0; $length = \strlen($hexString), $i < $length; $i++) {
			$binNumber .= \sprintf('%04d', \decbin(\hexdec($hexString[$i])));
		}

		// Set all the values past the end of the CIDR to "0"
		// ("masking" the binary string value)
		$binNumber = \substr($binNumber, 0, $cidr) . \str_repeat("0", 128 - $cidr);

		// Convert it back to a hex string
		$hexSubnetBase = "";
		foreach (\str_split($binNumber, 4) as $binString) {
			$hexSubnetBase .= \base_convert($binString, 2, 16);
		}

		// Put the hex into the hex2bin() internal format,
		// use inet_ntop to make a human-readable IPv6 address string
		// and return the answer.
		return \inet_ntop(\hex2bin($hexSubnetBase));
	}

	/**
	 * find the first IPv4 address on the local system that is a loopback address
	 *
	 * @throws Exception
	 * @return string IPv4 loopback address
	 */
	private static function loopbackIpv4Address():string {
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (\strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) === 0) {
				return $ipv4Address;
			}
		}

		throw new \Exception("loopbackIpv4Address: No IP address found");
	}

	/**
	 * get the IPv6 loopback address
	 * Note: for IPv6 the loopback address is a well-defined constant value
	 *
	 * @return string IPv6 loopback address
	 */
	private static function loopbackIpv6Address():string {
		return self::IPV6_LOOPBACK_ADDRESS;
	}

	/**
	 * get a loopback address for the given IP address family
	 *
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 *
	 * @return string IP loopback address
	 * @throws Exception
	 */
	private static function loopbackIpAddress(?string $ipAddressFamily):string {
		switch (\strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address();
			case 'ipv6':
				return self::loopbackIpv6Address();
		}

		throw new \InvalidArgumentException(
			"loopbackIpAddress: Invalid IP address family"
		);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the loopback address of the given IP address family
	 *
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 *
	 * @return string IP of loopback subnet base address
	 * @throws Exception
	 */
	private static function loopbackIpAddressSubnet(?string $ipAddressFamily):string {
		switch (\strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::loopbackIpv4Address();
			case 'ipv6':
				return self::loopbackIpv6Address();
		}

		throw new \InvalidArgumentException(
			"loopbackIpAddressSubnet: Invalid IP address family"
		);
	}

	/**
	 * find the first IPv4 address on the local system that is not a loopback address
	 * i.e. a "real" routable IPv4 address on some network interface
	 *
	 * @return string IPv4 address
	 * @throws InvalidArgumentException|Exception
	 */
	private static function routableIpv4Address():string {
		foreach (self::systemIpv4Addresses() as $ipv4Address) {
			if (\strpos($ipv4Address, self::IPV4_LOOPBACK_ADDRESS_TOP) !== 0) {
				return $ipv4Address;
			}
		}

		throw new \InvalidArgumentException(
			"routableIpv4Address: No IP address found"
		);
	}

	/**
	 * find the first IPv6 address on the local system
	 * that is not a loopback or link-local address,
	 * i.e. a "real" routable IPv6 address on some network interface
	 *
	 * @return string IPv6 address
	 * @throws InvalidArgumentException|Exception
	 */
	private static function routableIpv6Address():string {
		foreach (self::systemIpv6Addresses() as $ipv6Address) {
			if (($ipv6Address !== self::IPV6_LOOPBACK_ADDRESS)
				&& (\strpos($ipv6Address, self::IPV6_LINK_LOCAL_ADDRESS_TOP) !== 0)
			) {
				return $ipv6Address;
			}
		}

		throw new \InvalidArgumentException(
			"routableIpv6Address: No IP address found"
		);
	}

	/**
	 * get a non-loopback address on the local system for the given IP address family
	 * i.e. a "real" routable IP address on some network interface
	 *
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 *
	 * @return string IP address
	 * @throws Exception
	 */
	private static function routableIpAddress(?string $ipAddressFamily):string {
		switch (\strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::routableIpv4Address();
			case 'ipv6':
				return self::routableIpv6Address();
		}

		throw new \InvalidArgumentException(
			"routableIpAddress: Invalid IP address family"
		);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the IPv4 address of the first routable IPv4 subnet
	 *
	 * @param int|null $cidr the CIDR "mask" size for the subnet
	 *
	 * @return string IPv4 local subnet base address
	 * @throws Exception
	 */
	private static function routableIpv4AddressSubnet(?int $cidr):string {
		return self::ipv4AddressSubnet(self::routableIpv4Address(), $cidr);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the IPv6 address of the first routable IPv6 subnet
	 *
	 * @param int|null $cidr the CIDR "mask" size for the subnet
	 *
	 * @return string IPv6 local subnet base address
	 * @throws Exception
	 */
	private static function routableIpv6AddressSubnet(?int $cidr):string {
		return self::ipv6AddressSubnet(self::routableIpv6Address(), $cidr);
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains the first routable IP address of the given IP address family
	 *
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 * @param int|null $cidr the CIDR "mask" size for the subnet
	 *
	 * @return string IP of local subnet base address
	 * @throws Exception
	 */
	private static function routableIpAddressSubnet(?string $ipAddressFamily, ?int $cidr):string {
		switch (\strtolower($ipAddressFamily)) {
			case 'ipv4':
				return self::routableIpv4AddressSubnet($cidr);
			case 'ipv6':
				return self::routableIpv6AddressSubnet($cidr);
		}

		throw new \InvalidArgumentException(
			"routableIpAddressSubnet: Invalid IP address family"
		);
	}

	/**
	 * find an IP address on the local system that is either a loopback address
	 * or a routable IP address of the given IP address family.
	 *
	 * @param string|null $networkScope which type of address to return,
	 *                                  "routable" or "loopback"
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 *
	 * @return string IP address
	 * @throws Exception
	 */
	public static function ipAddress(?string $networkScope, ?string $ipAddressFamily):string {
		switch (\strtolower($networkScope)) {
			case 'routable':
				return self::routableIpAddress($ipAddressFamily);
			case 'loopback':
				return self::loopbackIpAddress($ipAddressFamily);
			default:
				throw new \InvalidArgumentException(
					"ipAddress: Invalid networkScope passed. " .
					"(Must be routable or loopback)"
				);
		}
	}

	/**
	 * calculate the base address of the subnet with the given CIDR
	 * that contains a routable or loopback IP address of the given IP address family
	 *
	 * @param string|null $networkScope which type of address to return,
	 *                                  "routable" or "loopback"
	 * @param string|null $ipAddressFamily IPv4 or IPv6 (not case-sensitive)
	 * @param int|null $cidr the CIDR "mask" size for the subnet
	 *
	 * @return string IP of base address
	 * @throws Exception
	 */
	public static function ipAddressSubnet(?string $networkScope, ?string $ipAddressFamily, ?int $cidr):string {
		switch (\strtolower($networkScope)) {
			case 'routable':
				return self::routableIpAddressSubnet($ipAddressFamily, $cidr);
			case 'loopback':
				return self::loopbackIpAddressSubnet($ipAddressFamily);
			default:
				throw new \InvalidArgumentException(
					"ipAddressSubnet: Invalid networkScope passed. " .
					"(Must be routable or loopback)"
				);
		}
	}
}
