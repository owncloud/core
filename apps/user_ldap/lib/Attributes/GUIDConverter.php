<?php
/**
 * @copyright Copyright (c) 2022, ownCloud GmbH.
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

namespace OCA\User_LDAP\Attributes;

class GUIDConverter implements IConverter {
	/**
	 * @inheritdoc
	 * converts a binary GUID into a string representation
	 *
	 * TODO use shorter version with pack()
	 *
	 * General UUID information: @see http://ldapwiki.com/wiki/Universally%20Unique%20Identifier
	 *
	 * ## openldap EntryUUID uses RFC4122 see {@link http://ldapwiki.com/wiki/UUID definition}
	 * see the {@link http://ldapwiki.com/wiki/EntryUUID ldapwiki EntryUUID definition}
	 *
	 * ## Microsoft Active Directory objectGUID is defined as 16 byte octet string
	 * {@link https://msdn.microsoft.com/en-us/library/ms679021(v=vs.85).aspx official objectGUID definition}
	 * From the {@link http://ldapwiki.com/wiki/ObjectGUID ldapwiki ObjectGUID definition}:
	 * ObjectGUID is generally a Universally Unique Identifier other than the
	 * format differs from the UUID standard only in the byte order of the first 3 fields.
	 * {@link http://support.microsoft.com/default.aspx?scid=kb%3Ben-us%3B325649 conversion to a string}
	 *
	 * ## Novell eDirectory GUID is defined as 16 byte octet string
	 * From the {@link http://ldapwiki.com/wiki/GUID ldapwiki GUID definition}:
	 * There are several different methods that are used to display any given GUID
	 * {@link http://www.novell.com/documentation/developer/ndslib/schm_enu/data/sdk1198.html official GUID definition}
	 *
	 * ## 389 Directory Server / Oracle Directory Server Enterprise Edition (ODSEE) is defined as utf string
	 * {@link https://github.com/leto/389-ds/blob/master/ldap/schema/01core389.ldif#L69 schema definition}
	 * {@link  https://docs.oracle.com/cd/E49437_01/reference.111220/e27801/nsuniqueid-virtual-attribute.html official nsuniqueid definition}
	 * The nsuniqueid values are generated based on the entryuuid value by moving the "-" to comply with the format of the ODSEE Nsuniqueid Virtual Attribute attribute.
	 *
	 * ## RedHat FreeIPA is defined as utf string
	 * {@link https://github.com/freeipa/freeipa/blob/master/install/share/uuid.ldif ipaUniqueID schema}
	 *
	 * This implementation was taken from
	 * {@link http://www.php.net/manual/en/function.ldap-get-values-len.php#73198 The PHP ldap_get_values_lan doc comments}
	 *
	 * @param string $binGuid the ObjectGUID / GUID in it's binary form as retrieved from Microsoft AD / Novell eDirectory
	 *                        If you pass an already decoded GUID as string, it will be returned as is.
	 * @return string
	 * @throws \OutOfBoundsException
	 */
	public function bin2str(string $binGuid): string {
		$guidLength = \strlen($binGuid);

		// The guid should have 16 byte when binary and 36 byte when string (including '-' characters)
		if (($guidLength !== 16) && ($guidLength !== 36)) {
			throw new ConverterException(\sprintf('Invalid GUID with length %d received: <%X>', $guidLength, $binGuid));
		}

		// If we get a guid in string form we simply return it to prevent double decoding
		if ($guidLength === 36) {
			return $binGuid;
		}

		// V = unsigned long (always 32 bit, little endian byte order)
		// v = unsigned short (always 16 bit, little endian byte order)
		// n = unsigned short (always 16 bit, big endian byte order)
		// N = unsigned long (always 32 bit, big endian byte order)
		// TODO treat all warnings es error? see https://stackoverflow.com/a/2071048
		$unpacked = \unpack('Va/v2b/n2c/Nd', $binGuid); // only throws a warning if it could not parse the input
		$uuid = \sprintf('%08X-%04X-%04X-%04X-%04X%08X', $unpacked['a'], $unpacked['b1'], $unpacked['b2'], $unpacked['c1'], $unpacked['c2'], $unpacked['d']);
		// make sure this is not a bogus UUID
		if ($uuid === '00000000-0000-0000-0000-000000000000') {
			throw new ConverterException(\sprintf('Invalid binary uuid <%X>', $binGuid));
		}
		return $uuid;
	}

	/**
	 * @inheritdoc
	 */
	public function str2filter(string $guid): string {
		$blocks = \explode('-', $guid);
		if (\count($blocks) !== 5) {
			throw new ConverterException("{$guid} doesn't resemble a valid GUID");
		}
		for ($i=0; $i < 3; $i++) {
			$pairs = \str_split($blocks[$i], 2);
			$pairs = \array_reverse($pairs);
			$blocks[$i] = \implode('', $pairs);
		}
		for ($i=0; $i < 5; $i++) {
			$pairs = \str_split($blocks[$i], 2);
			$blocks[$i] = '\\' . \implode('\\', $pairs);
		}
		return \implode('', $blocks);
	}
}
