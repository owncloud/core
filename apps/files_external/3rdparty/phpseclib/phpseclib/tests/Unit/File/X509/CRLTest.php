<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2017 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\File\X509;

use phpseclib3\Crypt\RSA;
use phpseclib3\File\X509;
use phpseclib3\Math\BigInteger;
use phpseclib3\Tests\PhpseclibTestCase;

class CRLTest extends PhpseclibTestCase
{
    public function testLoadCRL()
    {
        $test = file_get_contents(__DIR__ . '/crl.bin');

        $x509 = new X509();

        $x509->loadCRL($test);

        $reason = $x509->getRevokedCertificateExtension('9048354325167497831898969642461237543', 'id-ce-cRLReasons');

        $this->assertSame('unspecified', $reason);
    }

    public function testCreateCRL()
    {
        // create private key / x.509 cert for signing
        $CAPrivKey = RSA::createKey(1024);
        $CAPubKey = $CAPrivKey->getPublicKey();

        $CASubject = new X509();
        $CASubject->setDNProp('id-at-organizationName', 'phpseclib CA cert');
        $CASubject->setPublicKey($CAPubKey);

        $CAIssuer = new X509();
        $CAIssuer->setPrivateKey($CAPrivKey);
        $CAIssuer->setDN($CASubject->getDN());

        $x509 = new X509();
        $x509->makeCA();
        $result = $x509->sign($CAIssuer, $CASubject);
        $CA = $x509->saveX509($result);

        // create CRL
        $x509 = new X509();
        $crl = $x509->loadCRL($x509->saveCRL($x509->signCRL($CAIssuer, new X509())));
        $x509->revoke(new BigInteger('zzz', 256), '+1 year');
        $crl = $x509->saveCRL($x509->signCRL($CAIssuer, $x509));

        // validate newly created CRL
        $x509 = new X509();
        $x509->loadCA($CA);
        $r = $x509->loadCRL($crl);
        $this->assertArrayHasKey('parameters', $r['signatureAlgorithm']);
        $this->assertTrue($x509->validateSignature());
    }

    public function testPSSSigWithPKCS1Cert()
    {
        $x509 = new X509();
        $x509->loadCA('-----BEGIN CERTIFICATE-----
MIICADCCAWmgAwIBAgIUH+4+TBK2Iq+xTOuixlxSuMbPXPkwDQYJKoZIhvcNAQEL
BQAwHDEaMBgGA1UECgwRcGhwc2VjbGliIENBIGNlcnQwHhcNMjIwOTIzMjIyNTE3
WhcNMjMwOTIzMjIyNTE3WjAcMRowGAYDVQQKDBFwaHBzZWNsaWIgQ0EgY2VydDCB
nzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAxugfdcHvQmI+1yXG6gAWZIzNu9DF
DLW425OxnYItztzAadZUBX0hmlv2r08Zc8cz0jvkgqu1fbWbKnPlm6RT2MQyTasF
oNcsqPboVUPS/i2aT4AY0KYbD0lD+xj1+8ZnvMvUUXngOB0t2nOE+P4oksImB3hu
LUeDOHayGYbUtTcCAwEAAaM/MD0wCwYDVR0PBAQDAgEGMA8GA1UdEwEB/wQFMAMB
Af8wHQYDVR0OBBYEFHMLbQFPm/meQfDSApMLorFe6reZMA0GCSqGSIb3DQEBCwUA
A4GBACQPK28znZ0+OgOS3vLoFvulom5nHhjtQFY/eunA55ZeyaaHXP2mw0GD9r0m
Hhx6hB0t2yoX8C2TdgaAgkLhfDbv3clqrSxFDk9PQ4fojvdUdeWn4/X6guhxON+6
Sf6AuHojwnMy6vC++ADABcqhsHwOOqB+nbRvCc+xXg1bmxtY
-----END CERTIFICATE-----');
        $x509->loadCRL('-----BEGIN X509 CRL-----
MIIBVDCBiTBCBgkqhkiG9w0BAQowNaANMAsGCWCGSAFlAwQCAaEaMBgGCSqGSIb3
DQEBCDALBglghkgBZQMEAgGiAwIBIKMDAgEBMBwxGjAYBgNVBAoMEXBocHNlY2xp
YiBDQSBjZXJ0Fw0yMjA5MjMyMjI1MTdaMBYwFAIDenp6Fw0yMzA5MjMyMjI1MTda
MEIGCSqGSIb3DQEBCjA1oA0wCwYJYIZIAWUDBAIBoRowGAYJKoZIhvcNAQEIMAsG
CWCGSAFlAwQCAaIDAgEgowMCAQEDgYEAZcN+8iKHAZiARPlx3rj1NpRoanrljSsH
F5C4wjjz936D0o3lLgSGwfDLKOBI8wu5BVYQMnBVtpI6be+QcTjrFbsbuB9IonG9
uY1UHwoR+HohPes2wPUOV931ds6TufSxxcGgvwdaMacBfj/AD6M2ylxtqXY4EtVc
xbyT0osik+w=
-----END X509 CRL-----');
        $this->assertTrue($x509->validateSignature());
    }
}
