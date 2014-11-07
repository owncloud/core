<?php
/**
 * The URandom Random Number Source
 *
 * This uses the *nix /dev/urandom device to generate medium strength numbers
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
 * The URandom Random Number Source
 *
 * This uses the *nix /dev/urandom device to generate medium strength numbers
 *
 * @category   PHPCryptLib
 * @package    Random
 * @subpackage Source
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @codeCoverageIgnore
 */
class URandom implements \RandomLib\Source {

    /**
     * @var string The file to read from
     */
    protected $file = '/dev/urandom';

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
        if ($size == 0 || !file_exists($this->file)) {
            return str_repeat(chr(0), $size);
        }
        $file = fopen($this->file, 'rb');
        if (!$file) {
            return str_repeat(chr(0), $size);
        }
        if (function_exists('stream_set_read_buffer')) {
            stream_set_read_buffer($file, 0);
        }
        $result = fread($file, $size);
        fclose($file);
        return $result;
    }

}
