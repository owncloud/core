<?php

/**
 * KeyUsage
 *
 * PHP version 5
 *
 * @category  File
 * @package   ASN1
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\File\ASN1\Maps;

use phpseclib3\File\ASN1;

/**
 * KeyUsage
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class KeyUsage
{
    const MAP = [
        'type'    => ASN1::TYPE_BIT_STRING,
        'mapping' => [
            'digitalSignature',
            'nonRepudiation',
            'keyEncipherment',
            'dataEncipherment',
            'keyAgreement',
            'keyCertSign',
            'cRLSign',
            'encipherOnly',
            'decipherOnly'
        ]
    ];
}
