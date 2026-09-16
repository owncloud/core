<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

use OC\Preview\Photoshop;
use OC\Preview\TIFF;
use OCP\Files\File;
use Test\TestCase;

/**
 * @requires extension imagick
 */
class BitmapStreamTest extends TestCase {
	/**
	 * Every File mock here must stub getMimeType(). Bitmap providers derive the Imagick
	 * coder from it, and getResizedPreview() declares that parameter as string, so an
	 * unstubbed mock yields null and a TypeError - which is an \Error, and therefore
	 * escapes getThumbnail()'s \Exception handler instead of degrading to no preview.
	 * Required rather than speculative: dropping these stubs is what turned #41827 red.
	 *
	 * @return array{0: File, 1: resource}
	 */
	private function makeFile(string $content, string $mimeType): array {
		$stream = \fopen('php://memory', 'rb+');
		\fwrite($stream, $content);
		\rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($stream);
		$file->method('getMimeType')->willReturn($mimeType);
		$file->method('getSize')->willReturn(\strlen($content));
		$file->method('getPath')->willReturn('/test/bitmap-stream');
		return [$file, $stream];
	}

	/**
	 * getResizedPreview() throwing is a routine outcome rather than an exceptional one -
	 * any content ImageMagick has no coder for reaches it - so the handle has to be
	 * released on that path too. Otherwise a preview pre-generation run, or a cron
	 * preview job, over a directory of undecodable files exhausts the process's
	 * descriptors one file at a time.
	 *
	 * The payload is bytes no coder claims, so ImageMagick sniffs the format as "" and
	 * readImageBlob() fails identically on every build. An XML payload also throws
	 * everywhere measured, but for a reason that varies with the build - no SVG delegate,
	 * or a denied MVG coder, or MVG's own "must specify image size" once the coders are
	 * installed and the policy opened - and libmagic reads it as text/xml, which #41827's
	 * mime gate rejects before the decode is reached at all.
	 *
	 * These bytes are read as application/octet-stream instead, so they are not text and
	 * still reach the decode on that branch. Keeping the failure in one place, for one
	 * reason, on both trees is the point.
	 */
	public function testClosesTheStreamWhenDecodingThrows(): void {
		list($file, $stream) = $this->makeFile(
			"\x00\x01\x02\x03 oc10-164 not an image \xff\xfe",
			'application/x-photoshop'
		);

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result, 'undecodable content must not produce a preview');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the failure path');
	}

	/**
	 * Provider, mime type and content all agree, so the success path stays a success
	 * whether the provider decodes by pinning a coder (#41827) or by letting ImageMagick
	 * sniff one.
	 *
	 * TIFF rather than PDF, and a blob this test writes itself rather than a fixture: PDF
	 * decoding needs the Ghostscript delegate and is denied by Debian's and Ubuntu's
	 * stock policy.xml, neither of which queryFormats() reports - so gating on a PDF
	 * would be red on a plain apt-installed ImageMagick rather than skipped.
	 *
	 * The stream is asserted before the decode result, so that an environment which
	 * cannot decode the blob still exercises the handle-release behaviour under test and
	 * reports the decode as the failure it is.
	 */
	public function testClosesTheStreamOnSuccess(): void {
		list($file, $stream) = $this->makeFile($this->tiffBlob(), 'image/tiff');

		$result = (new TIFF())->getThumbnail($file, 32, 32, false);

		# outcome-neutral message: this assertion runs first, so it also fires where the
		# decode did not succeed, and must not then claim the leak was on the success path
		$this->assertFalse(\is_resource($stream), 'the stream must be closed once getThumbnail() returns');
		$this->assertNotFalse($result, 'a TIFF should decode through the TIFF provider');
	}

	/**
	 * Skips when this build has no TIFF support, and is loud about everything else.
	 *
	 * That line is deliberate rather than convenient. A skip costs the success-path
	 * fclose() assertion, and a guard quietly withholding these assertions is how they
	 * came to never run in CI in the first place - so an absent feature may skip, while a
	 * broken setup (revoked coder rights, an unparsable policy.xml, a wand that will not
	 * construct) has to be visible.
	 *
	 * It takes two checks, because neither sees the other's case. Depending on how
	 * ImageMagick was built, a missing libtiff either leaves TIFF unregistered - which
	 * queryFormats() catches - or leaves it registered and failing later at the delegate,
	 * which the message check catches. A policy denial says "not allowed by the security
	 * policy" instead and stays loud.
	 *
	 * Known limit: a module- or coder-domain policy denial can itself surface as
	 * MissingDelegateError, textually identical to an absent delegate, so such a build
	 * skips. Rather than guess, this only rejects messages naming a policy outright.
	 *
	 * TIFF rather than PDF because no stock policy revokes it, whereas Debian and Ubuntu
	 * deny PDF out of the box. An allowlist-style policy.xml denying all coders bar a
	 * handful would still fail here - an accepted cost, since being loud about a
	 * misconfiguration is the point.
	 *
	 * Both directions are exercised because writing a TIFF does not establish that one can
	 * be read back, and reading is what the assertion needs. Measured: with TIFF coder
	 * rights revoked, getImageBlob() still returned a blob and only the read-back raised.
	 *
	 * This deliberately does not try to prove the whole path - getThumbnail() also needs
	 * PNG encoding and GD to load the result. Both are hard product requirements
	 * (composer.json requires ext-gd) and PNG output underpins every ownCloud preview, so
	 * a build failing those should fail this test rather than skip it.
	 */
	private function tiffBlob(): string {
		if (\count(\Imagick::queryFormats('TIFF')) === 0) {
			$this->markTestSkipped('This ImageMagick build registers no TIFF coder');
		}
		$image = new \Imagick();
		try {
			$image->newImage(64, 48, new \ImagickPixel('white'));
			$image->setImageFormat('tiff');
			$blob = $image->getImageBlob();

			$probe = new \Imagick();
			try {
				$probe->readImageBlob($blob);
			} finally {
				$probe->clear();
			}
			return $blob;
		} catch (\Exception $e) {
			# \Exception rather than \ImagickException: ImagickPixelException extends
			# \Exception directly and is a sibling, not a subclass
			$message = $e->getMessage();
			$missingDelegate = \stripos($message, 'no encode delegate') !== false
				|| \stripos($message, 'no decode delegate') !== false;
			$namesAPolicy = \stripos($message, 'policy') !== false
				|| \stripos($message, 'not authorized') !== false;
			if ($missingDelegate && !$namesAPolicy) {
				$this->markTestSkipped('This ImageMagick build has no TIFF delegate: ' . $message);
			}
			throw $e;
		} finally {
			$image->clear();
		}
	}

	/**
	 * A storage that cannot open the file returns false rather than throwing, and
	 * stream_get_contents(false) raises a TypeError - an \Error, so it would escape the
	 * \Exception handler in getThumbnail() and surface as a 500 instead of a missing
	 * preview.
	 */
	public function testReturnsFalseWhenTheFileCannotBeOpened(): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn(false);
		$file->method('getMimeType')->willReturn('application/x-photoshop');
		$file->method('getSize')->willReturn(1024);
		$file->method('getPath')->willReturn('/test/unopenable');

		$this->assertFalse((new Photoshop())->getThumbnail($file, 32, 32, false));
	}
}
