<?php

/**
 * OpenSSH Key Handler
 *
 * PHP version 5
 *
 * Place in $HOME/.ssh/authorized_keys
 *
 * @category  Crypt
 * @package   Common
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt\Common\Formats\Keys;

use ParagonIE\ConstantTime\Base64;
use phpseclib3\Common\Functions\Strings;
use phpseclib3\Crypt\Random;
use phpseclib3\Exception\UnsupportedFormatException;

/**
 * OpenSSH Formatted RSA Key Handler
 *
 * @package Common
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class OpenSSH
{
    /**
     * Default comment
     *
     * @var string
     * @access private
     */
    protected static $comment = 'phpseclib-generated-key';

    /**
     * Binary key flag
     *
     * @var bool
     * @access private
     */
    protected static $binary = false;

    /**
     * Sets the default comment
     *
     * @access public
     * @param string $comment
     */
    public static function setComment($comment)
    {
        self::$comment = str_replace(["\r", "\n"], '', $comment);
    }

    /**
     * Break a public or private key down into its constituent components
     *
     * $type can be either ssh-dss or ssh-rsa
     *
     * @access public
     * @param string $key
     * @param string $password
     * @return array
     */
    public static function load($key, $password = '')
    {
        if (!Strings::is_stringable($key)) {
            throw new \UnexpectedValueException('Key should be a string - not a ' . gettype($key));
        }

        // key format is described here:
        // https://cvsweb.openbsd.org/cgi-bin/cvsweb/src/usr.bin/ssh/PROTOCOL.key?annotate=HEAD

        if (strpos($key, 'BEGIN OPENSSH PRIVATE KEY') !== false) {
            $key = preg_replace('#(?:^-.*?-[\r\n]*$)|\s#ms', '', $key);
            $key = Base64::decode($key);
            $magic = Strings::shift($key, 15);
            if ($magic != "openssh-key-v1\0") {
                throw new \RuntimeException('Expected openssh-key-v1');
            }
            list($ciphername, $kdfname, $kdfoptions, $numKeys) = Strings::unpackSSH2('sssN', $key);
            if ($numKeys != 1) {
                // if we wanted to support multiple keys we could update PublicKeyLoader to preview what the # of keys
                // would be; it'd then call Common\Keys\OpenSSH.php::load() and get the paddedKey. it'd then pass
                // that to the appropriate key loading parser $numKey times or something
                throw new \RuntimeException('Although the OpenSSH private key format supports multiple keys phpseclib does not');
            }
            if (strlen($kdfoptions) || $kdfname != 'none' || $ciphername != 'none') {
                /*
                  OpenSSH private keys use a customized version of bcrypt. specifically, instead of encrypting
                  OrpheanBeholderScryDoubt 64 times OpenSSH's bcrypt variant encrypts
                  OxychromaticBlowfishSwatDynamite 64 times. so we can't use crypt().

                  bcrypt is basically Blowfish with an altered key expansion. whereas Blowfish just runs the
                  key through the key expansion bcrypt interleaves the key expansion with the salt and
                  password. this renders openssl / mcrypt unusuable. this forces us to use a pure-PHP implementation
                  of bcrypt. the problem with that is that pure-PHP is too slow to be practically useful.

                  in addition to encrypting a different string 64 times the OpenSSH implementation also performs bcrypt
                  from scratch $rounds times. calling crypt() 64x with bcrypt takes 0.7s. PHP is going to be naturally
                  slower. pure-PHP is 215x slower than OpenSSL for AES and pure-PHP is 43x slower for bcrypt.
                  43 * 0.7 = 30s. no one wants to wait 30s to load a private key.

                  another way to think about this..  according to wikipedia's article on Blowfish,
                  "Each new key requires pre-processing equivalent to encrypting about 4 kilobytes of text".
                  key expansion is done (9+64*2)*160 times. multiply that by 4 and it turns out that Blowfish,
                  OpenSSH style, is the equivalent of encrypting ~80mb of text.

                  more supporting evidence: sodium_compat does not implement Argon2 (another password hashing
                  algorithm) because "It's not feasible to polyfill scrypt or Argon2 into PHP and get reasonable
                  performance. Users would feel motivated to select parameters that downgrade security to avoid
                  denial of service (DoS) attacks. The only winning move is not to play"
                    -- https://github.com/paragonie/sodium_compat/blob/master/README.md
                */
                throw new \RuntimeException('Encrypted OpenSSH private keys are not supported');
                //list($salt, $rounds) = Strings::unpackSSH2('sN', $kdfoptions);
            }

            list($publicKey, $paddedKey) = Strings::unpackSSH2('ss', $key);
            list($type) = Strings::unpackSSH2('s', $publicKey);
            list($checkint1, $checkint2) = Strings::unpackSSH2('NN', $paddedKey);
            // any leftover bytes in $paddedKey are for padding? but they should be sequential bytes. eg. 1, 2, 3, etc.
            if ($checkint1 != $checkint2) {
                throw new \RuntimeException('The two checkints do not match');
            }
            self::checkType($type);

            return compact('type', 'publicKey', 'paddedKey');
        }

        $parts = explode(' ', $key, 3);

        if (!isset($parts[1])) {
            $key = base64_decode($parts[0]);
            $comment = isset($parts[1]) ? $parts[1] : false;
        } else {
            $asciiType = $parts[0];
            self::checkType($parts[0]);
            $key = base64_decode($parts[1]);
            $comment = isset($parts[2]) ? $parts[2] : false;
        }
        if ($key === false) {
            throw new \UnexpectedValueException('Key should be a string - not a ' . gettype($key));
        }

        list($type) = Strings::unpackSSH2('s', $key);
        self::checkType($type);
        if (isset($asciiType) && $asciiType != $type) {
            throw new \RuntimeException('Two different types of keys are claimed: ' . $asciiType . ' and ' . $type);
        }
        if (strlen($key) <= 4) {
            throw new \UnexpectedValueException('Key appears to be malformed');
        }

        $publicKey = $key;

        return compact('type', 'publicKey', 'comment');
    }

    /**
     * Toggle between binary and printable keys
     *
     * Printable keys are what are generated by default. These are the ones that go in
     * $HOME/.ssh/authorized_key.
     *
     * @access public
     * @param bool $enabled
     */
    public static function setBinaryOutput($enabled)
    {
        self::$binary = $enabled;
    }

    /**
     * Checks to see if the type is valid
     *
     * @access private
     * @param string $candidate
     */
    private static function checkType($candidate)
    {
        if (!in_array($candidate, static::$types)) {
            throw new \RuntimeException("The key type ($candidate) is not equal to: " . implode(',', static::$types));
        }
    }

    /**
     * Wrap a private key appropriately
     *
     * @access public
     * @param string $publicKey
     * @param string $privateKey
     * @param string $password
     * @param array $options
     * @return string
     */
    protected static function wrapPrivateKey($publicKey, $privateKey, $password, $options)
    {
        if (!empty($password) && is_string($password)) {
            throw new UnsupportedFormatException('Encrypted OpenSSH private keys are not supported');
        }

        list(, $checkint) = unpack('N', Random::string(4));

        $comment = isset($options['comment']) ? $options['comment'] : self::$comment;
        $paddedKey = Strings::packSSH2('NN', $checkint, $checkint) .
                     $privateKey .
                     Strings::packSSH2('s', $comment);

        /*
           from http://tools.ietf.org/html/rfc4253#section-6 :

           Note that the length of the concatenation of 'packet_length',
           'padding_length', 'payload', and 'random padding' MUST be a multiple
           of the cipher block size or 8, whichever is larger.
         */
        $paddingLength = (7 * strlen($paddedKey)) % 8;
        for ($i = 1; $i <= $paddingLength; $i++) {
            $paddedKey.= chr($i);
        }
        $key = Strings::packSSH2('sssNss', 'none', 'none', '', 1, $publicKey, $paddedKey);
        $key = "openssh-key-v1\0$key";

        return "-----BEGIN OPENSSH PRIVATE KEY-----\n" .
               chunk_split(Base64::encode($key), 70, "\n") .
               "-----END OPENSSH PRIVATE KEY-----\n";
    }
}
