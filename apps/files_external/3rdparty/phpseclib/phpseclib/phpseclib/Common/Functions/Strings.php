<?php

/**
 * Common String Functions
 *
 * PHP version 5
 *
 * @category  Common
 * @package   Functions\Strings
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Common\Functions;

use phpseclib3\Math\BigInteger;
use phpseclib3\Math\Common\FiniteField;

/**
 * Common String Functions
 *
 * @package Functions\Strings
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class Strings
{
    /**
     * String Shift
     *
     * Inspired by array_shift
     *
     * @param string $string
     * @param int $index
     * @access public
     * @return string
     */
    public static function shift(&$string, $index = 1)
    {
        $substr = substr($string, 0, $index);
        $string = substr($string, $index);
        return $substr;
    }

    /**
     * String Pop
     *
     * Inspired by array_pop
     *
     * @param string $string
     * @param int $index
     * @access public
     * @return string
     */
    public static function pop(&$string, $index = 1)
    {
        $substr = substr($string, -$index);
        $string = substr($string, 0, -$index);
        return $substr;
    }

    /**
     * Parse SSH2-style string
     *
     * Returns either an array or a boolean if $data is malformed.
     *
     * Valid characters for $format are as follows:
     *
     * C = byte
     * b = boolean (true/false)
     * N = uint32
     * s = string
     * i = mpint
     * L = name-list
     *
     * uint64 is not supported.
     *
     * @param string $format
     * @param string $data
     * @return mixed
     */
    public static function unpackSSH2($format, &$data)
    {
        $format = self::formatPack($format);
        $result = [];
        for ($i = 0; $i < strlen($format); $i++) {
            switch ($format[$i]) {
                case 'C':
                case 'b':
                    if (!strlen($data)) {
                        throw new \LengthException('At least one byte needs to be present for successful C / b decodes');
                    }
                    break;
                case 'N':
                case 'i':
                case 's':
                case 'L':
                    if (strlen($data) < 4) {
                        throw new \LengthException('At least four byte needs to be present for successful N / i / s / L decodes');
                    }
                    break;
                default:
                    throw new \InvalidArgumentException('$format contains an invalid character');
            }
            switch ($format[$i]) {
                case 'C':
                    $result[] = ord(self::shift($data));
                    continue 2;
                case 'b':
                    $result[] = ord(self::shift($data)) != 0;
                    continue 2;
                case 'N':
                    list(, $temp) = unpack('N', self::shift($data, 4));
                    $result[] = $temp;
                    continue 2;
            }
            list(, $length) = unpack('N', self::shift($data, 4));
            if (strlen($data) < $length) {
                throw new \LengthException("$length bytes needed; " . strlen($data) . ' bytes available');
            }
            $temp = self::shift($data, $length);
            switch ($format[$i]) {
                case 'i':
                    $result[] = new BigInteger($temp, -256);
                    break;
                case 's':
                    $result[] = $temp;
                    break;
                case 'L':
                    $result[] = explode(',', $temp);
            }
        }

        return $result;
    }

    /**
     * Create SSH2-style string
     *
     * @param string[] ...$elements
     * @access public
     * @return mixed
     */
    public static function packSSH2(...$elements)
    {
        $format = self::formatPack($elements[0]);
        array_shift($elements);
        if (strlen($format) != count($elements)) {
            throw new \InvalidArgumentException('There must be as many arguments as there are characters in the $format string');
        }
        $result = '';
        for ($i = 0; $i < strlen($format); $i++) {
            $element = $elements[$i];
            switch ($format[$i]) {
                case 'C':
                    if (!is_int($element)) {
                        throw new \InvalidArgumentException('Bytes must be represented as an integer between 0 and 255, inclusive.');
                    }
                    $result.= pack('C', $element);
                    break;
                case 'b':
                    if (!is_bool($element)) {
                        throw new \InvalidArgumentException('A boolean parameter was expected.');
                    }
                    $result.= $element ? "\1" : "\0";
                    break;
                case 'N':
                    if (is_float($element)) {
                        $element = (int) $element;
                    }
                    if (!is_int($element)) {
                        throw new \InvalidArgumentException('An integer was expected.');
                    }
                    $result.= pack('N', $element);
                    break;
                case 's':
                    if (!self::is_stringable($element)) {
                        throw new \InvalidArgumentException('A string was expected.');
                    }
                    $result.= pack('Na*', strlen($element), $element);
                    break;
                case 'i':
                    if (!$element instanceof BigInteger && !$element instanceof FiniteField\Integer) {
                        throw new \InvalidArgumentException('A phpseclib3\Math\BigInteger or phpseclib3\Math\Common\FiniteField\Integer object was expected.');
                    }
                    $element = $element->toBytes(true);
                    $result.= pack('Na*', strlen($element), $element);
                    break;
                case 'L':
                    if (!is_array($element)) {
                        throw new \InvalidArgumentException('An array was expected.');
                    }
                    $element = implode(',', $element);
                    $result.= pack('Na*', strlen($element), $element);
                    break;
                default:
                    throw new \InvalidArgumentException('$format contains an invalid character');
            }
        }
        return $result;
    }

    /**
     * Expand a pack string
     *
     * Converts C5 to CCCCC, for example.
     *
     * @access private
     * @param string $format
     * @return string
     */
    private static function formatPack($format)
    {
        $parts = preg_split('#(\d+)#', $format, -1, PREG_SPLIT_DELIM_CAPTURE);
        $format = '';
        for ($i = 1; $i < count($parts); $i+=2) {
            $format.= substr($parts[$i - 1], 0, -1) . str_repeat(substr($parts[$i - 1], -1), $parts[$i]);
        }
        $format.= $parts[$i - 1];

        return $format;
    }

    /**
     * Convert binary data into bits
     *
     * bin2hex / hex2bin refer to base-256 encoded data as binary, whilst
     * decbin / bindec refer to base-2 encoded data as binary. For the purposes
     * of this function, bin refers to base-256 encoded data whilst bits refers
     * to base-2 encoded data
     *
     * @access public
     * @param string $x
     * @return string
     */
    public static function bits2bin($x)
    {
        /*
        // the pure-PHP approach is faster than the GMP approach
        if (function_exists('gmp_export')) {
             return strlen($x) ? gmp_export(gmp_init($x, 2)) : gmp_init(0);
        }
        */

        if (preg_match('#[^01]#', $x)) {
            throw new \RuntimeException('The only valid characters are 0 and 1');
        }

        if (!defined('PHP_INT_MIN')) {
            define('PHP_INT_MIN', ~PHP_INT_MAX);
        }

        $length = strlen($x);
        if (!$length) {
            return '';
        }
        $block_size = PHP_INT_SIZE << 3;
        $pad = $block_size - ($length % $block_size);
        if ($pad != $block_size) {
            $x = str_repeat('0', $pad) . $x;
        }

        $parts = str_split($x, $block_size);
        $str = '';
        foreach ($parts as $part) {
            $xor = $part[0] == '1' ? PHP_INT_MIN : 0;
            $part[0] = '0';
            $str.= pack(
                PHP_INT_SIZE == 4 ? 'N' : 'J',
                $xor ^ eval('return 0b' . $part . ';')
            );
        }
        return ltrim($str, "\0");
    }

    /**
     * Convert bits to binary data
     *
     * @access public
     * @param string $x
     * @return string
     */
    public static function bin2bits($x)
    {
        /*
        // the pure-PHP approach is slower than the GMP approach BUT
        // i want to the pure-PHP version to be easily unit tested as well
        if (function_exists('gmp_import')) {
            return gmp_strval(gmp_import($x), 2);
        }
        */

        $len = strlen($x);
        $mod = $len % PHP_INT_SIZE;
        if ($mod) {
            $x = str_pad($x, $len + PHP_INT_SIZE - $mod, "\0", STR_PAD_LEFT);
        }

        $bits = '';
        if (PHP_INT_SIZE == 4) {
            $digits = unpack('N*', $x);
            foreach ($digits as $digit) {
                $bits.= sprintf('%032b', $digit);
            }
        } else {
            $digits = unpack('J*', $x);
            foreach ($digits as $digit) {
                $bits.= sprintf('%064b', $digit);
            }
        }

        return ltrim($bits, '0');
    }

    /**
     * Switch Endianness Bit Order
     *
     * @access public
     * @param string $x
     * @return string
     */
    public static function switchEndianness($x)
    {
        $r = '';
        // from http://graphics.stanford.edu/~seander/bithacks.html#ReverseByteWith32Bits
        for ($i = strlen($x) - 1; $i >= 0; $i--) {
            $b = ord($x[$i]);
            $p1 = ($b * 0x0802) & 0x22110;
            $p2 = ($b * 0x8020) & 0x88440;
            $r.= chr(
                (($p1 | $p2) * 0x10101) >> 16
            );
        }
        return $r;
    }

    /**
     * Increment the current string
     *
     * @param string $var
     * @return string
     * @access public
     */
    public static function increment_str(&$var)
    {
        for ($i = 4; $i <= strlen($var); $i+= 4) {
            $temp = substr($var, -$i, 4);
            switch ($temp) {
                case "\xFF\xFF\xFF\xFF":
                    $var = substr_replace($var, "\x00\x00\x00\x00", -$i, 4);
                    break;
                case "\x7F\xFF\xFF\xFF":
                    $var = substr_replace($var, "\x80\x00\x00\x00", -$i, 4);
                    return $var;
                default:
                    $temp = unpack('Nnum', $temp);
                    $var = substr_replace($var, pack('N', $temp['num'] + 1), -$i, 4);
                    return $var;
            }
        }

        $remainder = strlen($var) % 4;

        if ($remainder == 0) {
            return $var;
        }

        $temp = unpack('Nnum', str_pad(substr($var, 0, $remainder), 4, "\0", STR_PAD_LEFT));
        $temp = substr(pack('N', $temp['num'] + 1), -$remainder);
        $var = substr_replace($var, $temp, 0, $remainder);

        return $var;
    }

    /**
     * Find whether the type of a variable is string (or could be converted to one)
     *
     * @param string|object $var
     * @return boolean
     * @access public
     */
    public static function is_stringable($var)
    {
        return is_string($var) || (is_object($var) && method_exists($var, '__toString'));
    }
}
