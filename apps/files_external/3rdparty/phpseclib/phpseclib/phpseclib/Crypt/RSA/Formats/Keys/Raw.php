<?php

/**
 * Raw RSA Key Handler
 *
 * PHP version 5
 *
 * An array containing two \phpseclib3\Math\BigInteger objects.
 *
 * The exponent can be indexed with any of the following:
 *
 * 0, e, exponent, publicExponent
 *
 * The modulus can be indexed with any of the following:
 *
 * 1, n, modulo, modulus
 *
 * @category  Crypt
 * @package   RSA
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt\RSA\Formats\Keys;

use phpseclib3\Math\BigInteger;

/**
 * Raw RSA Key Handler
 *
 * @package RSA
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class Raw
{
    /**
     * Break a public or private key down into its constituent components
     *
     * @access public
     * @param string $key
     * @param string $password optional
     * @return array
     */
    public static function load($key, $password = '')
    {
        if (!is_array($key)) {
            throw new \UnexpectedValueException('Key should be a array - not a ' . gettype($key));
        }
        if (isset($key['isPublicKey']) && isset($key['modulus'])) {
            if (isset($key['privateExponent']) || isset($key['publicExponent'])) {
                if (!isset($key['primes'])) {
                    return $key;
                }
                if (isset($key['exponents']) && isset($key['coefficients']) && isset($key['publicExponent']) && isset($key['privateExponent'])) {
                    return $key;
                }
            }
        }
        $components = ['isPublicKey' => true];
        switch (true) {
            case isset($key['e']):
                $components['publicExponent'] = $key['e'];
                break;
            case isset($key['exponent']):
                $components['publicExponent'] = $key['exponent'];
                break;
            case isset($key['publicExponent']):
                $components['publicExponent'] = $key['publicExponent'];
                break;
            case isset($key[0]):
                $components['publicExponent'] = $key[0];
        }
        switch (true) {
            case isset($key['n']):
                $components['modulus'] = $key['n'];
                break;
            case isset($key['modulo']):
                $components['modulus'] = $key['modulo'];
                break;
            case isset($key['modulus']):
                $components['modulus'] = $key['modulus'];
                break;
            case isset($key[1]):
                $components['modulus'] = $key[1];
        }
        if (isset($components['modulus']) && isset($components['publicExponent'])) {
            return $components;
        }

        throw new \UnexpectedValueException('Modulus / exponent not present');
    }

    /**
     * Convert a public key to the appropriate format
     *
     * @access public
     * @param \phpseclib3\Math\BigInteger $n
     * @param \phpseclib3\Math\BigInteger $e
     * @return array
     */
    public static function savePublicKey(BigInteger $n, BigInteger $e)
    {
        return ['e' => clone $e, 'n' => clone $n];
    }
}
