<?php

/**
 * ReadBytes trait
 *
 * PHP version 5
 *
 * @category  System
 * @package   SSH
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\System\SSH\Common\Traits;

/**
 * ReadBytes trait
 *
 * @package SSH
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
trait ReadBytes
{
    /**
     * Read data
     *
     * @param int $length
     * @throws \RuntimeException on connection errors
     * @access public
     */
    public function readBytes($length)
    {
        $temp = fread($this->fsock, $length);
        if (strlen($temp) != $length) {
            throw new \RuntimeException("Expected $length bytes; got " . strlen($temp));
        }
        return $temp;
    }
}
