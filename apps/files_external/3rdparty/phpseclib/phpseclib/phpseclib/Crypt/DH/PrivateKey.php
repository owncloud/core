<?php

/**
 * DH Private Key
 *
 * @category  Crypt
 * @package   DH
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt\DH;

use phpseclib3\Crypt\Common;
use phpseclib3\Crypt\DH;

/**
 * DH Private Key
 *
 * @package DH
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
class PrivateKey extends DH
{
    use Common\Traits\PasswordProtected;

    /**
     * Private Key
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $privateKey;

    /**
     * Public Key
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $publicKey;

    /**
     * Returns the public key
     *
     * @access public
     * @return DH\PublicKey
     */
    public function getPublicKey()
    {
        $type = self::validatePlugin('Keys', 'PKCS8', 'savePublicKey');

        if (!isset($this->publicKey)) {
            $this->publicKey = $this->base->powMod($this->privateKey, $this->prime);
        }

        $key = $type::savePublicKey($this->prime, $this->base, $this->publicKey);

        return DH::loadFormat('PKCS8', $key);
    }

    /**
     * Returns the private key
     *
     * @param string $type
     * @param array $options optional
     * @return string
     */
    public function toString($type, array $options = [])
    {
        $type = self::validatePlugin('Keys', $type, 'savePrivateKey');

        if (!isset($this->publicKey)) {
            $this->publicKey = $this->base->powMod($this->privateKey, $this->prime);
        }

        return $type::savePrivateKey($this->prime, $this->base, $this->privateKey, $this->publicKey, $this->password, $options);
    }
}
