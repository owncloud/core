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

interface IConverter {
	/**
	 * Convert an binary attribute into an string representation.
	 * The basic string representation could be the binary attribute
	 * encoded in base64.
	 * Some attributes might be expected in some specific format, so
	 * the string representation should match that expectation in order
	 * to make it easier for the user to recognize and match the result
	 * with other tools.
	 * @param string $binAttr the binary attribute coming from LDAP
	 * @return string the string representation for the binary attribute
	 * @throws ConverterException if an error happens
	 */
	public function bin2str(string $binAttr): string;
	/**
	 * Transform the string representation of a binary attribute (usually
	 * coming from the bin2str method) into a string suitable to be used
	 * in a ldap filter.
	 * This result could be something like "\11\f8\30\73\7f\f4\bc\41\a4\ff\e7\92\d0\73\f4\1f",
	 * so the ldap filter could be build like
	 * "binattr=\11\f8\30\73\7f\f4\bc\41\a4\ff\e7\92\d0\73\f4\1f"
	 * @param string $strRepr the string representation of the binary attribute
	 * usually coming from the bin2str method
	 * @return string a string suitable to be used as LDAP filter
	 * @throws ConverterException if an error happens
	 */
	public function str2filter(string $strRepr): string;
}
