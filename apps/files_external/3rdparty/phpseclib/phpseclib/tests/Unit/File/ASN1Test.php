<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\File;

use phpseclib3\File\ASN1;
use phpseclib3\Tests\PhpseclibTestCase;

class ASN1Test extends PhpseclibTestCase
{
    /**
     * on older versions of \phpseclib3\File\ASN1 this would yield a PHP Warning
     * @group github275
     */
    public function testAnyString()
    {
        $KDC_REP = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'pvno' => [
                    'constant' => 0,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'msg-type' => [
                    'constant' => 1,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'padata' => [
                    'constant' => 2,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'crealm' => [
                    'constant' => 3,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'cname' => [
                    'constant' => 4,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'ticket' => [
                    'constant' => 5,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY],
                'enc-part' => [
                    'constant' => 6,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY]
            ]
        ];

        $AS_REP = [
            'class'    => ASN1::CLASS_APPLICATION,
            'cast'     => 11,
            'optional' => true,
            'explicit' => true
        ] + $KDC_REP;

        $str = 'a4IC3jCCAtqgAwIBBaEDAgELoi8wLTAroQMCAROiJAQiMCAwHqADAgEXoRcbFUNSRUFUVUlUWS5ORVR0ZXN0dXNlcqMPGw' .
               '1DUkVBVFVJVFkuTkVUpBUwE6ADAgEBoQwwChsIdGVzdHVzZXKlggFOYYIBSjCCAUagAwIBBaEPGw1DUkVBVFVJVFkuTkVU' .
               'oiIwIKADAgECoRkwFxsGa3JidGd0Gw1DUkVBVFVJVFkuTkVUo4IBCDCCAQSgAwIBF6EDAgEBooH3BIH0AQlxgm/j4z74Ki' .
               'GsJJnROhh8JAiN7pdvlnkxCYKdG6UgdfK/K0NZ+yz+Xg4kgFO1cQ4XYT4Fm3MTmOHzlFmbzlVkUqBI/RnWA9YTREC9Q7Mf' .
               'PPYfRxRG/C6FlahxHCOKj9GUj7bXg7Oq3Sm+QsKTS2bZT05biNf1s7tPCkdIOO0AAd7hvTCpTNAKl+OLN4cpA6pwwk5c3h' .
               '58Ce5/Uri5yBmrfwgkCD5AJUAI/WH56SEEvpifLc6C96w/7y2krAiZm5PyEO0HVhTzUjKGSHoSMb+Z3HI/ul+G9z0Z4qDu' .
               'NjvgP0jKdrKiwWN00NjpiQ0byZd4y6aCASEwggEdoAMCAReiggEUBIIBEHyi8DIbdcfw2DpniBJ3Sh8dDaEbQx+gWx3omC' .
               'TBEyts4sQGTwgQcqkWfeer8M+SkZs/GGZq2YYkyeF+9b6TxlYuX145NuB3KcyzaS7VNrX37E5nGgG8K6r5gTFOhLCqsjjv' .
               'gPXXqLeJo5D1nV+c8BPIEVsu/bbBPgSqpDwUs2mX1WkEg5vfb7kZMC8+LHiRy+sItvIiTtxxEsQ/GEF/ono3hZrEnDa/C+' .
               '4P3wep6uNMLnLzXJmUaAMaopjE+MOcai/t6T9Vg4pERF5Waqwg5ibAbVGK19HuS4LiKiaY3JsyYBuNkEDwiqM7i1Ekw3V+' .
               '+zoEIxqgXjGgPdrWkzU/H6rnXiqMtiZZqUXwWY0zkCmy';

        $decoded = ASN1::decodeBER(base64_decode($str));
        $result = ASN1::asn1map($decoded[0], $AS_REP);

        $this->assertIsArray($result);
    }

    /**
     * on older versions of \phpseclib3\File\ASN1 this would produce a null instead of an array
     * @group github275
     */
    public function testIncorrectString()
    {
        $PA_DATA = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'padata-type' => [
                    'constant' => 1,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_INTEGER
                ],
                'padata-value' => [
                    'constant' => 2,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_OCTET_STRING
                ]
            ]
        ];

        $PrincipalName = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'name-type' => [
                    'constant' => 0,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_INTEGER
                ],
                'name-string' => [
                    'constant' => 1,
                    'optional' => true,
                    'explicit' => true,
                    'min' => 0,
                    'max' => -1,
                    'type' => ASN1::TYPE_SEQUENCE,
                    'children' => ['type' => ASN1::TYPE_IA5_STRING] // should be \phpseclib3\File\ASN1::TYPE_GENERAL_STRING
                ]
            ]
        ];

        $Ticket = [
            'class'    => ASN1::CLASS_APPLICATION,
            'cast'     => 1,
            'optional' => true,
            'explicit' => true,
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'tkt-vno' => [
                    'constant' => 0,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_INTEGER
                ],
                'realm' => [
                    'constant' => 1,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY
                ],
                'sname' => [
                    'constant' => 2,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY
                ],
                'enc-part' => [
                    'constant' => 3,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY
                ]
            ]
        ];

        $KDC_REP = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'pvno' => [
                    'constant' => 0,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_INTEGER],
                'msg-type' => [
                     'constant' => 1,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_INTEGER],
                'padata' => [
                    'constant' => 2,
                    'optional' => true,
                    'explicit' => true,
                    'min' => 0,
                    'max' => -1,
                    'type' => ASN1::TYPE_SEQUENCE,
                    'children' => $PA_DATA],
                'crealm' => [
                    'constant' => 3,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_OCTET_STRING],
                'cname' => [
                    'constant' => 4,
                    'optional' => true,
                    'explicit' => true] + $PrincipalName,
                    //'type' => ASN1::TYPE_ANY),
                'ticket' => [
                    'constant' => 5,
                    'optional' => true,
                    'implicit' => true,
                    'min' => 0,
                    'max' => 1,
                    'type' => ASN1::TYPE_SEQUENCE,
                    'children' => $Ticket],
                'enc-part' => [
                    'constant' => 6,
                    'optional' => true,
                    'explicit' => true,
                    'type' => ASN1::TYPE_ANY]
            ]
        ];

        $AS_REP = [
            'class'    => ASN1::CLASS_APPLICATION,
            'cast'     => 11,
            'optional' => true,
            'explicit' => true
        ] + $KDC_REP;

        $str = 'a4IC3jCCAtqgAwIBBaEDAgELoi8wLTAroQMCAROiJAQiMCAwHqADAgEXoRcbFUNSRUFUVUlUWS5ORVR0ZXN0dXNlcqMPGw' .
               '1DUkVBVFVJVFkuTkVUpBUwE6ADAgEBoQwwChsIdGVzdHVzZXKlggFOYYIBSjCCAUagAwIBBaEPGw1DUkVBVFVJVFkuTkVU' .
               'oiIwIKADAgECoRkwFxsGa3JidGd0Gw1DUkVBVFVJVFkuTkVUo4IBCDCCAQSgAwIBF6EDAgEBooH3BIH0AQlxgm/j4z74Ki' .
               'GsJJnROhh8JAiN7pdvlnkxCYKdG6UgdfK/K0NZ+yz+Xg4kgFO1cQ4XYT4Fm3MTmOHzlFmbzlVkUqBI/RnWA9YTREC9Q7Mf' .
               'PPYfRxRG/C6FlahxHCOKj9GUj7bXg7Oq3Sm+QsKTS2bZT05biNf1s7tPCkdIOO0AAd7hvTCpTNAKl+OLN4cpA6pwwk5c3h' .
               '58Ce5/Uri5yBmrfwgkCD5AJUAI/WH56SEEvpifLc6C96w/7y2krAiZm5PyEO0HVhTzUjKGSHoSMb+Z3HI/ul+G9z0Z4qDu' .
               'NjvgP0jKdrKiwWN00NjpiQ0byZd4y6aCASEwggEdoAMCAReiggEUBIIBEHyi8DIbdcfw2DpniBJ3Sh8dDaEbQx+gWx3omC' .
               'TBEyts4sQGTwgQcqkWfeer8M+SkZs/GGZq2YYkyeF+9b6TxlYuX145NuB3KcyzaS7VNrX37E5nGgG8K6r5gTFOhLCqsjjv' .
               'gPXXqLeJo5D1nV+c8BPIEVsu/bbBPgSqpDwUs2mX1WkEg5vfb7kZMC8+LHiRy+sItvIiTtxxEsQ/GEF/ono3hZrEnDa/C+' .
               '4P3wep6uNMLnLzXJmUaAMaopjE+MOcai/t6T9Vg4pERF5Waqwg5ibAbVGK19HuS4LiKiaY3JsyYBuNkEDwiqM7i1Ekw3V+' .
               '+zoEIxqgXjGgPdrWkzU/H6rnXiqMtiZZqUXwWY0zkCmy';

        $decoded = ASN1::decodeBER(base64_decode($str));
        $result = ASN1::asn1map($decoded[0], $AS_REP);

        $this->assertIsArray($result);
    }

    /**
     * older versions of ASN1 didn't handle indefinite length tags very well
     */
    public function testIndefiniteLength()
    {
        $decoded = ASN1::decodeBER(file_get_contents(dirname(__FILE__) . '/ASN1/FE.pdf.p7m'));
        $this->assertCount(5, $decoded[0]['content'][1]['content'][0]['content']); // older versions would have returned 3
    }

    public function testDefiniteLength()
    {
        // the following base64-encoded string is the X.509 cert from <http://phpseclib.sourceforge.net/x509/decoder.php>
        $str = 'MIIDITCCAoqgAwIBAgIQT52W2WawmStUwpV8tBV9TTANBgkqhkiG9w0BAQUFADBM' .
               'MQswCQYDVQQGEwJaQTElMCMGA1UEChMcVGhhd3RlIENvbnN1bHRpbmcgKFB0eSkg' .
               'THRkLjEWMBQGA1UEAxMNVGhhd3RlIFNHQyBDQTAeFw0xMTEwMjYwMDAwMDBaFw0x' .
               'MzA5MzAyMzU5NTlaMGgxCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlh' .
               'MRYwFAYDVQQHFA1Nb3VudGFpbiBWaWV3MRMwEQYDVQQKFApHb29nbGUgSW5jMRcw' .
               'FQYDVQQDFA53d3cuZ29vZ2xlLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkC' .
               'gYEA3rcmQ6aZhc04pxUJuc8PycNVjIjujI0oJyRLKl6g2Bb6YRhLz21ggNM1QDJy' .
               'wI8S2OVOj7my9tkVXlqGMaO6hqpryNlxjMzNJxMenUJdOPanrO/6YvMYgdQkRn8B' .
               'd3zGKokUmbuYOR2oGfs5AER9G5RqeC1prcB6LPrQ2iASmNMCAwEAAaOB5zCB5DAM' .
               'BgNVHRMBAf8EAjAAMDYGA1UdHwQvMC0wK6ApoCeGJWh0dHA6Ly9jcmwudGhhd3Rl' .
               'LmNvbS9UaGF3dGVTR0NDQS5jcmwwKAYDVR0lBCEwHwYIKwYBBQUHAwEGCCsGAQUF' .
               'BwMCBglghkgBhvhCBAEwcgYIKwYBBQUHAQEEZjBkMCIGCCsGAQUFBzABhhZodHRw' .
               'Oi8vb2NzcC50aGF3dGUuY29tMD4GCCsGAQUFBzAChjJodHRwOi8vd3d3LnRoYXd0' .
               'ZS5jb20vcmVwb3NpdG9yeS9UaGF3dGVfU0dDX0NBLmNydDANBgkqhkiG9w0BAQUF' .
               'AAOBgQAhrNWuyjSJWsKrUtKyNGadeqvu5nzVfsJcKLt0AMkQH0IT/GmKHiSgAgDp' .
               'ulvKGQSy068Bsn5fFNum21K5mvMSf3yinDtvmX3qUA12IxL/92ZzKbeVCq3Yi7Le' .
               'IOkKcGQRCMha8X2e7GmlpdWC1ycenlbN0nbVeSv3JUMcafC4+Q==';
        $decoded = ASN1::decodeBER(base64_decode($str));
        $this->assertCount(3, $decoded[0]['content']);
    }

    /**
     * @group github477
     */
    public function testContextSpecificNonConstructed()
    {
        $decoded = ASN1::decodeBER(base64_decode('MBaAFJtUo7c00HsI5EPZ4bkICfkOY2Pv'));
        $this->assertIsString($decoded[0]['content'][0]['content']);
    }

    /**
     * @group github602
     */
    public function testEmptyContextTag()
    {
        $decoded = ASN1::decodeBER("\xa0\x00");
        $this->assertIsArray($decoded);
        $this->assertCount(0, $decoded[0]['content']);
    }

    /**
     * @group github1027
     */
    public function testInfiniteLoop()
    {
        $data = base64_decode('MD6gJQYKKwYBBAGCNxQCA6AXDBVvZmZpY2VAY2VydGRpZ2l0YWwucm+BFW9mZmljZUBjZXJ0ZGlnaXRhbC5ybw==');
        self::assertSame(
            'a:1:{i:0;a:5:{s:5:"start";i:0;s:12:"headerlength";i:2;s:4:"type";i:16;s:7:"content";a:2:{i:0;a:6:{s:4:"type";i:2;s:8:"constant";i:0;s:7:"content";a:2:{i:0;a:5:{s:5:"start";i:4;s:12:"headerlength";i:2;s:4:"type";i:6;s:7:"content";s:22:"1.3.6.1.4.1.311.20.2.3";s:6:"length";i:12;}i:1;a:6:{s:4:"type";i:2;s:8:"constant";i:0;s:7:"content";a:1:{i:0;a:5:{s:5:"start";i:18;s:12:"headerlength";i:2;s:4:"type";i:12;s:7:"content";s:21:"office@certdigital.ro";s:6:"length";i:23;}}s:6:"length";i:25;s:5:"start";i:16;s:12:"headerlength";i:2;}}s:6:"length";i:39;s:5:"start";i:2;s:12:"headerlength";i:2;}i:1;a:6:{s:4:"type";i:2;s:8:"constant";i:1;s:7:"content";s:21:"office@certdigital.ro";s:6:"length";i:23;s:5:"start";i:41;s:12:"headerlength";i:2;}}s:6:"length";i:64;}}',
            serialize(ASN1::decodeBER($data))
        );
    }

    public function testMaps()
    {
        $files = scandir('phpseclib/File/ASN1/Maps');
        self::assertNotEmpty($files);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            self::assertTrue(defined('phpseclib3\\File\\ASN1\\Maps\\' . basename($file, '.php') . '::MAP'));
        }
    }

    public function testApplicationTag()
    {
        $map = [
            'type'     => ASN1::TYPE_SEQUENCE,
            'children' => [
                // technically, default implies optional, but we'll define it as being optional, none-the-less, just to
                // reenforce that fact
                'version'             => [
                    // if class isn't present it's assumed to be ASN1::CLASS_UNIVERSAL or
                    // (if constant is present) ASN1::CLASS_CONTEXT_SPECIFIC
                    'class'    => ASN1::CLASS_APPLICATION,
                    'cast'     => 2,
                    'optional' => true,
                    'explicit' => true,
                    'default'  => 'v1',
                    'type'     => ASN1::TYPE_INTEGER,
                    'mapping' => ['v1', 'v2', 'v3']
                ]
            ]
        ];

        $data = ['version' => 'v3'];

        $str = ASN1::encodeDER($data, $map);

        $decoded = ASN1::decodeBER($str);
        $arr = ASN1::asn1map($decoded[0], $map);

        $this->assertSame($data, $arr);
    }

    /**
     * @group github1296
     */
    public function testInvalidCertificate()
    {
        $data = 'a' . base64_decode('MD6gJQYKKwYBBAGCNxQCA6AXDBVvZmZpY2VAY2VydGRpZ2l0YWwucm+BFW9mZmljZUBjZXJ0ZGlnaXRhbC5ybw==');
        self::assertSame(
            'a:1:{i:0;a:6:{s:4:"type";i:1;s:8:"constant";i:1;s:7:"content";a:0:{}s:6:"length";i:2;s:5:"start";i:0;s:12:"headerlength";i:2;}}',
            serialize(ASN1::decodeBER($data))
        );
    }

    /**
     * @group github1367
     */
    public function testOIDs()
    {
        // from the example in 8.19.5 in the following:
        // https://www.itu.int/ITU-T/studygroups/com17/languages/X.690-0207.pdf#page=22
        $orig = pack('H*', '813403');
        $new = ASN1::decodeOID($orig);
        $this->assertSame('2.100.3', $new);
        $this->assertSame($orig, ASN1::encodeOID($new));

        // UUID OID from the following:
        // https://healthcaresecprivacy.blogspot.com/2011/02/creating-and-using-unique-id-uuid-oid.html
        $orig = '2.25.329800735698586629295641978511506172918';
        $new = ASN1::encodeOID($orig);
        $this->assertSame(pack('H*', '6983f09da7ebcfdee0c7a1a7b2c0948cc8f9d776'), $new);
        $this->assertSame($orig, ASN1::decodeOID($new));
    }

    /**
     * @group github1388
     */
    public function testExplicitImplicitDate()
    {
        $map = [
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

        $a = pack('H*', '3026a011180f32303137303432313039303535305aa111180f32303138303432313230353935395a');
        $a = ASN1::decodeBER($a);
        $a = ASN1::asn1map($a[0], $map);

        $this->assertIsArray($a);
    }

    public function testNullGarbage()
    {
        $em = pack('H*', '3080305c0609608648016503040201054f8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888804207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);

        $em = pack('H*', '3080307f0609608648016503040201057288888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888804207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca90000');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);
    }

    public function testOIDGarbage()
    {
        $em = pack('H*', '3080305c065860864801650304020188888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888050004207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);

        $em = pack('H*', '3080307f067d608648016503040201888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888804207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);
    }

    public function testConstructedMismatch()
    {
        $em = pack('H*', '1031300d0609608648016503040201050004207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);

        $em = pack('H*', '3031100d0609608648016503040201050004207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);

        $em = pack('H*', '3031300d2609608648016503040201050004207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);

        $em = pack('H*', '3031300d06096086480165030402012d0004207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);
    }

    public function testBadTagSecondOctet()
    {
        $em = pack('H*', '3033300f1f808080060960864801650304020104207509e5bda0c762d2bac7f90d758b5b2263fa01ccbc542ab5e3df163be08e6ca9');
        $decoded = ASN1::decodeBER($em);
        $this->assertNull($decoded);
    }
}
