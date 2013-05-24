<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2013 Michael Gapczynski mtgap@owncloud.com
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*/

namespace OC\Share;

/**
 * An Advanced Share Factory to reduce the number of queries needed to generate a Share object
 * Setup JOINs in the share queries to retrieve additional properties for the Share object
 * The columns specified in getColumns() will be returned in the $row passed to mapToShare($row)
 */
interface IAdvancedShareFactory extends IShareFactory {
	
	/**
	 * Get JOIN(s) to app table(s)
	 * @return array
	 *
	 * Example:
	 *
	 * return array(
	 *     'table1' => array(
	 *         'share' => 'item_source',
	 *		   'table1' => 'id'
	 *     )
	 * );
	 *
	 * Equivalent: JOIN table1 ON share.item_source = table1.id
	 * 
	 */
	public function getJoins();

	/**
	 * Get app table column(s)
	 * @return array
	 *
	 * Example:
	 * 
	 * return array(
	 *	'table1' => array(
	 *		'id',
	 *		'name'
	 *	)
	 * );
	 *
	 * Equivalent: SELECT table1.id, table1.name
	 * 
	 */
	public function getColumns();
	
}