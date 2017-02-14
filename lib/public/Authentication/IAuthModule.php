<?php

namespace OCP\Authentication;

use OCP\IRequest;
use OCP\IUser;

/**
 * Public interface of ownCloud for apps to use.
 */
interface IAuthModule {

	/**
	 * Authenticates a request.
	 *
	 * @param IRequest $request The request.
	 *
	 * @return null|IUser The user if the request is authenticated, null otherwise.
	 */
	public function auth(IRequest $request);

}
