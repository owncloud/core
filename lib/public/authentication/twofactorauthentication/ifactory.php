<?php
/**
 * Created by IntelliJ IDEA.
 * User: lukasreschke
 * Date: 10/13/15
 * Time: 9:18 PM
 */

namespace OCP\Authentication\TwoFactorAuthentication;

interface IFactory {
	/**
	 * @param IProvider $provider
	 * @throws \Exception When it was not possible to add the provider.
	 */
	public function registerProvider(IProvider $provider);

	/**
	 * @return IProvider[]
	 */
	public function getProvider();
}