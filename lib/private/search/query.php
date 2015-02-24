<?php
/**
 * ownCloud
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING-AGPL file.
 *
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @copyright Jörn Friedrich Dreyer 2014
 */

namespace OC\Search;

class Query {

	const ALL_PROPS = 1;

	public $select = ALL_PROPS;

	/**
	 * @var string[] of app names
	 */
	public $from;

	public $where;

	public $orderBy;

	public $limit = 30;

	public $offset = 0;
}