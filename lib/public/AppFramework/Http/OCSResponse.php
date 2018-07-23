<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
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
 * AppFramework\HTTP\JSONResponse class
 */

namespace OCP\AppFramework\Http;
use OC\OCS\Result;

/**
 * A renderer for OCS responses
 * @since 8.1.0
 */
class OCSResponse extends Response {
	private $data;
	private $format;
	private $statuscode;
	private $message;
	private $itemscount;
	private $itemsperpage;
	private $isV2;

	/**
	 * generates the xml or json response for the API call from an multidimenional data array.
	 *
	 * @param string $format
	 * @param int $statuscode
	 * @param string $message
	 * @param array $data
	 * @param int|string $itemscount
	 * @param int|string $itemsperpage
	 * @param bool $isV2
	 * @since 8.1.0
	 */
	public function __construct($format, $statuscode, $message,
								$data=[], $itemscount='',
								$itemsperpage='', $isV2 = false) {
		$this->format = $format;
		$this->statuscode = $statuscode;
		$this->message = $message;
		$this->data = $data;
		$this->itemscount = $itemscount;
		$this->itemsperpage = $itemsperpage;
		$this->isV2 = $isV2;

		// set the correct header based on the format parameter
		if ($format === 'json') {
			$this->addHeader(
				'Content-Type', 'application/json; charset=utf-8'
			);
		} else {
			$this->addHeader(
				'Content-Type', 'application/xml; charset=utf-8'
			);
		}
	}

	/**
	 * @return string
	 * @since 8.1.0
	 */
	public function render() {
		$r = new Result($this->data, $this->statuscode, $this->message);
		$r->setTotalItems($this->itemscount);
		$r->setItemsPerPage($this->itemsperpage);
		$meta = $r->getMeta();
		if ($this->isV2 && $this->statuscode === 200) {
			$meta['status'] = 'ok';
		}

		return \OC_API::renderResult($this->format, $meta, $r->getData());
	}

	/**
	 * @return int
	 * @since 10.0
	 */
	public function getStatusCode() {
		return $this->statuscode;
	}

	/**
	 * @param int $statuscode
	 * @since 10.0
	 */
	public function setStatusCode($statuscode) {
		$this->statuscode = $statuscode;
	}
}
