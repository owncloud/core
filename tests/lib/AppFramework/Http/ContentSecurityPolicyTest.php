<?php
/**
 * Copyright (c) 2015 Lukas Reschke lukas@owncloud.com
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\AppFramework\Http;

use OCP\AppFramework\Http\ContentSecurityPolicy;
use Test\TestCase;

/**
 * Class ContentSecurityPolicyTest
 *
 * @package OC\AppFramework\Http
 */
class ContentSecurityPolicyTest extends TestCase {
	/** @var ContentSecurityPolicy */
	private $contentSecurityPolicy;

	public function setUp(): void {
		parent::setUp();
		$this->contentSecurityPolicy = new ContentSecurityPolicy();
	}

	public function testGetPolicyDefault() {
		$defaultPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";
		$this->assertSame($defaultPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyScriptDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' www.owncloud.com 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyScriptDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' www.owncloud.com www.owncloud.online 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowScriptDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowScriptDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowScriptDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' www.owncloud.com 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowScriptDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowScriptDomainMultipleStacked() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowScriptDomain('www.owncloud.com')->disallowScriptDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyScriptAllowInline() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-inline' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->allowInlineScript(true);
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyScriptAllowInlineWithDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' www.owncloud.com 'unsafe-inline' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedScriptDomain('www.owncloud.com');
		$this->contentSecurityPolicy->allowInlineScript(true);
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyScriptDisallowInlineAndEval() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->allowInlineScript(false);
		$this->contentSecurityPolicy->allowEvalScript(false);
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyStyleDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' www.owncloud.com 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyStyleDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' www.owncloud.com www.owncloud.online 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowStyleDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowStyleDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowStyleDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' www.owncloud.com 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowStyleDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowStyleDomainMultipleStacked() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowStyleDomain('www.owncloud.com')->disallowStyleDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyStyleAllowInline() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->allowInlineStyle(true);
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyStyleAllowInlineWithDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' www.owncloud.com 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedStyleDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyStyleDisallowInline() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->allowInlineStyle(false);
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyImageDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob: www.owncloud.com;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyImageDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob: www.owncloud.com www.owncloud.online;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowImageDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowImageDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowImageDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob: www.owncloud.com;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowImageDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowImageDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedImageDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowImageDomain('www.owncloud.online')->disallowImageDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyFontDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self' www.owncloud.com;connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyFontDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self' www.owncloud.com www.owncloud.online;connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFontDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFontDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFontDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self' www.owncloud.com;connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFontDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFontDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFontDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFontDomain('www.owncloud.online')->disallowFontDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyConnectDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self' www.owncloud.com;media-src 'self'";

		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyConnectDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self' www.owncloud.com www.owncloud.online;media-src 'self'";

		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowConnectDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowConnectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowConnectDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self' www.owncloud.com;media-src 'self'";

		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowConnectDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowConnectDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedConnectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowConnectDomain('www.owncloud.online')->disallowConnectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyMediaDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self' www.owncloud.com";

		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyMediaDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self' www.owncloud.com www.owncloud.online";

		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowMediaDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowMediaDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowMediaDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self' www.owncloud.com";

		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowMediaDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowMediaDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedMediaDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowMediaDomain('www.owncloud.online')->disallowMediaDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyObjectDomainValid() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';object-src www.owncloud.com";

		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyObjectDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';object-src www.owncloud.com www.owncloud.online";

		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowObjectDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowObjectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowObjectDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';object-src www.owncloud.com";

		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowObjectDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowObjectDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedObjectDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowObjectDomain('www.owncloud.online')->disallowObjectDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetAllowedFrameDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';frame-src www.owncloud.com blob:";

		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyFrameDomainValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';frame-src www.owncloud.com www.owncloud.online blob:";

		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.com');
		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFrameDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFrameDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFrameDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';frame-src www.owncloud.com blob:";

		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFrameDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowFrameDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedFrameDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowFrameDomain('www.owncloud.online')->disallowFrameDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetAllowedChildSrcDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';child-src child.owncloud.com";

		$this->contentSecurityPolicy->addAllowedChildSrcDomain('child.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyChildSrcValidMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';child-src child.owncloud.com child.owncloud.online";

		$this->contentSecurityPolicy->addAllowedChildSrcDomain('child.owncloud.com');
		$this->contentSecurityPolicy->addAllowedChildSrcDomain('child.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowChildSrcDomain() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedChildSrcDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowChildSrcDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowChildSrcDomainMultiple() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self';child-src www.owncloud.com";

		$this->contentSecurityPolicy->addAllowedChildSrcDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowChildSrcDomain('www.owncloud.online');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}

	public function testGetPolicyDisallowChildSrcDomainMultipleStakes() {
		$expectedPolicy = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->contentSecurityPolicy->addAllowedChildSrcDomain('www.owncloud.com');
		$this->contentSecurityPolicy->disallowChildSrcDomain('www.owncloud.online')->disallowChildSrcDomain('www.owncloud.com');
		$this->assertSame($expectedPolicy, $this->contentSecurityPolicy->buildPolicy());
	}
}
