<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author Sergio Bertolín <sbertolin@solidgear.es>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

/**
 * Public interface of ownCloud for apps to use.
 * AppFramework\Controller class
 */

namespace OCP\AppFramework;

use OC\OCS\Result;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\OCSResponse;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;

/**
 * Base class to inherit your controllers from that are used for RESTful APIs
 * @since 8.1.0
 */
abstract class OCSController extends ApiController {

	/**
	 * constructor of the controller
	 * @param string $appName the name of the app
	 * @param IRequest $request an instance of the request
	 * @param string $corsMethods comma separated string of HTTP verbs which
	 * should be allowed for websites or webapps when calling your API, defaults to
	 * 'PUT, POST, GET, DELETE, PATCH'
	 * @param string $corsAllowedHeaders comma separated string of HTTP headers
	 * which should be allowed for websites or webapps when calling your API,
	 * defaults to 'Authorization, Content-Type, Accept'
	 * @param int $corsMaxAge number in seconds how long a preflighted OPTIONS
	 * request should be cached, defaults to 1728000 seconds
	 * @since 8.1.0
	 */
	public function __construct($appName,
								IRequest $request,
								$corsMethods='PUT, POST, GET, DELETE, PATCH',
								$corsAllowedHeaders='Authorization, Content-Type, Accept',
								$corsMaxAge=1728000) {
		parent::__construct($appName, $request, $corsMethods,
							$corsAllowedHeaders, $corsMaxAge);
		$this->registerResponder('json', function ($data) {
			return $this->buildOCSResponse('json', $data);
		});
		$this->registerResponder('xml', function ($data) {
			return $this->buildOCSResponse('xml', $data);
		});
	}

	/**
	 * Unwrap data and build ocs response
	 * @param string $format json or xml
	 * @param array|DataResponse $data the data which should be transformed
	 * @since 8.1.0
	 */
	private function buildOCSResponse($format, $data) {
		if ($data instanceof Result) {
			$headers = $data->getHeaders();
			$d = $data->getData();
			$data = $data->getMeta();
			$data['headers'] = $headers;
			$data['data'] = $d;
		}
		if ($data instanceof DataResponse) {
			$data = $data->getData();
		}

		$params = [
			'statuscode' => 100,
			'message' => 'OK',
			'data' => [],
			'itemscount' => '',
			'itemsperpage' => ''
		];

		foreach ($data as $key => $value) {
			$params[$key] = $value;
		}

		$isV2 = \substr($this->request->getScriptName(), -11) === '/ocs/v2.php';

		$resp = new OCSResponse(
			$format, $params['statuscode'],
			$params['message'], $params['data'],
			$params['itemscount'], $params['itemsperpage'], $isV2
		);
		if (isset($data['headers'])) {
			foreach ($data['headers'] as $key => $value) {
				$resp->addHeader($key, $value);
			}
		}

		return $resp;
	}

	/**
	 * Serializes and formats a response
	 * @param mixed $response the value that was returned from a controller and
	 * is not a Response instance
	 * @param string $format the format for which a formatter has been registered
	 * @throws \DomainException if format does not match a registered formatter
	 * @return Response
	 * @since 7.0.0
	 */
	public function buildResponse($response, $format = 'json') {
		$format = $this->request->getParam('format');
		if ($format === null) {
			$format = 'xml';
		}
		/** @var OCSResponse $resp */
		$resp = parent::buildResponse($response, $format);
		$script = $this->request->getScriptName();

		if (\substr($script, -11) === '/ocs/v2.php') {
			$statusCode = \OC_API::mapStatusCodes($resp->getStatusCode());
			if ($statusCode !== null) {
				// HTTP code
				$resp->setStatus($statusCode);
				// OCS code
				$resp->setStatusCode($statusCode);
			}
		}

		return $resp;
	}
}
