<?php

/**
 * XML Formatted RSA Key Handler
 *
 * More info:
 *
 * http://www.w3.org/TR/xmldsig-core/#sec-RSAKeyValue
 * http://www.w3.org/TR/xkms2/#XKMS_2_0_Paragraph_269
 * http://en.wikipedia.org/wiki/XML_Signature
 * http://en.wikipedia.org/wiki/XKMS
 *
 * PHP version 5
 *
 * @category  Crypt
 * @package   RSA
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt\RSA\Formats\Keys;

use ParagonIE\ConstantTime\Base64;
use phpseclib3\Math\BigInteger;
use phpseclib3\Common\Functions\Strings;
use phpseclib3\Exception\UnsupportedFormatException;

/**
 * XML Formatted RSA Key Handler
 *
 * @package RSA
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class XML
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
        if (!Strings::is_stringable($key)) {
            throw new \UnexpectedValueException('Key should be a string - not a ' . gettype($key));
        }

        $components = [
            'isPublicKey' => false,
            'primes' => [],
            'exponents' => [],
            'coefficients' => []
        ];

        $use_errors = libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        if (substr($key, 0, 5) != '<?xml') {
            $key = '<xml>' . $key . '</xml>';
        }
        if (!$dom->loadXML($key)) {
            throw new \UnexpectedValueException('Key does not appear to contain XML');
        }
        $xpath = new \DOMXPath($dom);
        $keys = ['modulus', 'exponent', 'p', 'q', 'dp', 'dq', 'inverseq', 'd'];
        foreach ($keys as $key) {
            // $dom->getElementsByTagName($key) is case-sensitive
            $temp = $xpath->query("//*[translate(local-name(), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='$key']");
            if (!$temp->length) {
                continue;
            }
            $value = new BigInteger(Base64::decode($temp->item(0)->nodeValue), 256);
            switch ($key) {
                case 'modulus':
                    $components['modulus'] = $value;
                    break;
                case 'exponent':
                    $components['publicExponent'] = $value;
                    break;
                case 'p':
                    $components['primes'][1] = $value;
                    break;
                case 'q':
                    $components['primes'][2] = $value;
                    break;
                case 'dp':
                    $components['exponents'][1] = $value;
                    break;
                case 'dq':
                    $components['exponents'][2] = $value;
                    break;
                case 'inverseq':
                    $components['coefficients'][2] = $value;
                    break;
                case 'd':
                    $components['privateExponent'] = $value;
            }
        }

        libxml_use_internal_errors($use_errors);

        foreach ($components as $key => $value) {
            if (is_array($value) && !count($value)) {
                unset($components[$key]);
            }
        }

        if (isset($components['modulus']) && isset($components['publicExponent'])) {
            if (count($components) == 3) {
                $components['isPublicKey'] = true;
            }
            return $components;
        }

        throw new \UnexpectedValueException('Modulus / exponent not present');
    }

    /**
     * Convert a private key to the appropriate format.
     *
     * @access public
     * @param \phpseclib3\Math\BigInteger $n
     * @param \phpseclib3\Math\BigInteger $e
     * @param \phpseclib3\Math\BigInteger $d
     * @param array $primes
     * @param array $exponents
     * @param array $coefficients
     * @param string $password optional
     * @return string
     */
    public static function savePrivateKey(BigInteger $n, BigInteger $e, BigInteger $d, array $primes, array $exponents, array $coefficients, $password = '')
    {
        if (count($primes) != 2) {
            throw new \InvalidArgumentException('XML does not support multi-prime RSA keys');
        }

        if (!empty($password) && is_string($password)) {
            throw new UnsupportedFormatException('XML private keys do not support encryption');
        }

        return "<RSAKeyPair>\r\n" .
               '  <Modulus>' . Base64::encode($n->toBytes()) . "</Modulus>\r\n" .
               '  <Exponent>' . Base64::encode($e->toBytes()) . "</Exponent>\r\n" .
               '  <P>' . Base64::encode($primes[1]->toBytes()) . "</P>\r\n" .
               '  <Q>' . Base64::encode($primes[2]->toBytes()) . "</Q>\r\n" .
               '  <DP>' . Base64::encode($exponents[1]->toBytes()) . "</DP>\r\n" .
               '  <DQ>' . Base64::encode($exponents[2]->toBytes()) . "</DQ>\r\n" .
               '  <InverseQ>' . Base64::encode($coefficients[2]->toBytes()) . "</InverseQ>\r\n" .
               '  <D>' . Base64::encode($d->toBytes()) . "</D>\r\n" .
               '</RSAKeyPair>';
    }

    /**
     * Convert a public key to the appropriate format
     *
     * @access public
     * @param \phpseclib3\Math\BigInteger $n
     * @param \phpseclib3\Math\BigInteger $e
     * @return string
     */
    public static function savePublicKey(BigInteger $n, BigInteger $e)
    {
        return "<RSAKeyValue>\r\n" .
               '  <Modulus>' . Base64::encode($n->toBytes()) . "</Modulus>\r\n" .
               '  <Exponent>' . Base64::encode($e->toBytes()) . "</Exponent>\r\n" .
               '</RSAKeyValue>';
    }
}
