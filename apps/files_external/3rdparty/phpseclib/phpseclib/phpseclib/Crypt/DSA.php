<?php

/**
 * Pure-PHP FIPS 186-4 compliant implementation of DSA.
 *
 * PHP version 5
 *
 * Here's an example of how to create signatures and verify signatures with this library:
 * <code>
 * <?php
 * include 'vendor/autoload.php';
 *
 * $private = \phpseclib3\Crypt\DSA::createKey();
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
 * @category  Crypt
 * @package   DSA
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt;

use phpseclib3\Crypt\Common\AsymmetricKey;
use phpseclib3\Crypt\DSA\PrivateKey;
use phpseclib3\Crypt\DSA\PublicKey;
use phpseclib3\Crypt\DSA\Parameters;
use phpseclib3\Math\BigInteger;
use phpseclib3\Exception\InsufficientSetupException;

/**
 * Pure-PHP FIPS 186-4 compliant implementation of DSA.
 *
 * @package DSA
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class DSA extends AsymmetricKey
{
    /**
     * Algorithm Name
     *
     * @var string
     * @access private
     */
    const ALGORITHM = 'DSA';

    /**
     * DSA Prime P
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $p;

    /**
     * DSA Group Order q
     *
     * Prime divisor of p-1
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $q;

    /**
     * DSA Group Generator G
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $g;

    /**
     * DSA public key value y
     *
     * @var \phpseclib3\Math\BigInteger
     * @access private
     */
    protected $y;

    /**
     * Signature Format
     *
     * @var string
     * @access private
     */
    protected $sigFormat;

    /**
     * Signature Format (Short)
     *
     * @var string
     * @access private
     */
    protected $shortFormat;

    /**
     * Create DSA parameters
     *
     * @access public
     * @param int $L
     * @param int $N
     * @return \phpseclib3\Crypt\DSA|bool
     */
    public static function createParameters($L = 2048, $N = 224)
    {
        self::initialize_static_variables();

        if (!isset(self::$engines['PHP'])) {
            self::useBestEngine();
        }

        switch (true) {
            case $N == 160:
            /*
              in FIPS 186-1 and 186-2 N was fixed at 160 whereas K had an upper bound of 1024.
              RFC 4253 (SSH Transport Layer Protocol) references FIPS 186-2 and as such most
              SSH DSA implementations only support keys with an N of 160.
              puttygen let's you set the size of L (but not the size of N) and uses 2048 as the
              default L value. that's not really compliant with any of the FIPS standards, however,
              for the purposes of maintaining compatibility with puttygen, we'll support it 
            */
            //case ($L >= 512 || $L <= 1024) && (($L & 0x3F) == 0) && $N == 160:
            // FIPS 186-3 changed this as follows:
            //case $L == 1024 && $N == 160:
            case $L == 2048 && $N == 224:
            case $L == 2048 && $N == 256:
            case $L == 3072 && $N == 256:
                break;
            default:
                throw new \InvalidArgumentException('Invalid values for N and L');
        }

        $two = new BigInteger(2);

        $q = BigInteger::randomPrime($N);
        $divisor = $q->multiply($two);

        do {
            $x = BigInteger::random($L);
            list(, $c) = $x->divide($divisor);
            $p = $x->subtract($c->subtract(self::$one));
        } while ($p->getLength() != $L || !$p->isPrime());

        $p_1 = $p->subtract(self::$one);
        list($e) = $p_1->divide($q);

        // quoting http://nvlpubs.nist.gov/nistpubs/FIPS/NIST.FIPS.186-4.pdf#page=50 ,
        // "h could be obtained from a random number generator or from a counter that
        //  changes after each use". PuTTY (sshdssg.c) starts h off at 1 and increments
        // it on each loop. wikipedia says "commonly h = 2 is used" so we'll just do that
        $h = clone $two;
        while (true) {
            $g = $h->powMod($e, $p);
            if (!$g->equals(self::$one)) {
                break;
            }
            $h = $h->add(self::$one);
        }

        $dsa = new Parameters;
        $dsa->p = $p;
        $dsa->q = $q;
        $dsa->g = $g;

        return $dsa;
    }

    /**
     * Create public / private key pair.
     *
     * This method is a bit polymorphic. It can take a DSA/Parameters object, L / N as two distinct parameters or
     * no parameters (at which point L and N will be generated with this method)
     *
     * Returns the private key, from which the publickey can be extracted
     *
     * @param int[] ...$args
     * @access public
     * @return DSA\PrivateKey
     */
    public static function createKey(...$args)
    {
        self::initialize_static_variables();

        if (!isset(self::$engines['PHP'])) {
            self::useBestEngine();
        }

        if (count($args) == 2 && is_int($args[0]) && is_int($args[1])) {
            $params = self::createParameters($args[0], $args[1]);
        } else if (count($args) == 1 && $args[0] instanceof Parameters) {
            $params = $args[0];
        } else if (!count($args)) {
            $params = self::createParameters();
        } else {
            throw new InsufficientSetupException('Valid parameters are either two integers (L and N), a single DSA object or no parameters at all.');
        }

        $private = new PrivateKey;
        $private->p = $params->p;
        $private->q = $params->q;
        $private->g = $params->g;

        $private->x = BigInteger::randomRange(self::$one, $private->q->subtract(self::$one));
        $private->y = $private->g->powMod($private->x, $private->p);

        //$public = clone $private;
        //unset($public->x);

        return $private
            ->withHash($params->hash->getHash())
            ->withSignatureFormat($params->shortFormat);
    }

    /**
     * OnLoad Handler
     *
     * @return bool
     * @access protected
     * @param array $components
     */
    protected static function onLoad($components)
    {
        if (!isset(self::$engines['PHP'])) {
            self::useBestEngine();
        }

        if (!isset($components['x']) && !isset($components['y'])) {
            $new = new Parameters;
        } else if (isset($components['x'])) {
            $new = new PrivateKey;
            $new->x = $components['x'];
        } else {
            $new = new PublicKey;
        }

        $new->p = $components['p'];
        $new->q = $components['q'];
        $new->g = $components['g'];

        if (isset($components['y'])) {
            $new->y = $components['y'];
        }

        return $new;
    }

    /**
     * Constructor
     *
     * PublicKey and PrivateKey objects can only be created from abstract RSA class
     */
    protected function __construct()
    {
        $this->sigFormat = self::validatePlugin('Signature', 'ASN1');
        $this->shortFormat = 'ASN1';

        parent::__construct();
    }

    /**
     * Returns the key size
     *
     * More specifically, this L (the length of DSA Prime P) and N (the length of DSA Group Order q)
     *
     * @access public
     * @return array
     */
    public function getLength()
    {
        return ['L' => $this->p->getLength(), 'N' => $this->q->getLength()];
    }

    /**
     * Returns the current engine being used
     *
     * @see self::useInternalEngine()
     * @see self::useBestEngine()
     * @access public
     * @return string
     */
    public function getEngine()
    {
        return self::$engines['OpenSSL'] && in_array($this->hash->getHash(), openssl_get_md_methods()) ?
            'OpenSSL' : 'PHP';
    }

    /**
     * Returns the parameters
     *
     * A public / private key is only returned if the currently loaded "key" contains an x or y
     * value.
     *
     * @see self::getPublicKey()
     * @access public
     * @return mixed
     */
    public function getParameters()
    {
        $type = self::validatePlugin('Keys', 'PKCS1', 'saveParameters');

        $key = $type::saveParameters($this->p, $this->q, $this->g);
        return DSA::load($key, 'PKCS1')
            ->withHash($this->hash->getHash())
            ->withSignatureFormat($this->shortFormat);
    }

    /**
     * Determines the signature padding mode
     *
     * Valid values are: ASN1, SSH2, Raw
     *
     * @access public
     * @param string $format
     */
    public function withSignatureFormat($format)
    {
        $new = clone $this;
        $new->shortFormat = $format;
        $new->sigFormat = self::validatePlugin('Signature', $format);
        return $new;
    }

    /**
     * Returns the signature format currently being used
     *
     * @access public
     */
    public function getSignatureFormat()
    {
       return $this->shortFormat;
    }
}