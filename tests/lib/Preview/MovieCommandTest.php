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

use OC\Preview\Movie;
use Test\TestCase;

/**
 * The binaries used by the Movie provider come from OC_Helper::findBinaryPath(),
 * i.e. from a cache. These tests pin that they are quoted before ending up in a
 * shell command, independently of whether ffmpeg is installed.
 *
 * @package Test\Preview
 */
class MovieCommandTest extends TestCase {
	/** @var array */
	private $binaries = [];

	protected function setUp(): void {
		parent::setUp();
		$this->binaries = [
			Movie::$avconvBinary,
			Movie::$ffmpegBinary,
			Movie::$atomicParsleyBinary,
		];
		Movie::$avconvBinary = null;
		Movie::$ffmpegBinary = null;
		Movie::$atomicParsleyBinary = null;
	}

	protected function tearDown(): void {
		list(
			Movie::$avconvBinary,
			Movie::$ffmpegBinary,
			Movie::$atomicParsleyBinary
		) = $this->binaries;
		parent::tearDown();
	}

	private function buildMovieCommand($absPath, $second, $tmpPath) {
		return self::invokePrivate(
			Movie::class,
			'buildMovieCommand',
			[$absPath, $second, $tmpPath]
		);
	}

	private function buildAtomicParsleyCommand($absPath, $tmpBase) {
		return self::invokePrivate(
			Movie::class,
			'buildAtomicParsleyCommand',
			[$absPath, $tmpBase]
		);
	}

	public function testFfmpegBinaryIsQuoted(): void {
		Movie::$ffmpegBinary = '/usr/bin/ffmpeg';

		$cmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');

		$this->assertStringStartsWith(\escapeshellarg('/usr/bin/ffmpeg') . ' ', $cmd);
	}

	public function testAvconvBinaryIsQuoted(): void {
		Movie::$avconvBinary = '/usr/bin/avconv';

		$cmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');

		$this->assertStringStartsWith(\escapeshellarg('/usr/bin/avconv') . ' ', $cmd);
	}

	public function testAvconvTakesPrecedenceOverFfmpeg(): void {
		Movie::$avconvBinary = '/usr/bin/avconv';
		Movie::$ffmpegBinary = '/usr/bin/ffmpeg';

		$cmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');

		$this->assertStringStartsWith(\escapeshellarg('/usr/bin/avconv') . ' ', $cmd);
		$this->assertStringNotContainsString('ffmpeg', $cmd);
	}

	public function testAtomicParsleyBinaryIsQuoted(): void {
		Movie::$atomicParsleyBinary = '/usr/bin/AtomicParsley';

		$cmd = $this->buildAtomicParsleyCommand('/tmp/in.mp4', '/tmp/Cover');

		$this->assertStringStartsWith(\escapeshellarg('/usr/bin/AtomicParsley') . ' ', $cmd);
	}

	/**
	 * A hostile binary value must end up as a single quoted token, so the shell
	 * treats it as one (non-existing) command name instead of parsing the
	 * payload.
	 *
	 * @dataProvider hostileBinaryProvider
	 */
	public function testHostileBinaryIsQuotedAsOneToken(string $binary): void {
		Movie::$ffmpegBinary = $binary;
		$ffmpegCmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');
		Movie::$ffmpegBinary = null;

		Movie::$avconvBinary = $binary;
		$avconvCmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');
		Movie::$avconvBinary = null;

		Movie::$atomicParsleyBinary = $binary;
		$atomicParsleyCmd = $this->buildAtomicParsleyCommand('/tmp/in.mp4', '/tmp/Cover');

		foreach ([$ffmpegCmd, $avconvCmd, $atomicParsleyCmd] as $cmd) {
			$this->assertStringStartsWith(\escapeshellarg($binary) . ' ', $cmd);
		}
	}

	public function hostileBinaryProvider() {
		return [
			'command chaining' => ['/usr/bin/ffmpeg; id'],
			'background' => ['/usr/bin/ffmpeg & id'],
			'pipe' => ['/usr/bin/ffmpeg | id'],
			'subshell' => ['/usr/bin/ffmpeg $(id)'],
			'backticks' => ['/usr/bin/ffmpeg `id`'],
			'newline' => ["/usr/bin/ffmpeg\nid"],
			'quote break out' => ["/usr/bin/ffmpeg' ; id ; '"],
		];
	}

	/**
	 * The end to end proof: hand the built command to a real shell and verify
	 * the payload appended to the binary does not run.
	 *
	 * @dataProvider commandBuilderProvider
	 */
	public function testInjectedPayloadIsNotExecutedByTheShell(string $builder): void {
		$marker = \OC::$server->getTempManager()->getTemporaryFile();
		// the temp manager creates the file - the payload would re-create it
		\unlink($marker);

		$payload = '/usr/bin/ffmpeg; touch ' . \escapeshellarg($marker);
		Movie::$ffmpegBinary = $payload;
		Movie::$atomicParsleyBinary = $payload;

		if ($builder === 'movie') {
			$cmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');
		} else {
			$cmd = $this->buildAtomicParsleyCommand('/tmp/in.mp4', '/tmp/Cover');
		}

		\exec($cmd, $output, $returnCode);

		$this->assertFileDoesNotExist($marker, 'the injected command must not run');
		$this->assertNotSame(0, $returnCode, 'the bogus binary must not be found');
	}

	public function commandBuilderProvider() {
		return [
			'ffmpeg/avconv' => ['movie'],
			'AtomicParsley' => ['atomicParsley'],
		];
	}

	/**
	 * Quoting the binary also fixes paths containing spaces, which used to
	 * break the command.
	 */
	public function testBinaryPathWithSpacesIsUsable(): void {
		Movie::$ffmpegBinary = '/opt/my apps/bin/ffmpeg';

		$cmd = $this->buildMovieCommand('/tmp/in.mp4', 5, '/tmp/out.jpg');

		$this->assertStringStartsWith("'/opt/my apps/bin/ffmpeg' ", $cmd);
	}
}
