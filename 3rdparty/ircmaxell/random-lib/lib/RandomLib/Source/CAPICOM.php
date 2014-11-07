<?php
/**
 * The Capicom Random Number Source
 *
 * This uses the Windows CapiCom Com object to generate random numbers
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
 * The Capicom Random Number Source
 *
 * This uses the Windows CapiCom Com object to generate random numbers
 *
 * @category   PHPCryptLib
 * @package    Random
 * @subpackage Source
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @codeCoverageIgnore
 */
class CAPICOM implements \RandomLib\Source {

    /**
     * Return an instance of Strength indicating the strength of the source
     *
     * @return Strength An instance of one of the strength classes
     */
    public static function getStrength() {
        return new Strength(Strength::MEDIUM);
    }

    /**
     * Generate a random string of the specified size
     *
     * @param int $size The size of the requested random string
     *
     * @return string A string of the requested size
     */
    public function generate($size) {
        if (!class_exists('\\COM', false)) {
            return str_repeat(chr(0), $size);
        }
        try {
            $util = new \COM('CAPICOM.Utilities.1');
            $data = base64_decode($util->GetRandom($size, 0));
            return str_pad($data, $size, chr(0));
        } catch (\Exception $e) {
            unset($e);
            return str_repeat(chr(0), $size);
        }
    }

}
