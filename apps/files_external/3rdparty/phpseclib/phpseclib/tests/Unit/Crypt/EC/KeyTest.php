<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2013 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\EC;

use phpseclib3\Crypt\EC;
use phpseclib3\Crypt\EC\Formats\Keys\OpenSSH;
use phpseclib3\Crypt\EC\Formats\Keys\PKCS1;
use phpseclib3\Crypt\EC\Formats\Keys\PKCS8;
use phpseclib3\Crypt\EC\Formats\Keys\PuTTY;
use phpseclib3\Crypt\EC\Formats\Keys\XML;
use phpseclib3\Crypt\EC\PrivateKey;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Tests\PhpseclibTestCase;

class KeyTest extends PhpseclibTestCase
{
    public function testBinaryPKCS1PrivateParameters()
    {
        $key = PublicKeyLoader::load('-----BEGIN EC PARAMETERS-----
BgUrgQQAIg==
-----END EC PARAMETERS-----
-----BEGIN EC PRIVATE KEY-----
MIGkAgEBBDBPoZHEeuf9UjjhevAbGxWwsmmWw34vkxJwtZ0AknmSUAHo0OAowJSQ
Stf/0U65RhWgBwYFK4EEACKhZANiAASVZJGIs6m/TZhbFoTwBtpvU1JcyixD2YI3
5YnoIx/6Q1oqJg1vrrmUoXaeEpaO6JH8RgItTl9lYMdmOk5309WJka6tI1QAAK3+
Jq9z4moG4whp3JsuiBQG9wnaHVrQPA4=
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('secp384r1', $key->getCurve());
    }

    // openssl ecparam -name secp256k1 -genkey -noout -out secp256k1.pem
    public function testPKCS1PrivateKey()
    {
        $key = PublicKeyLoader::load($expected = '-----BEGIN EC PRIVATE KEY-----
MHQCAQEEIEzUawcXqUsQhaEQ51JLeOIY0ddzlO2nNgwDk32ETqwkoAcGBSuBBAAK
oUQDQgAEFuVcVb9iCUhg2cknHPE+BouHGhQ39ORjMaMI3T4RfRxr6dj5HAXdEqVZ
1W94KMe30ndmTndcJ8BPeT1Dd15FdQ==
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('secp256k1', $key->getCurve());
        //PKCS1::useNamedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS1'));
    }

    // openssl ecparam -name secp256k1 -genkey -noout -out secp256k1.pem -param_enc explicit
    public function testPKCS1PrivateKeySpecifiedCurve()
    {
        $key = PublicKeyLoader::load('-----BEGIN EC PRIVATE KEY-----
MIIBEwIBAQQgFr6TF5meGfgCXDqVxoSEltGI+T94G42PPbA6/ibq+ouggaUwgaIC
AQEwLAYHKoZIzj0BAQIhAP////////////////////////////////////7///wv
MAYEAQAEAQcEQQR5vmZ++dy7rFWgYpXOhwsHApv82y3OKNlZ8oFbFvgXmEg62ncm
o8RlXaT7/A4RCKj9F7RIpoVUGZxH0I/7ENS4AiEA/////////////////////rqu
3OavSKA7v9JejNA2QUECAQGhRANCAASCTRhjXqmdbqphSdxNkfTNAOmDW5cZ5fnZ
ys0Tk4pUv/XdiMZtVCGTNsotGeFbT5X64JkP/BFi3PVqjwy2VhOc
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('secp256k1', $key->getCurve());

        // this key and the above key have a few small differences.
        // in both keys the coefficient's are 0 and 7. in the above
        // key both coefficients are encoded using a single byte.
        // in the following key the coefficient's are encoded
        // as 32 bytes (ie. the length of the reduction prime).
        // eg. one byte null padded to 32 bytes.
        // also, in the above key the cofactor (1; optional) is
        // included whereas in the following key it is not
        $expected = '-----BEGIN EC PRIVATE KEY-----
MIIBTgIBAQQgFr6TF5meGfgCXDqVxoSEltGI+T94G42PPbA6/ibq+ouggeAwgd0C
AQEwLAYHKoZIzj0BAQIhAP////////////////////////////////////7///wv
MEQEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABCAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAABwRBBHm+Zn753LusVaBilc6HCwcCm/zbLc4o
2VnygVsW+BeYSDradyajxGVdpPv8DhEIqP0XtEimhVQZnEfQj/sQ1LgCIQD/////
///////////////+uq7c5q9IoDu/0l6M0DZBQaFEA0IABIJNGGNeqZ1uqmFJ3E2R
9M0A6YNblxnl+dnKzROTilS/9d2Ixm1UIZM2yi0Z4VtPlfrgmQ/8EWLc9WqPDLZW
E5w=
-----END EC PRIVATE KEY-----';
        PKCS1::useSpecifiedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS1'));
    }

    // openssl ecparam -name secp256k1 -genkey -noout -out secp256k1.pem
    // openssl pkcs8 -topk8 -nocrypt -in secp256k1.pem -out secp256k1-2.pem
    public function testPKCS8PrivateKey()
    {
        $key = PublicKeyLoader::load($expected = '-----BEGIN PRIVATE KEY-----
MIGEAgEAMBAGByqGSM49AgEGBSuBBAAKBG0wawIBAQQgAYCXwnhqMT6fCIKIkQ0w
cac7QqHrn4TCQMF9a+im74WhRANCAATwCjyGuP8xQbvVjznqazL36oeAnD32I+X2
+wscW3OmyTDpk41HaWYPh+j+BoufsSkCwf8dBRGEQbCieZbbZogy
-----END PRIVATE KEY-----');
        $this->assertSameNL('secp256k1', $key->getCurve());
        $this->assertSameNL($expected, $key->toString('PKCS8'));
    }

    // openssl ecparam -name secp256k1 -genkey -noout -out secp256k1.pem -param_enc explicit
    // openssl pkcs8 -topk8 -nocrypt -in secp256k1.pem -out secp256k1-2.pem
    public function testPKCS8PrivateKeySpecifiedCurve()
    {
        $key = PublicKeyLoader::load('-----BEGIN PRIVATE KEY-----
MIIBIwIBADCBrgYHKoZIzj0CATCBogIBATAsBgcqhkjOPQEBAiEA////////////
/////////////////////////v///C8wBgQBAAQBBwRBBHm+Zn753LusVaBilc6H
CwcCm/zbLc4o2VnygVsW+BeYSDradyajxGVdpPv8DhEIqP0XtEimhVQZnEfQj/sQ
1LgCIQD////////////////////+uq7c5q9IoDu/0l6M0DZBQQIBAQRtMGsCAQEE
IKFfw3vfd5pqA5SZOTFtpr7hdJoKP/rmTPMCggkAOA35oUQDQgAEnX66+UCzUW3T
/fkLGIIfZjJm5bIMwAV85LpDom2hI441JRx+/W4WqtGuW+B/LABS6ZHp+qzepThC
HsjS3Q9Pew==
-----END PRIVATE KEY-----');
        $this->assertSameNL('secp256k1', $key->getCurve());

        // see testPKCS1PrivateKeySpecifiedCurve for an explanation
        // of how this key and the above key differ
        $expected = '-----BEGIN PRIVATE KEY-----
MIIBXgIBADCB6QYHKoZIzj0CATCB3QIBATAsBgcqhkjOPQEBAiEA////////////
/////////////////////////v///C8wRAQgAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHBEEE
eb5mfvncu6xVoGKVzocLBwKb/NstzijZWfKBWxb4F5hIOtp3JqPEZV2k+/wOEQio
/Re0SKaFVBmcR9CP+xDUuAIhAP////////////////////66rtzmr0igO7/SXozQ
NkFBBG0wawIBAQQgoV/De993mmoDlJk5MW2mvuF0mgo/+uZM8wKCCQA4DfmhRANC
AASdfrr5QLNRbdP9+QsYgh9mMmblsgzABXzkukOibaEjjjUlHH79bhaq0a5b4H8s
AFLpken6rN6lOEIeyNLdD097
-----END PRIVATE KEY-----';
        PKCS8::useSpecifiedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS8'));
    }

    // openssl ecparam -name sect113r1 -genkey -noout -out sect113r1.pem
    public function testBinaryPKCS1PrivateKey()
    {
        $key = PublicKeyLoader::load('-----BEGIN EC PRIVATE KEY-----
MEECAQEEDwBZdP4eSzKk/uQa6jdtfKAHBgUrgQQABKEiAyAABAHqCoNb++mK5qvE
c4rCzQEuI19czqvXpEPcAWSXew==
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('sect113r1', $key->getCurve());

        // the difference between this and the above key is that
        // the privateKey part of the above key has a leading null
        // byte whereas this one doesn't
        $expected = '-----BEGIN EC PRIVATE KEY-----
MEACAQEEDll0/h5LMqT+5BrqN218oAcGBSuBBAAEoSIDIAAEAeoKg1v76Yrmq8Rz
isLNAS4jX1zOq9ekQ9wBZJd7
-----END EC PRIVATE KEY-----';

        PKCS1::useNamedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS1'));
    }

    // openssl ecparam -name sect113r1 -genkey -noout -out sect113r1.pem -param_enc explicit
    public function testBinaryPKCS1PrivateKeySpecifiedCurve()
    {
        $key = PublicKeyLoader::load('-----BEGIN EC PRIVATE KEY-----
MIHNAgEBBA8AuSc4BeeyYTq9rbSDuL2ggZIwgY8CAQEwHAYHKoZIzj0BAjARAgFx
BgkqhkjOPQECAwICAQkwNwQOMIglDKbnx/5knOhYIPcEDui+5NPiJgdEGIvg6ccj
AxUAEOcjqxTWluZ2h1YVF1b+v4/LSakEHwQAnXNhbzX0qxQH1zViwQ8ApSgwJ3lY
7oTRMV7TGIYCDwEAAAAAAAAA2czsijnlbwIBAqEiAyAABAFC7c50y7uw+iuHeMCt
WwCpKNBUcVeiHme609Dv/g==
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('sect113r1', $key->getCurve());

        // this key and the above key have a few small differences.
        // the above key has the (optional) seed for the verifiably
        // random function whereas the following key does not.
        // also, in the above key the cofactor (1; optional) is
        // included whereas in the following key it is not;
        // finally, in the above the privateKey has a leading null
        // byte whereas it doesn't in the following key
        $expected = '-----BEGIN EC PRIVATE KEY-----
MIGwAgEBBA65JzgF57JhOr2ttIO4vaB3MHUCAQEwHAYHKoZIzj0BAjARAgFxBgkq
hkjOPQECAwICAQkwIAQOMIglDKbnx/5knOhYIPcEDui+5NPiJgdEGIvg6ccjBB8E
AJ1zYW819KsUB9c1YsEPAKUoMCd5WO6E0TFe0xiGAg8BAAAAAAAAANnM7Io55W+h
IgMgAAQBQu3OdMu7sPorh3jArVsAqSjQVHFXoh5nutPQ7/4=
-----END EC PRIVATE KEY-----';
        PKCS1::useSpecifiedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS1'));
    }

    // openssl ecparam -name sect113r1 -genkey -noout -out sect113r1.pem
    // openssl pkcs8 -topk8 -nocrypt -in sect113r1.pem -out sect113r1-2.pem
    // sect113r1's reduction polynomial is a trinomial
    public function testBinaryPKCS8PrivateKey()
    {
        $key = PublicKeyLoader::load('-----BEGIN PRIVATE KEY-----
MFECAQAwEAYHKoZIzj0CAQYFK4EEAAQEOjA4AgEBBA8A5OuqAY8HYoFOaz9mE6mh
IgMgAAQASF3rOTPXvH0QdRBvsrMBdLMf27yd8AWABrZTxvI=
-----END PRIVATE KEY-----');
        $this->assertSameNL('sect113r1', $key->getCurve());

        // the difference between this and the above key is that
        // the privateKey part of the above key has a leading null
        // byte whereas this one doesn't
        $expected = '-----BEGIN PRIVATE KEY-----
MFACAQAwEAYHKoZIzj0CAQYFK4EEAAQEOTA3AgEBBA7k66oBjwdigU5rP2YTqaEi
AyAABABIXes5M9e8fRB1EG+yswF0sx/bvJ3wBYAGtlPG8g==
-----END PRIVATE KEY-----';

        PKCS8::useNamedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS8'));
    }

    // openssl ecparam -name sect113r1 -genkey -noout -out sect113r1.pem -param_enc explicit
    // openssl pkcs8 -topk8 -nocrypt -in sect113r1.pem -out sect113r1-2.pem
    public function testBinaryPKCS8PrivateKeySpecifiedCurve()
    {
        $key = PublicKeyLoader::load('-----BEGIN PRIVATE KEY-----
MIHdAgEAMIGbBgcqhkjOPQIBMIGPAgEBMBwGByqGSM49AQIwEQIBcQYJKoZIzj0B
AgMCAgEJMDcEDjCIJQym58f+ZJzoWCD3BA7ovuTT4iYHRBiL4OnHIwMVABDnI6sU
1pbmdodWFRdW/r+Py0mpBB8EAJ1zYW819KsUB9c1YsEPAKUoMCd5WO6E0TFe0xiG
Ag8BAAAAAAAAANnM7Io55W8CAQIEOjA4AgEBBA8AXtfDMRsRTx8snPbWHquhIgMg
AAQA9xdWGJ6vV23+vkdq0C8BLJVg5E3amMyf/5keGa4=
-----END PRIVATE KEY-----');
        $this->assertSameNL('sect113r1', $key->getCurve());

        // see testBinaryPKCS1PrivateKeySpecifiedCurve() for an
        // explanation of the differences between the above key
        // and the following key
        $expected = '-----BEGIN PRIVATE KEY-----
MIHBAgEAMIGABgcqhkjOPQIBMHUCAQEwHAYHKoZIzj0BAjARAgFxBgkqhkjOPQEC
AwICAQkwIAQOMIglDKbnx/5knOhYIPcEDui+5NPiJgdEGIvg6ccjBB8EAJ1zYW81
9KsUB9c1YsEPAKUoMCd5WO6E0TFe0xiGAg8BAAAAAAAAANnM7Io55W8EOTA3AgEB
BA5e18MxGxFPHyyc9tYeq6EiAyAABAD3F1YYnq9Xbf6+R2rQLwEslWDkTdqYzJ//
mR4Zrg==
-----END PRIVATE KEY-----';
        PKCS8::useSpecifiedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS8'));
    }

    // openssl ecparam -name sect131r1 -genkey -noout -out sect131r1.pem -param_enc explicit
    // sect131r1's reduction polynomial is a pentanomial
    public function testBinaryPentanomialPKCS1PrivateKey()
    {
        $key = PublicKeyLoader::load('-----BEGIN EC PRIVATE KEY-----
MIHoAgEBBBECPEK9NCISWf2riBsORoTM+6CBpzCBpAIBATAlBgcqhkjOPQECMBoC
AgCDBgkqhkjOPQECAwMwCQIBAgIBAwIBCDA9BBEHoRsJp2tWIURBj/P/jCVwuAQR
AhfAVhCIS2O5xscpFnj500EDFQBNaW5naHVhUXWYW9OtutohtDqX4gQjBACBuvkf
35gzxA+cGBNDY4OZB4xufqOMAB9zyBNLG0754VACEQQAAAAAAAAAAjEjlTqUZLVN
AgECoSYDJAAEBEIolGjo5lnsYqNagqYPOaEGOglkllDO2aWPtB6n+x/WXw==
-----END EC PRIVATE KEY-----');
        $this->assertSameNL('sect131r1', $key->getCurve());

        // see testBinaryPKCS1PrivateKeySpecifiedCurve() for an
        // explanation of the differences between the above key
        // and the following key
        $expected = '-----BEGIN EC PRIVATE KEY-----
MIHOAgEBBBECPEK9NCISWf2riBsORoTM+6CBjTCBigIBATAlBgcqhkjOPQECMBoC
AgCDBgkqhkjOPQECAwMwCQIBAgIBAwIBCDAmBBEHoRsJp2tWIURBj/P/jCVwuAQR
AhfAVhCIS2O5xscpFnj500EEIwQAgbr5H9+YM8QPnBgTQ2ODmQeMbn6jjAAfc8gT
SxtO+eFQAhEEAAAAAAAAAAIxI5U6lGS1TaEmAyQABARCKJRo6OZZ7GKjWoKmDzmh
BjoJZJZQztmlj7Qep/sf1l8=
-----END EC PRIVATE KEY-----';
        PKCS1::useSpecifiedCurve();
        $this->assertSameNL($expected, $key->toString('PKCS1'));
    }

    // from https://tools.ietf.org/html/draft-ietf-curdle-pkix-07#section-10.1
    public function testEd25519PublicKey()
    {
        $expected = '-----BEGIN PUBLIC KEY-----
MCowBQYDK2VwAyEAGb9ECWmEzf6FQbrBZ9w7lshQhqowtrbLDFw4rXAxZuE=
-----END PUBLIC KEY-----';
        $key = PublicKeyLoader::load($expected);
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL($expected, $key->toString('PKCS8'));
    }

    // from https://tools.ietf.org/html/draft-ietf-curdle-pkix-07#section-10.3
    public function testEd25519PrivateKey()
    {
        // without public key (public key should be derived)
        $expected = '-----BEGIN PRIVATE KEY-----
MC4CAQAwBQYDK2VwBCIEINTuctv5E1hK1bbY8fdp+K06/nwoy/HU++CXqI9EdVhC
-----END PRIVATE KEY-----';
        $key = PublicKeyLoader::load($expected);
        $this->assertSameNL($expected, $key->toString('PKCS8'));
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL('Ed25519', $key->getPublicKey()->getCurve());

        // with public key
        $key = PublicKeyLoader::load('-----BEGIN PRIVATE KEY-----
MHICAQEwBQYDK2VwBCIEINTuctv5E1hK1bbY8fdp+K06/nwoy/HU++CXqI9EdVhC
oB8wHQYKKoZIhvcNAQkJFDEPDA1DdXJkbGUgQ2hhaXJzgSEAGb9ECWmEzf6FQbrB
Z9w7lshQhqowtrbLDFw4rXAxZuE=
-----END PRIVATE KEY-----');
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL('Ed25519', $key->getPublicKey()->getCurve());

        // the above key not only omits NULL - it also includes a
        // unstructuredName attribute with a value of "Curdle Chairs"
        // that the following key does not have
        $key = PublicKeyLoader::load('-----BEGIN PRIVATE KEY-----
MFMCAQEwBwYDK2VwBQAEIgQg1O5y2/kTWErVttjx92n4rTr+fCjL8dT74Jeoj0R1
WEKBIQAZv0QJaYTN/oVBusFn3DuWyFCGqjC2tssMXDitcDFm4Q==
-----END PRIVATE KEY-----');
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL('Ed25519', $key->getPublicKey()->getCurve());
    }

    public function testPuTTYnistp256()
    {
        $key = PublicKeyLoader::load($expected = 'PuTTY-User-Key-File-2: ecdsa-sha2-nistp256
Encryption: none
Comment: ecdsa-key-20181105
Public-Lines: 3
AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBJEXCsWA8s18
m25MJlVE1urbXPYFi4q8oMbb2H0kE2f5WPxizsKXRmb1J68paXQizryL9fC4FTqI
CJ1+UnaPfk0=
Private-Lines: 1
AAAAIQDwaPlajbXY1SxhuwsUqN1CEZ5g4adsbmJsKm+ZbUVm4g==
Private-MAC: b85ca0eb7c612df5d18af85128821bd53faaa3ef
');
        $this->assertSameNL('secp256r1', $key->getCurve());

        PuTTY::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('PuTTY'));

        $key = PublicKeyLoader::load($expected = 'ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBJEXCsWA8s18m25MJlVE1urbXPYFi4q8oMbb2H0kE2f5WPxizsKXRmb1J68paXQizryL9fC4FTqICJ1+UnaPfk0= ecdsa-key-20181105');
        $this->assertSameNL('secp256r1', $key->getCurve());

        OpenSSH::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('OpenSSH'));
    }

    public function testPuTTYnistp384()
    {
        $key = PublicKeyLoader::load($expected = 'PuTTY-User-Key-File-2: ecdsa-sha2-nistp384
Encryption: none
Comment: ecdsa-key-20181105
Public-Lines: 3
AAAAE2VjZHNhLXNoYTItbmlzdHAzODQAAAAIbmlzdHAzODQAAABhBOI53wHG3Cdc
AJZq5PXWZAEAxxsNVFQlQgOX9toWEOgqQF5LbK2nWLKRvaHMzocUXaTYZDccSS0A
TZFPT3j1Er1LU9cu4PHpyS07v262jdzkxIvKCPcAeISuV80MC7rHog==
Private-Lines: 2
AAAAMQCEMkGMDg6N7bUqdvLXe0YmY4qBSi8hmAuMvU38RDoVFVmV+R4RYmMueyrX
be9Oyus=
Private-MAC: 97a990a3d5f6b8f268d4be9c4ab9ebfd8fa79849
');
        $this->assertSameNL('secp384r1', $key->getCurve());

        PuTTY::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('PuTTY'));

        $key = PublicKeyLoader::load($expected = 'ecdsa-sha2-nistp384 AAAAE2VjZHNhLXNoYTItbmlzdHAzODQAAAAIbmlzdHAzODQAAABhBOI53wHG3CdcAJZq5PXWZAEAxxsNVFQlQgOX9toWEOgqQF5LbK2nWLKRvaHMzocUXaTYZDccSS0ATZFPT3j1Er1LU9cu4PHpyS07v262jdzkxIvKCPcAeISuV80MC7rHog== ecdsa-key-20181105');
        $this->assertSameNL('secp384r1', $key->getCurve());

        OpenSSH::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('OpenSSH'));
    }

    public function testPuTTYnistp521()
    {
        $key = PublicKeyLoader::load($expected = 'PuTTY-User-Key-File-2: ecdsa-sha2-nistp521
Encryption: none
Comment: ecdsa-key-20181105
Public-Lines: 4
AAAAE2VjZHNhLXNoYTItbmlzdHA1MjEAAAAIbmlzdHA1MjEAAACFBAF1Eg0MjaJw
ooFj6HCNh4RWbvmQRY+sdczJyBdT3EaTc/6IUcCfW7w7rAeRp2CDdE9RlAVD8IuL
qW7DJH06Xeov8wBO5G6jUqXu0rlHsOSiC6VcCxBJuWVNB1IorHnS7PX0f6HdLlIE
me73P77drqpn5YY0XLtP6hFrF7H5XfCxpNyaJA==
Private-Lines: 2
AAAAQgHJl8/dIArolFymdzhagXCfd2l8UF3CQXWGVGDQ0R04nnntlyztYiVdRXXK
r84NnzS7dJcAsR9YaUOZ69NRKNiUAQ==
Private-MAC: 6d49ce289b85549a43d74422dd8bb3ba8798c72c
');
        $this->assertSameNL('secp521r1', $key->getCurve());

        PuTTY::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('PuTTY'));

        $key = PublicKeyLoader::load($expected = 'ecdsa-sha2-nistp521 AAAAE2VjZHNhLXNoYTItbmlzdHA1MjEAAAAIbmlzdHA1MjEAAACFBAF1Eg0MjaJwooFj6HCNh4RWbvmQRY+sdczJyBdT3EaTc/6IUcCfW7w7rAeRp2CDdE9RlAVD8IuLqW7DJH06Xeov8wBO5G6jUqXu0rlHsOSiC6VcCxBJuWVNB1IorHnS7PX0f6HdLlIEme73P77drqpn5YY0XLtP6hFrF7H5XfCxpNyaJA== ecdsa-key-20181105');
        $this->assertSameNL('secp521r1', $key->getCurve());

        OpenSSH::setComment('ecdsa-key-20181105');
        $this->assertSameNL($expected, $key->toString('OpenSSH'));
    }

    public function testPuTTYed25519()
    {
        $key = PublicKeyLoader::load($expected = 'PuTTY-User-Key-File-2: ssh-ed25519
Encryption: none
Comment: ed25519-key-20181105
Public-Lines: 2
AAAAC3NzaC1lZDI1NTE5AAAAIC6I6RyYAqtBcWXws9EDqGbhFtc5rKG4NMn/G7te
mQtu
Private-Lines: 1
AAAAIAHu1uI7dxFzo/SleEI2CekXKmgqlXwOgvfaRWxiX4Jd
Private-MAC: 8a06821a1c8b8b40fc40f876e543c4ea3fb81bb9
');
        $this->assertSameNL('Ed25519', $key->getCurve());

        PuTTY::setComment('ed25519-key-20181105');
        $this->assertSameNL($expected, $key->toString('PuTTY'));

        $key = PublicKeyLoader::load($expected = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIC6I6RyYAqtBcWXws9EDqGbhFtc5rKG4NMn/G7temQtu ed25519-key-20181105');
        $this->assertSameNL('Ed25519', $key->getCurve());

        OpenSSH::setComment('ed25519-key-20181105');
        $this->assertSameNL($expected, $key->toString('OpenSSH'));
    }

    public function testlibsodium()
    {
        if (!function_exists('sodium_crypto_sign_keypair')) {
            self::markTestSkipped('libsodium extension is not available.');
        }

        $kp = sodium_crypto_sign_keypair();

        $key = EC::loadFormat('libsodium', $expected = sodium_crypto_sign_secretkey($kp));
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL($expected, $key->toString('libsodium'));

        $key = EC::loadFormat('libsodium', $expected = sodium_crypto_sign_publickey($kp));
        $this->assertSameNL('Ed25519', $key->getCurve());
        $this->assertSameNL($expected, $key->toString('libsodium'));
    }

    // ssh-keygen -t ed25519
    public function testOpenSSHPrivateKey()
    {
        $key = PublicKeyLoader::load('-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAAAMwAAAAtzc2gtZW
QyNTUxOQAAACCpm7dS1/WDTW+uuhp2+aFLPKaJle6+oJqDGLXhlQAX4AAAAJg8TmN5PE5j
eQAAAAtzc2gtZWQyNTUxOQAAACCpm7dS1/WDTW+uuhp2+aFLPKaJle6+oJqDGLXhlQAX4A
AAAEDltCTSbrr42IS4hhkS6ly0W2XItRQwxjLT+03bIyA+V6mbt1LX9YNNb666Gnb5oUs8
pomV7r6gmoMYteGVABfgAAAAD3ZhZ3JhbnRAdmFncmFudAECAwQFBg==
-----END OPENSSH PRIVATE KEY-----');
        $this->assertSameNL('Ed25519', $key->getCurve());

        // testing this key is a little difficult because of this format's
        // two back to back checkint fields. both fields correspond to the
        // same randomly generated number. ostensibly this let's you verify
        // successful decryption of encrypted keys but phpseclib doesn't
        // support encrypted keys
        // none-the-less, because of the randomized component we can't easily
        // see if the key string is equal to another known string
        $key2 = PublicKeyLoader::load($key->toString('OpenSSH'));
        $this->assertSameNL('Ed25519', $key2->getCurve());
    }

    // from https://www.w3.org/TR/xmldsig-core/#sec-RFC4050Compat
    public function testXMLKey()
    {
        $key = PublicKeyLoader::load($orig = '<ECDSAKeyValue xmlns="http://www.w3.org/2001/04/xmldsig-more#">
<DomainParameters>
  <NamedCurve URN="urn:oid:1.2.840.10045.3.1.7" />
</DomainParameters>
<PublicKey>
  <X Value="58511060653801744393249179046482833320204931884267326155134056258624064349885" />
  <Y Value="102403352136827775240910267217779508359028642524881540878079119895764161434936" />
</PublicKey>
</ECDSAKeyValue>');
        $this->assertSameNL('secp256r1', $key->getCurve());

        XML::enableRFC4050Syntax();

        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($orig);
        $expected = $dom->C14N();

        //$dom = new DOMDocument();
        //$dom->preserveWhiteSpace = false;
        $dom->loadXML($key->toString('XML'));
        $actual = $dom->C14N();

        $this->assertSameNL($expected, $actual);
    }

    public function assertSameNL($expected, $actual, $message = '')
    {
        $expected = str_replace("\r\n", "\n", $expected);
        $actual = str_replace("\r\n", "\n", $actual);
        $this->assertSame($expected, $actual, $message);
    }

    public function testOpenSSHPrivateEC()
    {
        $key = '-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAAAaAAAABNlY2RzYS
1zaGEyLW5pc3RwMjU2AAAACG5pc3RwMjU2AAAAQQTk2tbDiyQPzljR+LLIsMzJiwqkfHkG
StUt3kO00FKMoYv3RJfP6mqdE3E3pPcT5cBg4yB+KzYsYDxwuBc03oQcAAAAqCTU2l0k1N
pdAAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBOTa1sOLJA/OWNH4
ssiwzMmLCqR8eQZK1S3eQ7TQUoyhi/dEl8/qap0TcTek9xPlwGDjIH4rNixgPHC4FzTehB
wAAAAgZ8mK8+EsQ46susQn4mwMNmpvTaKX9Q9KDvOrzotP2qgAAAAMcm9vdEB2YWdyYW50
AQIDBA==
-----END OPENSSH PRIVATE KEY-----';

        $key = PublicKeyLoader::load($key);

        $key2 = PublicKeyLoader::load($key->toString('OpenSSH'));
        $this->assertInstanceOf(PrivateKey::class, $key2);

        $sig = $key->sign('zzz');

        $key = 'ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBOTa1sOLJA/OWNH4ssiwzMmLCqR8eQZK1S3eQ7TQUoyhi/dEl8/qap0TcTek9xPlwGDjIH4rNixgPHC4FzTehBw= root@vagrant';
        $key = PublicKeyLoader::load($key);

        $this->assertTrue($key->verify('zzz', $sig));
    }

    public function testOpenSSHPrivateEd25519()
    {
        $key = '-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAAAMwAAAAtzc2gtZW
QyNTUxOQAAACChhCZwqkIh43AfURPOgbyYeZRCKvd4jFcyAK4xmiqxQwAAAJDqGgwS6hoM
EgAAAAtzc2gtZWQyNTUxOQAAACChhCZwqkIh43AfURPOgbyYeZRCKvd4jFcyAK4xmiqxQw
AAAEDzL/Yl1Vr/5MxhIIEkVKXBMEIumVG8gUjT9i2PTGSehqGEJnCqQiHjcB9RE86BvJh5
lEIq93iMVzIArjGaKrFDAAAADHJvb3RAdmFncmFudAE=
-----END OPENSSH PRIVATE KEY-----';

        $key = PublicKeyLoader::load($key);
        $sig = $key->sign('zzz');
        $sig2 = $key->withSignatureFormat('SSH2')->sign('zzz');

        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIKGEJnCqQiHjcB9RE86BvJh5lEIq93iMVzIArjGaKrFD root@vagrant';
        $key = PublicKeyLoader::load($key);

        $this->assertTrue($key->verify('zzz', $sig));
        $this->assertTrue($key->withSignatureFormat('SSH2')->verify('zzz', $sig2));
    }

    /**
     * @group github1712
     */
    public function testKeyTooLarge()
    {
        $this->expectException('RangeException');

        $key = '-----BEGIN PRIVATE KEY-----
MIIEDwIBADATBgcqhkjOPQIBBggqhkjOPQMBBwSCA/MwggPvAgEBBIID6P//////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
//////////////////////////////////////////////8=
-----END PRIVATE KEY-----';

        $private = EC::loadFormat('PKCS8', $key);
    }

    /**
     * @group github1712
     */
    public function testLargeCurve25519Key()
    {
        $raw = pack('H*', '8426220e7a57dc8d685d3966e3a23600e32563ce6033e07d0c89dbb5bd296577');
        $key = EC::loadFormat('MontgomeryPrivate', $raw);

        $this->assertSameNL($raw, $key->toString('MontgomeryPrivate'));
    }

    public function testOpenSSHEncryptedCreation()
    {
        if (PHP_INT_SIZE == 4) {
            self::markTestSkipped('32-bit integers slow OpenSSH encrypted keys down too much');
        }

        $key = EC::createKey('Ed25519');
        $key = $key->withPassword('test')->toString('OpenSSH');

        $key = PublicKeyLoader::load($key, 'test');
        $this->assertInstanceOf(PrivateKey::class, $key);
    }

    public function testECasJWK()
    {
        // keys are from https://datatracker.ietf.org/doc/html/rfc7517#appendix-A

        $plaintext = 'zzz';

        $key = '     {"keys":
       [
         {"kty":"EC",
          "crv":"P-256",
          "x":"MKBCTNIcKUSDii11ySs3526iDZ8AiTo7Tu6KPAqv7D4",
          "y":"4Etl6SRW2YiLUrN5vfvVHuhp7x8PxltmWWlbbM4IFyM",
          "d":"870MB6gfuTJ4HtUnUvYMyJpr5eUZNP4Bk43bVdj3eAE",
          "use":"enc",
          "kid":"1"}
       ]
     }';

        $keyWithoutWS = preg_replace('#\s#', '', $key);

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK', [
            'use' => 'enc',
            'kid' => '1'
        ]));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $sig = $key->sign($plaintext);

        $key = '{"keys":
       [
         {"kty":"EC",
          "crv":"P-256",
          "x":"MKBCTNIcKUSDii11ySs3526iDZ8AiTo7Tu6KPAqv7D4",
          "y":"4Etl6SRW2YiLUrN5vfvVHuhp7x8PxltmWWlbbM4IFyM",
          "use":"enc",
          "kid":"1"}
       ]
     }';

        $keyWithoutWS = preg_replace('#\s#', '', $key);

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK', [
            'use' => 'enc',
            'kid' => '1'
        ]));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $this->assertTrue($key->verify($plaintext, $sig));
    }

    public function testEd25519asJWK()
    {
        // keys are from https://www.rfc-editor.org/rfc/rfc8037.html#appendix-A

        $plaintext = 'zzz';

        $key = '   {"kty":"OKP","crv":"Ed25519",
   "x":"11qYAYKxCrfVS_7TyWQHOg7hcvPapiMlrwIaaPcHURo",
   "d":"nWGxne_9WmC6hEr0kuwsxERJxWl7MmkZcDusAxyuf2A"}';

        $keyWithoutWS = preg_replace('#\s#', '', $key);
        $keyWithoutWS = '{"keys":[' . $keyWithoutWS . ']}';

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK'));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $sig = $key->sign($plaintext);

        $key = '   {"kty":"OKP","crv":"Ed25519",
   "x":"11qYAYKxCrfVS_7TyWQHOg7hcvPapiMlrwIaaPcHURo"}';

        $keyWithoutWS = preg_replace('#\s#', '', $key);
        $keyWithoutWS = '{"keys":[' . $keyWithoutWS . ']}';

        $key = PublicKeyLoader::load($key);

        $phpseclibKey = str_replace('=', '', $key->toString('JWK'));

        $this->assertSame($keyWithoutWS, $phpseclibKey);

        $this->assertTrue($key->verify($plaintext, $sig));
    }
}
