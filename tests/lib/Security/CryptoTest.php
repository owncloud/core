<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Security;

use OC\Security\Crypto;

class CryptoTest extends \Test\TestCase {
	public function defaultEncryptionProvider() {
		return [
			['Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.'],
			[''],
			['我看这本书。 我看這本書']
		];
	}

	/** @var Crypto */
	protected $crypto;

	protected function setUp(): void {
		parent::setUp();
		$this->crypto = new Crypto(\OC::$server->getConfig(), \OC::$server->getSecureRandom());
	}

	/**
	 * @dataProvider defaultEncryptionProvider
	 */
	public function testDefaultEncrypt($stringToEncrypt) {
		$ciphertext = $this->crypto->encrypt($stringToEncrypt);
		$this->assertEquals($stringToEncrypt, $this->crypto->decrypt($ciphertext));
	}

	/**
	 */
	public function testWrongPassword() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('HMAC does not match.');

		$stringToEncrypt = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.';
		$ciphertext = $this->crypto->encrypt($stringToEncrypt);
		$this->crypto->decrypt($ciphertext, 'A wrong password!');
	}

	public function testLaterDecryption() {
		$stringToEncrypt = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.';
		$encryptedString = '44a35023cca2e7a6125e06c29fc4b2ad9d8a33d0873a8b45b0de4ef9284f260c6c46bf25dc62120644c59b8bafe4281ddc47a70c35ae6c29ef7a63d79eefacc297e60b13042ac582733598d0a6b4de37311556bb5c480fd2633de4e6ebafa868c2d1e2d80a5d24f9660360dba4d6e0c8|lhrFgK0zd9U160Wo|a75e57ab701f9124e1113543fd1dc596f21e20d456a0d1e813d5a8aaec9adcb11213788e96598b67fe9486a9f0b99642c18296d0175db44b1ae426e4e91080ee';
		$this->assertEquals($stringToEncrypt, $this->crypto->decrypt($encryptedString, 'ThisIsAVeryS3cur3P4ssw0rd'));
	}

	// v2 has stronger generated iv
	public function testLaterDecryptionV2() {
		$decrypted = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.';
		$encryptedString = 'v2|d57dbe4d1317cdf19d4ddc2df807f6b5d63ab1e119c46590ce54bae56a9cd3969168c4ec1600ac9758dd7e7afb9c4c962dd23072c1463add1d9c77c467723b37bb768ef00e3c50898e59247cbb59ce56b74ce5990648ffe9e40d0e95076c27a785bdcf32c219ea4ad5c316b1f12f48c1|6bd21db258a5e406a2c288a444de195f|a19111a4cf1a11ee95fc1734699c20964eaa05bb007e1cecc4cc6872f827a4b7deedc977c13b138d728d68116aa3d82f9673e20c7e447a9788aa3be994b67cd6';
		$this->assertEquals($decrypted, $this->crypto->decrypt($encryptedString, 'ThisIsAVeryS3cur3P4ssw0rd'));
	}

	/**
	 */
	public function testWrongIV() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('HMAC does not match.');

		$encryptedString = '560f5436ba864b9f12f7f7ca6d41c327554a6f2c0a160a03316b202af07c65163274993f3a46e7547c07ba89304f00594a2f3bd99f83859097c58049c39d0d4ade10e0de914ff0604961e7c849d0271ed6c0b23f984ba16e7d033e3305fb0910e7b6a2a65c988d17dbee71d8f953684d|d2kdFUspVjC0o0sr|1a5feacf87eaa6869a6abdfba9a296e7bbad45b6ad89f7dce67cdc98e2da5dc4379cc672cc655e52bbf19599bf59482fbea13a73937697fa656bf10f3fc4f1aa';
		$this->crypto->decrypt($encryptedString, 'ThisIsAVeryS3cur3P4ssw0rd');
	}

	/**
	 */
	public function testWrongParameters() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Authenticated ciphertext could not be decoded.');

		$encryptedString = '1|2';
		$this->crypto->decrypt($encryptedString, 'ThisIsAVeryS3cur3P4ssw0rd');
	}
}
