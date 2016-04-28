<?php
/**
 * Created by IntelliJ IDEA.
 * User: lukasreschke
 * Date: 10/13/15
 * Time: 7:54 PM
 */

namespace OCP\Authentication\TwoFactorAuthentication;

use OCP\IUser;

/**
 * Interface IProvider defines a two-factor provider, an user might have multiple
 * providers that can be used as second factor for authenticating.
 *
 * @package OCP\Authentication\TwoFactorAuthentication
 */
interface IProvider {
	/**
	 * Human readable string of the authentication provider
	 *
	 * @return string
	 */
	public function getName();

	/**
	 * Unique identifier used to identify the generator. Will also be used within
	 * the URL in the select challenge controller.
	 *
	 * @return string
	 */
	public function getIdentifier();

	/**
	 * Path to a small icon that is displayed in the challenge selection overview.
	 *
	 * @return string
	 */
	public function getPathToIcon();

	/**
	 * HTML that should be injected into the challenge view.
	 *
	 * @return string
	 */
	public function getAuthenticationHtml();

	/**
	 * JavaScript that should get injected into the challenge view.
	 *
	 * @return string
	 */
	public function getAuthenticationJavascript();

	/**
	 * Whether the provider is active for the given user.
	 *
	 * @param IUser $user
	 * @return bool
	 */
	public function isActiveForUser(IUser $user);

	/**
	 * Send a challenge response to the server to verify the token.
	 *
	 * @param string $challenge
	 * @return bool
	 */
	public function verifyChallenge($challenge);
}
