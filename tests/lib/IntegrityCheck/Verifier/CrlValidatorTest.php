<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2026 ownCloud GmbH
 * @license AGPL-3.0-only
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Verifier\TrustStore;
use OC\IntegrityCheck\Verifier\CrlValidator;
use OC\IntegrityCheck\Verifier\ParsedCrl;
use phpseclib3\File\X509;
use Test\TestCase;

class CrlValidatorTest extends TestCase {
	private string $fixtureDir;
	private string $pkiDir;
	private string $crlDir;
	private string $tempServerRoot;

	protected function setUp(): void {
		parent::setUp();
		$this->fixtureDir = __DIR__ . '/../../../data/integritycheck/verifier';
		$this->pkiDir = $this->fixtureDir . '/pki';
		$this->crlDir = $this->fixtureDir . '/crl';

		// Create a temporary server root structure for tests
		$this->tempServerRoot = \sys_get_temp_dir() . '/oc_test_' . \md5(\uniqid());
		\mkdir($this->tempServerRoot, 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/roots', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/intermediates', 0755, true);
	}

	protected function tearDown(): void {
		parent::tearDown();
		// Clean up temp directory
		if (\is_dir($this->tempServerRoot)) {
			$this->recursiveRmdir($this->tempServerRoot);
		}
	}

	private function recursiveRmdir(string $dir): void {
		if (\is_dir($dir)) {
			$files = \scandir($dir);
			foreach ($files as $file) {
				if ($file !== '.' && $file !== '..') {
					$path = $dir . '/' . $file;
					if (\is_dir($path)) {
						$this->recursiveRmdir($path);
					} else {
						\unlink($path);
					}
				}
			}
			\rmdir($dir);
		}
	}

	private function createTrustStore(array $rootFiles, array $intermediateFiles): TrustStore {
		$rootsDir = $this->tempServerRoot . '/resources/codesigning/roots';
		$intermediatesDir = $this->tempServerRoot . '/resources/codesigning/intermediates';

		foreach ($rootFiles as $filename) {
			$source = $this->pkiDir . '/' . $filename;
			if (\file_exists($source)) {
				\copy($source, $rootsDir . '/' . $filename);
			}
		}

		foreach ($intermediateFiles as $filename) {
			$source = $this->pkiDir . '/' . $filename;
			if (\file_exists($source)) {
				\copy($source, $intermediatesDir . '/' . $filename);
			}
		}

		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		return new TrustStore($fileAccessHelper, $environmentHelper);
	}

	private function readFile(string $filename): string {
		$content = \file_get_contents($filename);
		if ($content === false) {
			throw new \Exception('Cannot read file: ' . $filename);
		}
		return $content;
	}

	/**
	 * Get the serial number of the leaf-example-app certificate.
	 */
	private function getLeafSerial(): string {
		$leafPem = $this->readFile($this->pkiDir . '/leaf-example-app.crt');
		$x509 = new X509();
		if (!$x509->loadX509($leafPem)) {
			throw new \Exception('Failed to load leaf certificate');
		}

		// Use reflection to access the internal certificate data structure
		$reflection = new \ReflectionClass($x509);
		$certProperty = $reflection->getProperty('currentCert');
		$certProperty->setAccessible(true);
		$cert = $certProperty->getValue($x509);

		if (!isset($cert['tbsCertificate']['serialNumber'])) {
			throw new \Exception('Unable to extract serial number from certificate');
		}

		$serial = $cert['tbsCertificate']['serialNumber'];
		// The serialNumber is a Math_BigInteger object; convert to string
		if (\is_object($serial) && \method_exists($serial, 'toString')) {
			return $serial->toString();
		}
		if (\is_string($serial)) {
			return $serial;
		}

		throw new \Exception('Unable to convert serial number to string');
	}

	/**
	 * Test: parseAndValidate(developers-empty) returns non-null ParsedCrl; isRevoked(leaf serial) === false.
	 */
	public function testParseAndValidateEmptyCrl(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);

		$crlData = $this->readFile($this->crlDir . '/developers-empty.crl');
		$parsed = $validator->parseAndValidate($crlData);

		$this->assertInstanceOf(ParsedCrl::class, $parsed);
		$leafSerial = $this->getLeafSerial();
		$this->assertFalse($parsed->isRevoked($leafSerial));
	}

	/**
	 * Test: parseAndValidate(developers-revoked) returns non-null; isRevoked(leaf serial) === true; isRevoked('999') === false.
	 */
	public function testParseAndValidateRevokedCrl(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);

		$crlData = $this->readFile($this->crlDir . '/developers-revoked.crl');
		$parsed = $validator->parseAndValidate($crlData);

		$this->assertInstanceOf(ParsedCrl::class, $parsed);
		$leafSerial = $this->getLeafSerial();
		$this->assertTrue($parsed->isRevoked($leafSerial));
		$this->assertFalse($parsed->isRevoked('999'));
	}

	/**
	 * Test: parseAndValidate(wrong-issuer) returns null (signature not valid against trust store).
	 */
	public function testParseAndValidateWrongIssuerReturnNull(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);

		$crlData = $this->readFile($this->crlDir . '/wrong-issuer.crl');
		$parsed = $validator->parseAndValidate($crlData);

		$this->assertNull($parsed);
	}

	/**
	 * Test: parseAndValidate('garbage') returns null (unparseable, no throw).
	 */
	public function testParseAndValidateGarbageReturnNull(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);

		$parsed = $validator->parseAndValidate('garbage data that is not a valid CRL');

		$this->assertNull($parsed);
	}
}
