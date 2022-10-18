<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\Salsa20;
use phpseclib3\Tests\PhpseclibTestCase;

class Salsa20Test extends PhpseclibTestCase
{
    public function engineVectors()
    {
        $engines = [
            'PHP',
        ];
        // tests from http://www.ecrypt.eu.org/stream/svn/viewcvs.cgi/ecrypt/trunk/submissions/salsa20/full/verified.test-vectors?logsort=rev&rev=210&view=markup
        // more specifically, it's vector # 0 in each set
        $tests = [
            // key size: 128 bits
            // set 1
            [
                'key' => '80000000000000000000000000000000',
                'iv' => '0000000000000000',
                'result' => '4DFA5E481DA23EA09A31022050859936' .
                            'DA52FCEE218005164F267CB65F5CFD7F' .
                            '2B4F97E0FF16924A52DF269515110A07' .
                            'F9E460BC65EF95DA58F740B7D1DBB0AA'
            ],
            // set 2
            [
                'key' => '00000000000000000000000000000000',
                'iv' => '0000000000000000',
                'result' => '6513ADAECFEB124C1CBE6BDAEF690B4F' .
                            'FB00B0FCACE33CE806792BB414801998' .
                            '34BFB1CFDD095802C6E95E251002989A' .
                            'C22AE588D32AE79320D9BD7732E00338'
            ],
            // set 3
            [
                'key' => '000102030405060708090A0B0C0D0E0F',
                'iv' => '0000000000000000',
                'result' => '2DD5C3F7BA2B20F76802410C68868889' .
                            '5AD8C1BD4EA6C9B140FB9B90E21049BF' .
                            '583F527970EBC1A4C4C5AF117A5940D9' .
                            '2B98895B1902F02BF6E9BEF8D6B4CCBE'
            ],
            // set 4
            [
                'key' => '0053A6F94C9FF24598EB3E91E4378ADD',
                'iv' => '0000000000000000',
                'result' => 'BE4EF3D2FAC6C4C3D822CE67436A407C' .
                            'C237981D31A65190B51053D13A19C89F' .
                            'C90ACB45C8684058733EDD259869C58E' .
                            'EF760862BEFBBCA0F6E675FD1FA25C27'
            ],
            // set 5
            [
                'key' => '00000000000000000000000000000000',
                'iv' => '8000000000000000',
                'result' => 'B66C1E4446DD9557E578E223B0B76801' .
                            '7B23B267BB0234AE4626BF443F219776' .
                            '436FB19FD0E8866FCD0DE9A9538F4A09' .
                            'CA9AC0732E30BCF98E4F13E4B9E201D9'
            ],
            // set 6
            [
                'key' => '0053A6F94C9FF24598EB3E91E4378ADD',
                'iv' => '0D74DB42A91077DE',
                'result' => '05E1E7BEB697D999656BF37C1B978806' .
                            '735D0B903A6007BD329927EFBE1B0E2A' .
                            '8137C1AE291493AA83A821755BEE0B06' .
                            'CD14855A67E46703EBF8F3114B584CBA'
            ],
            // key size: 256 bits
            // set 1
            [
                'key' => '8000000000000000000000000000000000000000000000000000000000000000',
                'iv' => '0000000000000000',
                'result' => 'E3BE8FDD8BECA2E3EA8EF9475B29A6E7' .
                            '003951E1097A5C38D23B7A5FAD9F6844' .
                            'B22C97559E2723C7CBBD3FE4FC8D9A07' .
                            '44652A83E72A9C461876AF4D7EF1A117'
            ],
            // set 2
            [
                'key' => '0000000000000000000000000000000000000000000000000000000000000000',
                'iv' => '0000000000000000',
                'result' => '9A97F65B9B4C721B960A672145FCA8D4' .
                            'E32E67F9111EA979CE9C4826806AEEE6' .
                            '3DE9C0DA2BD7F91EBCB2639BF989C625' .
                            '1B29BF38D39A9BDCE7C55F4B2AC12A39'
            ],
            // set 3
            [
                'key' => '000102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F',
                'iv' => '0000000000000000',
                'result' => 'B580F7671C76E5F7441AF87C146D6B51' .
                            '3910DC8B4146EF1B3211CF12AF4A4B49' .
                            'E5C874B3EF4F85E7D7ED539FFEBA73EB' .
                            '73E0CCA74FBD306D8AA716C7783E89AF'
            ],
            // set 4
            [
                'key' => '0053A6F94C9FF24598EB3E91E4378ADD3083D6297CCF2275C81B6EC11467BA0D',
                'iv' => '0000000000000000',
                'result' => 'F9D2DC274BB55AEFC2A0D9F8A982830F' .
                            '6916122BC0A6870F991C6ED8D00D2F85' .
                            '94E3151DE4C5A19A9A06FBC191C87BF0' .
                            '39ADF971314BAF6D02337080F2DAE5CE'
            ],
            // set 5
            [
                'key' => '0000000000000000000000000000000000000000000000000000000000000000',
                'iv' => '8000000000000000',
                'result' => '2ABA3DC45B4947007B14C851CD694456' .
                            'B303AD59A465662803006705673D6C3E' .
                            '29F1D3510DFC0405463C03414E0E07E3' .
                            '59F1F1816C68B2434A19D3EEE0464873'
            ],
            // set 6
            [
                'key' => '0053A6F94C9FF24598EB3E91E4378ADD3083D6297CCF2275C81B6EC11467BA0D',
                'iv' => '0D74DB42A91077DE',
                'result' => 'F5FAD53F79F9DF58C4AEA0D0ED9A9601' .
                            'F278112CA7180D565B420A48019670EA' .
                            'F24CE493A86263F677B46ACE1924773D' .
                            '2BB25571E1AA8593758FC382B1280B71'
            ],
        ];

        $result = [];

        foreach ($engines as $engine) {
            foreach ($tests as $test) {
                $result[] = [$engine, $test['key'], $test['iv'], $test['result']];
            }
        }

        return $result;
    }

    /**
     * @dataProvider engineVectors
     */
    public function testVectors($engine, $key, $iv, $expected)
    {
        $cipher = new Salsa20();
        $cipher->setPreferredEngine($engine);
        $cipher->setKey(pack('H*', $key));
        $cipher->setNonce(pack('H*', $iv));
        if ($cipher->getEngine() != $engine) {
            self::markTestSkipped('Unable to initialize ' . $engine . ' engine for ' . (strlen($key) * 8) . '-bit key');
        }
        $result = $cipher->encrypt(str_repeat("\0", 64));
        $this->assertEquals(strtoupper(bin2hex($result)), $expected, "Failed asserting that key $key / $iv yielded expected output in $engine engine");
    }
}
