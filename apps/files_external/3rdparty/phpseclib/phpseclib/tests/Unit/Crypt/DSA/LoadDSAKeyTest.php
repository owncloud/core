<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2013 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\DSA;

use phpseclib3\Crypt\DSA\Parameters;
use phpseclib3\Crypt\DSA\PrivateKey;
use phpseclib3\Crypt\DSA\PublicKey;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Exception\NoKeyLoadedException;
use phpseclib3\Tests\PhpseclibTestCase;

class LoadDSAKeyTest extends PhpseclibTestCase
{
    public function testBadKey()
    {
        $this->expectException(NoKeyLoadedException::class);

        $key = 'zzzzzzzzzzzzzz';
        PublicKeyLoader::load($key);
    }

    public function testPuTTYKey()
    {
        $key = 'PuTTY-User-Key-File-2: ssh-dss
Encryption: none
Comment: dsa-key-20161223
Public-Lines: 18
AAAAB3NzaC1kc3MAAAEBAIsH1A8S7goEEneW6D/zJXh1zypZRlKlw7vNaJ7yXi9v
qUkKnTSXK9lR4/nYy4SVTcVApY0sEU2RSDridLTy40ZeMPArH+sxR7lCSZ2AuNq9
sQxu6VtYg1LKGekKYWC+r4TrZoTz2PUyrUd6sYBsYIX4ozbH2ITgYmYL9ONCrLbt
4KsKO2EUE3xN3RHv8CkAp5BraCMw5z4vC43t0bcW63RN2mEvqWOqBFx5qe7uck4j
pH7AvLyvwEye7t5KwJ8P1SMN72u4AWqyXqzLK3Ye0B7hQSFnbz0od4ps3EN+Irsu
Kf20nkGgHKYJwenpIQwHz3xhBhtgiYCdQXb3ril1kd8AAAAVAJmhajsmmqwQqNkd
k4JSJ/Y1SE11AAABADYHKKmAZ0OvCZ58m5CGPfuoX4h4nc5L0p3e0Sozcc9cJ5h3
PvD18ggAf4cLoTpxETnXTFg+30shpKbr2WsE0Jrswe6V2bMaP7Hil6q3WWahLZx6
9bEClnYCTlJkungzFjJmW+M7yd8xBHCBM6r83FKlLJjolJhHDL5DqX/uHP/9H0sl
wncwALro1jTo3JU5oRdzMuLWf9P2MB7sEsoeWk2BOiil1BtKnItuObJgXUCCuaWB
dPJyk4ZVMZZqr+vCnjocRrlQUwlMUG73Ze6KJKM1OgOKMt4PwaqD9oUaKq/gc+Eb
UtCwVR6TEeIEkmazguvbAb6dSJ18TMZ07H6DJngAAAEAYE/7gKVb8P23zYzcfYOv
3zG713/i/LAJ+dW3lQupyWkUnE8wDIht7DwKgcA/Vs73jG7SlqPjcMrNzBHjQE+y
FVCP4xO+wDsh2wZ+KVppVkMljfGpp/0mQ0mQbrmTkaCNZc0ogXwtaI4r7Su2cCq0
HMwrFJFFXXLaTZY49+lkrtP6q8WFOYJGK3WnrWvXyOe9Xnh2o8E1dQJ0RnshdOft
j1KZ4JhOHnGKoz8+sKuchGVhs5VaMbJUur3cC8INaeKvtrEpwW/Ety5iy1iPyps9
S9PlwN0KyVFGWdP2B4Gyj85IXCm3r+JNVoV5tVX9IUBTXnUor7YfWNncwWn56Lc+
RQ==
Private-Lines: 1
AAAAFFMy7BG9rPXwzqZzIY/lqsHEILNf
Private-MAC: 62b92ddd8b341b9414d640c24ba6ae929a78e039
';

        $dsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $dsa);
        $this->assertIsString("$dsa");
        $this->assertIsString($dsa->getPublicKey()->toString('PuTTY'));
        $this->assertIsString($dsa->getParameters()->toString('PuTTY'));

        $dsa = $dsa->withPassword('password');
        $this->assertGreaterThan(0, strlen("$dsa"));
    }

    public function testPKCS1Key()
    {
        $key = '-----BEGIN DSA PRIVATE KEY-----
MIIDPQIBAAKCAQEAiwfUDxLuCgQSd5boP/MleHXPKllGUqXDu81onvJeL2+pSQqd
NJcr2VHj+djLhJVNxUCljSwRTZFIOuJ0tPLjRl4w8Csf6zFHuUJJnYC42r2xDG7p
W1iDUsoZ6QphYL6vhOtmhPPY9TKtR3qxgGxghfijNsfYhOBiZgv040Kstu3gqwo7
YRQTfE3dEe/wKQCnkGtoIzDnPi8Lje3RtxbrdE3aYS+pY6oEXHmp7u5yTiOkfsC8
vK/ATJ7u3krAnw/VIw3va7gBarJerMsrdh7QHuFBIWdvPSh3imzcQ34iuy4p/bSe
QaAcpgnB6ekhDAfPfGEGG2CJgJ1BdveuKXWR3wIVAJmhajsmmqwQqNkdk4JSJ/Y1
SE11AoIBADYHKKmAZ0OvCZ58m5CGPfuoX4h4nc5L0p3e0Sozcc9cJ5h3PvD18ggA
f4cLoTpxETnXTFg+30shpKbr2WsE0Jrswe6V2bMaP7Hil6q3WWahLZx69bEClnYC
TlJkungzFjJmW+M7yd8xBHCBM6r83FKlLJjolJhHDL5DqX/uHP/9H0slwncwALro
1jTo3JU5oRdzMuLWf9P2MB7sEsoeWk2BOiil1BtKnItuObJgXUCCuaWBdPJyk4ZV
MZZqr+vCnjocRrlQUwlMUG73Ze6KJKM1OgOKMt4PwaqD9oUaKq/gc+EbUtCwVR6T
EeIEkmazguvbAb6dSJ18TMZ07H6DJngCggEAYE/7gKVb8P23zYzcfYOv3zG713/i
/LAJ+dW3lQupyWkUnE8wDIht7DwKgcA/Vs73jG7SlqPjcMrNzBHjQE+yFVCP4xO+
wDsh2wZ+KVppVkMljfGpp/0mQ0mQbrmTkaCNZc0ogXwtaI4r7Su2cCq0HMwrFJFF
XXLaTZY49+lkrtP6q8WFOYJGK3WnrWvXyOe9Xnh2o8E1dQJ0RnshdOftj1KZ4JhO
HnGKoz8+sKuchGVhs5VaMbJUur3cC8INaeKvtrEpwW/Ety5iy1iPyps9S9PlwN0K
yVFGWdP2B4Gyj85IXCm3r+JNVoV5tVX9IUBTXnUor7YfWNncwWn56Lc+RQIUUzLs
Eb2s9fDOpnMhj+WqwcQgs18=
-----END DSA PRIVATE KEY-----';

        $dsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $dsa);
        $this->assertIsString("$dsa");
        $this->assertIsString($dsa->getPublicKey()->toString('PKCS1'));
        $this->assertIsString((string) $dsa->getParameters());
    }

    public function testParameters()
    {
        $key = '-----BEGIN DSA PARAMETERS-----
MIIBHgKBgQDandMycPZNOEwDXpIDSdFODWOQVO5tlnt38wK0X33TJh4wQdqOSiVF
I+g+X8reP43ag3TEHu5bstrk6Znm7y1htTTvXQVTEwp6X3YHXbJG4Faul3g08Vud
3gzV841wToVCMUinl0EOxMYP/CO9/Kvf66KACtqWITzJYBpwAeUKfwIVAM8e3xO8
aityXVRiQRWeZtOI1yq9AoGAbmA+RzIZrtPx1mC5KzrpwgwgNHbbQBT83qeNKjEh
N+S6A47iI5OVvpxd/ZwjdXoYo7D6RxR+3LNcT64DyYrBEZuzQzHeifaO6lBvDSNf
L1cwyXx0KMaaampd34MzOIHbC44SHY+cE3aVVUsnmt6Ur1nQaVYVszl+AO6m8bPm
4Vg=
-----END DSA PARAMETERS-----';
        $key = str_replace(["\n", "\r"], '', $key);
        $dsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(Parameters::class, $dsa);
        $this->assertSame($key, str_replace(["\n", "\r"], '', "$dsa"));
        $this->assertSame($key, str_replace(["\n", "\r"], '', (string) $dsa->getParameters()));
    }

    public function testPKCS8Public()
    {
        $key = '-----BEGIN PUBLIC KEY-----
MIIBtjCCASsGByqGSM44BAEwggEeAoGBANqd0zJw9k04TANekgNJ0U4NY5BU7m2W
e3fzArRffdMmHjBB2o5KJUUj6D5fyt4/jdqDdMQe7luy2uTpmebvLWG1NO9dBVMT
CnpfdgddskbgVq6XeDTxW53eDNXzjXBOhUIxSKeXQQ7Exg/8I738q9/rooAK2pYh
PMlgGnAB5Qp/AhUAzx7fE7xqK3JdVGJBFZ5m04jXKr0CgYBuYD5HMhmu0/HWYLkr
OunCDCA0dttAFPzep40qMSE35LoDjuIjk5W+nF39nCN1ehijsPpHFH7cs1xPrgPJ
isERm7NDMd6J9o7qUG8NI18vVzDJfHQoxppqal3fgzM4gdsLjhIdj5wTdpVVSyea
3pSvWdBpVhWzOX4A7qbxs+bhWAOBhAACgYBTpSKcKoVKw+hglVClqvqQdNKGC4a+
XC4lOh2221ZrTgy/sN92vT7cdBn4ydHoth6/bD236L/FYfiX4S4mOczPhrv/l/2u
ZpmyOpXM/0opRMIRdmqVW4ardBFNokmlqngwcbaptfRnk9W2cQtx0lmKy6X/vnis
3AElwP86TYgBhw==
-----END PUBLIC KEY-----';

        $dsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PublicKey::class, $dsa);
        $this->assertIsString("$dsa");
    }

    public function testPKCS8Private()
    {
        $key = '-----BEGIN PRIVATE KEY-----
MIIBSgIBADCCASsGByqGSM44BAEwggEeAoGBANqd0zJw9k04TANekgNJ0U4NY5BU
7m2We3fzArRffdMmHjBB2o5KJUUj6D5fyt4/jdqDdMQe7luy2uTpmebvLWG1NO9d
BVMTCnpfdgddskbgVq6XeDTxW53eDNXzjXBOhUIxSKeXQQ7Exg/8I738q9/rooAK
2pYhPMlgGnAB5Qp/AhUAzx7fE7xqK3JdVGJBFZ5m04jXKr0CgYBuYD5HMhmu0/HW
YLkrOunCDCA0dttAFPzep40qMSE35LoDjuIjk5W+nF39nCN1ehijsPpHFH7cs1xP
rgPJisERm7NDMd6J9o7qUG8NI18vVzDJfHQoxppqal3fgzM4gdsLjhIdj5wTdpVV
Syea3pSvWdBpVhWzOX4A7qbxs+bhWAQWAhQiF7sFfCtZ7oOgCb2aJ9ySC9sTug==
-----END PRIVATE KEY-----';

        $dsa = PublicKeyLoader::load($key);

        $this->assertInstanceOf(PrivateKey::class, $dsa);
        $this->assertIsString("$dsa");
        $this->assertInstanceOf(PublicKey::class, $dsa->getPublicKey());
        $this->assertInstanceOf(Parameters::class, $dsa->getParameters());
    }

    public function testPuTTYBadMAC()
    {
        $this->expectException(NoKeyLoadedException::class);

        $key = 'PuTTY-User-Key-File-2: ssh-dss
Encryption: none
Comment: dsa-key-20161223
Public-Lines: 18
AAAAB3NzaC1kc3MAAAEBAIsH1A8S7goEEneW6D/zJXh1zypZRlKlw7vNaJ7yXi9v
qUkKnTSXK9lR4/nYy4SVTcVApY0sEU2RSDridLTy40ZeMPArH+sxR7lCSZ2AuNq9
sQxu6VtYg1LKGekKYWC+r4TrZoTz2PUyrUd6sYBsYIX4ozbH2ITgYmYL9ONCrLbt
4KsKO2EUE3xN3RHv8CkAp5BraCMw5z4vC43t0bcW63RN2mEvqWOqBFx5qe7uck4j
pH7AvLyvwEye7t5KwJ8P1SMN72u4AWqyXqzLK3Ye0B7hQSFnbz0od4ps3EN+Irsu
Kf20nkGgHKYJwenpIQwHz3xhBhtgiYCdQXb3ril1kd8AAAAVAJmhajsmmqwQqNkd
k4JSJ/Y1SE11AAABADYHKKmAZ0OvCZ58m5CGPfuoX4h4nc5L0p3e0Sozcc9cJ5h3
PvD18ggAf4cLoTpxETnXTFg+30shpKbr2WsE0Jrswe6V2bMaP7Hil6q3WWahLZx6
9bEClnYCTlJkungzFjJmW+M7yd8xBHCBM6r83FKlLJjolJhHDL5DqX/uHP/9H0sl
wncwALro1jTo3JU5oRdzMuLWf9P2MB7sEsoeWk2BOiil1BtKnItuObJgXUCCuaWB
dPJyk4ZVMZZqr+vCnjocRrlQUwlMUG73Ze6KJKM1OgOKMt4PwaqD9oUaKq/gc+Eb
UtCwVR6TEeIEkmazguvbAb6dSJ18TMZ07H6DJngAAAEAYE/7gKVb8P23zYzcfYOv
3zG713/i/LAJ+dW3lQupyWkUnE8wDIht7DwKgcA/Vs73jG7SlqPjcMrNzBHjQE+y
FVCP4xO+wDsh2wZ+KVppVkMljfGpp/0mQ0mQbrmTkaCNZc0ogXwtaI4r7Su2cCq0
HMwrFJFFXXLaTZY49+lkrtP6q8WFOYJGK3WnrWvXyOe9Xnh2o8E1dQJ0RnshdOft
j1KZ4JhOHnGKoz8+sKuchGVhs5VaMbJUur3cC8INaeKvtrEpwW/Ety5iy1iPyps9
S9PlwN0KyVFGWdP2B4Gyj85IXCm3r+JNVoV5tVX9IUBTXnUor7YfWNncwWn56Lc+
RQ==
Private-Lines: 1
AAAAFFMy7BG9rPXwzqZzIY/lqsHEILNf
Private-MAC: aaaaaadd8b341b9414d640c24ba6ae929a78e039
';

        PublicKeyLoader::load($key);
    }

    public function testXML()
    {
        $key = '-----BEGIN PUBLIC KEY-----
MIIBtjCCASsGByqGSM44BAEwggEeAoGBANqd0zJw9k04TANekgNJ0U4NY5BU7m2W
e3fzArRffdMmHjBB2o5KJUUj6D5fyt4/jdqDdMQe7luy2uTpmebvLWG1NO9dBVMT
CnpfdgddskbgVq6XeDTxW53eDNXzjXBOhUIxSKeXQQ7Exg/8I738q9/rooAK2pYh
PMlgGnAB5Qp/AhUAzx7fE7xqK3JdVGJBFZ5m04jXKr0CgYBuYD5HMhmu0/HWYLkr
OunCDCA0dttAFPzep40qMSE35LoDjuIjk5W+nF39nCN1ehijsPpHFH7cs1xPrgPJ
isERm7NDMd6J9o7qUG8NI18vVzDJfHQoxppqal3fgzM4gdsLjhIdj5wTdpVVSyea
3pSvWdBpVhWzOX4A7qbxs+bhWAOBhAACgYBTpSKcKoVKw+hglVClqvqQdNKGC4a+
XC4lOh2221ZrTgy/sN92vT7cdBn4ydHoth6/bD236L/FYfiX4S4mOczPhrv/l/2u
ZpmyOpXM/0opRMIRdmqVW4ardBFNokmlqngwcbaptfRnk9W2cQtx0lmKy6X/vnis
3AElwP86TYgBhw==
-----END PUBLIC KEY-----';

        $dsa = PublicKeyLoader::load($key);
        $xml = $dsa->toString('XML');
        $this->assertStringContainsString('DSAKeyValue', $xml);

        $dsa = PublicKeyLoader::load($xml);
        $pkcs8 = $dsa->toString('PKCS8');

        $this->assertSame(
            strtolower(preg_replace('#\s#', '', $pkcs8)),
            strtolower(preg_replace('#\s#', '', $key))
        );
    }

    public function testOpenSSHPrivate()
    {
        $key = '-----BEGIN OPENSSH PRIVATE KEY-----
b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAABswAAAAdzc2gtZH
NzAAAAgQDpE1/71V6uuaeEqbaAzoEsA1kdJBZh9In3/VlCXwvlJ6zz8KSzbQxrC45sO7y9
fMwD5QyWEphVeIXO/NSfcZhK/SD/D+N1Zx52Ku2KEFTb3dAhfNGe9yhsrAVI5WyE4lS2qe
e5fLNnh138hYAdN7ENRoUAQ3I6Hk9HAIn+ltHMmQAAABUA95iPdxHL3ikkmZd1X5WhQFTI
+9sAAACBAMcn1PdWdUmE8D4KP6g0rq4KAElZc904mYX+bHQNMXONm4BrsScn3/iOf370Ea
iUgkomo+CSP2H8S3pLBNbiQW7AzS9TGT782FlG/bXf8kSMFb7IzAuFmQMeouLZo40AwHEv
7PpdzrXs6GRQ0vwJlNoqoUAUi9MMhexDzpGMbNjqAAAAgQCU1JuJZDzpk+cBgEdRTRGx6m
JZkP9vHP7ctUhgKZcAPSyd8keN8gQCpvmZuK1ADtd/+pXBxbQBAPb1+p8wAgqDU4m8+LFf
2igKtb8mf8qp/ghxV08/Tzf5WfcDWPxOesdlN48qLbSmUgsO7gq/1vodebMSHcduV4JTq8
ix5Ey87QAAAeiOLNHLjizRywAAAAdzc2gtZHNzAAAAgQDpE1/71V6uuaeEqbaAzoEsA1kd
JBZh9In3/VlCXwvlJ6zz8KSzbQxrC45sO7y9fMwD5QyWEphVeIXO/NSfcZhK/SD/D+N1Zx
52Ku2KEFTb3dAhfNGe9yhsrAVI5WyE4lS2qee5fLNnh138hYAdN7ENRoUAQ3I6Hk9HAIn+
ltHMmQAAABUA95iPdxHL3ikkmZd1X5WhQFTI+9sAAACBAMcn1PdWdUmE8D4KP6g0rq4KAE
lZc904mYX+bHQNMXONm4BrsScn3/iOf370EaiUgkomo+CSP2H8S3pLBNbiQW7AzS9TGT78
2FlG/bXf8kSMFb7IzAuFmQMeouLZo40AwHEv7PpdzrXs6GRQ0vwJlNoqoUAUi9MMhexDzp
GMbNjqAAAAgQCU1JuJZDzpk+cBgEdRTRGx6mJZkP9vHP7ctUhgKZcAPSyd8keN8gQCpvmZ
uK1ADtd/+pXBxbQBAPb1+p8wAgqDU4m8+LFf2igKtb8mf8qp/ghxV08/Tzf5WfcDWPxOes
dlN48qLbSmUgsO7gq/1vodebMSHcduV4JTq8ix5Ey87QAAABQhHEzWiduF4V0DestSnJ3q
9GNNTQAAAAxyb290QHZhZ3JhbnQBAgMEBQ==
-----END OPENSSH PRIVATE KEY-----';

        $key = PublicKeyLoader::load($key);

        $key2 = PublicKeyLoader::load($key->toString('OpenSSH'));
        $this->assertInstanceOf(PrivateKey::class, $key2);

        $sig = $key->sign('zzz');

        $key = 'ssh-dss AAAAB3NzaC1kc3MAAACBAOkTX/vVXq65p4SptoDOgSwDWR0kFmH0iff9WUJfC+UnrPPwpLNtDGsLjmw7vL18zAPlDJYSmFV4hc781J9xmEr9IP8P43VnHnYq7YoQVNvd0CF80Z73KGysBUjlbITiVLap57l8s2eHXfyFgB03sQ1GhQBDcjoeT0cAif6W0cyZAAAAFQD3mI93EcveKSSZl3VflaFAVMj72wAAAIEAxyfU91Z1SYTwPgo/qDSurgoASVlz3TiZhf5sdA0xc42bgGuxJyff+I5/fvQRqJSCSiaj4JI/YfxLeksE1uJBbsDNL1MZPvzYWUb9td/yRIwVvsjMC4WZAx6i4tmjjQDAcS/s+l3OtezoZFDS/AmU2iqhQBSL0wyF7EPOkYxs2OoAAACBAJTUm4lkPOmT5wGAR1FNEbHqYlmQ/28c/ty1SGAplwA9LJ3yR43yBAKm+Zm4rUAO13/6lcHFtAEA9vX6nzACCoNTibz4sV/aKAq1vyZ/yqn+CHFXTz9PN/lZ9wNY/E56x2U3jyottKZSCw7uCr/W+h15sxIdx25XglOryLHkTLzt root@vagrant';
        $key = PublicKeyLoader::load($key);

        $this->assertTrue($key->verify('zzz', $sig));
    }
}
