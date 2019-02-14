<?php
/**
 * @author Tom Needham
 * @copyright Copyright (c) 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\Certificates;
use OCP\ICertificate;
use OCP\ICertificateManager;
use OCP\IConfig;
use OCP\IURLGenerator;

/**
 * @package Tests\Settings\Panels\Admin
 */
class CertificatesTest extends \Test\TestCase {

	/** @var Certificates */
	private $panel;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IConfig */
	private $config;
	/** @var ICertificateManager */
	private $certManager;

	public function setUp(): void {
		parent::setUp();
		$this->urlGenerator =$this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->certManager = $this->getMockBuilder(ICertificateManager::class)->getMock();
		$this->panel = new Certificates($this->config, $this->urlGenerator, $this->certManager);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('enable_certificate_management')
			->willReturn(true);
		$mockCert = $this->getMockBuilder(ICertificate::class)->getMock();
		$mockCert->expects($this->once())->method('isExpired')->willReturn(false);
		$mockCert->expects($this->once())->method('getCommonName')->willReturn('commonname');
		$mockCert->expects($this->exactly(2))->method('getExpireDate')->willReturn(\time()+60*60*24*10);
		$mockCert->expects($this->once())->method('getIssuerOrganization')->willReturn('issueOrg');
		$mockCert->expects($this->once())->method('getIssuerName')->willReturn('issuer');
		$mockCert->expects($this->once())->method('getOrganization')->willReturn('org');
		$this->certManager->expects($this->once())->method('listCertificates')->willReturn([$mockCert]);
		$this->urlGenerator->expects($this->once())->method('linkToRoute');
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('issueOrg', $templateHtml);
		$this->assertContains('issuer', $templateHtml);
		$this->assertContains('commonname', $templateHtml);
		$this->assertContains('org', $templateHtml);
	}

	public function testGetPanelNotEnabled() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('enable_certificate_management')
			->willReturn(false);
		$template = $this->panel->getPanel();
		$this->assertNull($template);
	}
}
