<?php

/**
 * PublicKeyLoader
 *
 * Returns a PublicKey or PrivateKey object.
 *
 * @category  Crypt
 * @package   PublicKeyLoader
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2009 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt;

use phpseclib3\Crypt\Common\AsymmetricKey;
use phpseclib3\Crypt\Common\PublicKey;
use phpseclib3\Crypt\Common\PrivateKey;
use phpseclib3\Exception\NoKeyLoadedException;
use phpseclib3\File\X509;

/**
 * PublicKeyLoader
 *
 * @package Common
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class PublicKeyLoader
{
    /**
     * Loads a public or private key
     *
     * @return AsymmetricKey
     * @access public
     * @param string|array $key
     * @param string $password optional
     */
    public static function load($key, $password = false)
    {
        try {
            return EC::load($key, $password);
        } catch (NoKeyLoadedException $e) {}

        try {
            return RSA::load($key, $password);
        } catch (NoKeyLoadedException $e) {}

        try {
            return DSA::load($key, $password);
        } catch (NoKeyLoadedException $e) {}

        try {
            $x509 = new X509();
            $x509->loadX509($key);
            $key = $x509->getPublicKey();
            if ($key) {
                return $key;
            }
        } catch (\Exception $e) {}

        throw new NoKeyLoadedException('Unable to read key');
    }

    /**
     * Loads a private key
     *
     * @return PrivateKey
     * @access public
     * @param string|array $key
     * @param string $password optional
     */
    public function loadPrivateKey($key, $password = false)
    {
        $key = self::load($key, $password);
        if (!$key instanceof PrivateKey) {
            throw new NoKeyLoadedException('The key that was loaded was not a private key');
        }
        return $key;
    }

    /**
     * Loads a public key
     *
     * @return PublicKey
     * @access public
     * @param string|array $key
     */
    public function loadPublicKey($key)
    {
        $key = self::load($key);
        if (!$key instanceof PublicKey) {
            throw new NoKeyLoadedException('The key that was loaded was not a public key');
        }
        return $key;
    }

    /**
     * Loads parameters
     *
     * @return AsymmetricKey
     * @access public
     * @param string|array $key
     */
    public function loadParameters($key)
    {
        $key = self::load($key);
        if (!$key instanceof PrivateKey && !$key instanceof PublicKey) {
            throw new NoKeyLoadedException('The key that was loaded was not a parameter');
        }
        return $key;
    }
}
