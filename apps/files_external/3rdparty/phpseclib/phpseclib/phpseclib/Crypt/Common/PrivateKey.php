<?php

/**
 * PrivateKey interface
 *
 * @category  Crypt
 * @package   Common
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2009 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Crypt\Common;

/**
 * PrivateKey interface
 *
 * @package Common
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
interface PrivateKey
{
    public function sign($message);
    //public function decrypt($ciphertext);
    public function getPublicKey();
    public function toString($type, array $options = []);
    public function withPassword($string);
}
