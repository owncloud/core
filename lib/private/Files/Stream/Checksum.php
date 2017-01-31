<?php


namespace OC\Files\Stream;


use Icewind\Streams\Wrapper;

class Checksum extends Wrapper {

	/** @var  resource */
	private $hashCtx;


	/** @var array Key is path, value is the checksum */
	private static $checksums = [];

	public function __construct() {
		$this->hashCtx = hash_init('sha1');
	}

	public static function wrap($source, $path) {
		$context = stream_context_create([
			'occhecksum' => [
				'source' => $source,
				'path' => $path
			]
		]);

		return Wrapper::wrapSource(
			$source, $context, 'occhecksum', self::class
		);
	}

	public function dir_opendir($path, $options) {
		#return parent::dir_opendir($path, $options);
	}

	public function stream_open($path, $mode, $options, &$opened_path) {
		$context = parent::loadContext('occhecksum');
        $this->setSourceStream($context['source']);

		return true;
	}

	public function stream_read($count) {
		hash_update($this->hashCtx, $this->source);
		return parent::stream_read($count);
	}

	public function stream_write($data) {
		hash_update($this->hashCtx, $data);
		return parent::stream_write($data);
	}

	public function stream_close() {
        self::$checksums[$this->getPathFromContext()] = hash_final($this->hashCtx);
		return parent::stream_close();
	}

	private function getPathFromContext() {
		$ctx = stream_context_get_options($this->context);
		return $ctx['occhecksum']['path'];
	}

	public static function getChecksums() {
		return self::$checksums;
	}
}