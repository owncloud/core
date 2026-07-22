<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Verifier\ManifestVerifier;
use OC\IntegrityCheck\Exceptions\BadSignatureException;
use Test\TestCase;

class ManifestVerifierTest extends TestCase {
	private $verifier;

	public function setUp(): void {
		parent::setUp();
		$this->verifier = new ManifestVerifier();
	}

	public function testEcHappyPath() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-ec-p384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/ec-leaf.crt');

		$this->verifier->verify($M, 'ecdsa-p384-sha384', $sig, $leafPem);
		$this->assertTrue(true); // Reached here without exception
	}

	public function testEcTamperM() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$M .= 'x'; // Tamper
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-ec-p384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/ec-leaf.crt');

		$this->expectException(BadSignatureException::class);
		$this->verifier->verify($M, 'ecdsa-p384-sha384', $sig, $leafPem);
	}

	public function testEcWrongSignature() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-ec-p384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$sig[0] = \chr((\ord($sig[0]) + 1) % 256); // Corrupt signature
		$leafPem = \file_get_contents($basePath . '/verifier/ec-leaf.crt');

		$this->expectException(BadSignatureException::class);
		$this->verifier->verify($M, 'ecdsa-p384-sha384', $sig, $leafPem);
	}

	public function testRsaPssHappyPath() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-rsa-pss-sha384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/rsa-leaf.crt');

		$this->verifier->verify($M, 'rsa-pss-sha384', $sig, $leafPem);
		$this->assertTrue(true); // Reached here without exception
	}

	public function testRsaPssTamper() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$M = substr($M, 0, -1); // Remove last char to tamper
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-rsa-pss-sha384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/rsa-leaf.crt');

		$this->expectException(BadSignatureException::class);
		$this->verifier->verify($M, 'rsa-pss-sha384', $sig, $leafPem);
	}

	public function testLegacyPath() {
		// Extract legacy signature data from CheckerTest
		$legacySignatureJson = '{
    "hashes": {
        "AnotherFile.txt": "1570ca9420e37629de4328f48c51da29840ddeaa03ae733da4bf1d854b8364f594aac560601270f9e1797ed4cd57c1aea87bf44cf4245295c94f2e935a2f0112",
        "subfolder\/file.txt": "410738545fb623c0a5c8a71f561e48ea69e3ada0981a455e920a5ae9bf17c6831ae654df324f9328ff8453de179276ae51931cca0fa71fe8ccde6c083ca0574b"
    },
    "signature": "Y5yvXvcGHVPuRRatKVDUONWq1FpLXugZd6Km\/+aEHsQj7coVl9FeMj9OsWamBf7yRIw3dtNLguTLlAA9QAv\/b0uHN3JnbNZN+dwFOve4NMtqXfSDlWftqKN00VS+RJXpG1S2IIx9Poyp2NoghL\/5AuTv4GHiNb7zU\/DT\/kt71pUGPgPR6IIFaE+zHOD96vjYkrH+GfWZzKR0FCdLib9yyNvk+EGrcjKM6qjs2GKfS\/XFjj\/\/neDnh\/0kcPuKE3ZbofnI4TIDTv0CGqvOp7PtqVNc3Vy\/UKa7uF1PT0MAUKMww6EiMUSFZdUVP4WWF0Y72W53Qdtf1hrAZa2kfKyoK5kd7sQmCSKUPSU8978AUVZlBtTRlyT803IKwMV0iHMkw+xYB1sN2FlHup\/DESADqxhdgYuK35bCPvgkb4SBe4B8Voz\/izTvcP7VT5UvkYdAO+05\/jzdaHEmzmsD92CFfvX0q8O\/Y\/29ubftUJsqcHeMDKgcR4eZOE8+\/QVc\/89QO6WnKNuNuV+5bybO6g6PAdC9ZPsCvnihS61O2mwRXHLR3jv2UleFWm+lZEquPKtkhi6SLtDiijA4GV6dmS+dzujSLb7hGeD5o1plZcZ94uhWljl+QIp82+zU\/lYB1Zfr4Mb4e+V7r2gv7Fbv7y6YtjE2GIQwRhC5jq56bD0ZB+I=",
    "certificate": "-----BEGIN CERTIFICATE-----\r\nMIIEwTCCAqmgAwIBAgIUWv0iujufs5lUr0svCf\/qTQvoyKAwDQYJKoZIhvcNAQEF\r\nBQAwIzEhMB8GA1UECgwYb3duQ2xvdWQgQ29kZSBTaWduaW5nIENBMB4XDTE1MTEw\r\nMzIyNDk1M1oXDTE2MTEwMzIyNDk1M1owEjEQMA4GA1UEAwwHU29tZUFwcDCCAiIw\r\nDQYJKoZIhvcNAQEBBQADggIPADCCAgoCggIBAK8q0x62agGSRBqeWsaeEwFfepMk\r\nF8cAobMMi50qHCv9IrOn\/ZH9l52xBrbIkErVmRjmly0d4JhD8Ymhidsh9ONKYl\/j\r\n+ishsZDM8eNNdp3Ew+fEYVvY1W7mR1qU24NWj0bzVsClI7hvPVIuw7AjfBDq1C5+\r\nA+ZSLSXYvOK2cEWjdxQfuNZwEZSjmA63DUllBIrm35IaTvfuyhU6BW9yHZxmb8+M\r\nw0xDv30D5UkE\/2N7Pa\/HQJLxCR+3zKibRK3nUyRDLSXxMkU9PnFNaPNX59VPgyj4\r\nGB1CFSToldJVPF4pzh7p36uGXZVxs8m3LFD4Ol8mhi7jkxDZjqFN46gzR0r23Py6\r\ndol9vfawGIoUwp9LvL0S7MvdRY0oazLXwClLP4OQ17zpSMAiCj7fgNT661JamPGj\r\nt5O7Zn2wA7I4ddDS\/HDTWCu98Zwc9fHIpsJPgCZ9awoqxi4Mnf7Pk9g5nnXhszGC\r\ncxxIASQKM+GhdzoRxKknax2RzUCwCzcPRtCj8AQT\/x\/mqN3PfRmlnFBNACUw9bpZ\r\nSOoNq2pCF9igftDWpSIXQ38pVpKLWowjjg3DVRmVKBgivHnUnVLyzYBahHPj0vaz\r\ntFtUFRaqXDnt+4qyUGyrT5h5pjZaTcHIcSB4PiarYwdVvgslgwnQzOUcGAzRWBD4\r\n6jV2brP5vFY3g6iPAgMBAAEwDQYJKoZIhvcNAQEFBQADggIBACTY3CCHC+Z28gCf\r\nFWGKQ3wAKs+k4+0yoti0qm2EKX7rSGQ0PHSas6uW79WstC4Rj+DYkDtIhGMSg8FS\r\nHVGZHGBCc0HwdX+BOAt3zi4p7Sf3oQef70\/4imPoKxbAVCpd\/cveVcFyDC19j1yB\r\nBapwu87oh+muoeaZxOlqQI4UxjBlR\/uRSMhOn2UGauIr3dWJgAF4pGt7TtIzt+1v\r\n0uA6FtN1Y4R5O8AaJPh1bIG0CVvFBE58esGzjEYLhOydgKFnEP94kVPgJD5ds9C3\r\npPhEpo1dRpiXaF7WGIV1X6DI\/ipWvfrF7CEy6I\/kP1InY\/vMDjQjeDnJ\/VrXIWXO\r\nyZvHXVaN\/m+1RlETsH7YO\/QmxRue9ZHN3gvvWtmpCeA95sfpepOk7UcHxHZYyQbF\r\n49\/au8j+5tsr4A83xzsT1JbcKRxkAaQ7WDJpOnE5O1+H0fB+BaLakTg6XX9d4Fo7\r\n7Gin7hVWX7pL+JIyxMzME3LhfI61+CRcqZQIrpyaafUziPQbWIPfEs7h8tCOWyvW\r\nUO8ZLervYCB3j44ivkrxPlcBklDCqqKKBzDP9dYOtS\/P4RB1NkHA9+NTvmBpTonS\r\nSFXdg9fFMD7VfjDE3Vnk+8DWkVH5wBYowTAD7w9Wuzr7DumiAULexnP\/Y7xwxLv7\r\n4B+pXTAcRK0zECDEaX3npS8xWzrB\r\n-----END CERTIFICATE-----"
}';

		$data = \json_decode($legacySignatureJson, true);
		$hashes = $data['hashes'];
		\ksort($hashes);
		$legacyBytes = \json_encode($hashes);
		$sig = \base64_decode($data['signature']);
		$leafPem = $data['certificate'];

		$this->verifier->verify($legacyBytes, 'rsa-pss-sha1', $sig, $leafPem);
		$this->assertTrue(true); // Reached here without exception
	}

	public function testUnknownAlg() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-ec-p384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/ec-leaf.crt');

		$this->expectException(BadSignatureException::class);
		$this->verifier->verify($M, 'nonsense', $sig, $leafPem);
	}

	public function testAlgKeyTypeMismatch() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck';
		$M = \file_get_contents($basePath . '/golden/tree-basic/manifest.canonical.json');
		$sigBase64 = \file_get_contents($basePath . '/verifier/sig-ec-p384-tree-basic.b64');
		$sig = \base64_decode($sigBase64);
		$leafPem = \file_get_contents($basePath . '/verifier/rsa-leaf.crt'); // EC alg but RSA key

		$this->expectException(BadSignatureException::class);
		$this->verifier->verify($M, 'ecdsa-p384-sha384', $sig, $leafPem);
	}
}
