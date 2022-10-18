<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2012 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Math\BigInteger;

use phpseclib3\Tests\PhpseclibTestCase;

abstract class TestCase extends PhpseclibTestCase
{
    public function testConstructorBase2()
    {
        // 2**65 = 36893488147419103232
        $this->assertSame('36893488147419103232', (string) $this->getInstance('1' . str_repeat('0', 65), 2));
    }

    public function testConstructorBase10()
    {
        $this->assertSame('18446744073709551616', (string) $this->getInstance('18446744073709551616'));
    }

    public function testConstructorBase16()
    {
        $this->assertSame('50', (string) $this->getInstance('0x32', 16));
        $this->assertSame('12345678910', (string) $this->getInstance('0x2DFDC1C3E', 16));
        $this->assertSame('18446744073709551615', (string) $this->getInstance('0xFFFFFFFFFFFFFFFF', 16));
        $this->assertSame('18446744073709551616', (string) $this->getInstance('0x10000000000000000', 16));
    }

    public function testConstructorBase256()
    {
        $this->assertSame('-128', (string) $this->getInstance("\x80", -256));
    }

    public function testToBytes()
    {
        $this->assertSame(chr(65), $this->getInstance('65')->toBytes());
    }

    public function testToBytesTwosCompliment()
    {
        $this->assertSame(chr(126), $this->getInstance('01111110', 2)->toBytes(true));
    }

    public function testToHex()
    {
        $this->assertSame('41', $this->getInstance('65')->toHex());
    }

    public function testToBits()
    {
        $this->assertSame('1000001', $this->getInstance('65')->toBits());
        $this->assertSame('10', $this->getInstance('-2')->toBits());
        $this->assertSame('11111110', $this->getInstance('-2')->toBits(true));
    }

    public function testAdd()
    {
        $x = $this->getInstance('18446744073709551615');
        $y = $this->getInstance('100000000000');

        $a = $x->add($y);
        $b = $y->add($x);

        $this->assertTrue($a->equals($b));
        $this->assertTrue($b->equals($a));

        $this->assertSame('18446744173709551615', (string) $a);
        $this->assertSame('18446744173709551615', (string) $b);
    }

    public function testSubtract()
    {
        $x = $this->getInstance('18446744073709551618');
        $y = $this->getInstance('4000000000000');
        $this->assertSame('18446740073709551618', (string) $x->subtract($y));
    }

    public function testMultiply()
    {
        $x = $this->getInstance('8589934592');                // 2**33
        $y = $this->getInstance('36893488147419103232');    // 2**65

        $a = $x->multiply($y); // 2**98
        $b = $y->multiply($x); // 2**98

        $this->assertTrue($a->equals($b));
        $this->assertTrue($b->equals($a));

        $this->assertSame('316912650057057350374175801344', (string) $a);
        $this->assertSame('316912650057057350374175801344', (string) $b);
    }

    public function testDivide()
    {
        $x = $this->getInstance('1180591620717411303425');    // 2**70 + 1
        $y = $this->getInstance('12345678910');

        list($q, $r) = $x->divide($y);

        $this->assertSame('95627922070', (string) $q);
        $this->assertSame('10688759725', (string) $r);

        $x = $this->getInstance('3369993333393829974333376885877453834204643052817571560137951281152');
        $y = $this->getInstance('4294967296');

        list($q, $r) = $x->divide($y);

        $this->assertSame('784637716923335095479473677900958302012794430558004314112', (string) $q);
        $this->assertSame('0', (string) $r);

        $x = $this->getInstance('3369993333393829974333376885877453834204643052817571560137951281153');
        $y = $this->getInstance('4294967296');

        list($q, $r) = $x->divide($y);

        $this->assertSame('784637716923335095479473677900958302012794430558004314112', (string) $q);
        $this->assertSame('1', (string) $r);
    }

    public function testModPow()
    {
        $a = $this->getInstance('10');
        $b = $this->getInstance('20');
        $c = $this->getInstance('30');
        $d = $a->modPow($b, $c);

        $this->assertSame('10', (string) $d);
    }

    public function testModInverse()
    {
        $a = $this->getInstance(30);
        $b = $this->getInstance(17);

        $c = $a->modInverse($b);
        $this->assertSame('4', (string) $c);

        $d = $a->multiply($c);
        list($q, $r) = $d->divide($b);
        $this->assertSame('1', (string) $r);
    }

    public function testExtendedGCD()
    {
        $a = $this->getInstance(693);
        $b = $this->getInstance(609);

        $arr = $a->extendedGCD($b);

        $this->assertSame('21', (string) $arr['gcd']);
        $this->assertSame(21, $a->toString() * $arr['x']->toString() + $b->toString() * $arr['y']->toString());
    }

    public function testGCD()
    {
        $x = $this->getInstance(693);
        $y = $this->getInstance(609);
        $this->assertSame('21', (string) $x->gcd($y));
    }

    public function testAbs()
    {
        $x = $this->getInstance('-18446744073709551617');
        $y = $x->abs();

        $this->assertSame('-18446744073709551617', (string) $x);
        $this->assertSame('18446744073709551617', (string) $y);
    }

    public function testEquals()
    {
        $x = $this->getInstance('18446744073709551616');
        $y = $this->getInstance('18446744073709551616');

        $this->assertTrue($x->equals($y));
        $this->assertTrue($y->equals($x));
    }

    public function testCompare()
    {
        $a = $this->getInstance('-18446744073709551616');
        $b = $this->getInstance('36893488147419103232');
        $c = $this->getInstance('36893488147419103232');
        $d = $this->getInstance('316912650057057350374175801344');

        // a < b
        $this->assertLessThan(0, $a->compare($b));
        $this->assertGreaterThan(0, $b->compare($a));

        // b = c
        $this->assertSame(0, $b->compare($c));
        $this->assertSame(0, $c->compare($b));

        // c < d
        $this->assertLessThan(0, $c->compare($d));
        $this->assertGreaterThan(0, $d->compare($c));

        $this->assertSame(-1, $this->getInstance(-999)->compare($this->getInstance(370)));
        $this->assertSame(1, $this->getInstance(999)->compare($this->getInstance(-700)));
    }

    public function testBitwiseAND()
    {
        $x = $this->getInstance('66666666666666666666666', 16);
        $y = $this->getInstance('33333333333333333333333', 16);
        $z = $this->getInstance('22222222222222222222222', 16);

        $this->assertSame($z->toHex(), $x->bitwise_AND($y)->toHex());
    }

    public function testBitwiseOR()
    {
        $x = $this->getInstance('11111111111111111111111', 16);
        $y = $this->getInstance('EEEEEEEEEEEEEEEEEEEEEEE', 16);
        $z = $this->getInstance('FFFFFFFFFFFFFFFFFFFFFFF', 16);

        $this->assertSame($z->toHex(), $x->bitwise_OR($y)->toHex());

        $x = -0xFFFF;
        $y = 2;
        $z = $x ^ $y;

        $x = $this->getInstance($x);
        $y = $this->getInstance($y);
        $z = $this->getInstance($z);

        $this->assertSame($z->toString(), $x->bitwise_OR($y)->toString());
        $this->assertSame($z->toString(), $y->bitwise_OR($x)->toString());
    }

    public function testBitwiseXOR()
    {
        $x = $this->getInstance('AFAFAFAFAFAFAFAFAFAFAFAF', 16);
        $y = $this->getInstance('133713371337133713371337', 16);
        $z = $this->getInstance('BC98BC98BC98BC98BC98BC98', 16);

        $this->assertSame($z->toHex(), $x->bitwise_XOR($y)->toHex());

        // @group github1245

        $a = $this->getInstance(1);
        $b = $this->getInstance(-2);
        $c = $a->bitwise_xor($b);
        $this->assertSame("$c", '-1');

        $a = $this->getInstance('-6725760161961546982');
        $b = $this->getInstance(51);
        $c = $a->bitwise_xor($b);
        $this->assertSame("$c", '-6725760161961546967');
    }

    public function testBitwiseNOT()
    {
        $x = $this->getInstance('EEEEEEEEEEEEEEEEEEEEEEE', 16);
        $z = $this->getInstance('11111111111111111111111', 16);

        $this->assertSame($z->toHex(), $x->bitwise_NOT()->toHex());

        $a = $this->getInstance(0);
        $a->bitwise_not();

        $this->assertSame($a->toString(), '0');
    }

    public function testBitwiseLeftShift()
    {
        $x = $this->getInstance('0x0000000FF0000000', 16);
        $y = $this->getInstance('0x000FF00000000000', 16);

        $this->assertSame($y->toHex(), $x->bitwise_LeftShift(16)->toHex());
    }

    public function testBitwiseRightShift()
    {
        $x = $this->getInstance('0x0000000FF0000000', 16);
        $y = $this->getInstance('0x00000000000FF000', 16);
        $z = $this->getInstance('0x000000000000000F', 16);
        $n = $this->getInstance(0);

        $this->assertSame($y->toHex(), $x->bitwise_RightShift(16)->toHex());
        $this->assertSame($z->toHex(), $x->bitwise_RightShift(32)->toHex());
        $this->assertSame($n->toHex(), $x->bitwise_RightShift(36)->toHex());
    }

    public function testSerializable()
    {
        $x = $this->getInstance('18446744073709551616');
        $y = unserialize(serialize($x));

        $this->assertTrue($x->equals($y));
        $this->assertTrue($y->equals($x));

        $this->assertSame('18446744073709551616', (string) $x);
        $this->assertSame('18446744073709551616', (string) $y);
    }

    public function testClone()
    {
        $x = $this->getInstance('18446744073709551616');
        $y = clone $x;

        $this->assertTrue($x->equals($y));
        $this->assertTrue($y->equals($x));

        $this->assertSame('18446744073709551616', (string) $x);
        $this->assertSame('18446744073709551616', (string) $y);
    }

    public function testRandomTwoArgument()
    {
        $min = $this->getInstance(0);
        $max = $this->getInstance('18446744073709551616');

        $class = static::getStaticClass();
        $rand1 = $class::randomRange($min, $max);
        // technically $rand1 can equal $min but with the $min and $max we've
        // chosen it's just not that likely
        $this->assertTrue($rand1->compare($min) > 0);
        $this->assertTrue($rand1->compare($max) < 0);
    }

    /**
     * @group github279
     */
    public function testDiffieHellmanKeyAgreement()
    {
        // "Oakley Group 14" 2048-bit modular exponentiation group as used in
        // SSH2 diffie-hellman-group14-sha1
        $prime = $this->getInstance(
            'FFFFFFFFFFFFFFFFC90FDAA22168C234C4C6628B80DC1CD1' .
            '29024E088A67CC74020BBEA63B139B22514A08798E3404DD' .
            'EF9519B3CD3A431B302B0A6DF25F14374FE1356D6D51C245' .
            'E485B576625E7EC6F44C42E9A637ED6B0BFF5CB6F406B7ED' .
            'EE386BFB5A899FA5AE9F24117C4B1FE649286651ECE45B3D' .
            'C2007CB8A163BF0598DA48361C55D39A69163FA8FD24CF5F' .
            '83655D23DCA3AD961C62F356208552BB9ED529077096966D' .
            '670C354E4ABC9804F1746C08CA18217C32905E462E36CE3B' .
            'E39E772C180E86039B2783A2EC07A28FB5C55DF06F4C52C9' .
            'DE2BCBF6955817183995497CEA956AE515D2261898FA0510' .
            '15728E5A8AACAA68FFFFFFFFFFFFFFFF',
            16
        );
        $generator = $this->getInstance(2);

        /*
        Code for generation of $alicePrivate and $bobPrivate.
        $class = static::getStaticClass();
        $one = $this->getInstance(1);
        $max = $one->bitwise_leftShift(512)->subtract($one);
        $alicePrivate = $static::randomRange($one, $max);
        $bobPrivate = $static::randomRange($one, $max);
        var_dump($alicePrivate->toHex(), $bobPrivate->toHex());
        */

        $alicePrivate = $this->getInstance(
            '22606EDA7960458BC9D65F46DD96F114F9A004F0493C1F26' .
            '2139D2C8063B733162E876182CA3BF063AB1A167ABDB7F03' .
            'E0A225A6205660439F6CE46D252069FF',
            16
        );
        $bobPrivate = $this->getInstance(
            '6E3EFA13A96025D63E4B0D88A09B3A46DDFE9DD3BC9D1655' .
            '4898C02B4AC181F0CEB4E818664B12F02C71A07215C400F9' .
            '88352A4779F3E88836F7C3D3B3C739DE',
            16
        );

        $alicePublic = $generator->modPow($alicePrivate, $prime);
        $bobPublic =  $generator->modPow($bobPrivate, $prime);

        $aliceShared = $bobPublic->modPow($alicePrivate, $prime);
        $bobShared = $alicePublic->modPow($bobPrivate, $prime);

        $this->assertTrue(
            $aliceShared->equals($bobShared),
            'Failed asserting that Alice and Bob share the same BigInteger.'
        );
    }

    public function testDebugInfo()
    {
        $num = $this->getInstance(50);
        $str = print_r($num, true);
        $this->assertStringContainsString('[value] => 0x32', $str);
    }

    public function testPrecision()
    {
        $a = $this->getInstance(51);
        $this->assertSame($a->getPrecision(), -1);
        $b = $a;
        $c = clone $a;
        $b->setPrecision(1);
        $this->assertSame($a->getPrecision(), 1);
        $this->assertSame("$a", '1');
        $this->assertSame($b->getPrecision(), 1);
        $this->assertSame("$b", '1');
        $this->assertSame($c->getPrecision(), -1);
        $this->assertSame("$c", '51');
    }

    /**
     * @group github954
     */
    public function testSlidingWindow()
    {
        $e = $this->getInstance(str_repeat('1', 1794), 2);
        $x = $this->getInstance(1);
        $n = $this->getInstance(2);
        self::assertSame('1', $x->powMod($e, $n)->toString());
    }

    public function testRoot()
    {
        $bigInteger = $this->getInstance('64000000'); // (20^2)^3
        $bigInteger = $bigInteger->root();
        $this->assertSame('8000', (string) $bigInteger);
        $bigInteger = $bigInteger->root(3);
        $this->assertSame('20', (string) $bigInteger);
    }

    public function testPow()
    {
        $bigInteger = $this->getInstance('20');
        $two = $this->getInstance('2');
        $three = $this->getInstance('3');
        $bigInteger = $bigInteger->pow($two);
        $this->assertSame('400', (string) $bigInteger);
        $bigInteger = $bigInteger->pow($three);
        $this->assertSame('64000000', (string) $bigInteger); // (20^2)^3
    }

    public function testMax()
    {
        $class = static::getStaticClass();
        $min = $this->getInstance('20');
        $max = $this->getInstance('20000');
        $this->assertSame((string) $max, (string) $class::max($min, $max));
        $this->assertSame((string) $max, (string) $class::max($max, $min));
    }

    public function testMin()
    {
        $class = static::getStaticClass();
        $min = $this->getInstance('20');
        $max = $this->getInstance('20000');
        $this->assertSame((string) $min, (string) $class::min($min, $max));
        $this->assertSame((string) $min, (string) $class::min($max, $min));
    }

    public function testRandomPrime()
    {
        $class = static::getStaticClass();
        $prime = $class::randomPrime(128);
        $this->assertSame(128, $prime->getLength());
    }

    /**
     * @group github1260
     */
    public function testZeros()
    {
        $a = $this->getInstance();
        $b = $this->getInstance('00', 16);
        $this->assertTrue($a->equals($b));
    }

    /**
     * @group github1264
     */
    public function test48ToHex()
    {
        $temp = $this->getInstance(48);
        $this->assertSame($temp->toHex(true), '30');
    }

    public function testZeroBase10()
    {
        $temp = $this->getInstance('00');
        $this->assertSame($temp->toString(), '0');

        $temp = $this->getInstance('-0');
        $this->assertSame($temp->toString(), '0');
    }

    public function testNegativePrecision()
    {
        $vals = [
            '-9223372036854775808', // eg. 8000 0000 0000 0000
            '-1'
        ];
        foreach ($vals as $val) {
            $x = $this->getInstance($val);
            $x->setPrecision(64); // ie. 8 bytes
            $this->assertSame($val, "$x");
            $r = $x->toBytes(true);
            $this->assertSame(8, strlen($r));
            $x2 = $this->getInstance($r, -256);
            $this->assertSame(0, $x->compare($x2));
        }
    }
}
