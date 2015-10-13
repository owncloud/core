<?php
namespace OCA\providerexample\appinfo;

use OCP\Authentication\TwoFactorAuthentication\IProvider;
use OCP\IUser;

/**
 * Simple example of a two-factor auth provider that allows authentication by using
 * "0815" as second factor.
 */
class StaticCodeProvider implements IProvider {
	public function getName() {
		return 'Static Code Provider';
	}

	public function getIdentifier() {
		return 'a';
	}

	public function getAuthenticationHtml() {
		return '<p>To login please enter the code "0815".</p><form method="POST"><input type="text" name="response" /><input type="hidden" name="requesttoken" value="'.\OC_Util::callRegister().'"/><input type="submit"></form>';
	}

	public function getAuthenticationJavascript() {
		return '';
		return 'alert("Providers can also run Javascript…");';
	}

	public function getPathToIcon() {
		return '';
	}

	public function isActiveForUser(IUser $user) {
		return true;
	}

	public function verifyChallenge($challenge) {
		if($challenge === '0815') {
			return true;
		}

		return false;
	}
}
