<?php
/**
 * The OpenSSL Random Number Source
 *
 * This uses the OS's secure generator to generate high strength numbers
 *
 * PHP version 5.3
 *
 * @category   PHPCryptLib
 * @package    Random
 * @subpackage Source
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */

namespace RandomLib\Source;

use SecurityLib\Strength;

/**
 * The OpenSSL Random Number Source
 *
 * This uses the OS's secure generator to generate high strength numbers
 *
 * @category   PHPCryptLib
 * @package    Random
 * @subpackage Source
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @codeCoverageIgnore
 */
class OpenSSL implements \RandomLib\Source {

    /**
     * Return an instance of Strength indicating the strength of the source
     *
     * @return Strength An instance of one of the strength classes
     */
    public static function getStrength() {
        return new Strength(Strength::HIGH);
    }

    /**
     * Generate a random string of the specified size
     *
     * @param int $size The size of the requested random string
     *
     * @return string A string of the requested size
     */
    public function generate($size) {
        if (!function_exists('openssl_random_pseudo_bytes') || $size < 1) {
            return str_repeat(chr(0), $size);
        }
        /**
         * Note, normally we would check the return of of $crypto_strong to
         * ensure that we generated a good random string.  However, since we're
         * using this as one part of many sources a low strength random number
         * shouldn't be much of an issue.
         */
        return openssl_random_pseudo_bytes($size);
    }

}
