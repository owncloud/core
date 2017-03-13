<?php

namespace OCP\Authentication;

use OCP\IRequest;
use OCP\IUser;

/**
 * Interface IAuthModule
 *
 * @package OCP\Authentication
 * @since 9.1.5
 */
interface IAuthModule {

	/**
	 * Authenticates a request.
	 *
	 * @param IRequest $request The request.
	 *
	 * @return null|IUser The user if the request is authenticated, null otherwise.
	 * @since 9.1.5
	 */
	public function auth(IRequest $request);

	/**
	 * Returns the user's password.
	 *
	 * @param IRequest $request The request.
	 *
	 * @return String The user's password.
	 * @since 9.1.5
	 */
	public function getUserPassword(IRequest $request);

}
