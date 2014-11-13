<?php
/**
 * Simple class to support some very basic operations on 64 bit intergers
 * on 32 bit machines.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Nicolai Ehemann <en@enlightened.de>
 * @copyright Copyright (C) 2013-2014 Nicolai Ehemann and contributors
 * @license GNU GPL
 */
namespace ZipStreamer;

const INT64_HIGH_MAP = 0xffffffff00000000;
const INT64_LOW_MAP =  0x00000000ffffffff;
const INT_MAX_32 = 0xffffffff;

/**
 * Unsigned right shift
 *
 * @param int $bits integer to be shifted
 * @param int $shift number of bits to be shifted
 * @return int shifted integer
 */
function urShift($bits, $shift) {
  if ($shift == 0) {
    return $bits;
  }
  return ($bits >> $shift) & ~(1 << (8 * PHP_INT_SIZE - 1) >> ($shift - 1));
}

/**
 * Convert binary data string to readable hex string
 *
 * @param string $data binary string
 * @return string readable hex string
 */
function byte2hex($data) {
  return unpack("h*", $data);
}

/**
 * Pack 2 byte data into binary string, little endian format
 *
 * @param mixed $data data
 * @return string 2 byte binary string
 */
function pack16le($data) {
  return pack('v', $data);
}

/**
 * Unpack 2 byte binary string, little endian format to 2 byte data
 *
 * @param string $data binary string
 * @return integer 2 byte data
 */
function unpack16le($data) {
  $result = unpack('v', $data);
  return $result[1];
}

/**
 * Pack 4 byte data into binary string, little endian format
 *
 * @param mixed $data data
 * @return 4 byte binary string
 */
function pack32le($data) {
  return pack('V', $data);
}

/**
 * Unpack 4 byte binary string, little endian format to 4 byte data
 *
 * @param string $data binary string
 * @return integer 4 byte data
 */
function unpack32le($data) {
  $result = unpack('V', $data);
  return $result[1];
}

/**
 * Pack 8 byte data into binary string, little endian format
 *
 * @param mixed $data data
 * @return string 8 byte binary string
 */
function pack64le($data) {
  if (is_object($data)) {
    if ("Count64_32" == get_class($data)) {
      $value = $data->_getValue();
      $hiBytess = $value[0];
      $loBytess = $value[1];
    } else {
      $hiBytess = ($data->_getValue() & INT64_HIGH_MAP) >> 32;
      $loBytess = $data->_getValue() & INT64_LOW_MAP;
    }
  } else if (4 == PHP_INT_SIZE) {
    $hiBytess = 0;
    $loBytess = $data;
  } else {
    $hiBytess = ($data & INT64_HIGH_MAP) >> 32;
    $loBytess = $data & INT64_LOW_MAP;
  }
  return pack('VV', $loBytess, $hiBytess);
}

/**
 * Unpack 8 byte binary string, little endian format to 8 byte data
 *
 * @param string $data binary string
 * @return Count64Base data
 */
function unpack64le($data) {
  $bytes = unpack('V2', $data);
  return Count64::construct(array(
      $bytes[1],
      $bytes[2]
  ));
}

abstract class Count64Base {
  protected $limit32Bit = False;

  function __construct($value = 0, $limit32Bit = False) {
    $this->limit32Bit = $limit32Bit;
    $this->set($value);
  }

  abstract public function set($value);
  abstract public function add($value);
  abstract public function getHiBytes();
  abstract public function getLoBytes();
  abstract public function _getValue();

  const EXCEPTION_SET_INVALID_ARGUMENT = "Count64 object can only be set() to integer or Count64 values";
  const EXCEPTION_ADD_INVALID_ARGUMENT = "Count64 object can only be add()ed integer or Count64 values";
  const EXCEPTION_32BIT_OVERFLOW = "Count64 object limited to 32 bit (overflow)";
}

class Count64_32 extends Count64Base {
  private $loBytes;
  private $hiBytes;

  public function getHiBytes() {
    return $this->hiBytes;
  }

  public function getLoBytes() {
    return $this->loBytes;
  }

  public function _getValue() {
    return array($this->hiBytes, $this->loBytes);
  }

  public function set($value) {
    if (is_int($value)) {
      $this->loBytes = $value;
      $this->hiBytes = 0;
    } else if (is_array($value) && 2 == sizeof($value)) {
      $this->loBytes = $value[0];
      if ($this->limit32Bit && 0 !== $value[1]) {
        throw new \OverflowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->hiBytes = $value[1];
    } else if (is_object($value) && __CLASS__ == get_class($value)) {
      $value = $value->_getValue();
          if ($this->limit32Bit && 0 !== $value[0]) {
        throw new \OverflowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->hiBytes = $value[0];
      $this->loBytes = $value[1];
    } else {
      throw new \InvalidArgumentException(self::EXCEPTION_SET_INVALID_ARGUMENT);
    }
    return $this;
  }

  public function add($value) {
    if (is_int($value)) {
      $sum = (int) ($this->loBytes + $value);
      // overflow!
      if (($this->loBytes > -1 && $sum < $this->loBytes && $sum > -1)
        || ($this->loBytes < 0 && ($sum < $this->loBytes || $sum > -1))) {
        if ($this->limit32Bit) {
          throw new \OverflowException(self::EXCEPTION_32BIT_OVERFLOW);
        }
        $this->hiBytes = (int) ($this->hiBytes + 1);
      }
      $this->loBytes = $sum;
    } else if (is_object($value) && __CLASS__ == get_class($value)) {
      $value = $value->_getValue();
      $sum = (int) ($this->loBytes + $value[1]);
      if (($this->loBytes > -1 && $sum < $this->loBytes && $sum > -1)
        || ($this->loBytes < 0 && ($sum < $this->loBytes || $sum > -1))) {
        if ($this->limit32Bit) {
          throw new \OverflowException(self::EXCEPTION_32BIT_OVERFLOW);
        }
        $this->hiBytes = (int) ($this->hiBytes + 1);
      }
      $this->loBytes = $sum;
      if ($this->limit32Bit && 0 !== $value[0]) {
        throw new \OverflowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->hiBytes = (int) ($this->hiBytes + $value[0]);
    } else {
      throw new \InvalidArgumentException(self::EXCEPTION_ADD_INVALID_ARGUMENT);
    }
    return $this;
  }
}

class Count64_64 extends Count64Base {
  private $value;

  public function getHiBytes() {
    return urShift($this->value, 32);
  }

  public function getLoBytes() {
    return $this->value & INT64_LOW_MAP;
  }

  public function _getValue() {
    return $this->value;
  }

  public function set($value) {
    if (is_int($value)) {
      if ($this->limit32Bit && INT_MAX_32 < $value) {
        throw new \OverFlowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->value = $value;
    } else if (is_array($value) && 2 == sizeof($value)) {
      if ($this->limit32Bit && 0 !== $value[1]) {
        throw new \OverFlowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->value = $value[1];
      $this->value = $this->value << 32;
      $this->value = $this->value + $value[0];
    } else if (is_object($value) && __CLASS__ == get_class($value)) {
      $value = $value->_getValue();
      if ($this->limit32Bit && INT_MAX_32 < $value) {
        throw new \OverFlowException(self::EXCEPTION_32BIT_OVERFLOW);
      }
      $this->value = $value;

    } else {
      throw new \InvalidArgumentException(self::EXCEPTION_SET_INVALID_ARGUMENT);
    }
    return $this;
  }

  public function add($value) {
    if (is_int($value)) {
      $sum = (int) ($this->value + $value);
    } else if (is_object($value) && __CLASS__ == get_class($value)) {
      $sum = (int) ($this->value + $value->_getValue());
    } else {
      throw new \InvalidArgumentException(self::EXCEPTION_ADD_INVALID_ARGUMENT);
    }
    if ($this->limit32Bit && INT_MAX_32 < $sum) {
      throw new \OverFlowException(self::EXCEPTION_32BIT_OVERFLOW);
    }
    $this->value = $sum;
    return $this;
  }
}

abstract class Count64 {
  public static function construct($value = 0, $limit32Bit = False) {
    if (4 == PHP_INT_SIZE) {
      return new Count64_32($value, $limit32Bit);
    } else {
      return new Count64_64($value, $limit32Bit);
    }
  }
}

?>
