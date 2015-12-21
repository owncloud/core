<?php

namespace OCA\DAV\Avatars;

use OCP\IAvatarManager;
use Sabre\DAVACL\AbstractPrincipalCollection;
use Sabre\DAVACL\IPrincipal;

class RootCollection extends AbstractPrincipalCollection {

	/* @var IAvatarManager */
	private $manager;

	/**
	 * RootCollection constructor.
	 *
	 * @param \Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend
	 * @param string $principalPrefix
	 * @param IAvatarManager $avatarManager
	 */
	public function __construct($principalBackend, $principalPrefix, $avatarManager) {
			$this->manager = $avatarManager;
			parent::__construct($principalBackend, $principalPrefix);
		}

	/**
	 * This method returns a node for a principal.
	 *
	 * The passed array contains principal information, and is guaranteed to
	 * at least contain a uri item. Other properties may or may not be
	 * supplied by the authentication backend.
	 *
	 * @param array $principalInfo
	 * @return IPrincipal
	 */
	public function getChildForPrincipal(array $principalInfo) {
		return new AvatarCollection($principalInfo, $this->manager);
	}

	/**
	 * Returns the name of this collection.
	 *
	 * @return string
	 */
	public function getName() {
		return 'avatars';
	}
}