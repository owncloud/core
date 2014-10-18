<?php

namespace OCP\Chat;

use IBackend;

interface IBackendManager{

	/**
	 * @param IBackend $backend
	 * @return null
	 */
	public function registerBackend(IBackend $backend);

	/**
	 * Returns the enabled backends
	 * @return array with enabled backends IBackend
	 */
	public function getEnabledBackends();

	/**
	 * @param $id
	 * @return IBackend
	 */
	public function getBackend($id);

	/**
	 * @param $protocol one of the protocols stored in \OCP\Chat\IBackend::protocols
	 * @return IBackend
	 */
	public function getBackendByProtocol($protocol);

	/**
	 * @param IBackend $backend
	 * @return null
	 */
	public function unRegisterBackend(IBackend $backend);

}
