<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2025, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\CnMismatchException;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Verifier\AppIdResolver;
use Test\TestCase;

class AppIdResolverTest extends TestCase {

	private AppIdResolver $resolver;
	private FileAccessHelper $fileAccessHelper;
	private string $fixtureDir;

	protected function setUp(): void {
		parent::setUp();
		$this->fileAccessHelper = new FileAccessHelper();
		$this->resolver = new AppIdResolver($this->fileAccessHelper);
		$this->fixtureDir = __DIR__ . '/../../../data/integritycheck/verifier/appinfo';
	}

	/**
	 * Test happy path: valid info.xml with matching CN
	 */
	public function testAssertAppIdMatchesCnHappyPath(): void {
		$basePath = $this->fixtureDir . '/valid';
		$leafCn = 'example-app';
		$result = $this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
		$this->assertEquals('example-app', $result);
	}

	/**
	 * Test ASCII folding: uppercase ID is folded to lowercase
	 */
	public function testAssertAppIdMatchesCnAsciiFolder(): void {
		$basePath = $this->fixtureDir . '/uppercase';
		$leafCn = 'example-app';
		$result = $this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
		$this->assertEquals('example-app', $result);
	}

	/**
	 * Test mismatch between folded ID and CN
	 */
	public function testAssertAppIdMatchesCnMismatch(): void {
		$this->expectException(CnMismatchException::class);
		$basePath = $this->fixtureDir . '/valid';
		$leafCn = 'other-app';
		$this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
	}

	/**
	 * Test missing <id> element in info.xml
	 */
	public function testAssertAppIdMatchesCnMissingId(): void {
		$this->expectException(CnMismatchException::class);
		$basePath = $this->fixtureDir . '/missing-id';
		$leafCn = 'example-app';
		$this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
	}

	/**
	 * Test invalid ID (too short, fails regex)
	 */
	public function testAssertAppIdMatchesCnInvalidId(): void {
		$this->expectException(CnMismatchException::class);
		$basePath = $this->fixtureDir . '/bad-id';
		$leafCn = 'example-app';
		$this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
	}

	/**
	 * Test invalid CN (uppercase, fails regex without folding)
	 */
	public function testAssertAppIdMatchesCnInvalidCn(): void {
		$this->expectException(CnMismatchException::class);
		$basePath = $this->fixtureDir . '/valid';
		$leafCn = 'EXAMPLE-APP';
		$this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
	}

	/**
	 * Test unreadable info.xml
	 */
	public function testAssertAppIdMatchesCnUnreadable(): void {
		$this->expectException(CnMismatchException::class);
		$basePath = $this->fixtureDir . '/nonexistent';
		$leafCn = 'example-app';
		$this->resolver->assertAppIdMatchesCn($basePath, $leafCn);
	}

	/**
	 * Test core mode: assertCoreCn('core') should pass
	 */
	public function testAssertCoreCnValid(): void {
		$this->resolver->assertCoreCn('core');
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	/**
	 * Test core mode: assertCoreCn with non-core CN
	 */
	public function testAssertCoreCnInvalid(): void {
		$this->expectException(CnMismatchException::class);
		$this->resolver->assertCoreCn('example-app');
	}

	/**
	 * Test core mode: assertCoreCn with uppercase 'Core' should fail (CN is canonical, no folding)
	 */
	public function testAssertCoreCnInvalidUppercase(): void {
		$this->expectException(CnMismatchException::class);
		$this->resolver->assertCoreCn('Core');
	}

	/**
	 * Test asciiFold: converts A-Z to a-z
	 */
	public function testAsciiFold(): void {
		$input = 'Example_App.1-x';
		$expected = 'example_app.1-x';
		$result = $this->resolver->asciiFold($input);
		$this->assertEquals($expected, $result);
	}

	/**
	 * Test asciiFold: non-ASCII bytes are NOT folded
	 */
	public function testAsciiFoldNonAsciiUnchanged(): void {
		// Include a non-ASCII character (e.g., 'Ä' = 0xC4 0x84 in UTF-8)
		$input = 'Ä';
		$result = $this->resolver->asciiFold($input);
		$this->assertEquals('Ä', $result); // Bytes unchanged
	}

	/**
	 * Test isValidId: valid ID passes
	 */
	public function testIsValidIdValid(): void {
		$this->assertTrue($this->resolver->isValidId('example-app'));
		$this->assertTrue($this->resolver->isValidId('a-b-c'));
		$this->assertTrue($this->resolver->isValidId('app_name.123'));
	}

	/**
	 * Test isValidId: too short (2 chars)
	 */
	public function testIsValidIdTooShort(): void {
		$this->assertFalse($this->resolver->isValidId('ab'));
	}

	/**
	 * Test isValidId: starts with number
	 */
	public function testIsValidIdStartsWithNumber(): void {
		$this->assertFalse($this->resolver->isValidId('1app'));
	}

	/**
	 * Test isValidId: too long (65+ chars)
	 */
	public function testIsValidIdTooLong(): void {
		$this->assertFalse($this->resolver->isValidId(str_repeat('a', 65)));
	}

	/**
	 * Test isValidId: contains uppercase (should fail, as validation expects lowercase)
	 */
	public function testIsValidIdContainsUppercase(): void {
		$this->assertFalse($this->resolver->isValidId('Example-App'));
	}

	/**
	 * Test isValidId: invalid character
	 */
	public function testIsValidIdInvalidCharacter(): void {
		$this->assertFalse($this->resolver->isValidId('app@name'));
	}

	/**
	 * Test XXE safety: external entity is NOT expanded
	 */
	public function testXxeSafety(): void {
		$basePath = $this->fixtureDir . '/xxe';
		try {
			$this->resolver->assertAppIdMatchesCn($basePath, 'example-app');
			// Should fail because the XXE fixture will have an invalid or missing ID
			$this->fail('Expected CnMismatchException');
		} catch (CnMismatchException $e) {
			$this->assertEquals('CN_MISMATCH', $e->getReasonCode());
			// Should not have expanded the entity or crashed
		}
	}
}
