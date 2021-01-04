<?php

/**
 * Pure-PHP PKCS#1 (v2.1) compliant implementation of RSA.
 *
 * PHP version 5
 *
 * Here's an example of how to encrypt and decrypt text with this library:
 * <code>
 * <?php
 * include 'vendor/autoload.php';
 *
 * $private = \phpseclib3\Crypt\RSA::createKey();
 * $public = $private->getPublicKey();
 *
 * $plaintext = 'terrafrost';
 *
 * $ciphertext = $public->encrypt($plaintext);
 *
 * echo $private->decrypt($ciphertext);
 * ?>
 * </code>
 *
 * Here's an example of how to create signatures and verify signatures with this library:
 * <code>
 * <?php
 * include 'vendor/autoload.php';
 *
 * $private = \phpseclib3\Crypt\RSA::createKey();
 * $public = $private->getPublicKey();
 *
 * $plaintext = 'terrafrost';
 *
 * $signature = $private->sign($plaintext);
 *
 * echo $public->verify($plaintext, $signature) ? 'verified' : 'unverified';
 * ?>
 * </code>
 *
 * One thing to consider when using this: so phpseclib uses PSS mode by default.
 * Technically, id-RSASSA-PSS has a different key format than rsaEncryption. So
 * should phpseclib save to the id-RSASSA-PSS format by default or the
 * rsaEncryption format? For stand-alone keys I figure rsaEncryption is better
 * because SSH doesn't use PSS and idk how many SSH servers would be able to
 * decode an id-RSASSA-PSS key. For X.509 certificates the id-RSASSA-PSS
 * format is used by default (unless you change it up to use PKCS1 instead)
 *
 * @category  Crypt
 * @package   RSA
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2009 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt;

use phpseclib3\Crypt\Common\AsymmetricKey;
use phpseclib3\Crypt\RSA\PrivateKey;
use phpseclib3\Crypt\RSA\PublicKey;
use phpseclib3\Math\BigInteger;
use phpseclib3\Exception\UnsupportedAlgorithmException;
use phpseclib3\Exception\InconsistentSetupException;
use phpseclib3\Crypt\RSA\Formats\Keys\PSS;

/**
 * Pure-PHP PKCS#1 compliant implementation of RSA.
 *
 * @package RSA
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class RSA extends AsymmetricKey
{
    /**
     * Algorithm Name
     *
     * @var string
     * @access private
     */
    const ALGORITHM = 'RSA';

    /**
     * Use {@link http://en.wikipedia.org/wiki/Optimal_Asymmetric_Encryption_Padding Optimal Asymmetric Encryption Padding}
     * (OAEP) for encryption / decryption.
     *
     * Uses sha256 by default
     *
     * @see self::setHash()
     * @see self::setMGFHash()
     * @access public
     * @see self::encrypt()
     * @see self::decrypt()
     */
    const ENCRYPTION_OAEP = 1;

    /**
     * Use PKCS#1 padding.
     *
     * Although self::PADDING_OAEP / self::PADDING_PSS  offers more security, including PKCS#1 padding is necessary for purposes of backwards
     * compatibility with protocols (like SSH-1) written before OAEP's introduction.
     *
     * @access public
     * @see self::encrypt()
     * @see self::decrypt()
     */
    const ENCRYPTION_PKCS1 = 2;

    /**
     * Do not use any padding
     *
     * Although this method is not recommended it can none-the-less sometimes be useful if you're trying to decrypt some legacy
     * stuff, if you're trying to diagnose why an encrypted message isn't decrypting, etc.
     *
     * @access public
     * @see self::encrypt()
     * @see self::decrypt()
     */
    const ENCRYPTION_NONE = 4;

    /**
     * Use the Probabilistic Signature Scheme for signing
     *
     * Uses sha256 and 0 as the salt length
     *
     * @see self::setSaltLength()
     * @see self::setMGFHash()
     * @see self::setHash()
     * @see self::sign()
     * @see self::verify()
     * @see self::setHash()
     * @access public
     */
    const SIGNATURE_PSS = 16;

    /**
     * Use a relaxed version of PKCS#1 padding for signature verification
     *
     * @see self::sign()
     * @see self::verify()
     * @see self::setHash()
     * @access public
     */
    const SIGNATURE_RELAXED_PKCS1 = 32;

    /**
     * Use PKCS#1 padding for signature verification
     *
     * @see self::sign()
     * @see self::verify()
     * @see self::setHash()
     * @access public
     */
    const SIGNATURE_PKCS1 = 64;

    /**
     * Encryption padding mode
     *
     * @var int
     * @access private
     */
    protected $encryptionPadding = self::ENCRYPTION_OAEP;

    /**
     * Signature padding mode
     *
     * @var int
     * @access private
     */
    protected $signaturePadding = self::SIGNATURE_PSS;

    /**
     * Length of hash function output
     *
     * @var int
     * @access private
     */
    protected $hLen;

    /**
     * Length of salt
     *
     * @var int
     * @access private
     */
    protected $sLen;

    /**
     * Label
     *
     * @var string
     * @access private
     */
    protected $label = '';

    /**
     * Hash function for the Mask Generation Function
     *
     * @var \phpseclib3\Crypt\Hash
     * @access private
     */
    protected $mgfHash;

    /**
     * Length of MGF hash function output
     *
     * @var int
     * @access private
     */
    protected $mgfHLen;

    /**
     * Modulus (ie. n)
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $modulus;

    /**
     * Modulus length
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $k;

    /**
     * Exponent (ie. e or d)
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $exponent;

    /**
     * Default public exponent
     *
     * @var int
     * @link http://en.wikipedia.org/wiki/65537_%28number%29
     * @access private
     */
    private static $defaultExponent = 65537;

    /**
     * Enable Blinding?
     *
     * @var bool
     * @access private
     */
    protected static $enableBlinding = true;

    /**
     * OpenSSL configuration file name.
     *
     * @see self::createKey()
     * @var ?string
     */
    protected static $configFile;

    /**
     * Smallest Prime
     *
     * Per <http://cseweb.ucsd.edu/~hovav/dist/survey.pdf#page=5>, this number ought not result in primes smaller
     * than 256 bits. As a consequence if the key you're trying to create is 1024 bits and you've set smallestPrime
     * to 384 bits then you're going to get a 384 bit prime and a 640 bit prime (384 + 1024 % 384). At least if
     * engine is set to self::ENGINE_INTERNAL. If Engine is set to self::ENGINE_OPENSSL then smallest Prime is
     * ignored (ie. multi-prime RSA support is more intended as a way to speed up RSA key generation when there's
     * a chance neither gmp nor OpenSSL are installed)
     *
     * @var int
     * @access private
     */
    private static $smallestPrime = 4096;

    /**
     * Sets the public exponent for key generation
     *
     * This will be 65537 unless changed.
     *
     * @access public
     * @param int $val
     */
    public static function setExponent($val)
    {
        self::$defaultExponent = $val;
    }

    /**
     * Sets the smallest prime number in bits. Used for key generation
     *
     * This will be 4096 unless changed.
     *
     * @access public
     * @param int $val
     */
    public static function setSmallestPrime($val)
    {
        self::$smallestPrime = $val;
    }

    /**
     * Sets the OpenSSL config file path
     *
     * Set to the empty string to use the default config file
     *
     * @access public
     * @param string $val
     */
    public static function setOpenSSLConfigPath($val)
    {
        self::$configFile = $val;
    }

    /**
     * Create a private key
     *
     * The public key can be extracted from the private key
     *
     * @return RSA
     * @access public
     * @param int $bits
<<<<<<< HEAD
=======
     * @param int $timeout
     * @param array $partial
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty
     */
    public static function createKey($bits = 2048)
    {
        self::initialize_static_variables();

        $regSize = $bits >> 1; // divide by two to see how many bits P and Q would be
        if ($regSize > self::$smallestPrime) {
            $num_primes = floor($bits / self::$smallestPrime);
            $regSize = self::$smallestPrime;
        } else {
            $num_primes = 2;
        }

        if ($num_primes == 2 && $bits >= 384 && self::$defaultExponent == 65537) {
            if (!isset(self::$engines['PHP'])) {
                self::useBestEngine();
            }

            // OpenSSL uses 65537 as the exponent and requires RSA keys be 384 bits minimum
            if (self::$engines['OpenSSL']) {
                $config = [];
                if (self::$configFile) {
                    $config['config'] = self::$configFile;
                }
                $rsa = openssl_pkey_new(['private_key_bits' => $bits] + $config);
                openssl_pkey_export($rsa, $privatekeystr, null, $config);

                // clear the buffer of error strings stemming from a minimalistic openssl.cnf
                while (openssl_error_string() !== false) {
                }

                return RSA::load($privatekeystr);
            }
        }

        static $e;
        if (!isset($e)) {
            $e = new BigInteger(self::$defaultExponent);
        }

        $n = clone self::$one;
        $exponents = $coefficients = $primes = [];
        $lcm = [
            'top' => clone self::$one,
            'bottom' => false
        ];

        do {
            for ($i = 1; $i <= $num_primes; $i++) {
                if ($i != $num_primes) {
                    $primes[$i] = BigInteger::randomPrime($regSize);
                } else {
                    extract(BigInteger::minMaxBits($bits));
                    /** @var BigInteger $min
                     *  @var BigInteger $max
                     */
                    list($min) = $min->divide($n);
                    $min = $min->add(self::$one);
                    list($max) = $max->divide($n);
                    $primes[$i] = BigInteger::randomRangePrime($min, $max);
                }

                // the first coefficient is calculated differently from the rest
                // ie. instead of being $primes[1]->modInverse($primes[2]), it's $primes[2]->modInverse($primes[1])
                if ($i > 2) {
                    $coefficients[$i] = $n->modInverse($primes[$i]);
                }

                $n = $n->multiply($primes[$i]);

                $temp = $primes[$i]->subtract(self::$one);

                // textbook RSA implementations use Euler's totient function instead of the least common multiple.
                // see http://en.wikipedia.org/wiki/Euler%27s_totient_function
                $lcm['top'] = $lcm['top']->multiply($temp);
                $lcm['bottom'] = $lcm['bottom'] === false ? $temp : $lcm['bottom']->gcd($temp);
            }

            list($temp) = $lcm['top']->divide($lcm['bottom']);
            $gcd = $temp->gcd($e);
            $i0 = 1;
        } while (!$gcd->equals(self::$one));

        $coefficients[2] = $primes[2]->modInverse($primes[1]);

        $d = $e->modInverse($temp);

        foreach ($primes as $i => $prime) {
            $temp = $prime->subtract(self::$one);
            $exponents[$i] = $e->modInverse($temp);
        }

        // from <http://tools.ietf.org/html/rfc3447#appendix-A.1.2>:
        // RSAPrivateKey ::= SEQUENCE {
        //     version           Version,
        //     modulus           INTEGER,  -- n
        //     publicExponent    INTEGER,  -- e
        //     privateExponent   INTEGER,  -- d
        //     prime1            INTEGER,  -- p
        //     prime2            INTEGER,  -- q
        //     exponent1         INTEGER,  -- d mod (p-1)
        //     exponent2         INTEGER,  -- d mod (q-1)
        //     coefficient       INTEGER,  -- (inverse of q) mod p
        //     otherPrimeInfos   OtherPrimeInfos OPTIONAL
        // }
        $privatekey = new PrivateKey;
        $privatekey->modulus = $n;
        $privatekey->k = $bits >> 3;
        $privatekey->publicExponent = $e;
        $privatekey->exponent = $d;
        $privatekey->privateExponent = $e;
        $privatekey->primes = $primes;
        $privatekey->exponents = $exponents;
        $privatekey->coefficients = $coefficients;

        /*
        $publickey = new PublicKey;
        $publickey->modulus = $n;
        $publickey->k = $bits >> 3;
        $publickey->exponent = $e;
        $publickey->publicExponent = $e;
        $publickey->isPublic = true;
        */

        return $privatekey;
    }

    /**
     * OnLoad Handler
     *
<<<<<<< HEAD
     * @return bool
     * @access protected
     * @param array $components
=======
     * @access private
     * @see self::setPrivateKeyFormat()
     * @param Math_BigInteger $n
     * @param Math_BigInteger $e
     * @param Math_BigInteger $d
     * @param array<int,Math_BigInteger> $primes
     * @param array<int,Math_BigInteger> $exponents
     * @param array<int,Math_BigInteger> $coefficients
     * @return string
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty
     */
    protected static function onLoad($components)
    {
        $key = $components['isPublicKey'] ?
            new PublicKey :
            new PrivateKey;

        $key->modulus = $components['modulus'];
        $key->publicExponent = $components['publicExponent'];
        $key->k = $key->modulus->getLengthInBytes();

        if ($components['isPublicKey'] || !isset($components['privateExponent'])) {
            $key->exponent = $key->publicExponent;
        } else {
            $key->privateExponent = $components['privateExponent'];
            $key->exponent = $key->privateExponent;
            $key->primes = $components['primes'];
            $key->exponents = $components['exponents'];
            $key->coefficients = $components['coefficients'];
        }

        if ($components['format'] == PSS::class) {
            // in the X509 world RSA keys are assumed to use PKCS1 padding by default. only if the key is
            // explicitly a PSS key is the use of PSS assumed. phpseclib does not work like this. phpseclib
            // uses PSS padding by default. it assumes the more secure method by default and altho it provides
            // for the less secure PKCS1 method you have to go out of your way to use it. this is consistent
            // with the latest trends in crypto. libsodium (NaCl) is actually a little more extreme in that
            // not only does it defaults to the most secure methods - it doesn't even let you choose less
            // secure methods
            //$key = $key->withPadding(self::SIGNATURE_PSS);
            if (isset($components['hash'])) {
                $key = $key->withHash($components['hash']);
            }
            if (isset($components['MGFHash'])) {
                $key = $key->withMGFHash($components['MGFHash']);
            }
            if (isset($components['saltLength'])) {
                $key = $key->withSaltLength($components['saltLength']);
            }
        }

        return $key;
    }

    /**
     * Initialize static variables
     */
    protected static function initialize_static_variables()
    {
        if (!isset(self::$configFile)) {
            self::$configFile = dirname(__FILE__) . '/../openssl.cnf';
        }

        parent::initialize_static_variables();
    }

    /**
     * Constructor
     *
<<<<<<< HEAD
     * PublicKey and PrivateKey objects can only be created from abstract RSA class
=======
     * @access private
     * @see self::setPublicKeyFormat()
     * @param Math_BigInteger $n
     * @param Math_BigInteger $e
     * @return string|array<string,Math_BigInteger>
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty
     */
    protected function __construct()
    {
        parent::__construct();

        $this->hLen = $this->hash->getLengthInBytes();
        $this->mgfHash = new Hash('sha256');
        $this->mgfHLen = $this->mgfHash->getLengthInBytes();
    }

    /**
     * Integer-to-Octet-String primitive
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-4.1 RFC3447#section-4.1}.
     *
     * @access private
     * @param bool|\phpseclib3\Math\BigInteger $x
     * @param int $xLen
     * @return bool|string
     */
    protected function i2osp($x, $xLen)
    {
        if ($x === false) {
            return false;
        }
<<<<<<< HEAD
        $x = $x->toBytes();
        if (strlen($x) > $xLen) {
            throw new \OutOfRangeException('Resultant string length out of range');
        }
        return str_pad($x, $xLen, chr(0), STR_PAD_LEFT);
    }
=======

        switch ($type) {
            case self::PUBLIC_FORMAT_RAW:
                if (!is_array($key)) {
                    return false;
                }
                $components = array();
                switch (true) {
                    case isset($key['e']):
                        $components['publicExponent'] = $key['e']->copy();
                        break;
                    case isset($key['exponent']):
                        $components['publicExponent'] = $key['exponent']->copy();
                        break;
                    case isset($key['publicExponent']):
                        $components['publicExponent'] = $key['publicExponent']->copy();
                        break;
                    case isset($key[0]):
                        $components['publicExponent'] = $key[0]->copy();
                }
                switch (true) {
                    case isset($key['n']):
                        $components['modulus'] = $key['n']->copy();
                        break;
                    case isset($key['modulo']):
                        $components['modulus'] = $key['modulo']->copy();
                        break;
                    case isset($key['modulus']):
                        $components['modulus'] = $key['modulus']->copy();
                        break;
                    case isset($key[1]):
                        $components['modulus'] = $key[1]->copy();
                }
                return isset($components['modulus']) && isset($components['publicExponent']) ? $components : false;
            case self::PRIVATE_FORMAT_PKCS1:
            case self::PRIVATE_FORMAT_PKCS8:
            case self::PUBLIC_FORMAT_PKCS1:
                /* Although PKCS#1 proposes a format that public and private keys can use, encrypting them is
                   "outside the scope" of PKCS#1.  PKCS#1 then refers you to PKCS#12 and PKCS#15 if you're wanting to
                   protect private keys, however, that's not what OpenSSL* does.  OpenSSL protects private keys by adding
                   two new "fields" to the key - DEK-Info and Proc-Type.  These fields are discussed here:

                   http://tools.ietf.org/html/rfc1421#section-4.6.1.1
                   http://tools.ietf.org/html/rfc1421#section-4.6.1.3

                   DES-EDE3-CBC as an algorithm, however, is not discussed anywhere, near as I can tell.
                   DES-CBC and DES-EDE are discussed in RFC1423, however, DES-EDE3-CBC isn't, nor is its key derivation
                   function.  As is, the definitive authority on this encoding scheme isn't the IETF but rather OpenSSL's
                   own implementation.  ie. the implementation *is* the standard and any bugs that may exist in that
                   implementation are part of the standard, as well.

                   * OpenSSL is the de facto standard.  It's utilized by OpenSSH and other projects */
                if (preg_match('#DEK-Info: (.+),(.+)#', $key, $matches)) {
                    $iv = pack('H*', trim($matches[2]));
                    $symkey = pack('H*', md5($this->password . substr($iv, 0, 8))); // symkey is short for symmetric key
                    $symkey.= pack('H*', md5($symkey . $this->password . substr($iv, 0, 8)));
                    // remove the Proc-Type / DEK-Info sections as they're no longer needed
                    $key = preg_replace('#^(?:Proc-Type|DEK-Info): .*#m', '', $key);
                    $ciphertext = $this->_extractBER($key);
                    if ($ciphertext === false) {
                        $ciphertext = $key;
                    }
                    switch ($matches[1]) {
                        case 'AES-256-CBC':
                            $crypto = new AES();
                            break;
                        case 'AES-128-CBC':
                            $symkey = substr($symkey, 0, 16);
                            $crypto = new AES();
                            break;
                        case 'DES-EDE3-CFB':
                            $crypto = new TripleDES(Base::MODE_CFB);
                            break;
                        case 'DES-EDE3-CBC':
                            $symkey = substr($symkey, 0, 24);
                            $crypto = new TripleDES();
                            break;
                        case 'DES-CBC':
                            $crypto = new DES();
                            break;
                        default:
                            return false;
                    }
                    $crypto->setKey($symkey);
                    $crypto->setIV($iv);
                    $decoded = $crypto->decrypt($ciphertext);
                } else {
                    $decoded = $this->_extractBER($key);
                }

                if ($decoded !== false) {
                    $key = $decoded;
                }

                $components = array();

                if (ord($this->_string_shift($key)) != self::ASN1_SEQUENCE) {
                    return false;
                }
                if ($this->_decodeLength($key) != strlen($key)) {
                    return false;
                }

                $tag = ord($this->_string_shift($key));
                /* intended for keys for which OpenSSL's asn1parse returns the following:

                    0:d=0  hl=4 l= 631 cons: SEQUENCE
                    4:d=1  hl=2 l=   1 prim:  INTEGER           :00
                    7:d=1  hl=2 l=  13 cons:  SEQUENCE
                    9:d=2  hl=2 l=   9 prim:   OBJECT            :rsaEncryption
                   20:d=2  hl=2 l=   0 prim:   NULL
                   22:d=1  hl=4 l= 609 prim:  OCTET STRING

                   ie. PKCS8 keys*/

                if ($tag == self::ASN1_INTEGER && substr($key, 0, 3) == "\x01\x00\x30") {
                    $this->_string_shift($key, 3);
                    $tag = self::ASN1_SEQUENCE;
                }

                if ($tag == self::ASN1_SEQUENCE) {
                    $temp = $this->_string_shift($key, $this->_decodeLength($key));
                    if (ord($this->_string_shift($temp)) != self::ASN1_OBJECT) {
                        return false;
                    }
                    $length = $this->_decodeLength($temp);
                    switch ($this->_string_shift($temp, $length)) {
                        case "\x2a\x86\x48\x86\xf7\x0d\x01\x01\x01": // rsaEncryption
                            break;
                        case "\x2a\x86\x48\x86\xf7\x0d\x01\x05\x03": // pbeWithMD5AndDES-CBC
                            /*
                               PBEParameter ::= SEQUENCE {
                                   salt OCTET STRING (SIZE(8)),
                                   iterationCount INTEGER }
                            */
                            if (ord($this->_string_shift($temp)) != self::ASN1_SEQUENCE) {
                                return false;
                            }
                            if ($this->_decodeLength($temp) != strlen($temp)) {
                                return false;
                            }
                            $this->_string_shift($temp); // assume it's an octet string
                            $salt = $this->_string_shift($temp, $this->_decodeLength($temp));
                            if (ord($this->_string_shift($temp)) != self::ASN1_INTEGER) {
                                return false;
                            }
                            $this->_decodeLength($temp);
                            list(, $iterationCount) = unpack('N', str_pad($temp, 4, chr(0), STR_PAD_LEFT));
                            $this->_string_shift($key); // assume it's an octet string
                            $length = $this->_decodeLength($key);
                            if (strlen($key) != $length) {
                                return false;
                            }

                            $crypto = new DES();
                            $crypto->setPassword($this->password, 'pbkdf1', 'md5', $salt, $iterationCount);
                            $key = $crypto->decrypt($key);
                            if ($key === false) {
                                return false;
                            }
                            return $this->_parseKey($key, self::PRIVATE_FORMAT_PKCS1);
                        default:
                            return false;
                    }
                    /* intended for keys for which OpenSSL's asn1parse returns the following:

                        0:d=0  hl=4 l= 290 cons: SEQUENCE
                        4:d=1  hl=2 l=  13 cons:  SEQUENCE
                        6:d=2  hl=2 l=   9 prim:   OBJECT            :rsaEncryption
                       17:d=2  hl=2 l=   0 prim:   NULL
                       19:d=1  hl=4 l= 271 prim:  BIT STRING */
                    $tag = ord($this->_string_shift($key)); // skip over the BIT STRING / OCTET STRING tag
                    $this->_decodeLength($key); // skip over the BIT STRING / OCTET STRING length
                    // "The initial octet shall encode, as an unsigned binary integer wtih bit 1 as the least significant bit, the number of
                    //  unused bits in the final subsequent octet. The number shall be in the range zero to seven."
                    //  -- http://www.itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf (section 8.6.2.2)
                    if ($tag == self::ASN1_BITSTRING) {
                        $this->_string_shift($key);
                    }
                    if (ord($this->_string_shift($key)) != self::ASN1_SEQUENCE) {
                        return false;
                    }
                    if ($this->_decodeLength($key) != strlen($key)) {
                        return false;
                    }
                    $tag = ord($this->_string_shift($key));
                }
                if ($tag != self::ASN1_INTEGER) {
                    return false;
                }

                $length = $this->_decodeLength($key);
                $temp = $this->_string_shift($key, $length);
                if (strlen($temp) != 1 || ord($temp) > 2) {
                    $components['modulus'] = new BigInteger($temp, 256);
                    $this->_string_shift($key); // skip over self::ASN1_INTEGER
                    $length = $this->_decodeLength($key);
                    $components[$type == self::PUBLIC_FORMAT_PKCS1 ? 'publicExponent' : 'privateExponent'] = new BigInteger($this->_string_shift($key, $length), 256);

                    return $components;
                }
                if (ord($this->_string_shift($key)) != self::ASN1_INTEGER) {
                    return false;
                }
                $length = $this->_decodeLength($key);
                $components['modulus'] = new BigInteger($this->_string_shift($key, $length), 256);
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['publicExponent'] = new BigInteger($this->_string_shift($key, $length), 256);
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['privateExponent'] = new BigInteger($this->_string_shift($key, $length), 256);
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['primes'] = array(1 => new BigInteger($this->_string_shift($key, $length), 256));
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['primes'][] = new BigInteger($this->_string_shift($key, $length), 256);
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['exponents'] = array(1 => new BigInteger($this->_string_shift($key, $length), 256));
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['exponents'][] = new BigInteger($this->_string_shift($key, $length), 256);
                $this->_string_shift($key);
                $length = $this->_decodeLength($key);
                $components['coefficients'] = array(2 => new BigInteger($this->_string_shift($key, $length), 256));

                if (!empty($key)) {
                    if (ord($this->_string_shift($key)) != self::ASN1_SEQUENCE) {
                        return false;
                    }
                    $this->_decodeLength($key);
                    while (!empty($key)) {
                        if (ord($this->_string_shift($key)) != self::ASN1_SEQUENCE) {
                            return false;
                        }
                        $this->_decodeLength($key);
                        $key = substr($key, 1);
                        $length = $this->_decodeLength($key);
                        $components['primes'][] = new BigInteger($this->_string_shift($key, $length), 256);
                        $this->_string_shift($key);
                        $length = $this->_decodeLength($key);
                        $components['exponents'][] = new BigInteger($this->_string_shift($key, $length), 256);
                        $this->_string_shift($key);
                        $length = $this->_decodeLength($key);
                        $components['coefficients'][] = new BigInteger($this->_string_shift($key, $length), 256);
                    }
                }

                return $components;
            case self::PUBLIC_FORMAT_OPENSSH:
                $parts = explode(' ', $key, 3);

                $key = isset($parts[1]) ? base64_decode($parts[1]) : false;
                if ($key === false) {
                    return false;
                }

                $comment = isset($parts[2]) ? $parts[2] : false;

                $cleanup = substr($key, 0, 11) == "\0\0\0\7ssh-rsa";

                if (strlen($key) <= 4) {
                    return false;
                }
                extract(unpack('Nlength', $this->_string_shift($key, 4)));
                $publicExponent = new BigInteger($this->_string_shift($key, $length), -256);
                if (strlen($key) <= 4) {
                    return false;
                }
                extract(unpack('Nlength', $this->_string_shift($key, 4)));
                $modulus = new BigInteger($this->_string_shift($key, $length), -256);

                if ($cleanup && strlen($key)) {
                    if (strlen($key) <= 4) {
                        return false;
                    }
                    extract(unpack('Nlength', $this->_string_shift($key, 4)));
                    $realModulus = new BigInteger($this->_string_shift($key, $length), -256);
                    return strlen($key) ? false : array(
                        'modulus' => $realModulus,
                        'publicExponent' => $modulus,
                        'comment' => $comment
                    );
                } else {
                    return strlen($key) ? false : array(
                        'modulus' => $modulus,
                        'publicExponent' => $publicExponent,
                        'comment' => $comment
                    );
                }
            // http://www.w3.org/TR/xmldsig-core/#sec-RSAKeyValue
            // http://en.wikipedia.org/wiki/XML_Signature
            case self::PRIVATE_FORMAT_XML:
            case self::PUBLIC_FORMAT_XML:
                $this->components = array();

                $xml = xml_parser_create('UTF-8');
                xml_set_object($xml, $this);
                xml_set_element_handler($xml, '_start_element_handler', '_stop_element_handler');
                xml_set_character_data_handler($xml, '_data_handler');
                // add <xml></xml> to account for "dangling" tags like <BitStrength>...</BitStrength> that are sometimes added
                if (!xml_parse($xml, '<xml>' . $key . '</xml>')) {
                    xml_parser_free($xml);
                    unset($xml);
                    return false;
                }

                xml_parser_free($xml);
                unset($xml);

                return isset($this->components['modulus']) && isset($this->components['publicExponent']) ? $this->components : false;
            // from PuTTY's SSHPUBK.C
            case self::PRIVATE_FORMAT_PUTTY:
                $components = array();
                $key = preg_split('#\r\n|\r|\n#', $key);
                $type = trim(preg_replace('#PuTTY-User-Key-File-2: (.+)#', '$1', $key[0]));
                if ($type != 'ssh-rsa') {
                    return false;
                }
                $encryption = trim(preg_replace('#Encryption: (.+)#', '$1', $key[1]));
                $comment = trim(preg_replace('#Comment: (.+)#', '$1', $key[2]));

                $publicLength = trim(preg_replace('#Public-Lines: (\d+)#', '$1', $key[3]));
                $public = base64_decode(implode('', array_map('trim', array_slice($key, 4, $publicLength))));
                $public = substr($public, 11);
                extract(unpack('Nlength', $this->_string_shift($public, 4)));
                $components['publicExponent'] = new BigInteger($this->_string_shift($public, $length), -256);
                extract(unpack('Nlength', $this->_string_shift($public, 4)));
                $components['modulus'] = new BigInteger($this->_string_shift($public, $length), -256);

                $privateLength = trim(preg_replace('#Private-Lines: (\d+)#', '$1', $key[$publicLength + 4]));
                $private = base64_decode(implode('', array_map('trim', array_slice($key, $publicLength + 5, $privateLength))));

                switch ($encryption) {
                    case 'aes256-cbc':
                        $symkey = '';
                        $sequence = 0;
                        while (strlen($symkey) < 32) {
                            $temp = pack('Na*', $sequence++, $this->password);
                            $symkey.= pack('H*', sha1($temp));
                        }
                        $symkey = substr($symkey, 0, 32);
                        $crypto = new AES();
                }

                if ($encryption != 'none') {
                    $crypto->setKey($symkey);
                    $crypto->disablePadding();
                    $private = $crypto->decrypt($private);
                    if ($private === false) {
                        return false;
                    }
                }

                extract(unpack('Nlength', $this->_string_shift($private, 4)));
                if (strlen($private) < $length) {
                    return false;
                }
                $components['privateExponent'] = new BigInteger($this->_string_shift($private, $length), -256);
                extract(unpack('Nlength', $this->_string_shift($private, 4)));
                if (strlen($private) < $length) {
                    return false;
                }
                $components['primes'] = array(1 => new BigInteger($this->_string_shift($private, $length), -256));
                extract(unpack('Nlength', $this->_string_shift($private, 4)));
                if (strlen($private) < $length) {
                    return false;
                }
                $components['primes'][] = new BigInteger($this->_string_shift($private, $length), -256);

                $temp = $components['primes'][1]->subtract($this->one);
                $components['exponents'] = array(1 => $components['publicExponent']->modInverse($temp));
                $temp = $components['primes'][2]->subtract($this->one);
                $components['exponents'][] = $components['publicExponent']->modInverse($temp);

                extract(unpack('Nlength', $this->_string_shift($private, 4)));
                if (strlen($private) < $length) {
                    return false;
                }
                $components['coefficients'] = array(2 => new BigInteger($this->_string_shift($private, $length), -256));

                return $components;
            case self::PRIVATE_FORMAT_OPENSSH:
                $components = array();
                $decoded = $this->_extractBER($key);
                $magic = $this->_string_shift($decoded, 15);
                if ($magic !== "openssh-key-v1\0") {
                    return false;
                }
                $options = $this->_string_shift($decoded, 24);
                // \0\0\0\4none = ciphername
                // \0\0\0\4none = kdfname
                // \0\0\0\0 = kdfoptions
                // \0\0\0\1 = numkeys
                if ($options != "\0\0\0\4none\0\0\0\4none\0\0\0\0\0\0\0\1") {
                    return false;
                }
                extract(unpack('Nlength', $this->_string_shift($decoded, 4)));
                if (strlen($decoded) < $length) {
                    return false;
                }
                $publicKey = $this->_string_shift($decoded, $length);
                extract(unpack('Nlength', $this->_string_shift($decoded, 4)));
                if (strlen($decoded) < $length) {
                    return false;
                }
                $paddedKey = $this->_string_shift($decoded, $length);

                if ($this->_string_shift($publicKey, 11) !== "\0\0\0\7ssh-rsa") {
                    return false;
                }

                $checkint1 = $this->_string_shift($paddedKey, 4);
                $checkint2 = $this->_string_shift($paddedKey, 4);
                if (strlen($checkint1) != 4 || $checkint1 !== $checkint2) {
                    return false;
                }

                if ($this->_string_shift($paddedKey, 11) !== "\0\0\0\7ssh-rsa") {
                    return false;
                }

                $values = array(
                    &$components['modulus'],
                    &$components['publicExponent'],
                    &$components['privateExponent'],
                    &$components['coefficients'][2],
                    &$components['primes'][1],
                    &$components['primes'][2]
                );

                foreach ($values as &$value) {
                    extract(unpack('Nlength', $this->_string_shift($paddedKey, 4)));
                    if (strlen($paddedKey) < $length) {
                        return false;
                    }
                    $value = new BigInteger($this->_string_shift($paddedKey, $length), -256);
                }

                extract(unpack('Nlength', $this->_string_shift($paddedKey, 4)));
                if (strlen($paddedKey) < $length) {
                    return false;
                }
                $components['comment'] = $this->_string_shift($decoded, $length);

                $temp = $components['primes'][1]->subtract($this->one);
                $components['exponents'] = array(1 => $components['publicExponent']->modInverse($temp));
                $temp = $components['primes'][2]->subtract($this->one);
                $components['exponents'][] = $components['publicExponent']->modInverse($temp);

                return $components;
        }

        return false;
    }

    /**
     * Returns the key size
     *
     * More specifically, this returns the size of the modulo in bits.
     *
     * @access public
     * @return int
     */
    function getSize()
    {
        return !isset($this->modulus) ? 0 : strlen($this->modulus->toBits());
    }

    /**
     * Start Element Handler
     *
     * Called by xml_set_element_handler()
     *
     * @access private
     * @param resource $parser
     * @param string $name
     * @param array $attribs
     */
    function _start_element_handler($parser, $name, $attribs)
    {
        //$name = strtoupper($name);
        switch ($name) {
            case 'MODULUS':
                $this->current = &$this->components['modulus'];
                break;
            case 'EXPONENT':
                $this->current = &$this->components['publicExponent'];
                break;
            case 'P':
                $this->current = &$this->components['primes'][1];
                break;
            case 'Q':
                $this->current = &$this->components['primes'][2];
                break;
            case 'DP':
                $this->current = &$this->components['exponents'][1];
                break;
            case 'DQ':
                $this->current = &$this->components['exponents'][2];
                break;
            case 'INVERSEQ':
                $this->current = &$this->components['coefficients'][2];
                break;
            case 'D':
                $this->current = &$this->components['privateExponent'];
        }
        $this->current = '';
    }

    /**
     * Stop Element Handler
     *
     * Called by xml_set_element_handler()
     *
     * @access private
     * @param resource $parser
     * @param string $name
     */
    function _stop_element_handler($parser, $name)
    {
        if (isset($this->current)) {
            $this->current = new BigInteger(base64_decode($this->current), 256);
            unset($this->current);
        }
    }

    /**
     * Data Handler
     *
     * Called by xml_set_character_data_handler()
     *
     * @access private
     * @param resource $parser
     * @param string $data
     */
    function _data_handler($parser, $data)
    {
        if (!isset($this->current) || is_object($this->current)) {
            return;
        }
        $this->current.= trim($data);
    }

    /**
     * Loads a public or private key
     *
     * Returns true on success and false on failure (ie. an incorrect password was provided or the key was malformed)
     *
     * @access public
     * @param string|RSA|array $key
     * @param bool|int $type optional
     * @return bool
     */
    function loadKey($key, $type = false)
    {
        if ($key instanceof RSA) {
            $this->privateKeyFormat = $key->privateKeyFormat;
            $this->publicKeyFormat = $key->publicKeyFormat;
            $this->k = $key->k;
            $this->hLen = $key->hLen;
            $this->sLen = $key->sLen;
            $this->mgfHLen = $key->mgfHLen;
            $this->encryptionMode = $key->encryptionMode;
            $this->signatureMode = $key->signatureMode;
            $this->password = $key->password;
            $this->configFile = $key->configFile;
            $this->comment = $key->comment;

            if (is_object($key->hash)) {
                $this->hash = new Hash($key->hash->getHash());
            }
            if (is_object($key->mgfHash)) {
                $this->mgfHash = new Hash($key->mgfHash->getHash());
            }

            if (is_object($key->modulus)) {
                $this->modulus = $key->modulus->copy();
            }
            if (is_object($key->exponent)) {
                $this->exponent = $key->exponent->copy();
            }
            if (is_object($key->publicExponent)) {
                $this->publicExponent = $key->publicExponent->copy();
            }

            $this->primes = array();
            $this->exponents = array();
            $this->coefficients = array();

            foreach ($this->primes as $prime) {
                $this->primes[] = $prime->copy();
            }
            foreach ($this->exponents as $exponent) {
                $this->exponents[] = $exponent->copy();
            }
            foreach ($this->coefficients as $coefficient) {
                $this->coefficients[] = $coefficient->copy();
            }

            return true;
        }

        if ($type === false) {
            $types = array(
                self::PUBLIC_FORMAT_RAW,
                self::PRIVATE_FORMAT_PKCS1,
                self::PRIVATE_FORMAT_XML,
                self::PRIVATE_FORMAT_PUTTY,
                self::PUBLIC_FORMAT_OPENSSH,
                self::PRIVATE_FORMAT_OPENSSH
            );
            foreach ($types as $type) {
                $components = $this->_parseKey($key, $type);
                if ($components !== false) {
                    break;
                }
            }
        } else {
            $components = $this->_parseKey($key, $type);
        }

        if ($components === false) {
            $this->comment = null;
            $this->modulus = null;
            $this->k = null;
            $this->exponent = null;
            $this->primes = null;
            $this->exponents = null;
            $this->coefficients = null;
            $this->publicExponent = null;

            return false;
        }

        if (isset($components['comment']) && $components['comment'] !== false) {
            $this->comment = $components['comment'];
        }
        $this->modulus = $components['modulus'];
        $this->k = strlen($this->modulus->toBytes());
        $this->exponent = isset($components['privateExponent']) ? $components['privateExponent'] : $components['publicExponent'];
        if (isset($components['primes'])) {
            $this->primes = $components['primes'];
            $this->exponents = $components['exponents'];
            $this->coefficients = $components['coefficients'];
            $this->publicExponent = $components['publicExponent'];
        } else {
            $this->primes = array();
            $this->exponents = array();
            $this->coefficients = array();
            $this->publicExponent = false;
        }

        switch ($type) {
            case self::PUBLIC_FORMAT_OPENSSH:
            case self::PUBLIC_FORMAT_RAW:
                $this->setPublicKey();
                break;
            case self::PRIVATE_FORMAT_PKCS1:
                switch (true) {
                    case strpos($key, '-BEGIN PUBLIC KEY-') !== false:
                    case strpos($key, '-BEGIN RSA PUBLIC KEY-') !== false:
                        $this->setPublicKey();
                }
        }

        return true;
    }

    /**
     * Sets the password
     *
     * Private keys can be encrypted with a password.  To unset the password, pass in the empty string or false.
     * Or rather, pass in $password such that empty($password) && !is_string($password) is true.
     *
     * @see self::createKey()
     * @see self::loadKey()
     * @access public
     * @param string $password
     */
    function setPassword($password = false)
    {
        $this->password = $password;
    }

    /**
     * Defines the public key
     *
     * Some private key formats define the public exponent and some don't.  Those that don't define it are problematic when
     * used in certain contexts.  For example, in SSH-2, RSA authentication works by sending the public key along with a
     * message signed by the private key to the server.  The SSH-2 server looks the public key up in an index of public keys
     * and if it's present then proceeds to verify the signature.  Problem is, if your private key doesn't include the public
     * exponent this won't work unless you manually add the public exponent. phpseclib tries to guess if the key being used
     * is the public key but in the event that it guesses incorrectly you might still want to explicitly set the key as being
     * public.
     *
     * Do note that when a new key is loaded the index will be cleared.
     *
     * Returns true on success, false on failure
     *
     * @see self::getPublicKey()
     * @access public
     * @param string $key optional
     * @param int $type optional
     * @return bool
     */
    function setPublicKey($key = false, $type = false)
    {
        // if a public key has already been loaded return false
        if (!empty($this->publicExponent)) {
            return false;
        }

        if ($key === false && !empty($this->modulus)) {
            $this->publicExponent = $this->exponent;
            return true;
        }

        if ($type === false) {
            $types = array(
                self::PUBLIC_FORMAT_RAW,
                self::PUBLIC_FORMAT_PKCS1,
                self::PUBLIC_FORMAT_XML,
                self::PUBLIC_FORMAT_OPENSSH
            );
            foreach ($types as $type) {
                $components = $this->_parseKey($key, $type);
                if ($components !== false) {
                    break;
                }
            }
        } else {
            $components = $this->_parseKey($key, $type);
        }

        if ($components === false) {
            return false;
        }

        if (empty($this->modulus) || !$this->modulus->equals($components['modulus'])) {
            $this->modulus = $components['modulus'];
            $this->exponent = $this->publicExponent = $components['publicExponent'];
            return true;
        }

        $this->publicExponent = $components['publicExponent'];

        return true;
    }

    /**
     * Defines the private key
     *
     * If phpseclib guessed a private key was a public key and loaded it as such it might be desirable to force
     * phpseclib to treat the key as a private key. This function will do that.
     *
     * Do note that when a new key is loaded the index will be cleared.
     *
     * Returns true on success, false on failure
     *
     * @see self::getPublicKey()
     * @access public
     * @param string $key optional
     * @param int $type optional
     * @return bool
     */
    function setPrivateKey($key = false, $type = false)
    {
        if ($key === false && !empty($this->publicExponent)) {
            $this->publicExponent = false;
            return true;
        }

        $rsa = new RSA();
        if (!$rsa->loadKey($key, $type)) {
            return false;
        }
        $rsa->publicExponent = false;

        // don't overwrite the old key if the new key is invalid
        $this->loadKey($rsa);
        return true;
    }

    /**
     * Returns the public key
     *
     * The public key is only returned under two circumstances - if the private key had the public key embedded within it
     * or if the public key was set via setPublicKey().  If the currently loaded key is supposed to be the public key this
     * function won't return it since this library, for the most part, doesn't distinguish between public and private keys.
     *
     * @see self::getPublicKey()
     * @access public
     * @param int $type optional
     */
    function getPublicKey($type = self::PUBLIC_FORMAT_PKCS8)
    {
        if (empty($this->modulus) || empty($this->publicExponent)) {
            return false;
        }

        $oldFormat = $this->publicKeyFormat;
        $this->publicKeyFormat = $type;
        $temp = $this->_convertPublicKey($this->modulus, $this->publicExponent);
        $this->publicKeyFormat = $oldFormat;
        return $temp;
    }

    /**
     * Returns the public key's fingerprint
     *
     * The public key's fingerprint is returned, which is equivalent to running `ssh-keygen -lf rsa.pub`. If there is
     * no public key currently loaded, false is returned.
     * Example output (md5): "c1:b1:30:29:d7:b8:de:6c:97:77:10:d7:46:41:63:87" (as specified by RFC 4716)
     *
     * @access public
     * @param string $algorithm The hashing algorithm to be used. Valid options are 'md5' and 'sha256'. False is returned
     * for invalid values.
     * @return mixed
     */
    function getPublicKeyFingerprint($algorithm = 'md5')
    {
        if (empty($this->modulus) || empty($this->publicExponent)) {
            return false;
        }

        $modulus = $this->modulus->toBytes(true);
        $publicExponent = $this->publicExponent->toBytes(true);

        $RSAPublicKey = pack('Na*Na*Na*', strlen('ssh-rsa'), 'ssh-rsa', strlen($publicExponent), $publicExponent, strlen($modulus), $modulus);

        switch ($algorithm) {
            case 'sha256':
                $hash = new Hash('sha256');
                $base = base64_encode($hash->hash($RSAPublicKey));
                return substr($base, 0, strlen($base) - 1);
            case 'md5':
                return substr(chunk_split(md5($RSAPublicKey), 2, ':'), 0, -1);
            default:
                return false;
        }
    }

    /**
     * Returns the private key
     *
     * The private key is only returned if the currently loaded key contains the constituent prime numbers.
     *
     * @see self::getPublicKey()
     * @access public
     * @param int $type optional
     * @return mixed
     */
    function getPrivateKey($type = self::PUBLIC_FORMAT_PKCS1)
    {
        if (empty($this->primes)) {
            return false;
        }

        $oldFormat = $this->privateKeyFormat;
        $this->privateKeyFormat = $type;
        $temp = $this->_convertPrivateKey($this->modulus, $this->publicExponent, $this->exponent, $this->primes, $this->exponents, $this->coefficients);
        $this->privateKeyFormat = $oldFormat;
        return $temp;
    }

    /**
     * Returns a minimalistic private key
     *
     * Returns the private key without the prime number constituants.  Structurally identical to a public key that
     * hasn't been set as the public key
     *
     * @see self::getPrivateKey()
     * @access private
     * @param int $mode optional
     */
    function _getPrivatePublicKey($mode = self::PUBLIC_FORMAT_PKCS8)
    {
        if (empty($this->modulus) || empty($this->exponent)) {
            return false;
        }

        $oldFormat = $this->publicKeyFormat;
        $this->publicKeyFormat = $mode;
        $temp = $this->_convertPublicKey($this->modulus, $this->exponent);
        $this->publicKeyFormat = $oldFormat;
        return $temp;
    }

    /**
     *  __toString() magic method
     *
     * @access public
     * @return string
     */
    function __toString()
    {
        $key = $this->getPrivateKey($this->privateKeyFormat);
        if ($key !== false) {
            return $key;
        }
        $key = $this->_getPrivatePublicKey($this->publicKeyFormat);
        return $key !== false ? $key : '';
    }

    /**
     *  __clone() magic method
     *
     * @access public
     * @return Crypt_RSA
     */
    function __clone()
    {
        $key = new RSA();
        $key->loadKey($this);
        return $key;
    }

    /**
     * Generates the smallest and largest numbers requiring $bits bits
     *
     * @access private
     * @param int $bits
     * @return array
     */
    function _generateMinMax($bits)
    {
        $bytes = $bits >> 3;
        $min = str_repeat(chr(0), $bytes);
        $max = str_repeat(chr(0xFF), $bytes);
        $msb = $bits & 7;
        if ($msb) {
            $min = chr(1 << ($msb - 1)) . $min;
            $max = chr((1 << $msb) - 1) . $max;
        } else {
            $min[0] = chr(0x80);
        }

        return array(
            'min' => new BigInteger($min, 256),
            'max' => new BigInteger($max, 256)
        );
    }

    /**
     * DER-decode the length
     *
     * DER supports lengths up to (2**8)**127, however, we'll only support lengths up to (2**8)**4.  See
     * {@link http://itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf#p=13 X.690 paragraph 8.1.3} for more information.
     *
     * @access private
     * @param string $string
     * @return int
     */
    function _decodeLength(&$string)
    {
        $length = ord($this->_string_shift($string));
        if ($length & 0x80) { // definite length, long form
            $length&= 0x7F;
            $temp = $this->_string_shift($string, $length);
            list(, $length) = unpack('N', substr(str_pad($temp, 4, chr(0), STR_PAD_LEFT), -4));
        }
        return $length;
    }

    /**
     * DER-encode the length
     *
     * DER supports lengths up to (2**8)**127, however, we'll only support lengths up to (2**8)**4.  See
     * {@link http://itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf#p=13 X.690 paragraph 8.1.3} for more information.
     *
     * @access private
     * @param int $length
     * @return string
     */
    function _encodeLength($length)
    {
        if ($length <= 0x7F) {
            return chr($length);
        }

        $temp = ltrim(pack('N', $length), chr(0));
        return pack('Ca*', 0x80 | strlen($temp), $temp);
    }

    /**
     * String Shift
     *
     * Inspired by array_shift
     *
     * @param string $string
     * @param int $index
     * @return string
     * @access private
     */
    function _string_shift(&$string, $index = 1)
    {
        $substr = substr($string, 0, $index);
        $string = substr($string, $index);
        return $substr;
    }

    /**
     * Determines the private key format
     *
     * @see self::createKey()
     * @access public
     * @param int $format
     */
    function setPrivateKeyFormat($format)
    {
        $this->privateKeyFormat = $format;
    }

    /**
     * Determines the public key format
     *
     * @see self::createKey()
     * @access public
     * @param int $format
     */
    function setPublicKeyFormat($format)
    {
        $this->publicKeyFormat = $format;
    }

    /**
     * Determines which hashing function should be used
     *
     * Used with signature production / verification and (if the encryption mode is self::ENCRYPTION_OAEP) encryption and
     * decryption.  If $hash isn't supported, sha1 is used.
     *
     * @access public
     * @param string $hash
     */
    function setHash($hash)
    {
        // \phpseclib\Crypt\Hash supports algorithms that PKCS#1 doesn't support.  md5-96 and sha1-96, for example.
        switch ($hash) {
            case 'md2':
            case 'md5':
            case 'sha1':
            case 'sha256':
            case 'sha384':
            case 'sha512':
                $this->hash = new Hash($hash);
                $this->hashName = $hash;
                break;
            default:
                $this->hash = new Hash('sha1');
                $this->hashName = 'sha1';
        }
        $this->hLen = $this->hash->getLength();
    }

    /**
     * Determines which hashing function should be used for the mask generation function
     *
     * The mask generation function is used by self::ENCRYPTION_OAEP and self::SIGNATURE_PSS and although it's
     * best if Hash and MGFHash are set to the same thing this is not a requirement.
     *
     * @access public
     * @param string $hash
     */
    function setMGFHash($hash)
    {
        // \phpseclib\Crypt\Hash supports algorithms that PKCS#1 doesn't support.  md5-96 and sha1-96, for example.
        switch ($hash) {
            case 'md2':
            case 'md5':
            case 'sha1':
            case 'sha256':
            case 'sha384':
            case 'sha512':
                $this->mgfHash = new Hash($hash);
                break;
            default:
                $this->mgfHash = new Hash('sha1');
        }
        $this->mgfHLen = $this->mgfHash->getLength();
    }

    /**
     * Determines the salt length
     *
     * To quote from {@link http://tools.ietf.org/html/rfc3447#page-38 RFC3447#page-38}:
     *
     *    Typical salt lengths in octets are hLen (the length of the output
     *    of the hash function Hash) and 0.
     *
     * @access public
     * @param int $sLen
     */
    function setSaltLength($sLen)
    {
        $this->sLen = $sLen;
    }

    /**
     * Integer-to-Octet-String primitive
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-4.1 RFC3447#section-4.1}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $x
     * @param int $xLen
     * @return string
     */
    function _i2osp($x, $xLen)
    {
        $x = $x->toBytes();
        if (strlen($x) > $xLen) {
            user_error('Integer too large');
            return false;
        }
        return str_pad($x, $xLen, chr(0), STR_PAD_LEFT);
    }

    /**
     * Octet-String-to-Integer primitive
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-4.2 RFC3447#section-4.2}.
     *
     * @access private
     * @param int|string|resource $x
     * @return \phpseclib\Math\BigInteger
     */
    function _os2ip($x)
    {
        return new BigInteger($x, 256);
    }

    /**
     * Exponentiate with or without Chinese Remainder Theorem
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-5.1.1 RFC3447#section-5.1.2}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $x
     * @return \phpseclib\Math\BigInteger
     */
    function _exponentiate($x)
    {
        switch (true) {
            case empty($this->primes):
            case $this->primes[1]->equals($this->zero):
            case empty($this->coefficients):
            case $this->coefficients[2]->equals($this->zero):
            case empty($this->exponents):
            case $this->exponents[1]->equals($this->zero):
                return $x->modPow($this->exponent, $this->modulus);
        }

        $num_primes = count($this->primes);

        if (defined('CRYPT_RSA_DISABLE_BLINDING')) {
            $m_i = array(
                1 => $x->modPow($this->exponents[1], $this->primes[1]),
                2 => $x->modPow($this->exponents[2], $this->primes[2])
            );
            $h = $m_i[1]->subtract($m_i[2]);
            $h = $h->multiply($this->coefficients[2]);
            list(, $h) = $h->divide($this->primes[1]);
            $m = $m_i[2]->add($h->multiply($this->primes[2]));

            $r = $this->primes[1];
            for ($i = 3; $i <= $num_primes; $i++) {
                $m_i = $x->modPow($this->exponents[$i], $this->primes[$i]);

                $r = $r->multiply($this->primes[$i - 1]);

                $h = $m_i->subtract($m);
                $h = $h->multiply($this->coefficients[$i]);
                list(, $h) = $h->divide($this->primes[$i]);

                $m = $m->add($r->multiply($h));
            }
        } else {
            $smallest = $this->primes[1];
            for ($i = 2; $i <= $num_primes; $i++) {
                if ($smallest->compare($this->primes[$i]) > 0) {
                    $smallest = $this->primes[$i];
                }
            }

            $one = new BigInteger(1);

            $r = $one->random($one, $smallest->subtract($one));

            $m_i = array(
                1 => $this->_blind($x, $r, 1),
                2 => $this->_blind($x, $r, 2)
            );
            $h = $m_i[1]->subtract($m_i[2]);
            $h = $h->multiply($this->coefficients[2]);
            list(, $h) = $h->divide($this->primes[1]);
            $m = $m_i[2]->add($h->multiply($this->primes[2]));

            $r = $this->primes[1];
            for ($i = 3; $i <= $num_primes; $i++) {
                $m_i = $this->_blind($x, $r, $i);

                $r = $r->multiply($this->primes[$i - 1]);

                $h = $m_i->subtract($m);
                $h = $h->multiply($this->coefficients[$i]);
                list(, $h) = $h->divide($this->primes[$i]);

                $m = $m->add($r->multiply($h));
            }
        }

        return $m;
    }

    /**
     * Performs RSA Blinding
     *
     * Protects against timing attacks by employing RSA Blinding.
     * Returns $x->modPow($this->exponents[$i], $this->primes[$i])
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $x
     * @param \phpseclib\Math\BigInteger $r
     * @param int $i
     * @return \phpseclib\Math\BigInteger
     */
    function _blind($x, $r, $i)
    {
        $x = $x->multiply($r->modPow($this->publicExponent, $this->primes[$i]));
        $x = $x->modPow($this->exponents[$i], $this->primes[$i]);

        $r = $r->modInverse($this->primes[$i]);
        $x = $x->multiply($r);
        list(, $x) = $x->divide($this->primes[$i]);

        return $x;
    }

    /**
     * Performs blinded RSA equality testing
     *
     * Protects against a particular type of timing attack described.
     *
     * See {@link http://codahale.com/a-lesson-in-timing-attacks/ A Lesson In Timing Attacks (or, Don't use MessageDigest.isEquals)}
     *
     * Thanks for the heads up singpolyma!
     *
     * @access private
     * @param string $x
     * @param string $y
     * @return bool
     */
    function _equals($x, $y)
    {
        if (function_exists('hash_equals')) {
            return hash_equals($x, $y);
        }

        if (strlen($x) != strlen($y)) {
            return false;
        }

        $result = "\0";
        $x^= $y;
        for ($i = 0; $i < strlen($x); $i++) {
            $result|= $x[$i];
        }

        return $result === "\0";
    }

    /**
     * RSAEP
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-5.1.1 RFC3447#section-5.1.1}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $m
     * @return \phpseclib\Math\BigInteger
     */
    function _rsaep($m)
    {
        if ($m->compare($this->zero) < 0 || $m->compare($this->modulus) > 0) {
            user_error('Message representative out of range');
            return false;
        }
        return $this->_exponentiate($m);
    }

    /**
     * RSADP
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-5.1.2 RFC3447#section-5.1.2}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $c
     * @return \phpseclib\Math\BigInteger
     */
    function _rsadp($c)
    {
        if ($c->compare($this->zero) < 0 || $c->compare($this->modulus) > 0) {
            user_error('Ciphertext representative out of range');
            return false;
        }
        return $this->_exponentiate($c);
    }

    /**
     * RSASP1
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-5.2.1 RFC3447#section-5.2.1}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $m
     * @return \phpseclib\Math\BigInteger
     */
    function _rsasp1($m)
    {
        if ($m->compare($this->zero) < 0 || $m->compare($this->modulus) > 0) {
            user_error('Message representative out of range');
            return false;
        }
        return $this->_exponentiate($m);
    }

    /**
     * RSAVP1
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-5.2.2 RFC3447#section-5.2.2}.
     *
     * @access private
     * @param \phpseclib\Math\BigInteger $s
     * @return \phpseclib\Math\BigInteger
     */
    function _rsavp1($s)
    {
        if ($s->compare($this->zero) < 0 || $s->compare($this->modulus) > 0) {
            user_error('Signature representative out of range');
            return false;
        }
        return $this->_exponentiate($s);
    }

    /**
     * MGF1
     *
     * See {@link http://tools.ietf.org/html/rfc3447#appendix-B.2.1 RFC3447#appendix-B.2.1}.
     *
     * @access private
     * @param string $mgfSeed
     * @param int $maskLen
     * @return string
     */
    function _mgf1($mgfSeed, $maskLen)
    {
        // if $maskLen would yield strings larger than 4GB, PKCS#1 suggests a "Mask too long" error be output.

        $t = '';
        $count = ceil($maskLen / $this->mgfHLen);
        for ($i = 0; $i < $count; $i++) {
            $c = pack('N', $i);
            $t.= $this->mgfHash->hash($mgfSeed . $c);
        }

        return substr($t, 0, $maskLen);
    }

    /**
     * RSAES-OAEP-ENCRYPT
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-7.1.1 RFC3447#section-7.1.1} and
     * {http://en.wikipedia.org/wiki/Optimal_Asymmetric_Encryption_Padding OAES}.
     *
     * @access private
     * @param string $m
     * @param string $l
     * @return string
     */
    function _rsaes_oaep_encrypt($m, $l = '')
    {
        $mLen = strlen($m);

        // Length checking

        // if $l is larger than two million terrabytes and you're using sha1, PKCS#1 suggests a "Label too long" error
        // be output.

        if ($mLen > $this->k - 2 * $this->hLen - 2) {
            user_error('Message too long');
            return false;
        }

        // EME-OAEP encoding

        $lHash = $this->hash->hash($l);
        $ps = str_repeat(chr(0), $this->k - $mLen - 2 * $this->hLen - 2);
        $db = $lHash . $ps . chr(1) . $m;
        $seed = Random::string($this->hLen);
        $dbMask = $this->_mgf1($seed, $this->k - $this->hLen - 1);
        $maskedDB = $db ^ $dbMask;
        $seedMask = $this->_mgf1($maskedDB, $this->hLen);
        $maskedSeed = $seed ^ $seedMask;
        $em = chr(0) . $maskedSeed . $maskedDB;

        // RSA encryption

        $m = $this->_os2ip($em);
        $c = $this->_rsaep($m);
        $c = $this->_i2osp($c, $this->k);

        // Output the ciphertext C

        return $c;
    }

    /**
     * RSAES-OAEP-DECRYPT
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-7.1.2 RFC3447#section-7.1.2}.  The fact that the error
     * messages aren't distinguishable from one another hinders debugging, but, to quote from RFC3447#section-7.1.2:
     *
     *    Note.  Care must be taken to ensure that an opponent cannot
     *    distinguish the different error conditions in Step 3.g, whether by
     *    error message or timing, or, more generally, learn partial
     *    information about the encoded message EM.  Otherwise an opponent may
     *    be able to obtain useful information about the decryption of the
     *    ciphertext C, leading to a chosen-ciphertext attack such as the one
     *    observed by Manger [36].
     *
     * As for $l...  to quote from {@link http://tools.ietf.org/html/rfc3447#page-17 RFC3447#page-17}:
     *
     *    Both the encryption and the decryption operations of RSAES-OAEP take
     *    the value of a label L as input.  In this version of PKCS #1, L is
     *    the empty string; other uses of the label are outside the scope of
     *    this document.
     *
     * @access private
     * @param string $c
     * @param string $l
     * @return string
     */
    function _rsaes_oaep_decrypt($c, $l = '')
    {
        // Length checking

        // if $l is larger than two million terrabytes and you're using sha1, PKCS#1 suggests a "Label too long" error
        // be output.

        if (strlen($c) != $this->k || $this->k < 2 * $this->hLen + 2) {
            user_error('Decryption error');
            return false;
        }

        // RSA decryption

        $c = $this->_os2ip($c);
        $m = $this->_rsadp($c);
        if ($m === false) {
            user_error('Decryption error');
            return false;
        }
        $em = $this->_i2osp($m, $this->k);

        // EME-OAEP decoding

        $lHash = $this->hash->hash($l);
        $y = ord($em[0]);
        $maskedSeed = substr($em, 1, $this->hLen);
        $maskedDB = substr($em, $this->hLen + 1);
        $seedMask = $this->_mgf1($maskedDB, $this->hLen);
        $seed = $maskedSeed ^ $seedMask;
        $dbMask = $this->_mgf1($seed, $this->k - $this->hLen - 1);
        $db = $maskedDB ^ $dbMask;
        $lHash2 = substr($db, 0, $this->hLen);
        $m = substr($db, $this->hLen);
        $hashesMatch = $this->_equals($lHash, $lHash2);
        $leadingZeros = 1;
        $patternMatch = 0;
        $offset = 0;
        for ($i = 0; $i < strlen($m); $i++) {
            $patternMatch|= $leadingZeros & ($m[$i] === "\1");
            $leadingZeros&= $m[$i] === "\0";
            $offset+= $patternMatch ? 0 : 1;
        }

        // we do & instead of && to avoid https://en.wikipedia.org/wiki/Short-circuit_evaluation
        // to protect against timing attacks
        if (!$hashesMatch & !$patternMatch) {
            user_error('Decryption error');
            return false;
        }

        // Output the message M

        return substr($m, $offset + 1);
    }

    /**
     * Raw Encryption / Decryption
     *
     * Doesn't use padding and is not recommended.
     *
     * @access private
     * @param string $m
     * @return string
     */
    function _raw_encrypt($m)
    {
        $temp = $this->_os2ip($m);
        $temp = $this->_rsaep($temp);
        return  $this->_i2osp($temp, $this->k);
    }

    /**
     * RSAES-PKCS1-V1_5-ENCRYPT
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-7.2.1 RFC3447#section-7.2.1}.
     *
     * @access private
     * @param string $m
     * @return string
     */
    function _rsaes_pkcs1_v1_5_encrypt($m)
    {
        $mLen = strlen($m);

        // Length checking

        if ($mLen > $this->k - 11) {
            user_error('Message too long');
            return false;
        }

        // EME-PKCS1-v1_5 encoding

        $psLen = $this->k - $mLen - 3;
        $ps = '';
        while (strlen($ps) != $psLen) {
            $temp = Random::string($psLen - strlen($ps));
            $temp = str_replace("\x00", '', $temp);
            $ps.= $temp;
        }
        $type = 2;
        // see the comments of _rsaes_pkcs1_v1_5_decrypt() to understand why this is being done
        if (defined('CRYPT_RSA_PKCS15_COMPAT') && (!isset($this->publicExponent) || $this->exponent !== $this->publicExponent)) {
            $type = 1;
            // "The padding string PS shall consist of k-3-||D|| octets. ... for block type 01, they shall have value FF"
            $ps = str_repeat("\xFF", $psLen);
        }
        $em = chr(0) . chr($type) . $ps . chr(0) . $m;

        // RSA encryption
        $m = $this->_os2ip($em);
        $c = $this->_rsaep($m);
        $c = $this->_i2osp($c, $this->k);

        // Output the ciphertext C

        return $c;
    }

    /**
     * RSAES-PKCS1-V1_5-DECRYPT
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-7.2.2 RFC3447#section-7.2.2}.
     *
     * For compatibility purposes, this function departs slightly from the description given in RFC3447.
     * The reason being that RFC2313#section-8.1 (PKCS#1 v1.5) states that ciphertext's encrypted by the
     * private key should have the second byte set to either 0 or 1 and that ciphertext's encrypted by the
     * public key should have the second byte set to 2.  In RFC3447 (PKCS#1 v2.1), the second byte is supposed
     * to be 2 regardless of which key is used.  For compatibility purposes, we'll just check to make sure the
     * second byte is 2 or less.  If it is, we'll accept the decrypted string as valid.
     *
     * As a consequence of this, a private key encrypted ciphertext produced with \phpseclib\Crypt\RSA may not decrypt
     * with a strictly PKCS#1 v1.5 compliant RSA implementation.  Public key encrypted ciphertext's should but
     * not private key encrypted ciphertext's.
     *
     * @access private
     * @param string $c
     * @return string
     */
    function _rsaes_pkcs1_v1_5_decrypt($c)
    {
        // Length checking

        if (strlen($c) != $this->k) { // or if k < 11
            user_error('Decryption error');
            return false;
        }

        // RSA decryption

        $c = $this->_os2ip($c);
        $m = $this->_rsadp($c);

        if ($m === false) {
            user_error('Decryption error');
            return false;
        }
        $em = $this->_i2osp($m, $this->k);

        // EME-PKCS1-v1_5 decoding

        if (ord($em[0]) != 0 || ord($em[1]) > 2) {
            user_error('Decryption error');
            return false;
        }

        $ps = substr($em, 2, strpos($em, chr(0), 2) - 2);
        $m = substr($em, strlen($ps) + 3);

        if (strlen($ps) < 8) {
            user_error('Decryption error');
            return false;
        }

        // Output M

        return $m;
    }
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty

    /**
     * Octet-String-to-Integer primitive
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-4.2 RFC3447#section-4.2}.
     *
     * @access private
     * @param string $x
     * @return \phpseclib3\Math\BigInteger
     */
    protected function os2ip($x)
    {
        return new BigInteger($x, 256);
    }

    /**
     * EMSA-PKCS1-V1_5-ENCODE
     *
     * See {@link http://tools.ietf.org/html/rfc3447#section-9.2 RFC3447#section-9.2}.
     *
     * @access private
     * @param string $m
     * @param int $emLen
     * @throws \LengthException if the intended encoded message length is too short
     * @return string
     */
    protected function emsa_pkcs1_v1_5_encode($m, $emLen)
    {
        $h = $this->hash->hash($m);

        // see http://tools.ietf.org/html/rfc3447#page-43
        switch ($this->hash->getHash()) {
            case 'md2':
                $t = "\x30\x20\x30\x0c\x06\x08\x2a\x86\x48\x86\xf7\x0d\x02\x02\x05\x00\x04\x10";
                break;
            case 'md5':
                $t = "\x30\x20\x30\x0c\x06\x08\x2a\x86\x48\x86\xf7\x0d\x02\x05\x05\x00\x04\x10";
                break;
            case 'sha1':
                $t = "\x30\x21\x30\x09\x06\x05\x2b\x0e\x03\x02\x1a\x05\x00\x04\x14";
                break;
            case 'sha256':
                $t = "\x30\x31\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x01\x05\x00\x04\x20";
                break;
            case 'sha384':
                $t = "\x30\x41\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x02\x05\x00\x04\x30";
                break;
            case 'sha512':
                $t = "\x30\x51\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x03\x05\x00\x04\x40";
                break;
            // from https://www.emc.com/collateral/white-papers/h11300-pkcs-1v2-2-rsa-cryptography-standard-wp.pdf#page=40
            case 'sha224':
                $t = "\x30\x2d\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x04\x05\x00\x04\x1c";
                break;
            case 'sha512/224':
                $t = "\x30\x2d\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x05\x05\x00\x04\x1c";
                break;
            case 'sha512/256':
                $t = "\x30\x31\x30\x0d\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x06\x05\x00\x04\x20";
        }
        $t.= $h;
        $tLen = strlen($t);

        if ($emLen < $tLen + 11) {
            throw new \LengthException('Intended encoded message length too short');
        }

        $ps = str_repeat(chr(0xFF), $emLen - $tLen - 3);

        $em = "\0\1$ps\0$t";

        return $em;
    }

    /**
     * EMSA-PKCS1-V1_5-ENCODE (without NULL)
     *
     * Quoting https://tools.ietf.org/html/rfc8017#page-65,
     *
     * "The parameters field associated with id-sha1, id-sha224, id-sha256,
     *  id-sha384, id-sha512, id-sha512/224, and id-sha512/256 should
     *  generally be omitted, but if present, it shall have a value of type
     *  NULL"
     *
     * @access private
     * @param string $m
     * @param int $emLen
     * @return string
     */
    protected function emsa_pkcs1_v1_5_encode_without_null($m, $emLen)
    {
        $h = $this->hash->hash($m);

        // see http://tools.ietf.org/html/rfc3447#page-43
        switch ($this->hash->getHash()) {
            case 'sha1':
                $t = "\x30\x1f\x30\x07\x06\x05\x2b\x0e\x03\x02\x1a\x04\x14";
                break;
            case 'sha256':
                $t = "\x30\x2f\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x01\x04\x20";
                break;
            case 'sha384':
                $t = "\x30\x3f\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x02\x04\x30";
                break;
            case 'sha512':
                $t = "\x30\x4f\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x03\x04\x40";
                break;
            // from https://www.emc.com/collateral/white-papers/h11300-pkcs-1v2-2-rsa-cryptography-standard-wp.pdf#page=40
            case 'sha224':
                $t = "\x30\x2b\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x04\x04\x1c";
                break;
            case 'sha512/224':
                $t = "\x30\x2b\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x05\x04\x1c";
                break;
            case 'sha512/256':
                $t = "\x30\x2f\x30\x0b\x06\x09\x60\x86\x48\x01\x65\x03\x04\x02\x06\x04\x20";
                break;
            default:
                throw new UnsupportedAlgorithmException('md2 and md5 require NULLs');
        }
        $t.= $h;
        $tLen = strlen($t);

        if ($emLen < $tLen + 11) {
            throw new \LengthException('Intended encoded message length too short');
        }

        $ps = str_repeat(chr(0xFF), $emLen - $tLen - 3);

        $em = "\0\1$ps\0$t";

        return $em;
    }

    /**
     * MGF1
     *
     * See {@link http://tools.ietf.org/html/rfc3447#appendix-B.2.1 RFC3447#appendix-B.2.1}.
     *
     * @access private
     * @param string $mgfSeed
     * @param int $maskLen
     * @return string
     */
    protected function mgf1($mgfSeed, $maskLen)
    {
        // if $maskLen would yield strings larger than 4GB, PKCS#1 suggests a "Mask too long" error be output.

        $t = '';
        $count = ceil($maskLen / $this->mgfHLen);
        for ($i = 0; $i < $count; $i++) {
            $c = pack('N', $i);
            $t.= $this->mgfHash->hash($mgfSeed . $c);
        }

        return substr($t, 0, $maskLen);
    }

    /**
     * Returns the key size
     *
     * More specifically, this returns the size of the modulo in bits.
     *
<<<<<<< HEAD
     * @access public
     * @return int
=======
     * @access private
     * @param string $m
     * @param string $s
     * @return string
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty
     */
    public function getLength()
    {
        return !isset($this->modulus) ? 0 : $this->modulus->getLength();
    }

    /**
     * Determines which hashing function should be used
     *
     * Used with signature production / verification and (if the encryption mode is self::PADDING_OAEP) encryption and
     * decryption.
     *
     * @access public
     * @param string $hash
     */
    public function withHash($hash)
    {
        $new = clone $this;

        // \phpseclib3\Crypt\Hash supports algorithms that PKCS#1 doesn't support.  md5-96 and sha1-96, for example.
        switch (strtolower($hash)) {
            case 'md2':
            case 'md5':
            case 'sha1':
            case 'sha256':
            case 'sha384':
            case 'sha512':
            case 'sha224':
            case 'sha512/224':
            case 'sha512/256':
                $new->hash = new Hash($hash);
                break;
            default:
                throw new UnsupportedAlgorithmException(
                    'The only supported hash algorithms are: md2, md5, sha1, sha256, sha384, sha512, sha224, sha512/224, sha512/256'
                );
        }
        $new->hLen = $new->hash->getLengthInBytes();

        return $new;
    }

    /**
     * Determines which hashing function should be used for the mask generation function
     *
     * The mask generation function is used by self::PADDING_OAEP and self::PADDING_PSS and although it's
     * best if Hash and MGFHash are set to the same thing this is not a requirement.
     *
     * @access public
     * @param string $hash
     */
    public function withMGFHash($hash)
    {
        $new = clone $this;

        // \phpseclib3\Crypt\Hash supports algorithms that PKCS#1 doesn't support.  md5-96 and sha1-96, for example.
        switch (strtolower($hash)) {
            case 'md2':
            case 'md5':
            case 'sha1':
            case 'sha256':
            case 'sha384':
            case 'sha512':
            case 'sha224':
            case 'sha512/224':
            case 'sha512/256':
                $new->mgfHash = new Hash($hash);
                break;
            default:
                throw new UnsupportedAlgorithmException(
                    'The only supported hash algorithms are: md2, md5, sha1, sha256, sha384, sha512, sha224, sha512/224, sha512/256'
                );
        }
        $new->mgfHLen = $new->mgfHash->getLengthInBytes();

        return $new;
    }

    /**
     * Returns the MGF hash algorithm currently being used
     *
     * @access public
     */
    public function getMGFHash()
    {
       return clone $this->mgfHash;
    }

    /**
     * Determines the salt length
     *
     * Used by RSA::PADDING_PSS
     *
     * To quote from {@link http://tools.ietf.org/html/rfc3447#page-38 RFC3447#page-38}:
     *
     *    Typical salt lengths in octets are hLen (the length of the output
     *    of the hash function Hash) and 0.
     *
     * @access public
     * @param int $sLen
     */
    public function withSaltLength($sLen)
    {
        $new = clone $this;
        $new->sLen = $sLen;
        return $new;
    }

    /**
     * Returns the salt length currently being used
     *
     * @access public
     */
    public function getSaltLength()
    {
       return $this->sLen !== null ? $this->sLen : $this->hLen;
    }

    /**
     * Determines the label
     *
     * Used by RSA::PADDING_OAEP
     *
     * To quote from {@link http://tools.ietf.org/html/rfc3447#page-17 RFC3447#page-17}:
     *
     *    Both the encryption and the decryption operations of RSAES-OAEP take
     *    the value of a label L as input.  In this version of PKCS #1, L is
     *    the empty string; other uses of the label are outside the scope of
     *    this document.
     *
     * @access public
     * @param string $label
     */
    public function withLabel($label)
    {
        $new = clone $this;
        $new->label = $label;
        return $new;
    }

    /**
     * Returns the label currently being used
     *
     * @access public
<<<<<<< HEAD
=======
     * @param string $ciphertext
     * @return string
>>>>>>> Update guzzle to 6.5 in apps/files_external/3rdparty
     */
    public function getLabel()
    {
       return $this->label;
    }

    /**
     * Determines the padding modes
     *
     * Example: $key->withPadding(RSA::ENCRYPTION_PKCS1 | RSA::SIGNATURE_PKCS1);
     *
     * @access public
     * @param int $padding
     */
    public function withPadding($padding)
    {
        $masks = [
            self::ENCRYPTION_OAEP,
            self::ENCRYPTION_PKCS1,
            self::ENCRYPTION_NONE
        ];
        $numSelected = 0;
        $selected = 0;
        foreach ($masks as $mask) {
            if ($padding & $mask) {
                $selected = $mask;
                $numSelected++;
            }
        }
        if ($numSelected > 1) {
            throw new InconsistentSetupException('Multiple encryption padding modes have been selected; at most only one should be selected');
        }
        $encryptionPadding = $selected;

        $masks = [
            self::SIGNATURE_PSS,
            self::SIGNATURE_RELAXED_PKCS1,
            self::SIGNATURE_PKCS1
        ];
        $numSelected = 0;
        $selected = 0;
        foreach ($masks as $mask) {
            if ($padding & $mask) {
                $selected = $mask;
                $numSelected++;
            }
        }
        if ($numSelected > 1) {
            throw new InconsistentSetupException('Multiple signature padding modes have been selected; at most only one should be selected');
        }
        $signaturePadding = $selected;

        $new = clone $this;
        $new->encryptionPadding = $encryptionPadding;
        $new->signaturePadding = $signaturePadding;
        return $new;
    }

    /**
     * Returns the padding currently being used
     *
     * @access public
     */
    public function getPadding()
    {
       return $this->signaturePadding | $this->encryptionPadding;
    }

    /**
     * Returns the current engine being used
     *
     * OpenSSL is only used in this class (and it's subclasses) for key generation
     * Even then it depends on the parameters you're using. It's not used for
     * multi-prime RSA nor is it used if the key length is outside of the range
     * supported by OpenSSL
     *
     * @see self::useInternalEngine()
     * @see self::useBestEngine()
     * @access public
     * @return string
     */
    public function getEngine()
    {
        return self::$engines['OpenSSL'] && self::$defaultExponent == 65537 ?
            'OpenSSL' :
            'PHP';
    }

    /**
     * Enable RSA Blinding
     *
     * @access public
     */
    public static function enableBlinding()
    {
        static::$enableBlinding = true;
    }

    /**
     * Disable RSA Blinding
     *
     * @access public
     */
    public static function disableBlinding()
    {
        static::$enableBlinding = false;
    }
}