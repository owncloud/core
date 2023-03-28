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

class ConverterHub {
	/** @var ConverterHub */
	private static $defaultConverterHub;

	/** @var array<string,IConverter> */
	private $attrConverterMap = [];

	/**
	 * Get the default converted hub. If no hub has been created yet,
	 * or the $fresh parameter is true, a new ConverterHub will be
	 * created and set as default, the `registerDefaultConverters`
	 * method will be called on it, and finally it will be returned.
	 * @param bool $fresh whether a new instance should be created and set
	 * as default
	 * @return ConverterHub
	 */
	public static function getDefaultConverterHub($fresh = false) {
		if (self::$defaultConverterHub === null || $fresh) {
			$converterHub = new ConverterHub();
			$converterHub->registerDefaultConverters();
			self::$defaultConverterHub = $converterHub;
		}
		return self::$defaultConverterHub;
	}

	/**
	 * Register a new IConverter instance for the chosen attribute.
	 * This will overwrite any previous IConverter register for that attribute
	 * @param string $attr the attribute that will be converted. The attribute
	 * should be lowercase
	 * @param IConverter $converter the converter to be used for that attribute
	 */
	public function registerConverter(string $attr, IConverter $converter) {
		$this->attrConverterMap[$attr] = $converter;
	}

	/**
	 * Remove all registered converters in this instance
	 */
	public function clearConverters() {
		$this->attrConverterMap = [];
	}

	/**
	 * Register the default converters. This method won't remove any existing
	 * converter, but it will overwrite them if they overlap
	 */
	public function registerDefaultConverters() {
		$this->attrConverterMap['objectguid'] = new GUIDConverter();
		$this->attrConverterMap['guid'] = new GUIDConverter();
		$this->attrConverterMap['objectsid'] = new SIDConverter();
	}

	/**
	 * Check if this instance has a converter set for the target attribute
	 * @param string $attr the attribute to check
	 * @return bool true if there is a converter for the attribute, false otherwise
	 */
	public function hasConverter(string $attr): bool {
		return isset($this->attrConverterMap[$attr]);
	}

	/**
	 * Convert the binary value to its string representation using the
	 * converter registered for the target attribute.
	 * If there is no converter registered for the target attribute, a
	 * ConverterException will be thrown.
	 * Additional ConverterException might be thrown from the converters
	 * if there is a problem dealing with the conversion.
	 * @param string $attr the attribute name for the value
	 * @param string $binValue the binary value for the associated attribute
	 * @return string the string representation of the binary value
	 * accordingly to the associated converter
	 * @throws ConverterException if no converter is registered, or the
	 * associated converter can't deal with the input.
	 */
	public function bin2str(string $attr, string $binValue) {
		if (!isset($this->attrConverterMap[$attr])) {
			throw new ConverterException("No converter found for attr {$attr}");
		}

		$converter = $this->attrConverterMap[$attr];
		return $converter->bin2str($binValue);
	}

	/**
	 * Convert the string representation of the attribute into a string
	 * suitable to be used in a LDAP filter.
	 * The string representation should come from the `bin2str` method
	 * of this instance (it might have been stored anywhere).
	 * Since the filter will likely contain binary data, the converters
	 * are expected to escape the result accordinly, so results such as
	 * '\11\f8\30\73\7f\f4\bc\41\a4\ff\e7\92\d0\73\f4\1f' are expected
	 * to be returned.
	 * The filter is expected to be built like
	 * ```
	 * $strRepr = 'S-1-5-21-12032599-1214884855-3286145327-1103';
	 * $filter = "objectsid=" . $hub->str2filter('objectsid', $strRepr);
	 * ```
	 * A ConverterException will be thrown if there is no converter
	 * associated to the target attribute
	 * @param string $attr the attribute associated to the string representation
	 * @param string $strValue the string representation of the value of
	 * the attribute
	 * @return string a string suitable to be used as filter
	 * @throws ConverterException if no converter is registered, or the
	 * associated converter can't deal with the input.
	 */
	public function str2filter(string $attr, string $strValue) {
		if (!isset($this->attrConverterMap[$attr])) {
			throw new ConverterException("No converter found for attr {$attr}");
		}

		$converter = $this->attrConverterMap[$attr];
		return $converter->str2filter($strValue);
	}
}
