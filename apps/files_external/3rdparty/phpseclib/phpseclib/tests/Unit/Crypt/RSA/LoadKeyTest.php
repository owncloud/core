<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2013 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\RSA;

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\RSA\Formats\Keys\OpenSSH;
use phpseclib3\Crypt\RSA\Formats\Keys\PKCS1;
use phpseclib3\Crypt\RSA\Formats\Keys\PKCS8;
use phpseclib3\Crypt\RSA\Formats\Keys\PSS;
use phpseclib3\Crypt\RSA\Formats\Keys\PuTTY;
use phpseclib3\Crypt\RSA\PrivateKey;
use phpseclib3\Crypt\RSA\PublicKey;
use phpseclib3\Exception\NoKeyLoadedException;
use phpseclib3\Exception\UnsupportedFormatException;
use phpseclib3\Math\BigInteger;
use phpseclib3\Tests\PhpseclibTestCase;

class LoadKeyTest extends PhpseclibTestCase
{
    public static function setUpBeforeClass()
    {
        PuTTY::setComment('phpseclib-generated-key');
        OpenSSH::setComment('phpseclib-generated-key');
    }

    public function testBadKey()
    {
        $this->expectException(NoKeyLoadedException::class);

        $key = 'zzzzzzzzzzzzzz';
        PublicKeyLoader::load($key);
    }

    public function testLoadModulusAndExponent()
    {
        $rsa = PublicKeyLoader::load([
            'e' => new BigInteger('123', 16),
            'n' => new BigInteger('123', 16)
        ]);

        $this->assertInstanceOf(PublicKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPKCS1Key()
    {
        $key = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp
wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5
1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh
3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2
pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX
GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il
AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF
L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k
X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl
U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ
37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=
-----END RSA PRIVATE KEY-----';

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPKCS1SpacesKey()
    {
        $key = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp
wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5
1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh
3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2
pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX
GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il
AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF
L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k
X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl
U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ
37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=
-----END RSA PRIVATE KEY-----';
        $key = str_replace(["\r", "\n", "\r\n"], ' ', $key);

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPKCS1NoHeaderKey()
    {
        $key = 'MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp
wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5
1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh
3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2
pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX
GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il
AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF
L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k
X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl
U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ
37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=';

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPKCS1NoWhitespaceNoHeaderKey()
    {
        $key = 'MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp' .
               'wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5' .
               '1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh' .
               '3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2' .
               'pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX' .
               'GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il' .
               'AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF' .
               'L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k' .
               'X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl' .
               'U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ' .
               '37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=';

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testRawPKCS1Key()
    {
        $key = 'MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp' .
               'wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5' .
               '1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh' .
               '3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2' .
               'pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX' .
               'GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il' .
               'AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF' .
               'L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k' .
               'X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl' .
               'U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ' .
               '37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=';
        $key = base64_decode($key);

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testLoadPKCS8PrivateKey()
    {
        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE6TAbBgkqhkiG9w0BBQMwDgQIcWWgZeQYPTcCAggABIIEyLoa5b3ktcPmy4VB
hHkpHzVSEsKJPmQTUaQvUwIp6+hYZeuOk78EPehrYJ/QezwJRdyBoD51oOxqWCE2
fZ5Wf6Mi/9NIuPyqQccP2ouErcMAcDLaAx9C0Ot37yoG0S6hOZgaxqwnCdGYKHgS
7cYUv40kLOJmTOJlHJbatfXHocrHcHkCBJ1q8wApA1KVQIZsqmyBUBuwbrfFwpC9
d/R674XxCWJpXvU63VNZRFYUvd7YEWCrdSeleb99p0Vn1kxI5463PXurgs/7GPiO
SLSdX44DESP9l7lXenC4gbuT8P0xQRDzGrB5l9HHoV3KMXFODWTMnLcp1nuhA0OT
fPS2yzT9zJgqHiVKWgcUUJ5uDelVfnsmDhnh428p0GBFbniH07qREC9kq78UqQNI
Kybp4jQ4sPs64zdYm/VyLWtAYz8QNAKHLcnPwmTPr/XlJmox8rlQhuSQTK8E+lDr
TOKpydrijN3lF+pgyUuUj6Ha8TLMcOOwqcrpBig4SGYoB56gjAO0yTE9uCPdBakj
yxi3ksn51ErigGM2pGMNcVdwkpJ/x+DEBBO0auy3t9xqM6LK8pwNcOT1EWO+16zY
79LVSavc49t+XxMc3Xasz/G5xQgD1FBp6pEnsg5JhTTG/ih6Y/DQD8z3prjC3qKc
rpL4NA9KBI/IF1iIXlrfmN/zCKbBuEOEGqwcHBDHPySZbhL2XLSpGcK/NBl1bo1Z
G+2nUTauoC67Qb0+fnzTcvOiMNAbHMiqkirs4anHX33MKL2gR/3dp8ca9hhWWXZz
Mkk2FK9sC/ord9F6mTtvTiOSDzpiEhb94uTxXqBhIbsrGXCUUd0QQN5s2dmW2MfS
M35KeSv2rwDGzC1+Qf3MhHGIZDqoQwuZEzM5yHHafCatAbZd2sjaFWegg0r2ca7a
eZkZFj3ZuDYXJFnL82guOASh7rElWO2Ys7ncXAKnaV3WkkF+JDv/CUHr+Q/h6Ae5
qEvgubTCVSYHzRP37XJItlcdywTIcTY+t6jymmyEBJ66LmUoD47gt/vDUSbhT6Oa
GlcZ+MZGlUnPOSq4YknOgwKH8izboY4UgVCrmXvlaZYQhZemNDkVbpYVDf+s6cPf
tJwVoZf+qf2SsRTUsI10isoIzCyGw2ie8kmipdP434Z/99uVU3zxD6raNDlyp33q
FWMgpr2JU6NVAla7N51g7Jk8VjIIn7SvCYyWkmvv4kLB1UHl3NFqYb9YuIZUaDyt
j/NMcKMLLOaEorRZ2N2mDNoihMxMf8J3J9APnzUigAtaalGKNOrd2Fom5OVADePv
Tb5sg1uVQzfcpFrjIlLVh+2cekX0JM84phbMpHmm5vCjjfYvUvcMy0clCf0x3jz6
LZf5Fzc8xbZmpse5OnOrsDLCNh+SlcYOzsagSZq4TgvSeI9Tr4lv48dLJHCCcYKL
eymS9nhlCFuuHbi7zI7edcI49wKUW1Sj+kvKq3LMIEkMlgzqGKA6JqSVxHP51VH5
FqV4aKq70H6dNJ43bLVRPhtF5Bip5P7k/6KIsGTPUd54PHey+DuWRjitfheL0G2w
GF/qoZyC1mbqdtyyeWgHtVbJVUORmpbNnXOII9duEqBUNDiO9VSZNn/8h/VsYeAB
xryZaRDVmtMuf/OZBQ==
-----END ENCRYPTED PRIVATE KEY-----';

        $rsa = PublicKeyLoader::load($key, 'password');

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testSavePKCS8PrivateKey()
    {
        $key = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp
wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ5
1s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBLh
3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2
pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQX
GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63il
AkEAxCL5HQb2bQr4ByorcMWm/hEP2MZzROV73yF41hPsRC9m66KrheO9HPTJuo3/9s5p+sqGxOlF
L0NDt4SkosjgGwJAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5k
X6zk7S0ljKtt2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2epl
U9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhMCQBGoiuSoSjafUhV7i1cEGpb88h5NBYZzWXGZ
37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ4p0=
-----END RSA PRIVATE KEY-----';

        $rsa = PublicKeyLoader::load($key, 'password');

        $this->assertInstanceOf(PrivateKey::class, $rsa);

        $key = (string) $rsa->withPassword('password');
        $rsa = PublicKeyLoader::load($key, 'password');

        $this->assertInstanceOf(PrivateKey::class, $rsa);
    }

    public function testPubKey1()
    {
        $key = '-----BEGIN RSA PUBLIC KEY-----
MIIBCgKCAQEA61BjmfXGEvWmegnBGSuS+rU9soUg2FnODva32D1AqhwdziwHINFa
D1MVlcrYG6XRKfkcxnaXGfFDWHLEvNBSEVCgJjtHAGZIm5GL/KA86KDp/CwDFMSw
luowcXwDwoyinmeOY9eKyh6aY72xJh7noLBBq1N0bWi1e2i+83txOCg4yV2oVXhB
o8pYEJ8LT3el6Smxol3C1oFMVdwPgc0vTl25XucMcG/ALE/KNY6pqC2AQ6R2ERlV
gPiUWOPatVkt7+Bs3h5Ramxh7XjBOXeulmCpGSynXNcpZ/06+vofGi/2MlpQZNhH
Ao8eayMp6FcvNucIpUndo1X8dKMv3Y26ZQIDAQAB
-----END RSA PUBLIC KEY-----';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
    }

    public function testPubKey2()
    {
        $key = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA61BjmfXGEvWmegnBGSuS
+rU9soUg2FnODva32D1AqhwdziwHINFaD1MVlcrYG6XRKfkcxnaXGfFDWHLEvNBS
EVCgJjtHAGZIm5GL/KA86KDp/CwDFMSwluowcXwDwoyinmeOY9eKyh6aY72xJh7n
oLBBq1N0bWi1e2i+83txOCg4yV2oVXhBo8pYEJ8LT3el6Smxol3C1oFMVdwPgc0v
Tl25XucMcG/ALE/KNY6pqC2AQ6R2ERlVgPiUWOPatVkt7+Bs3h5Ramxh7XjBOXeu
lmCpGSynXNcpZ/06+vofGi/2MlpQZNhHAo8eayMp6FcvNucIpUndo1X8dKMv3Y26
ZQIDAQAB
-----END PUBLIC KEY-----';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
    }


    public function testPubKeyPssWithoutParams()
    {
        // extracted from a SubjectPublicKeyInfo of a CSR created by OpenSSL
        $key = '-----BEGIN PUBLIC KEY-----
MIIBIDALBgkqhkiG9w0BAQoDggEPADCCAQoCggEBANHPPf5tjTmEHtQvzi6+rItj
G3OUvh6Nihc9bXSu0xNFjl/9TdyIXstRUG/Lh07isHgZFEfXn4pmm/iZIQh09ACg
TjEau8rpcLB0BS9dDgTh8hvgkbdxWR2UPxk34bFcdgIplckslAfB4+/ebL+ObvUa
W3sZosTq3D6/qh0fujGZg/EKLJcNCHI27XMiAT5yWztSjHWwQm7LBwJ5uKlFLEDC
Z/+LIV/vPEIMfE6lA/+OnLKwVFB540eXQPuWar1ARHXN8PpiCqJHanddYMA5l/Cw
5R7kJ+CBoHzaPePXjB9V1bfzEBzBHb2ddiSjum+qtLWuH0Q7B8gPX9EjxIwuCzMC
AwEAAQ==
-----END PUBLIC KEY-----';
        $key = str_replace(["\r", "\n", "\r\n"], ' ', $key);

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PublicKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPrivateKeyPssWithoutParams()
    {
        $key = '-----BEGIN PRIVATE KEY-----
MIIEugIBADALBgkqhkiG9w0BAQoEggSmMIIEogIBAAKCAQEA0c89/m2NOYQe1C/O
Lr6si2Mbc5S+Ho2KFz1tdK7TE0WOX/1N3Ihey1FQb8uHTuKweBkUR9efimab+Jkh
CHT0AKBOMRq7yulwsHQFL10OBOHyG+CRt3FZHZQ/GTfhsVx2AimVySyUB8Hj795s
v45u9RpbexmixOrcPr+qHR+6MZmD8Qoslw0IcjbtcyIBPnJbO1KMdbBCbssHAnm4
qUUsQMJn/4shX+88Qgx8TqUD/46csrBUUHnjR5dA+5ZqvUBEdc3w+mIKokdqd11g
wDmX8LDlHuQn4IGgfNo949eMH1XVt/MQHMEdvZ12JKO6b6q0ta4fRDsHyA9f0SPE
jC4LMwIDAQABAoIBAFPuTMWAO7Obh92oNhn7CvlDr1KgWSHNy0UavLOl0ChwddEu
erxTDWDWaZAfYkSLaL7SgYtv1ZG/FHvxfgZtCsNJXZ5FLISyt/LOpthYqGgJnxnJ
z2EMBfNQP6Gt+ipCa67XxeTRYXJs/OsTFnvW1cpVPe1TxwpxTaQIdlvqOkjmgCci
TRzH+Acj8unWDHAJpQkCOvmi+25sE0BMQYWnsfMSzm63Yk3SeZLIJKqoUdZhYMZU
6FK2DMDNR4TZps7s50MFlZfUUJfzgb4Hb4miiKzLPhf4q7rxS4VzrvUQ/81ySCwi
1LaSw5HoH1YMDT6rwcHMwHhzhu8X2CKlNIrri8ECgYEA7aiZAxmlY28LWcXHqqhZ
Yky76vLy/mbs0TfAVK2pSqyFhaGZe5daAJSIrVcZEEgAwR6/ZLITTWBuGdsHw6vF
GtSvkElLhopmQEs73kKqeBFLhpTqYXYVW0txi3jdWElie8fZa/Oa/sFLEeNsibQu
fbVWWGakf9458FDuR0i2k+ECgYEA4gBu2u6xkJzqOzOjBg5tNhxmzcPyt4Ds3ryA
e+C5hVCotd1EX6HZRPYjLEys0yUhiXDAn7ViEdtiXt9RYfpK+OKLGeTZ7pMCyZW+
Yhc0i2XYqWSKUH3iNonp8B0JSkfEQBY2KlA7b5YZQZkr/Ml/WtoKeicHLBcdVxqa
t7krQZMCgYBMU7GQxVPQs4E5u8N8k8ThRTO1KYHRIs08BGPIzl1oli/r0xKwFtPZ
C9s5kJeEGxvi6jUd6fM5DpdNxoKf3TLYgyY/eMrA0wIz8/WuVErbdPKErp733izN
vVUiLhcom6j9iBnUCdDlsL6jaB8burqTtQGeMpjyWDTTcaqVSk0ZAQKBgCqc1EoZ
eYd/3rZc7R8mNzddsZCYorow5/izaDJzU+esJrNrzgmOFc5n7ofayTdip+knRlqW
s7AUQn8K8mhb7ijxZjLysJjIRV1HC8epAnJKOMjvuRimM7H+3Qo2H1tPHtTKm1nt
GNfYYFi7Dc0zHP0/YXxYwYRxs0mKLaP4mQxbAoGARHngPhGC0yM5KqxNrkHPVjLq
CHQy+e9GTPXtDLC3D7HAYyyzKqy4mdBDzMeLqA3a+iT2PXjn4w5zOEW8GAcRYRtG
3EyvclPmWtmCpU5xqD8ieFtQhMeW/XzJHjTXlcncz0PCkGVoQiuRvXWNAukNPg0D
BocC2CO6SNi4Qjr3NlM=
-----END PRIVATE KEY-----';

        $key = str_replace(["\r", "\n", "\r\n"], ' ', $key);

        $rsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString("$rsa");
    }

    public function testPubPrivateKey()
    {
        $key = '-----BEGIN RSA PUBLIC KEY-----
MIIBCgKCAQEA61BjmfXGEvWmegnBGSuS+rU9soUg2FnODva32D1AqhwdziwHINFa
D1MVlcrYG6XRKfkcxnaXGfFDWHLEvNBSEVCgJjtHAGZIm5GL/KA86KDp/CwDFMSw
luowcXwDwoyinmeOY9eKyh6aY72xJh7noLBBq1N0bWi1e2i+83txOCg4yV2oVXhB
o8pYEJ8LT3el6Smxol3C1oFMVdwPgc0vTl25XucMcG/ALE/KNY6pqC2AQ6R2ERlV
gPiUWOPatVkt7+Bs3h5Ramxh7XjBOXeulmCpGSynXNcpZ/06+vofGi/2MlpQZNhH
Ao8eayMp6FcvNucIpUndo1X8dKMv3Y26ZQIDAQAB
-----END RSA PUBLIC KEY-----';

        $rsa = PublicKeyLoader::load($key)->asPrivateKey();
        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertIsString($rsa->sign('zzz'));
    }

    public function testSSHPubKey()
    {
        $key = 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAAAgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4e' .
               'CZ0FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMS' .
               'GkVb1/3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZw== ' .
               'phpseclib-generated-key';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
    }

    public function testSSHPubKeyFingerprint()
    {
        $key = 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQD9K+ebJRMN10kGanhi6kDz6EYFqZttZWZh0' .
              'YoEbIbbere9N2Yvfc7oIoCTHYowhXND9WSJaIs1E4bx0085CZnofWaqf4NbZTzAh18iZup08ec' .
              'COB5gJVS1efpgVSviDF2L7jxMsBVoOBfqsmA8m0RwDDVezyWvw4y+STSuVzu2jI8EfwN7ZFGC6' .
              'Yo8m/Z94qIGzqPYGKJLuCeidB0TnUE0ZtzOJTiOc/WoTm/NOpCdfQZEJggd1MOTi+QUnqRu4Wu' .
              'b6wYtY/q/WtUFr3nK+x0lgOtokhnJfRR/6fnmC1CztPnIT4BWK81VGKWONAxuhMyQ5XChyu6S9' .
              'mWG5tUlUI/5';

        $rsa = PublicKeyLoader::load($key, 'password');
        $this->assertInstanceOf(PublicKey::class, $rsa);
        $this->assertSame($rsa->getFingerprint('md5'), 'bd:2c:2f:31:b9:ef:b8:f8:ad:fc:40:a6:94:4f:28:82');
        $this->assertSame($rsa->getFingerprint('sha256'), 'N9sV2uSNZEe8TITODku0pRI27l+Zk0IY0TrRTw3ozwM');
    }

    public function testSetPrivate()
    {
        $key = '-----BEGIN RSA PUBLIC KEY-----
MIIBCgKCAQEA61BjmfXGEvWmegnBGSuS+rU9soUg2FnODva32D1AqhwdziwHINFa
D1MVlcrYG6XRKfkcxnaXGfFDWHLEvNBSEVCgJjtHAGZIm5GL/KA86KDp/CwDFMSw
luowcXwDwoyinmeOY9eKyh6aY72xJh7noLBBq1N0bWi1e2i+83txOCg4yV2oVXhB
o8pYEJ8LT3el6Smxol3C1oFMVdwPgc0vTl25XucMcG/ALE/KNY6pqC2AQ6R2ERlV
gPiUWOPatVkt7+Bs3h5Ramxh7XjBOXeulmCpGSynXNcpZ/06+vofGi/2MlpQZNhH
Ao8eayMp6FcvNucIpUndo1X8dKMv3Y26ZQIDAQAB
-----END RSA PUBLIC KEY-----';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
        $rsa = $rsa->asPrivateKey();
        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertGreaterThanOrEqual(1, strlen("$rsa"));
    }

    /**
     * make phpseclib generated XML keys be unsigned. this may need to be reverted
     * if it is later learned that XML keys are, in fact, supposed to be signed
     *
     * @group github468
     */
    public function testUnsignedXML()
    {
        $key = '<RSAKeyValue>
  <Modulus>v5OxcEgxPUfa701NpxnScCmlRkbwSGBiTWobHkIWZEB+AlRTHaVoZg/D8l6YzR7VdQidG6gF+nuUMjY75dBXgY/XcyVq0Hccf1jTfgARuNuq4GGG3hnCJVi2QsOgcf9R7TeXn+p1RKIhjQoWCiEQeEBTotNbJhcabNcPGSEJw+s=</Modulus>
  <Exponent>AQAB</Exponent>
</RSAKeyValue>';

        $rsa = PublicKeyLoader::load($key);
        $newkey = $rsa->toString('XML');

        $this->assertSame(strtolower(preg_replace('#\s#', '', $key)), strtolower(preg_replace('#\s#', '', $newkey)));
    }

    /**
     * @group github468
     */
    public function testSignedPKCS1()
    {
        $key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC/k7FwSDE9R9rvTU2nGdJwKaVG
RvBIYGJNahseQhZkQH4CVFMdpWhmD8PyXpjNHtV1CJ0bqAX6e5QyNjvl0FeBj9dz
JWrQdxx/WNN+ABG426rgYYbeGcIlWLZCw6Bx/1HtN5ef6nVEoiGNChYKIRB4QFOi
01smFxps1w8ZIQnD6wIDAQAB
-----END PUBLIC KEY-----';

        $rsa = PublicKeyLoader::load($key);
        $newkey = "$rsa";

        $this->assertSame(preg_replace('#\s#', '', $key), preg_replace('#\s#', '', $newkey));
    }

    /**
     * @group github861
     */
    public function testPKCS8Only()
    {
        $key = '-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAKB0yPMAbUHKqJxP
5sjG9AOrQSAYNDc34NsnZ1tsi7fZ9lHlBaKZ6gjm2U9q+/qCKv2BuGINxWo2CMJp
DHNY0QTt7hThr3B4U62z1CWWGnfLhFtHKH6jNYYOGc4x0jgT88uSrKFvUOLhjkjW
bURmJMpN+OjLJuZQZ7uwoqtT3IEDAgMBAAECgYBaElS/fEzYst/Fp2DA8lYGPTs4
vf2JxbdWrp7phlxEH3mTbUGljkr/Jj90wnSiojFpz0jm2h4oyh5Oq9OOaJwkCYcu
2lcHJvFlhR2XEJpd1bHHcvDwZHdUjSpnO8kvwQtjuTnho2ntRzAA4wIJVSd7Tynj
0IFEKmzhSKIvIIeN8QJBANLa10R1vs+YqpLdpAuc6Z9GYhHuh1TysBPw2xNtw3Xf
tGPx4/53eQ0RwiHdw9Opgt8CBHErD6KzziflfxUrIXkCQQDCz4t01qYWT43kxS6k
TcnZb/obho6akGc8C1hSxFIIGUa9hAhMpY2W6GXeGpv5TZtEJZIJE1VHTLvcLSGm
ILNbAkEAgq9mWqULxYket3Yt1ZDEb5Zk9C49rJXaMhHHBoyyZ51mJcfngnE0Erid
9PWJCOf4GBYdALMqtrHwpWOlV05rKQJAd6Tz50w1MRqm8MvRe4Ny5qIJH4Kibncl
kBD/q8V7BBJSCe7fEgPTU81jUudQx+pL46yXZg+DnoiYD/9/3QHUZQJBAMBiKiZ7
qMnD/pkHR/NFcYSYShUJS0cHyryVl7/eCclsQlZTRdnVTtKF9xPGTQC8fK0G7BDN
Z2sKniRCcDT1ZP4=
-----END PRIVATE KEY-----';

        $rsa = RSA::load($key, false, 'PKCS8');

        $this->assertInstanceOf(PrivateKey::class, $rsa);
    }

    public function testPKCS1EncryptionChange()
    {
        $key = 'PuTTY-User-Key-File-2: ssh-rsa
Encryption: none
Comment: phpseclib-generated-key
Public-Lines: 4
AAAAB3NzaC1yc2EAAAADAQABAAAAgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4
eCZ0FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RK
NUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDy
R4e9T04ZZw==
Private-Lines: 8
AAAAgBYo5KOevqhsjfDNEVcmkQF8/vsU6hwS4d7ceFYDLa0PlhIAo4aE8KNtyjAQ
LiRkmJ0ZqAWTN5TH0ynryJAInTxMb2AnZuXWKt106C5JC7+S9qSCFThTAxvihEpw
BVe5dnPnJ80TFtPm+n/JkdQic2bsVSy+kNNn7y4uef5m0mMRAAAAQQDeAw6fiIQX
GukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJ
rmfPwIGm63ilAAAAQQDEIvkdBvZtCvgHKitwxab+EQ/YxnNE5XvfIXjWE+xEL2br
oquF470c9Mm6jf/2zmn6yobE6UUvQ0O3hKSiyOAbAAAAQBGoiuSoSjafUhV7i1cE
Gpb88h5NBYZzWXGZ37sJ5QsW+sJyoNde3xH8vdXhzU7eT82D6X/scw9RZz+/6rCJ
4p0=
Private-MAC: 03e2cb74e1d67652fbad063d2ed0478f31bdf256
';
        $key = preg_replace('#(?<!\r)\n#', "\r\n", $key);
        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PrivateKey::class, $rsa);

        PKCS1::setEncryptionAlgorithm('AES-256-CBC');
        $encryptedKey = $rsa->withPassword('demo')->toString('PKCS1');

        $this->assertMatchesRegularExpression('#AES-256-CBC#', $encryptedKey);

        $rsa = PublicKeyLoader::load($key, 'demo');
        $this->assertInstanceOf(PrivateKey::class, $rsa);

        OpenSSH::setComment('ecdsa-key-20181105');
        $key2 = $rsa->withPassword()->toString('PuTTY');

        $this->assertSame($key, $key2);
    }

    public function testRawComment()
    {
        $key = 'PuTTY-User-Key-File-2: ssh-rsa
Encryption: aes256-cbc
Comment: phpseclib-generated-key
Public-Lines: 4
AAAAB3NzaC1yc2EAAAADAQABAAAAgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4
eCZ0FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RK
NUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDy
R4e9T04ZZw==
Private-Lines: 8
llx04QMegql0/nE5RvcJSrGrodxt6ytuv/JX2caeZBUyQwQc2WBNYagLHyHPM9jI
9OUWz59FLhjFXZMDNMoUXxVmjwQpOAaVPYNxxFM9AF6/NXFji64K7huD9n4A+kLn
sHwMLWPR5a/tZA0r05DZNz9ULA3mQu7Hz4EQ8ifu3uTPJuTmL51x6RmudYKysb20
fM8VzC3ukvzzRh0pujUVTr/yQdmciASVFnZlt4xQy+ZEOVUAOfwjd//AFfXTvk6x
7A45rNlU/uicHwLgoY1APvRHCFxw7F+uVW5L4mSX7NNzqBKkZ+1qpQTAfQvIfEIb
444+CXsgIyOpqt6VxJH2u6elAtE1wau3YaFR8Alm8m97rFYzRi3oDP5NZYkTCWSV
EOpSeghXSs7IilJu8I6/sB1w5dakdeBSFkIynrlFXkO0uUw+QJJWjxY8SypzgIuP
DzduF6XsQrCyo6dnIpGQCQ==
Private-MAC: 35134b7434bf828b21404099861d455e660e8740';

        $raw = PuTTY::load($key, 'password');
        $this->assertArrayHasKey('comment', $raw);
        $this->assertEquals($raw['comment'], 'phpseclib-generated-key');
    }

    public function testPrivateMSBlob()
    {
        $key = 'BwIAAACkAABSU0EyAAQAAAEAAQAnh6FFs6kYe/gmb9dzqsQKmtjFE9mxNAe9mEU3OwOEEfyI' .
               'wkAx0/8dwh12fuP4wzNbdZAq4mmqCE6Lo8wTNNIJVNYEhKq5chHg1+hPDgfETFgtEO54JZSg' .
               '3cBZWEV/Tq3LHEX8CaLvHZxMEfFXbTfliFYMLoJ+YK1mpg9GYcmbrVmMAKSoOgETkkiJJzYm' .
               'XftO3KOveBtvkAzjHxxSS1yP/Ba10BzeIleH96SbTuQtQRLXwRykdX9uazK+YsiSud9/PyLb' .
               'gy5TI+o28OHq5P+0y5+a9IaAQ/92UwlrkHUYfhN/xTVlUIxKlTEdUQTIf+iHif8d4ABb3OdY' .
               'JXZOW6fGeUP10jMyvbnrEoPDsYy9qfNk++0/8UP2NeO1IATszuZYg1nEXOW/5jmUxMCdiFyd' .
               'p9ES211kpEZ4XcvjGaDlaQ+bLWj05i2m/9aHYcBrfcxxvlMa/9ZvrX4DfPWeydUDDDQ4+ntp' .
               'T50BunSvmyf7cUk76Bf2sPgLXUQFoufEQ5g1Qo/v1uyhWBJzh6OSUO/DDXN/s8ec/tN05RQQ' .
               'FZQ0na+v0hOCrV9IuRqtBuj4WAj1I/A1JjwyyP9Y/6yWFPM6EcS/6lyPy30lJPoULh7G29zk' .
               'n7NVdTEkDtthdDjtX7Qhgd9qWvm5ADlmnvsS9A5m7ToOgQyOxtJoSlLitLbf/09LRycl/cdI' .
               'zoMOCEdPe3DQcyEKqUPsghAq+DKw3uZpXwHzwTdfqlHSWAnHDggFKV1HZuWc1c4rV4k4b513TqE=';

        $plaintext = 'zzz';

        $privKey = PublicKeyLoader::load($key);
        $this->assertSame($key, $privKey->toString('MSBLOB'));
        $this->assertInstanceOf(PrivateKey::class, $privKey);
        $this->assertSame($privKey->getLoadedFormat(), 'MSBLOB');
        $this->assertGreaterThanOrEqual(1, strlen("$privKey"));

        $pubKey = PublicKeyLoader::load($privKey->getPublicKey()->toString('msblob'));
        $this->assertInstanceOf(PublicKey::class, $pubKey);
        $this->assertGreaterThanOrEqual(1, strlen("$pubKey"));

        $ciphertext = $pubKey->encrypt($plaintext);

        $this->assertSame($privKey->decrypt($ciphertext), $plaintext);
    }

    public function testNakedOpenSSHKey()
    {
        $key = 'AAAAB3NzaC1yc2EAAAABIwAAAIEA/NcGSQFZ0ZgN1EbDusV6LLwLnQjs05ljKcVVP7Z6aKIJUyhUDHE30uJa5XfwPPBsZ3L3Q7S0yycVcuuHjdauugmpn9xx+gyoYs7UiV5G5rvxNcA/Tc+MofGhAMiTmNicorNAs5mv6fRoVbkpIONRXPz6WK0kjx/X04EV42Vm9Qk=';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
        $this->assertSame($rsa->getLoadedFormat(), 'OpenSSH');

        $this->assertGreaterThanOrEqual(1, strlen("$rsa"));
    }

    public function testPuttyPublicKey()
    {
        $key = '---- BEGIN SSH2 PUBLIC KEY ----
Comment: "rsa-key-20151023"
AAAAB3NzaC1yc2EAAAABJQAAAIEAhC/CSqJ+8vgeQ4H7fJru29h/McqAC9zdGzw0
9QsifLQ7s5MvXCavhjUPYIfV0KsdLQydNPLJcbKpXmpVD9azo61zLXwsYr8d1eHr
C/EwUYl8b0fAwEsEF3myb+ryzgA9ihY08Zs9NZdmt1Maa+I7lQcLX9F/65YdcAch
ILaEujU=
---- END SSH2 PUBLIC KEY ----';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $rsa);
        $this->assertSame($rsa->getLoadedFormat(), 'PuTTY');

        $this->assertGreaterThanOrEqual(1, strlen("$rsa"));
    }

    /**
     * @group github980
     */
    public function testZeroComponents()
    {
        $key = '-----BEGIN RSA PRIVATE KEY-----
MIGaAgEAAkEAt5yrcHAAjhglnCEn6yecMWPeUXcMyo0+itXrLlkpcKIIyqPw546b
GThhlb1ppX1ySX/OUA4jSakHekNP5eWPawIBAAJAW6/aVD05qbsZHMvZuS2Aa5Fp
NNj0BDlf38hOtkhDzz/hkYb+EBYLLvldhgsD0OvRNy8yhz7EjaUqLCB0juIN4QIB
AAIBAAIBAAIBAAIBAA==
-----END RSA PRIVATE KEY-----';

        $rsa = PublicKeyLoader::load($key)
            ->withHash('md5')
            ->withMGFHash('md5')
            ->withPadding(RSA::SIGNATURE_PKCS1);

        self::assertSame(
            'oW0X9GlHa1qyC3Xj2gyzf5VwzLksmIB60icLdrneWA1kTW9RvkfskB4XLs8IVxYy+O8Tm/fJTIPpdNtRB7sfeQ==',
            base64_encode($rsa->sign('zzzz'))
        );
    }

    public function pkcs8tester($key, $pass)
    {
        $rsa = PublicKeyLoader::load($key, $pass);
        $r = PKCS8::load($key, $pass);
        PKCS8::setEncryptionAlgorithm($r['meta']['algorithm']);
        if (isset($r['meta']['cipher'])) {
            PKCS8::setEncryptionScheme($r['meta']['cipher']);
        }
        if (isset($r['meta']['prf'])) {
            PKCS8::setPRF($r['meta']['prf']);
        }
        $newkey = "$rsa";

        $r2 = PKCS8::load($newkey, $pass);
        $this->assertSame($r['meta']['algorithm'], $r2['meta']['algorithm']);
        if (isset($r['meta']['cipher']) || isset($r2['meta']['cipher'])) {
            $this->assertSame($r['meta']['cipher'], $r2['meta']['cipher']);
        }
        if (isset($r['meta']['prf']) || isset($r2['meta']['prf'])) {
            $this->assertSame($r['meta']['prf'], $r2['meta']['prf']);
        }

        $rsa2 = PublicKeyLoader::load($newkey, $pass);

        // comparing $key to $newkey won't work since phpseclib randomly generates IV's and salt's
        // so we'll strip the encryption

        $rsa = $rsa->withPassword();
        $rsa2 = $rsa2->withPassword();
        $this->assertSame("$rsa", "$rsa2");
    }

    public function testPKCS8AES256CBC()
    {
        // openssl pkcs8 -in private.pem -topk8 -v2 aes-256-cbc -v2prf hmacWithSHA256 -out enckey.pem

        // EncryptionAlgorithm: id-PBES2
        // EncryptionScheme:    aes256-CBC-PAD
        // PRF:                 id-hmacWithSHA256 (default)

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIFLTBXBgkqhkiG9w0BBQ0wSjApBgkqhkiG9w0BBQwwHAQIIU53ox17kUkCAggA
MAwGCCqGSIb3DQIJBQAwHQYJYIZIAWUDBAEqBBATi8ZER9juR41S2c35WXTQBIIE
0K98r5dQq/OxbwA2CH0ENs9Jw2qjvW0uGkH8DdO8XvCJohMrIU8FABxw/50Af5Ew
Nq4FJIYz90LjZzlI7kf97TDMZKw2K3AleymwmfMcKer5pZ6jqdxLGXFztdj3Fm/S
P+NcVjEZFSEH1MNDEPhiPSIUAf1yQcLwKAzHH0JTnZBOFSBbGxTZLYfvD2angVNL
xTivLYJGdr1cUrAuZQcM3JGQEvCA5qAC7oRhdVgGyJrl8xXY3mVlaXMsW8A+Q7xj
NyH7lJUFEF3YPMbpWr8zblCQYgGByM++yOfYQXno50AgWdYjPO88pPzKcCe4x6WV
qKlvqTYZqb1HgZurTd3BS/e6GWRgnRt8W87nuNcyJasud92Z0FhSGwIirlE89gUW
EinbY8m6+sL9VZZ5+t66TROtpj1Ohj8t3W+01oLDCtdSTGwLuq9XUsEyuYZSqUN9
0F43U8pOykNbChi1S8vfFdwf7U1R+hgoF0MRNDwh3hRfSS0zPUnCGb6hDZrOZB9C
e3xbfXiujVlfhRc7r2qbZHAwqNLcccC98oLfbEIUdBXn6M7GfFIwiuNiS48rehp0
dA9+CiWJBq+7b/lRdcgQJxjwUpxtMXr/812Bky4dDoMDs32cmMghH2sgUvht0imy
ZhA3IvSCAV1wVoQLqUuPXLMskcKsNCTbL9AYEpJm612dm43btXec2vtjCc4ajpCg
wICLE2V1jwzWw0girrT/IMt8QUd3fkJZkEAbmFHwuZptFnreRCidZjfQqYhWfyqJ
nGW+cc7G1bGwxt32fC5eu23hBTJERmRlvkhC+v2WKhYXcKyOKQn5/I4eaEZauDn3
wmg3f4h/PPuQgqv/vspOai9a5HhPRNyeIjXsk3hxHepEgV+kVSU50BpchSSzBuhK
71F3nOMTyJ/XXxaZrLLtpo3CcXmI0/JuNG7pjDS++Vx/BQFs8xxDfxRs0Um7RlT1
piGZGDn9zHNpbspHkAeoQmlplbmjtCClojhfBj4HbXTtlYmDgwKHul4YIni6kgCr
G+WduGXLeyxmH976vvJasD4wyttL2CZTHLR7Elp+yl0xjXMlj/iP4WYozJAmGifq
xjLWMsZ0gaBtAoOFrvcgOueE7+E+NdbIHzU4u5FTbz0DLCvrsZeKwpOPEsMw0LVG
T6rNsBzMY3XyBtV1FdXwmuOcWha62Ezr/RRrfvRPRImy/xVVKOrOQ/KbyELkjroh
UAEPs7s+89Ovc7P30IfS0Xzlhz2aSRflZarOIqu1JtjTYZ0XWLTWoQT2fjZdnMDV
qFrbTPdXezqTAAzk3rnkkghgamTVQ7Y8D+BIGHIc4+oVT2jxzSjBQC7szmudanGQ
hfGLyO+vwLg4r1lanzSULtqfwTZMarjYGxLqpQp8cIjJfzvLI3psRDFyuWCdIbEs
y3VKgoNsa+PmyimGSa7x2cw6ayTx9wlOhPzaBwqMhHxr4qJwS2ohDONeRfnPr34+
oVD7mnCBLB14qiZcpQv+qPGvd/Q/tA5SBNbZhPuWtjqvy7/K+1FQX6xvx1kl7p9W
l0Q99rwqECl8y+CiKEXdItkCTA/vgxblSt465Mbdic7cbcP6wAMSGmpryrmZomm/
mKVKf5kPx2aR2W2KAcgw3TJIu1QX7N+l3kFrf9Owtz1a
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS8RC2CBC()
    {
        // openssl pkcs8 -in private.pem -topk8 -v2 rc2 -out enckey.pem

        // EncryptionAlgorithm: id-PBES2
        // EncryptionScheme:    rc2CBC
        // PRF:                 id-hmacWithSHA1

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIFFjBIBgkqhkiG9w0BBQ0wOzAeBgkqhkiG9w0BBQwwEQQI/V5Qw9+hKt4CAggA
AgEQMBkGCCqGSIb3DQMCMA0CAToECPxrtS4U+IIBBIIEyKQyYpJ8tfWXVvitxaPq
+gtrVVWd/ukjwZ+jQY3g/ZjZNWQPq5XbuoP5F3u5g4V+RoXzAIkdwyiveEv+XssV
DJVHfNiL6VcdxhFJ1rmt2uq9vFW/x9UHDqAWsnytn46NFRWUqgKzkYWMDqU71IC/
wyq7UzjTtqdLzaCxkTWYst1o+Iu7VXapFVcscPYyGshLVyZ0x/etc/09LOC4bIpk
3Qzf+f+adrNxW0mbD3SyDfVadvS8mApsd7bJR320iEKd4CmW0sNAzKkm2ya2aUIi
Hrk3DEgr4rPmpn3BVfZ6pg+yRu+MOxBhl+8yfA+E8kXfe/F7BiMkJQcJTOfLRLfH
TXipyb4f8oa+gmwwWK0jfCuxoxiOTA1CBCjZoTvdSuFYVTdblysQO3BivvSQgbmD
oHntb7HEoZ6yB49u/LrrowUQNH+XihBcototyLCmC5K+x8N5cZsp+yaLJekDHlQs
ATVMeKCbPjYaS4g48lDyC1VbtNtJc/zN5gOUB0PM80iB02iZegYyeW5+WWzY+Lgu
lpWLH7PdpqL5KtoH6SJKD6Szl8dKJLYzpHI2esckpp9YsDtX2z/VkUFKTd0PeeNh
WefX0q8A47NBeBLFEZqmzPrL6IyaPnnPCUsvqk6MEA1DgsmY3DFd8nEYhzJIAwoy
Rw1mCqwL0uukQPqFGByU9YRHyhJd5aAPyF1xSLfUQUJb9xn+wyN57xoamFePPWMi
UXdESZWX+rjA0ChfEtL9AzXcfO9PBS1p/2JkVxUt/UPfI9SgQn92kLo0LRi/iRLk
H4zjnkaDy65ZY15bzyK+EvJ+VZ+P24QI7X12f1m+rkssMekHWHf5/SitUpW26ZFe
M6vXyz3RlXxow+0WcsPob19n/vbgeJQPTfMY0zPS0iCRIggC/liWMEOzP/R1jCYi
q8TEaUi1Ztx3Gp4Y8Vcf33a/YsxKoUsQlFFtyE6KE3ZEI03E6cMiX21nWULKrk9l
+8Tq4T1a8I4goVa+e4CYBYwMAY9fdfUJ/p1EnrG6Ynj06a2Zx0IK/dF5w0b/5TeL
PMyafb4FHkpkyYYFlktQdKIqGjjtmKUr56/7vumVHUyItf5nSuM8lLps8to2MLkE
MAolD+X4FIGs/1Z5NlUb5AlNVNRY1c7tf+YSXI21PlkBpaRSAvN9/2fmGnxWSvAa
BEGR0JA4zMPrCSpxrBQpOrZPh/cD9YXNu+N9P4dtf57smCviKTJg8eMl9NYu4vtc
FygdqPKuhJM2WI5Qdrqjbf4NQ1mngSxXNKrcNmC/m60JPNKHC7dM2ynbN8QyZqEE
EzSdL0Z3YQGnuwr+4zKHHsNnO4nRJfUowWks4Gvi2HIyy3DBVqqyEPxDDGEpcqs+
8GNKTGBg1PCVg+I9Xjxio4tBuwLDo6Y8Ef8SphN/0DC9svaQRfEOY3/9WB+fDnrq
SUSNZNWetkCd247WHwl+JvJDXCuzGJ2+JG5DXuEdCq2EhEVNUWPuotXTPvI+0wsP
Kq23uvzS53ZArQnxlqgwyXQ06jzc+J4AiNtl3uIw8D6LrRyaDsOsKQCEh7qjkqTc
khzefbnNRDL5PIJnTfM7vSQ4nUzdAxs/7YzX6GMx1DaCtBANbUVUoIE+3oKdqpGV
9AmO2phYWCBefw==
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS83DES()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-3DES -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd3-KeyTripleDES-CBC

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE6jAcBgoqhkiG9w0BDAEDMA4ECHwurC0qxNK7AgIIAASCBMjRJefQ1oLo/pml
Zw1qTE2NMgSNdP6z3vEap0qMMs/EXO37GDuHGla/yvvBIZbBXPVoQwd7K9QfU1NP
JCBtNBTD9Pl7a4fJIlrf2dN5SCP8lu+nFa5ZyCiBvUtxfdROnhXfkhs0kqOowLaq
1mw+Di9FPSA3ZkdJTPpAyMNPMlYpQII2ex+j6NmRB8t7O121o6ynbmDj0Rh87dv9
VtRhO9sonTy160Mv2HPMLMliXMwFUvpEH9XNE+K6V6DnoMc7I9jmEnqLAzmjsKv/
AOwuX8t8cPboeGOu++/0h3879+OVcnkXGMW0aAT+3sX4oMgEVREHDwkn2IGsrIuV
SerUKg8WSoyhRNb9j7uJAlvU6bCrivcOujjNasdWKG47ojeiySFUkKu9JBohQ+vI
mrlkqZv+FMwEKgApPhCKbQYqLuKl/kp6lNBXmhcusuxsGCnaw7/Wa+Y6p+Gz6UL5
caFpDm6FX+Snvi5/6sUpMKL9LPAAZZVRpKj9JWcidEoXa5rINIMtKyVpl+GEQmac
9lCdFq+5zO2r94af9AKRUIqTquyCkcy2s2mzNq2IIv2atibnb2HQex0/EhLFxMC/
UZbl61YaSBxrH52LY4SNOUy+ppCsP4z0ojTdci9Yc3BnMqzSPD3FMQPmGpWWRGOq
Jdj2/B76Q7rYZjIdrh6UbSROrgTNgmbeASxfDSHHmmcZyIUtMzBC45bmz3ra/FO0
eb+6srXOmdIG368/xRdo9o1R/cNw9BHgGu5R/Bx+AxhK8DuhL7rMYLVn3Ukl2qrt
0koCtDbPxq2YgF8VYXz4WNRCmLuUroty99WVOM7BvM3XyfSP5iLynoRr8B7Rju5K
t5o/OJUrNqSNjtzYd3PZEXqi7ShWkYp5BACzBfSxkGfL6bBMfoM8Yd3dBLrplRu8
WpVbJSA3DbJwAyGhKP3dQmmhBH9nJEppSK0iQPCruAyyZJT6kEmPhcNuYq8CyWe4
+l9Hs5qIHMrkEq1BcLYiQFBLVLXR6eHf3J8fAMmz8I74TWNM2u3FZUcDoIwqHmHG
zDwYZ9h1tkijvyvbH5RkMWRb7WAB2b9Q9ZsPR0naQbqHmO73Uypu/pfugx+cmOPr
AiYOQHnwSCDcaTHJnO33L7KhgA+RfIRoigJXgeYzlWmjW/U6SRK8RTvda4lxPsOo
/bXTZOoUA8qTDKT02n20h0Ab6kLDApSigGQlYI8Jhfre/PGFWfrLxPpy4ED53sPg
xY1d6tIa18yQCAznC3k6Q9OK02bGaFTcGnTPg88PBgyUFuqljKGrG9rpm4uTPzwa
1vzKv05oYjK9xyzy6LkIPYHyp6R2tedVO34pa52LNCO3/DaLnwiDfMRW5SFu0J0E
P7/viLPTwwR6zdAAlt8hsT6apBYlLzVqGRy9nbN60ZS3Q8lIe6xR47koWAJvnHuS
uBx9xP3JWcs+Cnis85wODY1qxXa0Yx58kUVmoyyiBOWHcwsi82YtgwAAjhR8K1wy
gRJR72XIKmdZ/RINp7f2dN7xswy8iU2m3vBxgc1AH2/8knlGLebNS7/RJwW1KXsb
pp/6vHRPSla5cxzsF9NmYHmSAUpk1t+Mo+YjjoT63bVC4xNzkXdft4l4QyUQQXU2
aENeUJKn2r8X3Tpz92U=
-----END ENCRYPTED PRIVATE KEY-----
';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS82DES()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-2DES -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd2-KeyTripleDES-CBC

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE6jAcBgoqhkiG9w0BDAEEMA4ECGT21lf3Tl4dAgIIAASCBMgJmnyaQktoSk8u
JyUAaB4ZgGWW22BX1xRA7en0sNj4PhBxj1DEXGKNUBx3k6u6Cd7JUupxGfeag5aw
fi0bWNgEw7YSITmZKaKO5Ee4shQrEDucaH6KEGYV6YspNys5dD817hmd4Yc31q2e
Ig5k3rIpP72Yy9Si0FXmKDE8/GmCYckdIQVUCGZD9nLugvqEC0adludfMAwzCHUY
68jeyKiPJGTFSmE0wPD5EaWknn3U0eRcmKwZPtFpWEAEv5GTm1h6Y5q+P2X2Qsia
Neoa4jjnSEww85zbno/k0KdoRIuSEM8qOHdNuU6XNTCGKxEkgBLkY+vjRjOCi+K4
fzJSAPxaYATGX+W8EWegz3yhwiFujjDPkO9nfeoyks/saFbP9uT8aesZUn4/rIw0
KyW7lYW0TUyBxfIXg1DEsKcmSrrb0WrFLN/MnjO8Y1bAY63KgKgpFZk+7H/7eCmD
2Egj6o2LXTEPkxwYyeR41k64LM5RFF5qs4wS0Gfo1oTc6lSbuZNFHSgsXkb+CXFL
JZ3CuaYFY5Ldfm+1HsrZ9s3GmNAnog6WABXIcz9aULUyJfLr+oZaQR7TC5KpM5Xy
dyztlsN43D9UZKdz93zW2V3LxbzbOWTrcd9dB1GwrPvWIy/0/dqFOvpcr9k/4S1T
AJ6pja4x19EQLj2DUvO7JQEy2Rlam+SI/ARQTc0W0dJ8x7FboHZDxUQCRDih5Qw3
s/xoGflLUYYtAR5hfgjbWuvG3Told4IYlBn2vvVu7UxXQekUOaZLePqucAP3sTDC
pK7JK+OT223FNU5NieGS4hh+jxZQnLuuyxWQaTCJM9isYPqJYsWT9X+c44ixOgLJ
unYtg+8Lck3On6wiDUPWTLCGJvjb53NhPSovTjNBW2Q7YszXXjeO5svwwxtKHabx
vCDsG0zdNdwIgupqynbtcuUhsmIsJKBu5c+9i8P21rNF0DZjOkv8mThRA6YQLce8
mLTcnpLsvCGNehVEStD6pr+CtGsQEEtH3bPc2ZBrpxtz1EHmrI7H3kX1gjbD7bsT
XWzaxsId+8pmqnAcMRzU3mRv4Fe+387X2irG4OxR/6cFMk3+yfpKJLSsNh6HAVRX
xzYwVz2WP7RM0KuLh7auAcI1mHk+0xAvDi7s3ggy3SzLzQq9p+EEFVGVSYuVFLbi
TtlY6HQ3b1Z6KgntoPj79YuOmri6/8w7nBkKt09faYLUf9wZWHLL9/LjZqoJxPfl
lX5Ss4+MDV1aG9aJoTT53d8Gn8ApWK+XFToFg2InYZzZqBnKP8DHPG8D2Gh/MZlA
Yt4hPDNLf733zm1zJTWo0TF6+4AwZp7XUKTg+pM1CZJDOTbJlEA+cXY3BxOq10bl
JPJmV/JFINqSeBLN8V2Ong8Q0Dt4uabSmlOUz19SXpimBrO8ztxaqigMFIKMbLXX
uIVAoxG7KLPuv44yK3Fjsg6OtwZnrWqea02b1qwFFrIKoqmQ8FNFBMYqcHU2IkSq
gJqSylfqcre5Y1DOSlcjGa7aP4C8AyB5qOG7LZ/CLAePKqgAHtMd/K40Zgku36Ir
9OAcUXy/H5PFJIleEyjvLLBE0VWs0TVBXi/FiIqwvAYNOFqXl/gtRcZ0kVex/QeN
rcONqwmUGJOjrfhUyJA=
-----END ENCRYPTED PRIVATE KEY-----
';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS8RC2()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-RC2-128 -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd128BitRC2-CBC

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE6jAcBgoqhkiG9w0BDAEFMA4ECAdC2l5rzAQeAgIIAASCBMjuEQDNkvSX6ylp
WsgQZUSvPdNpdlG084oLmhTV0z4pZeLB0YCyKCM7GMVQ0tsprRW0ky86ulbY3W5Q
86WNHXYtVIFXEmIjN1syRG5Pq3RZ4Ba6wf36Gc/1713p6GjcPxLZ+JOw1xBEm1rh
1nI9b43PzbKmczs+6IvRO5b9MjKNkBeNzH9kh4b3zsEW/IFgYaz8zip/zRu4hCSW
ORhnRYFvbI22E84g4/SB1WS34nR/flyZBXT4P87s7bwXEOsXAGnEeVF38znV3awD
V8rry2e1drRmlhfNhvDroQrkv7O9X2ee91I9gahPKpXtAlGXBgRb8qjVHeI8Ea3K
Ty2zcWnjdE7/jt6pO07+B+FlHNdKySlFdKTHEmJ1x+O5Ui4JaGjI2UML0yGHoYFU
wGH/1DYJ4+R9d97BYJ/yp9+JAQAjpG7UUt3jFgNx0CAbP7d438l06z2EE87EqIEa
3Y0ZG1Q5PWE60hPJsvUELdgzcUiKkVCxhOPhwmbSlQpEYXZRBWv0RAJzey6yPMQ+
L/TkMDpgTNUk9x+n3ehnRuA/tlthxXN/ViDthPO7ovSVCsKsUq6lXotO+3hHLGs0
u8ZyVKHNEqGso7PfAFsjcJq2C46mQNME4HPOWm5J+TFf/vvwqdYKCiF3arV0hUtW
x9lyPR2PvZM1ik9jXi6lc5hPegcwmx9/j5yc4/3rQNiwe4dtUpL5JLKAxecKBLgr
atyVnAs69JYaaUT9aKRDzYzCRjo0jIQ9/lgJl2DqVRF9aYnknrVWRIjyKbfKjw7N
w0yfXlVRw46YuJ72PSHpr7HcfzL1EWzmKcAEPDH/UCpIaoeNTwxeEQSltOM0D0Su
ZzyAQP8sWSXSwdtD5YD7iiUjDN4UMDuIwAEMLN9231/RjvKuLAys0oNRQfHkkiCo
9rt/VUP8be98UTyKu7Bx7JUEW6VVnYM+Y274MLQk6TcjZyXgbKwhHFJyAjcBAFQp
5kkYES0kk+57HeBImcB0a5qBor/uAnlsCV690roUlBtkVhBOkTjVi7w/uZsSjIWr
MBndNHTFqqnkbm8xOOoSH6vS32c1KE8FrGpmkPGc6wziX9Ja/MkuLDXrBIlnP4Yj
aCf0sVMSR1/LoHIGGaGXmTzs0VTR8Z5EyW5uvvCy6dWCWnTKEWmTTS+zqW1RYVBZ
n/P2ovj2Kl4rhQuSpfOE9xBFWsgPAD6T2FJzfvu0/D3Sw5pI/RT4NnQ77oJSs+jN
lV33FeceRoJqjcP6YMAiRX4RmkTeD5Hgy0YRLrfQ4PKwAQG82uIj3yqXWveexwb0
Cpm5XxzgCMWGBRvIvM+yByf0SP7fIWYHbzsEWJkN5btF3tMc6i12q7AJ0/UFMQLt
KNiMg+dLWP18cySU8OysXqPq1JKHDU1NMg2Xf9o2c35eOktLfcO9axS4oAAz4bGN
hTB8rk+MWnHfSlWvMPMzlJyndXv/WxfojujLogDTOHd4/q4KyoOwJY3H44eeW79u
sS7pDbjKMl8A15BLMLx01DaOYk7EiHFnGIpY2V2+2Xm7vQu9+8fHSf8whuCRVmBY
Drhy2HTF1veKrQ6IrIyQicmzTtW6moSnNg69SpuzKTegYyCRsSHDIL3WxMoopVwr
Pu3ed6UvXDfotj3v8rE=
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS8RC240()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-RC2-40 -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd40BitRC2-CBC

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE6jAcBgoqhkiG9w0BDAEGMA4ECHzZ2FqUJyiCAgIIAASCBMiKVNJiU/1UCaoq
V6VSX33gL8CjQqhzDEUlXhHoSYx7IWAJIx7C1DDgeLDfJ//cCMlBPbIOr6knohFQ
KegbsulIYm2DXUQvEoivh02F4An2RLkP0JSMl5CmYTbiu/nJic2jdin+vaKWhRA8
Kznk5wEuhz4t6Oo4Hp3k3+0sd6YqLbmdcFCiYSXE52WN271VvUXqwz3TosUgOUVH
YNzlER1xzNBFgcUyrfiyA+t5NaSDfpYncD64zXFz2KgkjcpfPBBMRnQ2I4mperbe
3uUt8ZFCVeRiROWtx9WQgCVDDWztlrYzfEo/lFtNKjdseiYDj1/1gG6S2x5/S5dP
LzEndNYiVEB2q9XrocrdKVumr7EqNe7C/AMNxuyfAoU2QV5SRyDDSRa1muYwHBa7
x2XIThMS2tQLdN9bjJGcT653DKoq0Qwf1uMAOdHuqBLNXOpZw8PG8d3xmVHCyB4u
rr5E48L2DmD0TwY3YBjfb3KCw/r/CvT1/cWkCpO90aNmSS4JMuOBiFlKaERMvXcw
Ffo0ErZWwlgDN40hQO7xySxI3Paz6/QbxXunVnFQkTclkcQG63K6nWO9fMtgxRaZ
ZGsv/jdWUZ6fBvOvW09zLvF2ZXKhTbfwU47C+2TefvENVz4rTAJcGgtF1wiFv1Lt
0XT2FeJ6/jVGhk6745cHgOhsxqamOTuQ/y948ViMmR037INHouazD8dWHkjOY45d
hy0DjRGIiig94/r+b7YZn81QUkk0HddyH4zi18f5Lx+ExiLDKaLqLv57PQ3ZCeBy
v6Hoq/5tpZWCdXkLIAHx/a7ltiJQlyRUr8QcKPcGfr/qvIcYsUocHZ3iwkhxCnZ9
77E2f/Owf8VaS3x4g5V6RYNlkhuqVixLq/3QyphykcqDK2g4PnWfq8prGY97jHXN
+LZdwwV8LJkkoxCG1aehPlvtpGYGS75aeU1iFbqfke+gF2JG4LJZQsl1dAoL8R+X
ZdILuN+182CpwwptK4QmCvSWXk/ZJtYK9e6OtE1keLM4oQW122fxwyVkEnnAR2/f
Qc2U3WLk/UZSuhcHExxreWP4kiN8cYgSpw+k2uk7Xuw2kelu6hv6UzB4EtL8Xy4O
kK7y6EjCkRJVqQoZ3vVny5408edc7Kh6bz0P5G4LIaCpvrcCYOJv2f57/lr8dMM6
XcoZ0YIXATdUzKzhXKNFiib7SzBwFRRD+jMwzLnNeUhss8IUVl5LYwD6sOWbhdep
LtUO2eXa74i6pa7sz1PLLWDZQ64f9fVPX7EEBy2LBVP3iLqLd2x/OHw+s7pTPT0G
EgRpW0+IYBZGQjGN9s1VXXyhTm3RL03KeYls7aHmmcVqDqvozarqplN/kAhSGPmD
N99FlSrIfihCEZlXO4iP2LRkJaFy11mU0ZvIMkDJ51fNO8PWypca4Rgi4azMCaiR
HW/dtSBH2N8St0G80c2gUKXRmmJWFqebUIk4000VrpDcZlg0INC2unY0NwRFDe2a
55/NR7TO9GdhWYDWsZedRatUFul5DWznncIfrXAD3T32gUR3I9zc62OFVsH2Dve3
oMZUabvnj3g1sQqiRgJyIe5aVZljgXMh0cdWjcUi34vOVBU8yOU921/jSinJWyH7
GxyNlS3BiKQ22CLvbjc=
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS8RC4()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-RC4-128 -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd128BitRC4

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE5DAcBgoqhkiG9w0BDAEBMA4ECKQOMmQxsqe0AgIIAASCBMJ86iav9sz/nsgC
KrPC1m7fPDuJF1BCPd6Yu+b+D4++4htITNBujK+Ur0xgQnfs7+Et8/cz521KR1zp
kalr56rqvPu9X45l86f/PYv6D+3660jxAadk1bZ9Y7nXzjXsFlZljEi/oLYSAKwh
rn88ZNBM7hwoEtEZJXOK7yZlcpfLuNyRJhfxRp893yeG3SHDN+SAKzqbjrGtPnJY
2X0Y/KidhYAYLi3onhxkq6I9aEI54oBZUiKLHhRD5/ASx8EeSPK2Ydj20PfDIRIk
t75Tlqn5eLC124xdO0rm/vrczIrzo+JaqLq8dO0T7PGrR7hv9OyFwM6ssfzl2MyT
Si4Yv3gBk6dUQ4lySj6XfscjEPwnUSjO3SMwAV0uBoBxDyeKg+58sT0e4Ow7k+6U
SFoqa2m+gBAjXzL8SaGfvjfy0ViBtgLycGrK80dp7k0L5pJAZou7WCPWlP+5+kIl
IprSGD1luOm1olQBSaQO+GkhQlMg4jK7cMKM2bRWyT2ibq8KZujlhWlcqXbbaqSh
nJdadTfAsaCf3/hK1fiFwwSyFbiPjIE1H+WS+JMcg826S7FzoZ3BzcEVbiHRsBXy
PS95ZM3v/HWOejEO44NEqnrwjyqBlSJXOK2WLOUWWlf6t8pdQEjA1xUfJARXqv16
rQEXq2ZTGBOGeorwKLeUNgMQS7SfVP56Mmi23A3QQk7JNPXfkcrQscHu3mzesYKA
+ckJwDsyjnTwYWFXfDxfReKVA17YSV160oKCPhO7jIeiHO8azw7RKaaIaueKe5QU
boKWPAKeEfsDrSxtEYxy6hQ/45LYB+gUlAauaFlT4d0qMWQzt05Zs4ugUtx8SuI3
hWB80fi8XEJajti/3JIg0+cDEmv9XtYQXpaFKR/gTHl1ReSscY/rNyiUc7t1dBsn
kAwMhk/7p/0MZdEpG0e3qQ9Fs2pELlShzORobM0HWd41d2BkW54W/TJ9ERJhMU9Q
NJ5KZDukkCdTIgvnPKJ/50byYVGtt8VBXDzMQsm5ex9yDkEmBLtc14z7UaGd7FCK
xmbcVfkf+h5GPuJqXiZv9RsOfV0eVXlNx7jQ8Pq3FM5EiL8Wtj1XB3+cpFkPREoC
lA9enCZNdjXPB4SSz4kF+UwWdaNS77SGXDq4NQRT/cu4mce+1VPjepEc1WzLw5m+
aaHtJJCdLhaUJmYfaPGz4kg2CSdFCDjzDLOQCOwGtqAY6667ZOFb2VCukQR2aSfK
XJF4Br7UsKhtlZvRDZGLSdxS/6IPe3KgzInP+27kLpv5UcolD3GfuS9WZhfa7tlB
37n5nyGJCgVHufWRrYdKPI32Dn4R312/k+6X9zR1G4FlYzbuA+g2Q5CX8n5e/9jm
1WjCv8ppB3p3BjIv8iEAyfPShwe4uk2ohry+nY/pq7qYl3E7Y6vS1MOmRJT5jvBA
oCWQITjRu/d0xocYp6agkMEBgkyiqzLEW8PV2bziRZVGsYvC/4ky1MVERFO9jiSk
3L6Xllp1yB+Mw9y12bUhDAZNAqpkNtL0CJbLKh6fQ7x6l4d0t/QqpuKXPvF5l0wr
+Fb131STrh7fkiTT1glrra1UhJzz/KVOR+TG32GOSI0hOTqu4/gDQ/vUV0gh0SJw
OvndKFWbSnE=
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testPKCS8RC440()
    {
        // openssl pkcs8 -in private.pem -topk8 -v1 PBE-SHA1-RC4-40 -out enckey.pem

        // EncryptionAlgorithm: pbeWithSHAAnd40BitRC4

        $key = '-----BEGIN ENCRYPTED PRIVATE KEY-----
MIIE5DAcBgoqhkiG9w0BDAECMA4ECNrUHnZnezluAgIIAASCBMKm0lEML1hIdzcu
pglVZSwG8JyigX3xgHwnN4oAz6HYTNeatkV3xqGP23DP84e9En7mQTRxuQ9Tk8sN
NoEK2VsjYmrJtsbyTH21M0vPlAvFv/sIgxVYcF7jv58jHhLNnibPtDeMXZDjd4uq
vdppAGRxIr5z8XZ8ruAlsAB/xzcz1bIK8CwWH9NBOWLDe195/OYoUrgf9h+U2s8e
1rbq+U/woJZHD7+3RuPmtWTtrneY/NVTiU03OUUleys88eCSqZrQzR0faNxdVzTg
mhSrtkqwho9xxUFY6KqLOTF4BQufD+ZSNt9LN3EaFdvGcI1QWWDH11ne98oz3GUa
GCGhaADTOAAOdvXyv+6YRfj1VvtisUeiGjttFmaUHGOmHCCYoyVkbhsRq4QnbbCv
641ogRbuISBHwr+mzqjwTZXC5Laxsrn5EnCZ309vohq7l+g3M1Y9nzR8hOsiqTFu
7PPj1jYM8znYkVx/me+xnpB/d3Ot86K6NszbTaWk9cHr4qfkF+pu2kUYQ/26CUBE
y7DxYmhXnOBRGUTvQebrMoSK8hOaw0uWEQtYp3gLOS1hituL965m2qRbP/ysDP85
DAorOSbKDEMHYy7UP3xh743FErEOoY83GtugnJgjrTlJ/5NyS1KFr5QUsQD/N/Zw
bIkjdFT5mjWVaotHzpNc1IigpAPbNpe4J1E1E2nB8YE5ckSEVseUJ+ypgWSvJxmU
G68YvidODClnBekff8sRDCNN4dekQgnNEMbAWgHRWtMERvXS/9xfJZiqiq+7WvIE
Xvu1Qq5zG3+mESNX9AVLngv5btD2m6QFEqOLG9JKQWp61J3c2lG/kdtWBjsXiWoi
zvkA4u9ZxUzX3s3T2aHozg9O4+0ti947l7wSIxbxLYA0d1M7cQoeKAuRnpwzfCZ9
gpQ9VG9acDhU9LCxcZBHfuKROeI7D7wL//MJp/ue26uhOZY7Z0gbFIfjeSPW+HD0
fRGA849/1aKIsRarKg2YleqsXO04E3J/lpTt1gjy3aGE25Arq6qo+4DRsUIIWeS+
QwzdDeqy1zs8BIPxa51U/jvbqxCvqXsMw4la0txkSwymMvc6U+QpJgm2KqSDCs8W
+QYIz4SYlADLgl+MVDGd9IB/PN8AIZ0Lr7QqKKBIrfyegO/gjCkHCdNIh1Q/Bzbf
rq8AYwbxHnp2Jn2MAzw9s13ncENpZqCDHkhmd89hJc1B4f8rv5KhDsIVb85XQJek
pdpqugcYjxohSBEa9yzp0JDRa97Btir7D4+9HG2NUullFgXvbqKvlKPj+ORUDxJd
DMGC2Uov1koiVBvvahtmr8eTBNdA48cA7l/c5t8UsGbjrwpqLZLTJ1FHjnVKybuu
soPwPAxr3WBE4Ien7WqPj+GTeLWMb9//kpi5grguv3Db6rdH2Y4PT9Fi4UBxd+6N
LqB1rPkt4AQtQwda1ccixYXIFfWSJ6+XEyp6/wsW05DZAiu3R4o/T9Z59KPGlbf0
aaEAW+FZ9jYa6sDBlMwCN2TEmnBFkytJYe8+B5UxkEAIn3g/Vr9R4t4YDCSE2ugs
q6YJC1bQ8jHojcWTs47zcefCXhOkKOg3oxzYIQe9Ikdmf70JxIo+bS92O2vrkV0p
OFLPBrLe4Hw=
-----END ENCRYPTED PRIVATE KEY-----';
        $pass = 'asdf';

        $this->pkcs8tester($key, $pass);
    }

    public function testXMLDeclaration()
    {
        $key = '<?xml version="1.0" encoding="utf-8"?>
<RSAKeyValue>
  <Modulus>AKoYq6Q7UN7vOFmPr4fSq2NORXHBMKm8p7h4JnQU+quLRxvYll9cn8OBhIXq9SnCYkbzBVBkqN4ZyMM4vlSWy66wWdwLNYFDtEo1RJ6yZBExIaRVvX/eP6yRnpS1b7m7T2Uc2yPq1DnWzVI+sIGR51s1/ROnQZswkPJHh71PThln</Modulus>
  <Exponent>AQAB</Exponent>
  <P>AN4DDp+IhBca6QEjh4xlm3iexzLajXYrJid6vdWmh4T42nar5nem8Ax39o3ND9b1Zoj41F9zFQmuZ8/AgabreKU=</P>
  <Q>AMQi+R0G9m0K+AcqK3DFpv4RD9jGc0Tle98heNYT7EQvZuuiq4XjvRz0ybqN//bOafrKhsTpRS9DQ7eEpKLI4Bs=</Q>
  <DP>FklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5kX6zk7S0ljKtt2jny2+00VsBerQ==</DP>
  <DQ>AJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2eplU9VQQSQzY1oZMVX8i1m5WUTLPz2yLJIBQVdXqhM=</DQ>
  <InverseQ>EaiK5KhKNp9SFXuLVwQalvzyHk0FhnNZcZnfuwnlCxb6wnKg117fEfy91eHNTt5PzYPpf+xzD1FnP7/qsIninQ==</InverseQ>
  <D>Fijko56+qGyN8M0RVyaRAXz++xTqHBLh3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L2pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxE=</D>
</RSAKeyValue>';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertInstanceOf(PublicKey::class, $rsa->getPublicKey());
    }

    public function testPSS()
    {
        $key = '-----BEGIN PRIVATE KEY-----
MIIE7QIBADA9BgkqhkiG9w0BAQowMKANMAsGCWCGSAFlAwQCAaEaMBgGCSqGSIb3
DQEBCDALBglghkgBZQMEAgOiAwIBBQSCBKcwggSjAgEAAoIBAQD6L3Z2XUPH7vRU
1Xl5aLpW2jH/uhqOitRV2/1QAEQk6VasI2TjJefP6SmL+te71gE4PVTMpm0LoluR
IzvQYgeLwDFUzLsn2r/H3lKlS/K0KL890aNPSNuHwKVYQsBd2OuSQQZ04xM1E0VN
xELcW4Vc63FTyGzR4okQ2MGHQfxP/FoNNfaIxjyb7ly9feGNR3pIRcL2CEMfyZkq
rEE3SxNoGTHMTbIhMGchWTrX1V+VykSgy9+KmD0AD8SwP3nFH3BNLeoLDhkU2L6L
p9XYijx3RAvPeYRlMAyOpylRxXM5Z1oBmzaClDVE8mtJkMPpZshGbVwxbzrph8VA
FBf3FzYFAgMBAAECggEAMu3Igq3Xp3KIQGC4erOMAzQlq3YaA9xU/ylqNofnV1A8
uYv29Jp5xwQi1gD5O56D3wv1IDfcyNqDI1d1zKS3/oXgRO/sRV+tXKVwU3/TZ0NI
MvBi+zfMoKThw8bK3A/VXI9qHg8/kLVcjUkfhzYGPvUau8B4Dn28AzbspnkTQMCq
FpuC41a8UzOX7rvEKPTLp87fwI1u48ycDKVK0ZKjJMQQl3SbYaVIKZa4ctav/9wC
e5LAnap55S0L13FdUHbGJKzUqIk61NgCr8Wo16AYCOULzTTNVE24jl2Dc1H+sk61
b1FC/TxW9iWZx9givR1VgjG5fULbxwA/Mve7SYtfIQKBgQD+a/y8pxIPgBXb90Z4
poCqRsgJVPmu6sQ8STb0WibtyD/IKECooGOpI16A/884kNyXkfcIwK6txnnPYbmv
KlNHgSUnhEeavrHfeUmyyrQaTAs3I0iuL4stOSRHHPDD72PRSkPky6NMErX4F4Vv
Y6jkFhwsNJetxf2qInJn5WZ6LQKBgQD7vL+KE0HHLZ3DVaP7pRMOx9FvkhrtmqLZ
fSuMUweKqnAFHnkEPZFuyFRMoPL3cHaVLPkGmX8vK/GL/QECKPeDyE/jEFzGQV+L
n4PeraS1jzu77uYzWcuKdabFQN939iZ2gV5MUB7Jt4zfURf26fH1UHku7rs/Mik3
jLfE9elKOQKBgDzhFi8GQ1oWKiTifKhuHyefnEovXTev0ZkjY9UApYQMgMaiayZu
iqp0Xi68B5ffggl60gP0J1hJv+gR2F7D3/2iN4PHMWMj8mgpG6t+ua35OE3PUZrs
oX8Gx1mE4U/hPp9cB/b9i2uupoBhEHrg/A7oA4HIa+sXD2XgrEOULvtZAoGBAJ73
RRkDKhGGG87jAMeDKXK2+elzoO+UK+wdX+ef8u48zLpe0Nq9ql4DwUAWjvd0HF39
ZVAmlCsMm97jqMRdbFfaoZ/okD1dwOEhnRt8GbvRNE5sARBCTwcjXmnHmpZdaVKC
RTL5kUeeUiYfRnvUpcdcxvm9JZ81pNOAV/fXtjb5AoGAUVm4enVSfvPupBsjydU4
EHvU0Y0I2IH1FrnVF8TI/9Kpdu2W5bJN5XShb7j2CICIKTr7wVwn/a7VXscQKIVb
XCy8+Rnt/jddXFeFEu9zHWyJX9W4fGIkyE4zfRPmTkVK4S599SUQkHdgClzAOMZU
IBgv3a3Lyb+IQtT75LE1yjE=
-----END PRIVATE KEY-----';

        $rsa = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PrivateKey::class, $rsa);
        $this->assertInstanceOf(PublicKey::class, $rsa->getPublicKey());

        $r = PSS::load($key);

        $key = $rsa->toString('PSS');
        $r2 = PSS::load($key);

        $this->assertSame($r['hash'], $r2['hash']);
        $this->assertSame($r['MGFHash'], $r2['MGFHash']);
        $this->assertSame($r['saltLength'], $r2['saltLength']);
    }

    public function testOpenSSHPrivate()
    {
        $key = '-----BEGIN OPENSSH PRIVATE KEY-----
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
-----END OPENSSH PRIVATE KEY-----';

        $key = PublicKeyLoader::load($key);

        $key2 = PublicKeyLoader::load($key->toString('OpenSSH'));
        $this->assertInstanceOf(PrivateKey::class, $key2);

        $sig = $key->sign('zzz');

        $key = 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQDS8/TfgDLaowESNlVxYcLOSEPS1SAeBTIu5S2s8oRlTTrBD9ZyGSJBdsPR2ADGVmhD9lHQ3dbhjSpkIqC4msZ+2yPLJyIpyOY9BdW+V4sUfQUO5BOO8koyIThDSkJYdpsP2SWUtZU5gn+LAFqcGlSfj90BBoYWMtCNEsgBFMjo1kYDGYhoFv5wjyxz6rMHRZ9swYzT7wA7nJ5pmdEm10YCH0AcM4dP5Xqu5t1hWyhgEgd2UCfNy/4RJSFBhgk7Jb+rah3ovwgXn5ZU9CLPyc17fOeNFyT5P8pJjpfx9L9XJ+ZAOOSZIxSTePe4HrWo3NR1E2ZMqBNOsx8ljlsz6MNxShwfk6leFg40nh2k/VAOoWB7j5loKfkzPz0GOGQlR44xaVoHwqq/PsHOKUKYP6q/hOiyxOpxkgayB0QgbsdK32VWzPSZ523/r35iaS6GKRJ9nREAA74lRnmBdMbAWbQEWklY0vEl46yADpZCZRAZEretjXCDYsw0ri7RXKj8u8s= root@vagrant';
        $key = PublicKeyLoader::load($key);

        $this->assertTrue($key->verify('zzz', $sig));
    }

    public function testPuTTYPublic()
    {
        $orig = '---- BEGIN SSH2 PUBLIC KEY ----
Comment: "phpseclib-generated-key"
AAAAB3NzaC1yc2EAAAADAQABAAAAQQCo9+BpMRYQ/dL3DS2CyJxRF+j6ctbT3/Qp
84+KeFhnii7NT7fELilKUSnxS30WAvQCCo2yU1orfgqr41mM70MB
---- END SSH2 PUBLIC KEY ----';

        $orig = preg_replace('#(?<!\r)\n#', "\r\n", $orig);
        $key = PublicKeyLoader::load($orig);

        $this->assertSame($orig, $key->toString('PuTTY'));

        $key = '---- BEGIN SSH2 PUBLIC KEY ----
Subject: me
Comment: 1024-bit rsa, created by me@example.com Mon Jan 15 \
08:31:24 2001
AAAAB3NzaC1yc2EAAAABJQAAAIEAiPWx6WM4lhHNedGfBpPJNPpZ7yKu+dnn1SJejgt4
596k6YjzGGphH2TUxwKzxcKDKKezwkpfnxPkSMkuEspGRt/aZZ9wa++Oi7Qkr8prgHc4
soW6NUlfDzpvZK2H5E7eQaSeP3SAwGmQKUFHCddNaP0L+hM7zhFNzjFvpaMgJw0=
---- END SSH2 PUBLIC KEY ----';
        $key = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $key);

        $key = '---- BEGIN SSH2 PUBLIC KEY ----
Comment: "1024-bit RSA, converted from OpenSSH by me@example.com"
x-command: /home/me/bin/lock-in-guest.sh
AAAAB3NzaC1yc2EAAAABIwAAAIEA1on8gxCGJJWSRT4uOrR13mUaUk0hRf4RzxSZ1zRb
YYFw8pfGesIFoEuVth4HKyF8k1y4mRUnYHP1XNMNMJl1JcEArC2asV8sHf6zSPVffozZ
5TT4SfsUu/iKy9lUcCfXzwre4WWZSXXcPff+EHtWshahu3WzBdnGxm5Xoi89zcE=
---- END SSH2 PUBLIC KEY ----';
        $key = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PublicKey::class, $key);
    }

    public function testSavePasswordXML()
    {
        $this->expectException(UnsupportedFormatException::class);

        $key = '-----BEGIN RSA PRIVATE KEY-----
MIIBOgIBAAJBAKj34GkxFhD90vcNLYLInFEX6Ppy1tPf9Cnzj4p4WGeKLs1Pt8Qu
KUpRKfFLfRYC9AIKjbJTWit+CqvjWYzvQwECAwEAAQJAIJLixBy2qpFoS4DSmoEm
o3qGy0t6z09AIJtH+5OeRV1be+N4cDYJKffGzDa88vQENZiRm0GRq6a+HPGQMd2k
TQIhAKMSvzIBnni7ot/OSie2TmJLY4SwTQAevXysE2RbFDYdAiEBCUEaRQnMnbp7
9mxDXDf6AU0cN/RPBjb9qSHDcWZHGzUCIG2Es59z8ugGrDY+pxLQnwfotadxd+Uy
v/Ow5T0q5gIJAiEAyS4RaI9YG8EWx/2w0T67ZUVAw8eOMB6BIUg0Xcu+3okCIBOs
/5OiPgoTdSy7bcF9IGpSE8ZgGKzgYQVZeN97YE00
-----END RSA PRIVATE KEY-----';
        $key = PublicKeyLoader::load($key);
        $key->withPassword('demo')->toString('XML');
    }

    public function testPublicAsPrivatePKCS1()
    {
        $key = '-----BEGIN RSA PRIVATE KEY-----
MIGJAoGBANOV2sOh8KgK9ENJMCzkIQ+UogWU7GP4JMpGxT6aEoxE3O5zUo2D1asv
RrnqAxlf1zz+1dnRDU8EYbt+DJMLJ5pBeDbBuQzzV690+f7eporcZombSN2JoPAM
n9dyFZYXxil/cgFG/PDMnuXy1Wcl8hb8iwQag4Y7ohiLXVTJa/0BAgMBAAE=
-----END RSA PRIVATE KEY-----';
        $key = PublicKeyLoader::load($key);
        $result = $key->toString('PKCS1');
        $this->assertIsString($result);
    }

    /**
     * @group github1579
     */
    public function testNakedPKCS1PublicKey()
    {
        $key = '3082020a0282020100d595c09fbc635612b3ef6a0067d74cb76fa9af62a9272400c2a896f1335b920b88a9accaffe915e38542d296c1a559a586223521da8977030888a8d076910f59489a3a4a10bf950bf2b83278810e4c3bfc027b6b6cb75736cfaabaa83de15c619b8e9f65a60f4cfeba11fb5bf5e93abff68468695948b1843e2e09504281651475f7eff1c30fcb17026f13f04109fc930e489c14a1ef80ec51be6bb73f1679d258c2db535b04f4be82790ac01b4b0e9cb68a9bb5afab4363b5f33ff143ef13d1b2a292a72881d68d765a6c1fc981da0a2644ed284607d19f39802b3967bf9308da1f6515b59a2b0a1c57c14d661a62672f3b9453f931b62c446267d912c0987b7fb4c4fe085e3573ddfd9761ec2c035fa560c6c98343e9d448667b724a919780be2fd8666115d8a75b29e6c1e216cd73a693192f551f72fdf9eac0bb5bda83b11b5159151419249915e6006e6018bc1cda20960d4f1c7df7d401afd322656b4f0810348b8d20d506b08dd8752a0a721efa750b785fb2cb40930d33dd70bd8ad83883470851bd664c648da3f102545f1c54fa803cea5ba3edb51c3b894bd8fbd48d4ed97c251b3eed1d4e636d487a711d3859946acc14f808d777bcc3c5594ac2cd7dcf278ef4e7d3badea740f757a0669f213dadf46e9ff0eeb10720af086ce29e27e0ca2a639f4f3c5825ea5e2774bb3e722ce40e7cf6e2075857797c13d2d50203010001';
        $key = PublicKeyLoader::load(hex2bin($key));
        $this->assertInstanceOf(PublicKey::class, $key);
    }

    /**
     * @group github1711
     */
    public function testRawPrivateKey()
    {
        $key = RSA::createKey(512);
        $str1 = "$key";
        $key = $key->toString('Raw');
        $key = [
            'e' => $key['e'],
            'n' => $key['n'],
            'd' => $key['d'],
            'p' => $key['primes'][1],
            'q' => $key['primes'][2]
        ];
        $key = PublicKeyLoader::loadPrivateKey($key);
        $str2 = "$key";

        $this->assertSame($str1, $str2);
    }

    public function testPuTTYV3NoPW()
    {
        $key = 'PuTTY-User-Key-File-3: ssh-rsa
Encryption: none
Comment: rsa-key-20220216
Public-Lines: 6
AAAAB3NzaC1yc2EAAAADAQABAAABAQCJ39DLYw81oZmBMeRze+Plu0p8+kJezer4
mRpltRoqpZ0yRnyb5k0FtXrDeYL9IyCceOTsse/qks3CtVWQ2q7C2tqyezmk8mDf
aKXqnaSG3hHZo7vJcy76J7NNB6Mz2BxF9RGvb+sylEKdWOJdgmYC6dzyvpg/0qs6
yNPQGA5QOOzy2AstxnsujDl16I0GGsjw7ybc5844Hq4VhIQaft2Yd35UqGt5G1hs
nIZu1cLO/F+8xs+0xEY04FvJRNAoJGlVc8oPx7slU7vF5m22AmBqrhkljbid72OR
oXpI+4c7zc0dYZBIMoAEIJKTbliQE1WV0lYiXkS9RY3UjUyPLho9
Private-Lines: 14
AAABAQCI4IliEeMcpGVILOcXe2yCO1E1CCLyCc53pU/en0/t/OM18WJuR9I5k7Tf
8XeIpeIPVbo3/mMn5zydS/c5ytDrI+kwfkN5LSPdSABIDt8zAa6I+hNJaK+/q8BG
/gkZRDi1fxpiqGLAoQ4NNhvtJ7Lsu44d8/gkjJpvzsbx9Z/oJVK8ID10Wiiz9R7u
WPCOJbrETGU1LaY4N0hwhbqD28xtX4ypBh+HQ9umCqOMopeqVhebMolAZ62K5V+N
SbdN1JFk2FPQxMv3v4ApDW48AcJ1dNgO6euncaySLaQv3tnxYVjKVaf3JO0ALzoq
zsR2uj5bJUvhSapj9uWdDJTurGzFAAAAgQDY5t/F2Ruoa5wtF/XTiIxFpb//xQ+2
JhQOWd1fZZ+oMclqNS5E45E11TWnKthgr5NN4UB6TH4rtUETjsypD3w2PYZamTD1
QzeoOS0xRxjKfQu08ApDV94mx9LfX6Xi2IqTW0pC+IbBx8AUnK7J7scva8TYn7Qu
1QLSY4/tn3BBBwAAAIEAorolHJnR+w5FajTc8VeqN5E9bfc39Mr+2lQcqtARJGAM
2jLhN3ZWGIboG3Ttqcbfuicv/WzFe+gGRA8awvMS4v2C5/knZl4Vq859KCP7JOeW
63+5mLw5OKZOzWkguMu8+IfkUtIMv1JFuCU2eRL5elUthKlK6WFcMejuygNTrZsA
AACARP7yi23FNxAqHcgbx5MlrLYbMSjxp5yT+1XeNVTSpM/dvDVsy+8ETi/c1870
UfAzuIHQl2fu6NdtPBQUoqWKgBRtp46J/BoWF3Ty6klz+FAP2of4gojYvqa87H+6
dW7G8+QXxXM704cxjbBQAApItfVw3upWPrYP9FDy7xvtYRY=
Private-MAC: 7979eb6f604fb3e0bd191295479517f641598649167835402c6cbfde6cbf21ef';

        $key = PublicKeyLoader::load($key);
        $this->assertInstanceOf(PrivateKey::class, $key);
    }

    public function testPuTTYV3PW()
    {
        if (!function_exists('sodium_crypto_pwhash')) {
            self::markTestSkipped('sodium_crypto_pwhash() function is not available.');
        }

        $key = 'PuTTY-User-Key-File-3: ssh-rsa
Encryption: aes256-cbc
Comment: rsa-key-20220216
Public-Lines: 6
AAAAB3NzaC1yc2EAAAADAQABAAABAQCJ39DLYw81oZmBMeRze+Plu0p8+kJezer4
mRpltRoqpZ0yRnyb5k0FtXrDeYL9IyCceOTsse/qks3CtVWQ2q7C2tqyezmk8mDf
aKXqnaSG3hHZo7vJcy76J7NNB6Mz2BxF9RGvb+sylEKdWOJdgmYC6dzyvpg/0qs6
yNPQGA5QOOzy2AstxnsujDl16I0GGsjw7ybc5844Hq4VhIQaft2Yd35UqGt5G1hs
nIZu1cLO/F+8xs+0xEY04FvJRNAoJGlVc8oPx7slU7vF5m22AmBqrhkljbid72OR
oXpI+4c7zc0dYZBIMoAEIJKTbliQE1WV0lYiXkS9RY3UjUyPLho9
Key-Derivation: Argon2id
Argon2-Memory: 8192
Argon2-Passes: 13
Argon2-Parallelism: 1
Argon2-Salt: d9bfa07d14a450a26ada4eb5d30c4dae
Private-Lines: 14
L3TUmo97jnxJVYIScxzPIaq19/yNQ5HDQKGSTz4vqUrQR3wXQEyhzxlN2mm5zZtT
pst7K61P0awtjs4kHUfsKxXh/upv7ndS9u9G7cnnBfP5mjs0wAE2VaghbP4UXprH
/MQC9Dr13Iuydv5Oih+PLpkvM3DbY5t+nrIWy/29yDLYe/QjLvy346Gz3pnLmCfb
hbEFfjefdppa+6QZ+qU6ai/NMAM/Q5OxjRlIo1brrKJNvMrbzP7irZ4+Ao2Or/hX
nb2ZZLY0eUotD8iFuOk2EjjqP9iakag1OHdvdy6EcPzkIObN5YeZGz9/hRDFr9Ml
xNxdaw5c1BhqU5pm0B0HUDqW5kmYTiugUKQiGr0+1ckliUt6jsb7YImnqJIgL7PS
vKcqNvz95u4on77gHPl2JdsXxuz6jOkDwc9jvsJCtIMJ8qhAVXGS7WaH2aF9ty7B
4E+f2yIbsRr0RFCZoTTjTmhtYsVd7DYo0Jftya3Sh/lVO1MLo1z8em0MFJdR683N
tRDA2lbRPOdKYaiKdyp5bAsl4fqPR1e2GR9ybalPn/XSFDRtDfdMr7hyQboBR7uC
X3nYsh5OiXakUSr2ST41pP27s8F48590M6xWb9LGFJA+JqmAZ5rxPTxFYjkz27y9
Yvlq6lvM+XsUREPrxhWrHya4Jyp4WtyVtJXDg626hoZBSEtcOY/mbPfwVFnoU9vz
V8TI/YU837mUceEJlEQEbT+bFJfh0W5jzAYx2xX6uPnDkodBMK2p6QS3ZKib0NJ7
W+jQr9TT40H0agZhtAmPKaLGxtgdpUps1CDPV+8Y/pBf28CsI2DjFaOYopZXcW9s
vCIjXopt4wAKbXiLyb5JXzFfB7CVron48NHB7wzuwvnUoYa/4dbjeEos+1y72xoP
Private-MAC: d26baf87446604974287b682ed9e0c00ce54e460e1cb719953a81291147b3c59
';

        $key = PublicKeyLoader::load($key, 'demo');
        $this->assertInstanceOf(PrivateKey::class, $key);
    }

    public function testOpenSSHEncrypted()
    {
        if (PHP_INT_SIZE == 4) {
            self::markTestSkipped('32-bit integers slow OpenSSH encrypted keys down too much');
        }

        $key = '-----BEGIN OPENSSH PRIVATE KEY-----
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
LrIZULwMa4nI4Y+RkFftEponSYw=
-----END OPENSSH PRIVATE KEY-----
';

        $key = PublicKeyLoader::load($key, 'test');
        $this->assertInstanceOf(PrivateKey::class, $key);
    }

    public function testJWK()
    {
        // keys are from https://datatracker.ietf.org/doc/html/rfc7517#appendix-A

        $plaintext = 'zzz';

        $key = '     {"keys":
       [
         {"kty":"RSA",
          "n":"0vx7agoebGcQSuuPiLJXZptN9nndrQmbXEps2aiAFbWhM78LhWx4
     cbbfAAtVT86zwu1RK7aPFFxuhDR1L6tSoc_BJECPebWKRXjBZCiFV4n3oknjhMst
     n64tZ_2W-5JsGY4Hc5n9yBXArwl93lqt7_RN5w6Cf0h4QyQ5v-65YGjQR0_FDW2Q
     vzqY368QQMicAtaSqzs8KJZgnYb9c7d0zgdAZHzu6qMQvRL5hajrn1n91CbOpbIS
     D08qNLyrdkt-bFTWhAI4vMQFh6WeZu0fM4lFd2NcRwr3XPksINHaQ-G_xBniIqbw
     0Ls1jF44-csFCur-kEgU8awapJzKnqDKgw",
          "e":"AQAB",
          "d":"X4cTteJY_gn4FYPsXB8rdXix5vwsg1FLN5E3EaG6RJoVH-HLLKD9
     M7dx5oo7GURknchnrRweUkC7hT5fJLM0WbFAKNLWY2vv7B6NqXSzUvxT0_YSfqij
     wp3RTzlBaCxWp4doFk5N2o8Gy_nHNKroADIkJ46pRUohsXywbReAdYaMwFs9tv8d
     _cPVY3i07a3t8MN6TNwm0dSawm9v47UiCl3Sk5ZiG7xojPLu4sbg1U2jx4IBTNBz
     nbJSzFHK66jT8bgkuqsk0GjskDJk19Z4qwjwbsnn4j2WBii3RL-Us2lGVkY8fkFz
     me1z0HbIkfz0Y6mqnOYtqc0X4jfcKoAC8Q",
          "p":"83i-7IvMGXoMXCskv73TKr8637FiO7Z27zv8oj6pbWUQyLPQBQxtPV
     nwD20R-60eTDmD2ujnMt5PoqMrm8RfmNhVWDtjjMmCMjOpSXicFHj7XOuVIYQyqV
     WlWEh6dN36GVZYk93N8Bc9vY41xy8B9RzzOGVQzXvNEvn7O0nVbfs",
          "q":"3dfOR9cuYq-0S-mkFLzgItgMEfFzB2q3hWehMuG0oCuqnb3vobLyum
     qjVZQO1dIrdwgTnCdpYzBcOfW5r370AFXjiWft_NGEiovonizhKpo9VVS78TzFgx
     kIdrecRezsZ-1kYd_s1qDbxtkDEgfAITAG9LUnADun4vIcb6yelxk",
          "dp":"G4sPXkc6Ya9y8oJW9_ILj4xuppu0lzi_H7VTkS8xj5SdX3coE0oim
     YwxIi2emTAue0UOa5dpgFGyBJ4c8tQ2VF402XRugKDTP8akYhFo5tAA77Qe_Nmtu
     YZc3C3m3I24G2GvR5sSDxUyAN2zq8Lfn9EUms6rY3Ob8YeiKkTiBj0",
          "dq":"s9lAH9fggBsoFR8Oac2R_E2gw282rT2kGOAhvIllETE1efrA6huUU
     vMfBcMpn8lqeW6vzznYY5SSQF7pMdC_agI3nG8Ibp1BUb0JUiraRNqUfLhcQb_d9
     GF4Dh7e74WbRsobRonujTYN1xCaP6TO61jvWrX-L18txXw494Q_cgk",
          "qi":"GyM_p6JrXySiz1toFgKbWV-JdI3jQ4ypu9rbMWx3rQJBfmt0FoYzg
     UIZEVFEcOqwemRN81zoDAaa-Bk0KWNGDjJHZDdDmFhW3AN7lI-puxk_mHZGJ11rx
     yR8O55XLSe3SPmRfKwZI6yU24ZxvQKFYItdldUKGzO6Ia6zTKhAVRU",
          "alg":"RS256",
          "kid":"2011-04-29"}
       ]
     }';

        $keyWithoutWS = preg_replace('#\s#', '', $key);

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK', [
            'alg' => 'RS256',
            'kid' => '2011-04-29'
        ]));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $sig = $key->sign($plaintext);

        $key = '         {"kty":"RSA",
          "n": "0vx7agoebGcQSuuPiLJXZptN9nndrQmbXEps2aiAFbWhM78LhWx
     4cbbfAAtVT86zwu1RK7aPFFxuhDR1L6tSoc_BJECPebWKRXjBZCiFV4n3oknjhMs
     tn64tZ_2W-5JsGY4Hc5n9yBXArwl93lqt7_RN5w6Cf0h4QyQ5v-65YGjQR0_FDW2
     QvzqY368QQMicAtaSqzs8KJZgnYb9c7d0zgdAZHzu6qMQvRL5hajrn1n91CbOpbI
     SD08qNLyrdkt-bFTWhAI4vMQFh6WeZu0fM4lFd2NcRwr3XPksINHaQ-G_xBniIqb
     w0Ls1jF44-csFCur-kEgU8awapJzKnqDKgw",
          "e":"AQAB",
          "alg":"RS256",

          "kid":"2011-04-29"}';

        $keyWithoutWS = preg_replace('#\s#', '', $key);
        $keyWithoutWS = '{"keys":[' . $keyWithoutWS . ']}';

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK', [
            'alg' => 'RS256',
            'kid' => '2011-04-29'
        ]));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $this->assertTrue($key->verify($plaintext, $sig));
    }
}
