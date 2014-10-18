<?php

namespace OCP\Chat;

interface IBackend{

	/**
	 * @return string identifier of the backend. Should be unique.
	 */
	public function getId();

	/**
	 * This function is used to get the conversations which should be shown when the Chat app is loaded.
	 * @return array
	 */
	public function getInitConvs();

	/**
	 * @return string displayname of this backend
	 */
	public function getDisplayName();

	/**
	 * @return supported protocols by this backend
	 */
	public function getProtocols();

	/**
	 * Check whether this backend supports $protocol
	 * @param $protocol
	 * @return nulll
	 */
	public function hasProtocol($protocol);

	/**
	 * @return bool
	 */
	public function isEnabled();

	/**
	 * Config options for this Backend
	 * @return array
	 */
	public function getConfig();
}