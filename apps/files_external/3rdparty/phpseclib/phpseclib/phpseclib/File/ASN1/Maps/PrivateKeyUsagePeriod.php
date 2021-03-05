<?php

/**
 * PrivateKeyUsagePeriod
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
 * PrivateKeyUsagePeriod
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class PrivateKeyUsagePeriod
{
    const MAP = [
        'type'     => ASN1::TYPE_SEQUENCE,
        'children' => [
            'notBefore' => [
                                             'constant' => 0,
                                             'optional' => true,
                                             'implicit' => true,
                                             'type' => ASN1::TYPE_GENERALIZED_TIME],
            'notAfter'  => [
                                             'constant' => 1,
                                             'optional' => true,
                                             'implicit' => true,
                                             'type' => ASN1::TYPE_GENERALIZED_TIME]
        ]
    ];
}
