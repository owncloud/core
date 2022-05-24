<?php

/**
 * ExtensionAttribute
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
 * ExtensionAttribute
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class ExtensionAttribute
{
    const MAP = [
        'type' => ASN1::TYPE_SEQUENCE,
        'children' => [
            'extension-attribute-type' => [
                'type' => ASN1::TYPE_PRINTABLE_STRING,
                'constant' => 0,
                'optional' => true,
                'implicit' => true
            ],
            'extension-attribute-value' => [
                'type' => ASN1::TYPE_ANY,
                'constant' => 1,
                'optional' => true,
                'explicit' => true
            ]
        ]
    ];
}
