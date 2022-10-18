<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\File\X509;

use phpseclib3\Crypt\EC;
use phpseclib3\Crypt\RSA;
use phpseclib3\File\ASN1;
use phpseclib3\File\X509;
use phpseclib3\Tests\PhpseclibTestCase;

class X509ExtensionTest extends PhpseclibTestCase
{
    public function testCustomExtension()
    {
        $customExtensionData = [
            'toggle' => true,
            'num' => 3,
            'name' => 'Johnny',
            'list' => ['foo', 'bar'],
        ];
        $customExtensionName = 'cust';
        $customExtensionNumber = '2.16.840.1.101.3.4.2.99';
        $customExtensionMapping = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'toggle' => ['type' => ASN1::TYPE_BOOLEAN],
                'num' => ['type' => ASN1::TYPE_INTEGER],
                'name' => ['type' => ASN1::TYPE_OCTET_STRING],
                'list' => [
                    'type' => ASN1::TYPE_SEQUENCE,
                    'min' => 0,
                    'max' => -1,
                    'children' => ['type' => ASN1::TYPE_OCTET_STRING],
                ],
            ],
        ];

        ASN1::loadOIDs([
            $customExtensionName => $customExtensionNumber,
        ]);

        X509::registerExtension($customExtensionName, $customExtensionMapping);

        $privateKey = RSA::createKey();

        $publicKey = $privateKey->getPublicKey();

        $subject = new X509();
        $subject->setDNProp('id-at-organizationName', 'phpseclib CA cert');
        $subject->setPublicKey($publicKey);

        $issuer = new X509();
        $issuer->setPrivateKey($privateKey);
        $issuer->setDN($subject->getDN());

        $x509 = new X509();
        $x509->setExtensionValue($customExtensionName, $customExtensionData);
        $x509->makeCA();

        $result = $x509->sign($issuer, $subject);

        $certificate = $x509->saveX509($result);

        $x509 = new X509();

        $decodedData = $x509->loadX509($certificate);
        $customExtensionDecodedData = null;

        foreach ($decodedData['tbsCertificate']['extensions'] as $extension) {
            if ($extension['extnId'] === $customExtensionName) {
                $customExtensionDecodedData = $extension['extnValue'];

                break;
            }
        }

        $this->assertTrue($customExtensionDecodedData['toggle']);
        $this->assertInstanceOf('phpseclib3\Math\BigInteger', $customExtensionDecodedData['num']);
        $this->assertSame('3', (string) $customExtensionDecodedData['num']);
        $this->assertSame('Johnny', $customExtensionDecodedData['name']);
        $this->assertSame(['foo', 'bar'], $customExtensionDecodedData['list']);
        $this->assertSame($customExtensionMapping, X509::getRegisteredExtension($customExtensionName));
    }

    public function testCustomExtensionRegisterTwiceTheSame()
    {
        $customExtensionMapping = [
            'type' => ASN1::TYPE_SEQUENCE,
            'children' => [
                'toggle' => ['type' => ASN1::TYPE_BOOLEAN],
                'num' => ['type' => ASN1::TYPE_INTEGER],
                'name' => ['type' => ASN1::TYPE_OCTET_STRING],
                'list' => [
                    'type' => ASN1::TYPE_SEQUENCE,
                    'min' => 0,
                    'max' => -1,
                    'children' => ['type' => ASN1::TYPE_OCTET_STRING],
                ],
            ],
        ];

        X509::registerExtension('foo', $customExtensionMapping);
        X509::registerExtension('foo', $customExtensionMapping);

        $this->assertSame($customExtensionMapping, X509::getRegisteredExtension('foo'));
    }

    public function testCustomExtensionRegisterConflict()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Extension bar has already been defined with a different mapping.');

        X509::registerExtension('bar', ['type' => ASN1::TYPE_OCTET_STRING]);
        X509::registerExtension('bar', ['type' => ASN1::TYPE_ANY]);
    }

    public function testExtensionsAreInitializedIfMissing()
    {
        $issuerKey = EC::createKey('ed25519');
        $subjectKey = EC::createKey('ed25519')->getPublicKey();

        $subject = new X509();
        $subject->setPublicKey($subjectKey);
        $subject->setDN(['commonName' => 'subject']);

        $issuer = new X509();
        $issuer->setPrivateKey($issuerKey);
        $issuer->setDN(['commonName' => 'issuer']);

        $authority = new X509();

        $authority->setExtensionValue('id-ce-keyUsage', ['digitalSignature']);

        $cert = $authority->saveX509($authority->sign($issuer, $subject));

        $loader = new X509();

        $this->assertSame(
            [
                [
                    'extnId' => 'id-ce-keyUsage',
                    'critical' => false,
                    'extnValue' => ['digitalSignature'],
                ],
            ],
            $loader->loadX509($cert)['tbsCertificate']['extensions']
        );
    }
}
