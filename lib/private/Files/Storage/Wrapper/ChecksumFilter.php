<?php

namespace OC\Files\Storage\Wrapper;

class ChecksumFilter extends \php_user_filter {
	private $adlerContext;
	private $md5Context;
	private $sha1Context;

	public function filter($in, $out, &$consumed, $closing) {
		while ($bucket = \stream_bucket_make_writeable($in)) {
			\hash_update($this->adlerContext, $bucket->data);
			\hash_update($this->md5Context, $bucket->data);
			\hash_update($this->sha1Context, $bucket->data);
			$consumed += $bucket->datalen;
			\stream_bucket_append($out, $bucket);
		}
		return PSFS_PASS_ON;
	}

	public function onClose() {
		$this->params->md5 = \hash_final($this->md5Context);
		$this->params->adler32= \hash_final($this->adlerContext);
		$this->params->sha1 = \hash_final($this->sha1Context);
		return true;
	}

	public function onCreate() {
		$this->md5Context = \hash_init('md5');
		$this->sha1Context = \hash_init('sha1');
		$this->adlerContext = \hash_init('adler32');
		return true;
	}
}
