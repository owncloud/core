<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace Tests\Settings\Controller;

use OC\Settings\Controller\CertificateController;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\ICertificateManager;
use OCP\IL10N;
use OCP\IRequest;

/**
 * Class CertificateControllerTest
 *
 * @package Tests\Settings\Controller
 */
class CertificateControllerTest extends \Test\TestCase {
	/** @var CertificateController */
	private \PHPUnit\Framework\MockObject\MockObject $certificateController;
	/** @var IRequest */
	private \PHPUnit\Framework\MockObject\MockObject $request;
	/** @var ICertificateManager */
	private \PHPUnit\Framework\MockObject\MockObject $certificateManager;
	/** @var IL10N */
	private \PHPUnit\Framework\MockObject\MockObject $l10n;
	/** @var IAppManager */
	private \PHPUnit\Framework\MockObject\MockObject $appManager;
	/** @var  ICertificateManager */
	private \PHPUnit\Framework\MockObject\MockObject $systemCertificateManager;

	public function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock('\\' . \OCP\IRequest::class);
		$this->certificateManager = $this->createMock('\\' . \OCP\ICertificateManager::class);
		$this->systemCertificateManager = $this->createMock('\\' . \OCP\ICertificateManager::class);
		$this->l10n = $this->createMock('\\' . \OCP\IL10N::class);
		$this->appManager = $this->createMock(\OCP\App\IAppManager::class);

		$this->certificateController = $this->getMockBuilder(\OC\Settings\Controller\CertificateController::class)
			->setConstructorArgs(
				[
					'settings',
					$this->request,
					$this->certificateManager,
					$this->systemCertificateManager,
					$this->l10n,
					$this->appManager
				]
			)->setMethods(['isCertificateImportAllowed'])->getMock();

		$this->certificateController->expects($this->any())
			->method('isCertificateImportAllowed')->willReturn(true);
	}

	public function testAddPersonalRootCertificateWithEmptyFile() {
		$this->request
			->expects($this->once())
			->method('getUploadedFile')
			->with('rootcert_import')
			->will($this->returnValue(null));

		$expected = new DataResponse(['message' => 'No file uploaded'], Http::STATUS_UNPROCESSABLE_ENTITY);
		$this->assertEquals($expected, $this->certificateController->addPersonalRootCertificate());
	}

	public function testAddPersonalRootCertificateValidCertificate() {
		$uploadedFile = [
			'tmp_name' => __DIR__ . '/../../data/certificates/goodCertificate.crt',
			'name' => 'goodCertificate.crt',
		];

		$certificate = $this->createMock('\\' . \OCP\ICertificate::class);
		$certificate
			->expects($this->once())
			->method('getName')
			->will($this->returnValue('Name'));
		$certificate
			->expects($this->once())
			->method('getCommonName')
			->will($this->returnValue('CommonName'));
		$certificate
			->expects($this->once())
			->method('getOrganization')
			->will($this->returnValue('Organization'));
		$certificate
			->expects($this->exactly(2))
			->method('getIssueDate')
			->will($this->returnValue(new \DateTime('@1429099555')));
		$certificate
			->expects($this->exactly(2))
			->method('getExpireDate')
			->will($this->returnValue(new \DateTime('@1529099555')));
		$certificate
			->expects($this->once())
			->method('getIssuerName')
			->will($this->returnValue('Issuer'));
		$certificate
			->expects($this->once())
			->method('getIssuerOrganization')
			->will($this->returnValue('IssuerOrganization'));

		$this->request
			->expects($this->once())
			->method('getUploadedFile')
			->with('rootcert_import')
			->will($this->returnValue($uploadedFile));
		$this->certificateManager
			->expects($this->once())
			->method('addCertificate')
			->with(\file_get_contents($uploadedFile['tmp_name'], 'goodCertificate.crt'))
			->will($this->returnValue($certificate));

		$this->l10n
			->expects($this->exactly(2))
			->method('l')
			->withConsecutive(
				['date', new \DateTime('@1429099555')],
				['date', new \DateTime('@1529099555')],
			)
			->willReturnOnConsecutiveCalls(
				'Valid From as String',
				'Valid Till as String',
			);

		$expected = new DataResponse([
			'name' => 'Name',
			'commonName' => 'CommonName',
			'organization' => 'Organization',
			'validFrom' => 1_429_099_555,
			'validTill' => 1_529_099_555,
			'validFromString' => 'Valid From as String',
			'validTillString' => 'Valid Till as String',
			'issuer' => 'Issuer',
			'issuerOrganization' => 'IssuerOrganization',
		]);
		$this->assertEquals($expected, $this->certificateController->addPersonalRootCertificate());
	}

	public function testAddPersonalRootCertificateInvalidCertificate() {
		$uploadedFile = [
			'tmp_name' => __DIR__ . '/../../data/certificates/badCertificate.crt',
			'name' => 'badCertificate.crt',
		];

		$this->request
			->expects($this->once())
			->method('getUploadedFile')
			->with('rootcert_import')
			->will($this->returnValue($uploadedFile));
		$this->certificateManager
			->expects($this->once())
			->method('addCertificate')
			->with(\file_get_contents($uploadedFile['tmp_name'], 'badCertificate.crt'))
			->will($this->throwException(new \Exception()));

		$expected = new DataResponse('An error occurred.', Http::STATUS_UNPROCESSABLE_ENTITY);
		$this->assertEquals($expected, $this->certificateController->addPersonalRootCertificate());
	}

	public function testRemoveCertificate() {
		$this->certificateManager
			->expects($this->once())
			->method('removeCertificate')
			->with('CertificateToRemove');

		$this->assertEquals(new DataResponse(), $this->certificateController->removePersonalRootCertificate('CertificateToRemove'));
	}
}
