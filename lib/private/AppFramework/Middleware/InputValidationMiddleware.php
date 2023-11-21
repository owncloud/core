<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\AppFramework\Middleware;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\ValidationException;
use OCP\AppFramework\Middleware;
use OCP\IL10N;

class InputValidationMiddleware extends Middleware {
	private IL10N $l10n;

	public function __construct(
		IL10N $l10n
	) {
		$this->l10n = $l10n;
	}

	public function afterException($controller, $methodName, \Exception $exception) {
		if ($exception instanceof ValidationException) {
			$message = $this->l10n->t('The given data was invalid.');
			return new JSONResponse(
				[
					# some frontend elements are expecting .status and .data.message
					'status' => 'error',
					'data' => [
						'message' => $message,
					],
					# .message should be enough for and cases
					'message' => $message,
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		throw $exception;
	}
}
