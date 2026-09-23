<?php
/**
 * @author Olivier Paroz <owncloud@interfasys.ch>
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

namespace Test\Preview;

use OC\Image\ImagickFactory;
use OC\Preview\TXT;
use OCP\Files\File;
use OCP\Files\Node;
use OCP\Preview\IProvider2;
use Test\TestCase;
use Test\Traits\UserTrait;

abstract class Provider extends TestCase {
	use UserTrait;

	/** @var File */
	protected $imgPath;
	/** @var int */
	protected $width;
	/** @var int */
	protected $height;
	/** @var IProvider2 */
	protected $provider;
	/** @var int */
	protected $maxWidth = 1024;
	/** @var int */
	protected $maxHeight = 1024;
	/** @var bool */
	protected $scalingUp = false;
	/** @var int */
	protected $userId;
	/** @var \OC\Files\View */
	protected $rootView;

	protected function setUp(): void {
		parent::setUp();

		$userManager = \OC::$server->getUserManager();
		$userManager->clearBackends();

		$userId = self::getUniqueID();
		$this->createUser($userId, $userId);
		self::loginAsUser($userId);

		$this->rootView = new \OC\Files\View('');

		$this->userId = $userId;
	}

	protected function tearDown(): void {
		self::logout();

		parent::tearDown();
	}

	/**
	 * Skips unless this ImageMagick build can actually decode the file at $fixturePath
	 * through $coder - the coder the provider under test pins.
	 *
	 * Named for the *File* it takes, because Test\Preview\CoderPinningTest has a helper of
	 * the same purpose that takes the content blob instead. Passing a path where a blob is
	 * expected would make readImageBlob() throw, which a probe like this one converts into
	 * a skip - so the mistake would silently stop a test running rather than fail.
	 *
	 * Imagick::queryFormats() is not enough on its own: it reports only whether a coder is
	 * *registered*, and coders/pdf.c and coders/ps.c register PDF, AI and EPS
	 * unconditionally, wiring the Ghostscript delegate behind them separately.
	 * MagickQueryFormats() does not consult policy.xml either, and the stock Debian and
	 * Ubuntu policy denies the PDF/PS/EPS/XPS coders outright. So on a build with no
	 * Ghostscript, or under that policy, a registration check still answers "present" and
	 * the calling test fails where it should skip. Probing the fixture covers both.
	 *
	 * The probe reads unpinned, which is the very thing the pin exists to prevent. That is
	 * fine: it is only ever a capability probe, never an assertion.
	 */
	protected function requireDecodableFixtureFile(string $coder, string $fixturePath): void {
		if (\count(\Imagick::queryFormats($coder)) === 0) {
			$this->markTestSkipped("This ImageMagick build registers no $coder coder");
		}

		# read outside the try: an unreadable fixture is a broken test, not a build
		# limitation, and must not be converted into a skip
		$content = \file_get_contents($fixturePath);
		$this->assertNotFalse($content, "fixture $fixturePath must be readable");

		try {
			$probe = ImagickFactory::create();
			$probe->readImageBlob($content);
			$probe->clear();
		} catch (\Exception $e) {
			# \Exception rather than \ImagickException: imagick reports some delegate and
			# policy conditions at warning severity, and PHPUnit 9 converts PHP warnings
			# into PHPUnit\Framework\Error\Warning by default (convertWarningsToExceptions,
			# which phpunit-autotest.xml leaves unset; failOnWarning only decides whether an
			# emitted warning fails the run). That class reaches \Exception via
			# PHPUnit\Framework\Exception, so one catch covers both - and unlike \Throwable
			# it still lets an \Error fail instead of becoming a green skip.
			$this->markTestSkipped("This ImageMagick build cannot decode the $coder fixture: " . $e->getMessage());
		}
	}

	public static function dimensionsDataProvider() {
		return [
			[-\random_int(5, 100), -\random_int(5, 100)],
			[\random_int(5, 100), \random_int(5, 100)],
			[-\random_int(5, 100), \random_int(5, 100)],
			[\random_int(5, 100), -\random_int(5, 100)],
		];
	}

	/**
	 * Launches all the tests we have
	 *
	 * @dataProvider dimensionsDataProvider
	 * @requires extension imagick
	 *
	 * @param int $widthAdjustment
	 * @param int $heightAdjustment
	 */
	public function testGetThumbnail($widthAdjustment, $heightAdjustment) {
		$ratio = \round($this->width / $this->height, 2);
		$this->maxWidth = $this->width - $widthAdjustment;
		$this->maxHeight = $this->height - $heightAdjustment;

		$preview = $this->getPreview($this->provider);
		// The TXT provider uses the max dimensions to create its canvas,
		// so the ratio will always be the one of the max dimension canvas
		if (!$this->provider instanceof TXT) {
			$this->doesRatioMatch($preview, $ratio);
		}
		$this->doesPreviewFit($preview);
	}

	/**
	 * Adds the test file to the filesystem
	 *
	 * @param string $fileName name of the file to create
	 * @param string $fileContent path to file to use for test
	 *
	 * @return Node
	 * @throws \Exception
	 * @throws \OCP\Files\NotFoundException
	 */
	protected function prepareTestFile($fileName, $fileContent) {
		$imgData = \file_get_contents($fileContent);
		$imgPath = '/' . $this->userId . '/files/' . $fileName;
		$this->rootView->file_put_contents($imgPath, $imgData);

		return \OC::$server->getUserFolder($this->userId)->get($fileName);
	}

	/**
	 * Retrieves a max size thumbnail can be created
	 *
	 * @param IProvider2 $provider
	 *
	 * @return bool|\OCP\IImage
	 * @throws \OCP\Files\NotPermittedException
	 */
	private function getPreview($provider) {
		$preview = $provider->getThumbnail($this->imgPath, $this->maxWidth, $this->maxHeight, $this->scalingUp);

		$this->assertNotFalse($preview);
		$this->assertTrue($preview->valid());

		// test that the file still exists
		$this->assertNotNull($this->imgPath->getContent());

		return $preview;
	}

	/**
	 * Checks if the preview ratio matches the original ratio
	 *
	 * @param \OCP\IImage $preview
	 * @param int $ratio
	 */
	private function doesRatioMatch($preview, $ratio) {
		$previewRatio = \round($preview->width() / $preview->height(), 2);
		$this->assertEquals($ratio, $previewRatio);
	}

	/**
	 * Tests if a max size preview of smaller dimensions can be created
	 *
	 * @param \OCP\IImage $preview
	 */
	private function doesPreviewFit($preview) {
		$maxDimRatio = \round($this->maxWidth / $this->maxHeight, 2);
		$previewRatio = \round($preview->width() / $preview->height(), 2);

		// Testing code
		/*print_r("mw $this->maxWidth ");
		print_r("mh $this->maxHeight ");
		print_r("mr $maxDimRatio ");
		$pw = $preview->width();
		$ph = $preview->height();
		print_r("pw $pw ");
		print_r("ph $ph ");
		print_r("pr $previewRatio ");*/

		if ($maxDimRatio < $previewRatio) {
			$this->assertLessThanOrEqual($this->maxWidth, $preview->width());
			$this->assertLessThan($this->maxHeight, $preview->height());
		} elseif ($maxDimRatio > $previewRatio) {
			$this->assertLessThan($this->maxWidth, $preview->width());
			$this->assertLessThanOrEqual($this->maxHeight, $preview->height());
		} else { // Original had to be resized
			$this->assertLessThanOrEqual($this->maxWidth, $preview->width());
			$this->assertLessThanOrEqual($this->maxHeight, $preview->height());
		}
	}
}
