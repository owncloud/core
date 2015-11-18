<?php
namespace OC\Cache;

use OCP\Command\ICommand;

class Expire implements ICommand {

	/** @var string */
	private $user;

	/** @var string */
	private $file;

	public function __construct($user, $file) {
		$this->user = $user;
		$this->file = $file;
	}


	public function handle() {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($this->user);
		\OC\Cache\File::expire($this->file, $this->user);
		\OC_Util::tearDownFS();
	}
}
