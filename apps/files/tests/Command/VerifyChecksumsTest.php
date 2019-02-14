<?php

namespace OCA\Files\Tests\Command;

use OC\Files\Node\File;
use OC\Files\Storage\Wrapper\Checksum;
use OCA\Files\Command\VerifyChecksums;
use OCP\IUser;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 *
 * @group DB
 * @package OCA\Files\Tests\Command
 */
class VerifyChecksumsTest extends TestCase {
	use \Test\Traits\UserTrait;

	const BROKEN_CHECKSUM_STRING = '_BROKEN_';

	/** @var CommandTester */
	private $cmd;

	/**
	 * @var \OCP\Files\IRootFolder
	 */
	private $rootFolder;

	/**
	 * @var string
	 */
	private $user1;

	/**
	 * @var string
	 */
	private $user2;

	/**
	 * @var array
	 */
	private $testFiles;

	public function setUp(): void {
		parent::setUp();

		$this->rootFolder = \OC::$server->getRootFolder();

		$this->user1 = $this->createRandomUser(1);
		$this->user2 = $this->createRandomUser(2);

		$this->testFiles =  [
			$this->createFileForUser($this->user1, 'dir/nested/somefile.txt', 'Hello World!'),
			$this->createFileForUser($this->user1, 'dir/nested/subdir/hallo2.txt', 'ewfwfwefwef'),
			$this->createFileForUser($this->user1, 'dir/nested/somefile2.txt', '1337'),
			$this->createFileForUser($this->user1, 'otherdir/bar.txt', 'Bye!'),
			$this->createFileForUser($this->user1, 'rootfile.doc', 'efwefwfwefwffw'),
			$this->createFileForUser($this->user1, 'song.mp3', 'sdfsfdsdfsdfsfsfsffs'),
			$this->createFileForUser($this->user2, 'sdvsdvs/secrets/bar/baz/moo.txt', 'JhonnyCache'),
			$this->createFileForUser($this->user2, 'bling.tif', 'ewfwefwf242'),
			$this->createFileForUser($this->user2, 'pong.tif', '12'),
			$this->createFileForUser($this->user2, 'welcome.doc', 'efwefwfwefwffw'),
		];

		$this->cmd = new CommandTester(
			new VerifyChecksums(
				$this->rootFolder,
				\OC::$server->getUserManager()
			)
		);
	}

	/**
	 * @param string $uid
	 * @param $path
	 * @param $content
	 * @return array
	 * @throws \OCP\Files\NotPermittedException
	 */
	private function createFileForUser($uid, $path, $content) {
		$userFolder = \OC::$server->getUserFolder($uid);

		$parts = \explode('/', \ltrim($path, '/'));
		$fileName = \array_pop($parts);
		$dirPath = $parts;

		$currentDir = '';
		foreach ($dirPath as $subDir) {
			if (!empty($subDir)) {
				$currentDir = "$currentDir/$subDir";
				if (!$userFolder->nodeExists($currentDir)) {
					$userFolder->newFolder($currentDir);
				}
			}
		}

		$f = $userFolder->newFile("$currentDir/$fileName");
		$f->putContent($content);

		return [
			'file' => $f,
			'expectedChecksums' => function () use ($content) {
				return \sprintf(
					Checksum::CHECKSUMS_DB_FORMAT,
					\hash('sha1', $content),
					\hash('md5', $content),
					\hash('adler32', $content)
				);
			},
		];
	}

	/**
	 * @param int $number
	 * @return bool|IUser
	 */
	private function createRandomUser($number) {
		$userName = $this->getUniqueID("$number-verifycheksums");
		$user = $this->createUser($userName);
		$this->loginAsUser($userName);

		return $user->getUID();
	}

	private function breakChecksum(File &$f) {
		$cache = $f->getStorage()->getCache();
		$cache->update($f->getId(), ['checksum' => self::BROKEN_CHECKSUM_STRING]);
		$this->refreshFileInfo($f);
	}

	private function refreshFileInfo(File &$f) {
		$f = $this->rootFolder->get($f->getPath());
	}

	private function assertChecksumsAreCorrect(array $files) {
		foreach ($files as $key => $file) {
			$expectedChecksums = $files[$key]['expectedChecksums'];
			$this->refreshFileInfo($files[$key]['file']);
			/** @var File $f */
			$f = $files[$key]['file'];
			$this->assertSame(
				$expectedChecksums(),
				$f->getChecksum()
			);
		}
	}

	public function testNoBrokenChecksums() {
		$this->cmd->execute([]);
		$exitCode = $this->cmd->getStatusCode();

		$this->assertEquals(VerifyChecksums::EXIT_NO_ERRORS, $exitCode, 'Wrong exit code');
		$this->assertChecksumsAreCorrect($this->testFiles);
	}

	public function testBrokenChecksumsAreNotRepairedWithoutArguments() {
		/** @var File $file1 */
		$file1 = $this->testFiles[0]['file'];
		/** @var File $file2 */
		$file2 = $this->testFiles[6]['file'];

		$this->breakChecksum($file1);
		$this->breakChecksum($file2);

		$this->cmd->execute([]);
		$this->cmd->execute([]);

		$exitCode = $this->cmd->getStatusCode();
		$this->assertEquals(VerifyChecksums::EXIT_CHECKSUM_ERRORS, $exitCode, 'Wrong exit code');

		$this->assertEquals(self::BROKEN_CHECKSUM_STRING, $file1->getChecksum());
		$this->assertEquals(self::BROKEN_CHECKSUM_STRING, $file2->getChecksum());
	}

	/**
	 * @depends testBrokenChecksumsAreNotRepairedWithoutArguments
	 */
	public function testFilesWithBrokenChecksumsAreDisplayed() {
		/** @var File $file1 */
		$file1 = $this->testFiles[4]['file'];
		/** @var File $file2 */
		$file2 = $this->testFiles[7]['file'];

		$this->breakChecksum($file1);
		$this->breakChecksum($file2);

		$this->cmd->execute([]);

		$output = $this->cmd->getDisplay();

		$this->assertContains($file1->getInternalPath(), $output);
		$this->assertContains($file2->getInternalPath(), $output);
		$this->assertContains(self::BROKEN_CHECKSUM_STRING, $output);
		$this->assertContains($this->testFiles[4]['expectedChecksums'](), $output);
		$this->assertContains($this->testFiles[7]['expectedChecksums'](), $output);
	}

	/**
	 * @depends testNoBrokenChecksums
	 */
	public function testBrokenChecksumsResultInErrorExitCode() {

		/** @var File $file1 */
		$file1 = $this->testFiles[0]['file'];

		$this->breakChecksum($file1);
		$this->cmd->execute([]);

		$this->assertEquals(self::BROKEN_CHECKSUM_STRING, $file1->getChecksum());

		$exitCode = $this->cmd->getStatusCode();
		$this->assertEquals(VerifyChecksums::EXIT_CHECKSUM_ERRORS, $exitCode, 'Wrong exit code');
	}

	/**
	 * @depends testBrokenChecksumsAreNotRepairedWithoutArguments
	 */
	public function testBrokenFilesAreRepairedWithRepairArgument() {
		/** @var File $file1 */
		$file1 = $this->testFiles[1]['file'];
		/** @var File $file2 */
		$file2 = $this->testFiles[7]['file'];

		$this->breakChecksum($file1);
		$this->breakChecksum($file2);

		$this->cmd->execute(['-r' => null]);

		$this->assertChecksumsAreCorrect([
			$this->testFiles[1],
			$this->testFiles[7]
		]);

		$exitCode = $this->cmd->getStatusCode();
		$this->assertEquals(VerifyChecksums::EXIT_NO_ERRORS, $exitCode, "Wrong exit code");
	}

	/**
	 * @depends testBrokenFilesAreRepairedWithRepairArgument
	 */
	public function testOnlyFilesInGivenPathArgumentAreRepaired() {

		/** @var File $file1 */
		$file1 = $this->testFiles[0]['file'];
		/** @var File $file2 */
		$file2 = $this->testFiles[1]['file'];
		/** @var File $file3 */
		$file3 = $this->testFiles[2]['file'];
		/** @var File $file4 */
		$file4 = $this->testFiles[3]['file'];

		$this->breakChecksum($file1);
		$this->breakChecksum($file2);
		$this->breakChecksum($file3);
		$this->breakChecksum($file4);

		$this->cmd->execute([
			'-r' => null,
			'-p' => "{$this->user1}/files/dir/nested"
		]);

		$this->assertChecksumsAreCorrect([
			$this->testFiles[0],
			$this->testFiles[1],
			$this->testFiles[2],
		]);

		$this->assertEquals(self::BROKEN_CHECKSUM_STRING, $file4->getChecksum());
	}

	public function testOnlyFilesOfAGivenUserAreRepaired() {

		/** @var File $file1 */
		$file1 = $this->testFiles[0]['file'];
		/** @var File $file2 */
		$file2 = $this->testFiles[6]['file'];

		$this->breakChecksum($file1);
		$this->breakChecksum($file2);

		$this->cmd->execute([
			'-r' => null,
			'-u' => $this->user1
		]);

		$this->assertChecksumsAreCorrect([
			$this->testFiles[0],
		]);

		$this->assertEquals(self::BROKEN_CHECKSUM_STRING, $file2->getChecksum());
	}

	public function testAllFilesCanBeRepaired() {
		foreach ($this->testFiles as $testFile) {
			$this->breakChecksum($testFile['file']);
		}

		$this->cmd->execute(['-r' => null]);

		$this->assertChecksumsAreCorrect($this->testFiles);
	}

	public function testFileWithoutChecksumIsIgnored() {
		/** @var File $file */
		$file = $this->testFiles[0]['file'];
		$file->getStorage()->getCache()->update(
			$file->getId(),
			['checksum' => '']
		);

		$this->cmd->execute([], ['verbosity' => OutputInterface::VERBOSITY_VERBOSE]);
		$output = $this->cmd->getDisplay();

		$this->assertContains('somefile.txt => No Checksum', $output);
		$this->assertContains('Skipping', $output);
	}

	public function testFileInCacheButNotOnDiskIsIgnored() {
		/** @var File $file */
		$file = $this->testFiles[0]['file'];
		$file->getStorage()->getCache()->update(
			$file->getId(),
			['path' => '/does/not/exist', 'name' => 'x-file.txt']
		);

		$this->cmd->execute([], ['verbosity' => OutputInterface::VERBOSITY_VERBOSE]);
		$output = $this->cmd->getDisplay();

		$this->assertContains('x-file.txt => File is in file-cache but doesn\'t exist on storage/disk', $output);
	}

	public function testInvalidArgs() {
		$this->cmd->execute(['-p' => '/does/not/exist']);

		$this->assertEquals(
			VerifyChecksums::EXIT_INVALID_ARGS,
			$this->cmd->getStatusCode(),
			'Not existing path must return invalid args status code'
		);

		$this->cmd->execute(['-u' => 'doesnotexist@example.com']);

		$this->assertEquals(
			VerifyChecksums::EXIT_INVALID_ARGS,
			$this->cmd->getStatusCode(),
			'Not existing user must return invalid args status code'
		);

		$this->cmd->execute([
			'-u' => 'foo@example.com',
			'-p' => '/some/path'
		]);

		$this->assertEquals(
			VerifyChecksums::EXIT_INVALID_ARGS,
			$this->cmd->getStatusCode(),
			'User and path must return invalid args status code when combined'
		);
	}
}
