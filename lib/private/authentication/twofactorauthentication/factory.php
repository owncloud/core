<?php
namespace OC\Authentication\TwoFactorAuthentication;

use OCP\Authentication\TwoFactorAuthentication\IProvider;
use OCP\Authentication\TwoFactorAuthentication\IFactory;

class Factory implements IFactory {
	/** @var IProvider[] */
	private $provider = [];

	/**
	 * @param IProvider $provider
	 * @throws \Exception When it was not possible to add the provider.
	 */
	public function registerProvider(IProvider $provider) {
		if(isset($this->provider[$provider->getIdentifier()])) {
			throw new \Exception(sprintf('Provider name "%s" is already in use.', $provider->getIdentifier()));
		}

		$this->provider[$provider->getIdentifier()] = $provider;
	}

	/**
	 * @return IProvider[]
	 */
	public function getProvider() {
		return $this->provider;
	}

}
