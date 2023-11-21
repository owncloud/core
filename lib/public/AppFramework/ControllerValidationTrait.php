<?php

namespace OCP\AppFramework;

use OC\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;

trait ControllerValidationTrait {
	/**
	 * @since 10.14.0
	 * @throws ValidationException
	 */
	protected function validateString(string $string, int $max): void {
		if (\strlen($string) > $max) {
			throw new ValidationException();
		}
	}

	/**
	 * @since 10.14.0
	 * @throws ValidationException
	 */
	protected function validateEMail(string $email, bool $allowEmpty = false): ?DataResponse {
		if ($allowEmpty && $email === '') {
			return null;
		}
		$mailer = \OC::$server->getMailer();
		if ($email !== '' && !$mailer->validateMailAddress($email)) {
			throw new ValidationException();
		}
		return null;
	}
}
