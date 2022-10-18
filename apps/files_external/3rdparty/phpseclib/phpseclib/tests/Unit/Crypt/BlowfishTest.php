<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright MMXIII Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\Blowfish;
use phpseclib3\Crypt\Random;
use phpseclib3\Tests\PhpseclibTestCase;

class BlowfishTest extends PhpseclibTestCase
{
    public function engineVectors()
    {
        $engines = [
            'PHP',
            'Eval',
            'mcrypt',
            'OpenSSL',
        ];

        // tests from https://www.schneier.com/code/vectors.txt
        $tests = [
            // key, plaintext, ciphertext
            [pack('H*', '0000000000000000'), pack('H*', '0000000000000000'), pack('H*', '4EF997456198DD78')],
            [pack('H*', 'FFFFFFFFFFFFFFFF'), pack('H*', 'FFFFFFFFFFFFFFFF'), pack('H*', '51866FD5B85ECB8A')],
            [pack('H*', '3000000000000000'), pack('H*', '1000000000000001'), pack('H*', '7D856F9A613063F2')],
            [pack('H*', '1111111111111111'), pack('H*', '1111111111111111'), pack('H*', '2466DD878B963C9D')],
            [pack('H*', '0123456789ABCDEF'), pack('H*', '1111111111111111'), pack('H*', '61F9C3802281B096')],
            [pack('H*', '1111111111111111'), pack('H*', '0123456789ABCDEF'), pack('H*', '7D0CC630AFDA1EC7')],
            [pack('H*', '0000000000000000'), pack('H*', '0000000000000000'), pack('H*', '4EF997456198DD78')],
            [pack('H*', 'FEDCBA9876543210'), pack('H*', '0123456789ABCDEF'), pack('H*', '0ACEAB0FC6A0A28D')],
            [pack('H*', '7CA110454A1A6E57'), pack('H*', '01A1D6D039776742'), pack('H*', '59C68245EB05282B')],
            [pack('H*', '0131D9619DC1376E'), pack('H*', '5CD54CA83DEF57DA'), pack('H*', 'B1B8CC0B250F09A0')],
            [pack('H*', '07A1133E4A0B2686'), pack('H*', '0248D43806F67172'), pack('H*', '1730E5778BEA1DA4')],
            [pack('H*', '3849674C2602319E'), pack('H*', '51454B582DDF440A'), pack('H*', 'A25E7856CF2651EB')],
            [pack('H*', '04B915BA43FEB5B6'), pack('H*', '42FD443059577FA2'), pack('H*', '353882B109CE8F1A')],
            [pack('H*', '0113B970FD34F2CE'), pack('H*', '059B5E0851CF143A'), pack('H*', '48F4D0884C379918')],
            [pack('H*', '0170F175468FB5E6'), pack('H*', '0756D8E0774761D2'), pack('H*', '432193B78951FC98')],
            [pack('H*', '43297FAD38E373FE'), pack('H*', '762514B829BF486A'), pack('H*', '13F04154D69D1AE5')],
            [pack('H*', '07A7137045DA2A16'), pack('H*', '3BDD119049372802'), pack('H*', '2EEDDA93FFD39C79')],
            [pack('H*', '04689104C2FD3B2F'), pack('H*', '26955F6835AF609A'), pack('H*', 'D887E0393C2DA6E3')],
            [pack('H*', '37D06BB516CB7546'), pack('H*', '164D5E404F275232'), pack('H*', '5F99D04F5B163969')],
            [pack('H*', '1F08260D1AC2465E'), pack('H*', '6B056E18759F5CCA'), pack('H*', '4A057A3B24D3977B')],
            [pack('H*', '584023641ABA6176'), pack('H*', '004BD6EF09176062'), pack('H*', '452031C1E4FADA8E')],
            [pack('H*', '025816164629B007'), pack('H*', '480D39006EE762F2'), pack('H*', '7555AE39F59B87BD')],
            [pack('H*', '49793EBC79B3258F'), pack('H*', '437540C8698F3CFA'), pack('H*', '53C55F9CB49FC019')],
            [pack('H*', '4FB05E1515AB73A7'), pack('H*', '072D43A077075292'), pack('H*', '7A8E7BFA937E89A3')],
            [pack('H*', '49E95D6D4CA229BF'), pack('H*', '02FE55778117F12A'), pack('H*', 'CF9C5D7A4986ADB5')],
            [pack('H*', '018310DC409B26D6'), pack('H*', '1D9D5C5018F728C2'), pack('H*', 'D1ABB290658BC778')],
            [pack('H*', '1C587F1C13924FEF'), pack('H*', '305532286D6F295A'), pack('H*', '55CB3774D13EF201')],
            [pack('H*', '0101010101010101'), pack('H*', '0123456789ABCDEF'), pack('H*', 'FA34EC4847B268B2')],
            [pack('H*', '1F1F1F1F0E0E0E0E'), pack('H*', '0123456789ABCDEF'), pack('H*', 'A790795108EA3CAE')],
            [pack('H*', 'E0FEE0FEF1FEF1FE'), pack('H*', '0123456789ABCDEF'), pack('H*', 'C39E072D9FAC631D')],
            [pack('H*', '0000000000000000'), pack('H*', 'FFFFFFFFFFFFFFFF'), pack('H*', '014933E0CDAFF6E4')],
            [pack('H*', 'FFFFFFFFFFFFFFFF'), pack('H*', '0000000000000000'), pack('H*', 'F21E9A77B71C49BC')],
            [pack('H*', '0123456789ABCDEF'), pack('H*', '0000000000000000'), pack('H*', '245946885754369A')],
            [pack('H*', 'FEDCBA9876543210'), pack('H*', 'FFFFFFFFFFFFFFFF'), pack('H*', '6B5C5A9C5D9E0A5A')]
        ];

        $result = [];

        foreach ($engines as $engine) {
            foreach ($tests as $test) {
                $result[] = [$engine, $test[0], $test[1], $test[2]];
            }
        }

        return $result;
    }

    /**
     * @dataProvider engineVectors
     */
    public function testVectors($engine, $key, $plaintext, $expected)
    {
        $bf = new Blowfish('cbc');
        $bf->setKey($key);
        $bf->setIV(str_repeat("\0", $bf->getBlockLength() >> 3));

        if (!$bf->isValidEngine($engine)) {
            self::markTestSkipped("Unable to initialize $engine engine");
        }
        $bf->setPreferredEngine($engine);
        $bf->disablePadding();
        $result = $bf->encrypt($plaintext);
        $plaintext = bin2hex($plaintext);
        $this->assertEquals($result, $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");
    }

    public function testKeySizes()
    {
        $objects = $engines = [];
        $temp = new Blowfish('ctr');
        $temp->setPreferredEngine('PHP');
        $objects[] = $temp;
        $engines[] = 'internal';

        if ($temp->isValidEngine('mcrypt')) {
            $temp = new Blowfish('ctr');
            $temp->setPreferredEngine('mcrypt');
            $objects[] = $temp;
            $engines[] = 'mcrypt';
        }

        if ($temp->isValidEngine('OpenSSL')) {
            $temp = new Blowfish('ctr');
            $temp->setPreferredEngine('OpenSSL');
            $objects[] = $temp;
            $engines[] = 'OpenSSL';
        }

        if (count($objects) < 2) {
            self::markTestSkipped('Unable to initialize two or more engines');
        }

        for ($i = 0; $i < count($objects); $i++) {
            $objects[$i]->setIV(str_repeat('x', $objects[$i]->getBlockLength() >> 3));
        }

        $plaintext = str_repeat('.', 100);

        for ($keyLen = 4; $keyLen <= 56; $keyLen++) {
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
