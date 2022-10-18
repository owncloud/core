<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\Random;
use phpseclib3\Crypt\RC4;
use phpseclib3\Tests\PhpseclibTestCase;

class RC4Test extends PhpseclibTestCase
{
    public function engineVectors()
    {
        $engines = [
            'PHP',
            'Eval',
            'mcrypt',
            'OpenSSL',
        ];
        // tests from https://tools.ietf.org/html/rfc6229
        $tests = [
            [
                'key' => pack('H*', '0102030405'), // 40-bit key
                'output' => [
                    ['offset' =>    0, 'result' => 'b2396305f03dc027ccc3524a0a1118a8'],
                    ['offset' =>   16, 'result' => '6982944f18fc82d589c403a47a0d0919'],
                    ['offset' =>  240, 'result' => '28cb1132c96ce286421dcaadb8b69eae'],
                    ['offset' =>  256, 'result' => '1cfcf62b03eddb641d77dfcf7f8d8c93'],
                    ['offset' =>  496, 'result' => '42b7d0cdd918a8a33dd51781c81f4041'],
                    ['offset' =>  512, 'result' => '6459844432a7da923cfb3eb4980661f6'],
                    ['offset' =>  752, 'result' => 'ec10327bde2beefd18f9277680457e22'],
                    ['offset' =>  768, 'result' => 'eb62638d4f0ba1fe9fca20e05bf8ff2b'],
                    ['offset' => 1008, 'result' => '45129048e6a0ed0b56b490338f078da5'],
                    ['offset' => 1024, 'result' => '30abbcc7c20b01609f23ee2d5f6bb7df'],
                    ['offset' => 1520, 'result' => '3294f744d8f9790507e70f62e5bbceea'],
                    ['offset' => 1536, 'result' => 'd8729db41882259bee4f825325f5a130'],
                    ['offset' => 2032, 'result' => '1eb14a0c13b3bf47fa2a0ba93ad45b8b'],
                    ['offset' => 2048, 'result' => 'cc582f8ba9f265e2b1be9112e975d2d7'],
                    ['offset' => 3056, 'result' => 'f2e30f9bd102ecbf75aaade9bc35c43c'],
                    ['offset' => 3072, 'result' => 'ec0e11c479dc329dc8da7968fe965681'],
                    ['offset' => 4080, 'result' => '068326a2118416d21f9d04b2cd1ca050'],
                    ['offset' => 4096, 'result' => 'ff25b58995996707e51fbdf08b34d875']
                ]
            ],
            [
                'key' => pack('H*', '01020304050607'), // 56-bit key
                'output' => [
                    ['offset' =>    0, 'result' => '293f02d47f37c9b633f2af5285feb46b'],
                    ['offset' =>   16, 'result' => 'e620f1390d19bd84e2e0fd752031afc1'],
                    ['offset' =>  240, 'result' => '914f02531c9218810df60f67e338154c'],
                    ['offset' =>  256, 'result' => 'd0fdb583073ce85ab83917740ec011d5'],
                    ['offset' =>  496, 'result' => '75f81411e871cffa70b90c74c592e454'],
                    ['offset' =>  512, 'result' => '0bb87202938dad609e87a5a1b079e5e4'],
                    ['offset' =>  752, 'result' => 'c2911246b612e7e7b903dfeda1dad866'],
                    ['offset' =>  768, 'result' => '32828f91502b6291368de8081de36fc2'],
                    ['offset' => 1008, 'result' => 'f3b9a7e3b297bf9ad804512f9063eff1'],
                    ['offset' => 1024, 'result' => '8ecb67a9ba1f55a5a067e2b026a3676f'],
                    ['offset' => 1520, 'result' => 'd2aa902bd42d0d7cfd340cd45810529f'],
                    ['offset' => 1536, 'result' => '78b272c96e42eab4c60bd914e39d06e3'],
                    ['offset' => 2032, 'result' => 'f4332fd31a079396ee3cee3f2a4ff049'],
                    ['offset' => 2048, 'result' => '05459781d41fda7f30c1be7e1246c623'],
                    ['offset' => 3056, 'result' => 'adfd3868b8e51485d5e610017e3dd609'],
                    ['offset' => 3072, 'result' => 'ad26581c0c5be45f4cea01db2f3805d5'],
                    ['offset' => 4080, 'result' => 'f3172ceffc3b3d997c85ccd5af1a950c'],
                    ['offset' => 4096, 'result' => 'e74b0b9731227fd37c0ec08a47ddd8b8']
                ]
            ],
            [
                'key' => pack('H*', '0102030405060708'), // 64-bit key
                'output' => [
                    ['offset' =>    0, 'result' => '97ab8a1bf0afb96132f2f67258da15a8'],
                    ['offset' =>   16, 'result' => '8263efdb45c4a18684ef87e6b19e5b09'],
                    ['offset' =>  240, 'result' => '9636ebc9841926f4f7d1f362bddf6e18'],
                    ['offset' =>  256, 'result' => 'd0a990ff2c05fef5b90373c9ff4b870a'],
                    ['offset' =>  496, 'result' => '73239f1db7f41d80b643c0c52518ec63'],
                    ['offset' =>  512, 'result' => '163b319923a6bdb4527c626126703c0f'],
                    ['offset' =>  752, 'result' => '49d6c8af0f97144a87df21d91472f966'],
                    ['offset' =>  768, 'result' => '44173a103b6616c5d5ad1cee40c863d0'],
                    ['offset' => 1008, 'result' => '273c9c4b27f322e4e716ef53a47de7a4'],
                    ['offset' => 1024, 'result' => 'c6d0e7b226259fa9023490b26167ad1d'],
                    ['offset' => 1520, 'result' => '1fe8986713f07c3d9ae1c163ff8cf9d3'],
                    ['offset' => 1536, 'result' => '8369e1a965610be887fbd0c79162aafb'],
                    ['offset' => 2032, 'result' => '0a0127abb44484b9fbef5abcae1b579f'],
                    ['offset' => 2048, 'result' => 'c2cdadc6402e8ee866e1f37bdb47e42c'],
                    ['offset' => 3056, 'result' => '26b51ea37df8e1d6f76fc3b66a7429b3'],
                    ['offset' => 3072, 'result' => 'bc7683205d4f443dc1f29dda3315c87b'],
                    ['offset' => 4080, 'result' => 'd5fa5a3469d29aaaf83d23589db8c85b'],
                    ['offset' => 4096, 'result' => '3fb46e2c8f0f068edce8cdcd7dfc5862']
                ]
            ],
            [
                'key' => pack('H*', '0102030405060708090a'), // 80-bit key
                'output' => [
                    ['offset' =>    0, 'result' => 'ede3b04643e586cc907dc21851709902'],
                    ['offset' =>   16, 'result' => '03516ba78f413beb223aa5d4d2df6711'],
                    ['offset' =>  240, 'result' => '3cfd6cb58ee0fdde640176ad0000044d'],
                    ['offset' =>  256, 'result' => '48532b21fb6079c9114c0ffd9c04a1ad'],
                    ['offset' =>  496, 'result' => '3e8cea98017109979084b1ef92f99d86'],
                    ['offset' =>  512, 'result' => 'e20fb49bdb337ee48b8d8dc0f4afeffe'],
                    ['offset' =>  752, 'result' => '5c2521eacd7966f15e056544bea0d315'],
                    ['offset' =>  768, 'result' => 'e067a7031931a246a6c3875d2f678acb'],
                    ['offset' => 1008, 'result' => 'a64f70af88ae56b6f87581c0e23e6b08'],
                    ['offset' => 1024, 'result' => 'f449031de312814ec6f319291f4a0516'],
                    ['offset' => 1520, 'result' => 'bdae85924b3cb1d0a2e33a30c6d79599'],
                    ['offset' => 1536, 'result' => '8a0feddbac865a09bcd127fb562ed60a'],
                    ['offset' => 2032, 'result' => 'b55a0a5b51a12a8be34899c3e047511a'],
                    ['offset' => 2048, 'result' => 'd9a09cea3ce75fe39698070317a71339'],
                    ['offset' => 3056, 'result' => '552225ed1177f44584ac8cfa6c4eb5fc'],
                    ['offset' => 3072, 'result' => '7e82cbabfc95381b080998442129c2f8'],
                    ['offset' => 4080, 'result' => '1f135ed14ce60a91369d2322bef25e3c'],
                    ['offset' => 4096, 'result' => '08b6be45124a43e2eb77953f84dc8553']
                ]
            ],
            [
                'key' => pack('H*', '0102030405060708090a0b0c0d0e0f10'), // 128-bit key
                'output' => [
                    ['offset' =>    0, 'result' => '9ac7cc9a609d1ef7b2932899cde41b97'],
                    ['offset' =>   16, 'result' => '5248c4959014126a6e8a84f11d1a9e1c'],
                    ['offset' =>  240, 'result' => '065902e4b620f6cc36c8589f66432f2b'],
                    ['offset' =>  256, 'result' => 'd39d566bc6bce3010768151549f3873f'],
                    ['offset' =>  496, 'result' => 'b6d1e6c4a5e4771cad79538df295fb11'],
                    ['offset' =>  512, 'result' => 'c68c1d5c559a974123df1dbc52a43b89'],
                    ['offset' =>  752, 'result' => 'c5ecf88de897fd57fed301701b82a259'],
                    ['offset' =>  768, 'result' => 'eccbe13de1fcc91c11a0b26c0bc8fa4d'],
                    ['offset' => 1008, 'result' => 'e7a72574f8782ae26aabcf9ebcd66065'],
                    ['offset' => 1024, 'result' => 'bdf0324e6083dcc6d3cedd3ca8c53c16'],
                    ['offset' => 1520, 'result' => 'b40110c4190b5622a96116b0017ed297'],
                    ['offset' => 1536, 'result' => 'ffa0b514647ec04f6306b892ae661181'],
                    ['offset' => 2032, 'result' => 'd03d1bc03cd33d70dff9fa5d71963ebd'],
                    ['offset' => 2048, 'result' => '8a44126411eaa78bd51e8d87a8879bf5'],
                    ['offset' => 3056, 'result' => 'fabeb76028ade2d0e48722e46c4615a3'],
                    ['offset' => 3072, 'result' => 'c05d88abd50357f935a63c59ee537623'],
                    ['offset' => 4080, 'result' => 'ff38265c1642c1abe8d3c2fe5e572bf8'],
                    ['offset' => 4096, 'result' => 'a36a4c301ae8ac13610ccbc12256cacc']
                ]
            ],
            [
                'key' => pack('H*', '0102030405060708090a0b0c0d0e0f101112131415161718'), // 192-bit key
                'output' => [
                    ['offset' =>    0, 'result' => '0595e57fe5f0bb3c706edac8a4b2db11'],
                    ['offset' =>   16, 'result' => 'dfde31344a1af769c74f070aee9e2326'],
                    ['offset' =>  240, 'result' => 'b06b9b1e195d13d8f4a7995c4553ac05'],
                    ['offset' =>  256, 'result' => '6bd2378ec341c9a42f37ba79f88a32ff'],
                    ['offset' =>  496, 'result' => 'e70bce1df7645adb5d2c4130215c3522'],
                    ['offset' =>  512, 'result' => '9a5730c7fcb4c9af51ffda89c7f1ad22'],
                    ['offset' =>  752, 'result' => '0485055fd4f6f0d963ef5ab9a5476982'],
                    ['offset' =>  768, 'result' => '591fc66bcda10e452b03d4551f6b62ac'],
                    ['offset' => 1008, 'result' => '2753cc83988afa3e1688a1d3b42c9a02'],
                    ['offset' => 1024, 'result' => '93610d523d1d3f0062b3c2a3bbc7c7f0'],
                    ['offset' => 1520, 'result' => '96c248610aadedfeaf8978c03de8205a'],
                    ['offset' => 1536, 'result' => '0e317b3d1c73b9e9a4688f296d133a19'],
                    ['offset' => 2032, 'result' => 'bdf0e6c3cca5b5b9d533b69c56ada120'],
                    ['offset' => 2048, 'result' => '88a218b6e2ece1e6246d44c759d19b10'],
                    ['offset' => 3056, 'result' => '6866397e95c140534f94263421006e40'],
                    ['offset' => 3072, 'result' => '32cb0a1e9542c6b3b8b398abc3b0f1d5'],
                    ['offset' => 4080, 'result' => '29a0b8aed54a132324c62e423f54b4c8'],
                    ['offset' => 4096, 'result' => '3cb0f3b5020a98b82af9fe154484a168']
                ]
            ],
            [
                'key' => pack('H*', '0102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f20'), // 256-bit key
                'output' => [
                    ['offset' =>    0, 'result' => 'eaa6bd25880bf93d3f5d1e4ca2611d91'],
                    ['offset' =>   16, 'result' => 'cfa45c9f7e714b54bdfa80027cb14380'],
                    ['offset' =>  240, 'result' => '114ae344ded71b35f2e60febad727fd8'],
                    ['offset' =>  256, 'result' => '02e1e7056b0f623900496422943e97b6'],
                    ['offset' =>  496, 'result' => '91cb93c787964e10d9527d999c6f936b'],
                    ['offset' =>  512, 'result' => '49b18b42f8e8367cbeb5ef104ba1c7cd'],
                    ['offset' =>  752, 'result' => '87084b3ba700bade955610672745b374'],
                    ['offset' =>  768, 'result' => 'e7a7b9e9ec540d5ff43bdb12792d1b35'],
                    ['offset' => 1008, 'result' => 'c799b596738f6b018c76c74b1759bd90'],
                    ['offset' => 1024, 'result' => '7fec5bfd9f9b89ce6548309092d7e958'],
                    ['offset' => 1520, 'result' => '40f250b26d1f096a4afd4c340a588815'],
                    ['offset' => 1536, 'result' => '3e34135c79db010200767651cf263073'],
                    ['offset' => 2032, 'result' => 'f656abccf88dd827027b2ce917d464ec'],
                    ['offset' => 2048, 'result' => '18b62503bfbc077fbabb98f20d98ab34'],
                    ['offset' => 3056, 'result' => '8aed95ee5b0dcbfbef4eb21d3a3f52f9'],
                    ['offset' => 3072, 'result' => '625a1ab00ee39a5327346bddb01a9c18'],
                    ['offset' => 4080, 'result' => 'a13a7c79c7e119b5ab0296ab28c300b9'],
                    ['offset' => 4096, 'result' => 'f3e4c0a2e02d1d01f7f0a74618af2b48']
                ]
            ]
        ];

        $result = [];

        foreach ($engines as $engine) {
            foreach ($tests as $test) {
                foreach ($test['output'] as $output) {
                    $result[] = [$engine, $test['key'], $output['offset'], $output['result']];
                }
            }
        }

        return $result;
    }

    /**
     * @dataProvider engineVectors
     */
    public function testVectors($engine, $key, $offset, $expected)
    {
        $rc4 = new RC4();
        $rc4->setPreferredEngine($engine);
        $rc4->setKey($key);
        if ($rc4->getEngine() != $engine) {
            self::markTestSkipped('Unable to initialize ' . $engine . ' engine for ' . (strlen($key) * 8) . '-bit key');
        }
        $result = $rc4->encrypt(str_repeat("\0", $offset + 16));
        $this->assertEquals(bin2hex(substr($result, -16)), $expected, "Failed asserting that key $key yielded expected output at offset $offset in $engine engine");
    }

    public function testKeySizes()
    {
        $objects = $engines = [];
        $temp = new RC4(RC4::MODE_CTR);
        $temp->setPreferredEngine('internal');
        $objects[] = $temp;
        $engines[] = 'internal';

        if ($temp->isValidEngine('mcrypt')) {
            $temp = new RC4(RC4::MODE_CTR);
            $temp->setPreferredEngine('mcrypt');
            $objects[] = $temp;
            $engines[] = 'mcrypt';
        }

        if ($temp->isValidEngine('openssl')) {
            $temp = new RC4(RC4::MODE_CTR);
            $temp->setPreferredEngine('openssl');
            $objects[] = $temp;
            $engines[] = 'OpenSSL';
        }

        if (count($objects) < 2) {
            self::markTestSkipped('Unable to initialize two or more engines');
        }

        $plaintext = str_repeat('.', 100);

        for ($keyLen = 5; $keyLen <= 256; $keyLen++) {
            $key = Random::string($keyLen);
            $objects[0]->setKey($key);
            $ref = $objects[0]->encrypt($plaintext);
            for ($i = 1; $i < count($objects); $i++) {
                $objects[$i]->setKey($key);
                $this->assertEquals($ref, $objects[$i]->encrypt($plaintext), "Failed asserting that {$engines[$i]} yields the same output as the internal engine with a key size of $keyLen");
            }
        }
    }
}
