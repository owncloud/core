<?php

namespace OC\Theme;

class Theme {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $directory;

	/**
	 * Theme constructor.
	 *
	 * @param string $name
	 * @param string $directory
	 */
	public function __construct($name = '', $directory = '') {
		$this->name = $name;
		$this->directory = $directory;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDirectory() {
		return $this->directory;
	}

	/**
	 * @param string $directory
	 */
	public function setDirectory($directory) {
		$this->directory = $directory;
	}
}
