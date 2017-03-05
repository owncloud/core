<?php

/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
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
*
*/

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class OwncloudPage extends Page
{
	public function waitTillPageIsloaded($timeout)
	{
		
		for ($counter=0;$counter <= $timeout;$counter++) {
			$lodingIndicator=$this->find("css", '.loading');
			$visibility = $this->elementHasCSSValue(
				$lodingIndicator, 'visibility', 'visible'
			);
			if ($visibility===FALSE) {
				break;
			}
			
			sleep(1);
		}

	}
	
	/**
	 * Determine if a Mink NodeElement contains a specific
	 * css rule attribute value.
	 *
	 * @param NodeElement $element
	 *   NodeElement previously selected with 
	 *   $this->getSession()->getPage()->find().
	 * @param string $property
	 *   Name of the CSS property, such as "visibility".
	 * @param string $value
	 *   Value of the specified rule, such as "hidden".
	 *
	 * @return NodeElement|bool
	 *   The NodeElement selected if true, FALSE otherwise.
	 */
	protected function elementHasCSSValue($element, $property, $value)
	{
		$exists = FALSE;
		$style = $element->getAttribute('style');
		if ($style) {
			if (preg_match(
				"/(^{$property}:|; {$property}:) ([a-z0-9]+);/i",
				$style, $matches
			)) {
				$found = array_pop($matches);
				if ($found == $value) {
					$exists = $element;
				}
			}
		}
	
		return $exists;
	}
}