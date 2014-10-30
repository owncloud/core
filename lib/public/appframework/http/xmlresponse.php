<?php
/**
 * ownCloud - App Framework
 *
 * @author Patrick Paysant
 * @copyright 2014 Patrick Paysant <ppa.work@gmail.com>
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

/**
 * Public interface of ownCloud for apps to use.
 * AppFramework\HTTP\XMLResponse class
 */

namespace OCP\AppFramework\Http;

use OCP\AppFramework\Http;

/**
 * A renderer for XML calls
 */
class XMLResponse extends Response {

	/**
	 * response data
	 * @var array|object
	 */
	protected $data;

	/**
	 * Default root tag name
	 */
	const defaultRootTagName = 'root';

	/**
	 * XML root tag name
	 * @var string
	 */
	protected $rootTagName;


	/**
	 * constructor of XMLResponse
	 * @param array|object $data the object or array that should be transformed
	 * @param int $statusCode the Http status code, defaults to 200
	 */
	public function __construct($data=array(), $statusCode=Http::STATUS_OK, $rootTagName='root') {
		$this->data = $data;
		$this->setStatus($statusCode);

		if ($rootTagName != self::defaultRootTagName and $this->isValidTagName($rootTagName)) {
			$this->rootTagName = $rootTagName;
		}
		else {
			$this->rootTagName = self::defaultRootTagName;
		}

		$this->addHeader('Content-type', 'text/xml; charset=utf-8');
	}


	/**
	 * Returns the rendered xml
	 * @return string the rendered xml
	 */
	public function render(){
		return $this->xml_encode($this->data);
	}


	/**
	 * Sets values in the data XML struct
	 * @param array|object $data an array or object which will be transformed
	 *                             to XML
	 * @return XMLResponse Reference to this object
	 */
	public function setData($data){
		$this->data = $data;

		return $this;
	}


	/**
	 * Used to get the set parameters
	 * @return array the data
	 */
	public function getData(){
		return $this->data;
	}


	/**
	 * Return XML encoded array
	 * @param array|object $data an array or object which will be transformed to XML
	 * @return string XML string
	 */
	protected function xml_encode($data) {
		$orig = $data;

		$beginningTag = "<" . $this->rootTagName . ">";
		$endingTag = "</" . $this->rootTagName . ">";

		$xml = new \SimpleXMLElement("<?xml version =\"1.0\"?>" . $beginningTag . $endingTag);

		$this->arrayToXML($orig, $xml);

		return $xml->asXML();
	}


	/**
	 * Encode an array to SimpleXML object
	 * @param array $data An wrapping array around your data array ($data = array($yourData))
	 * @param string $xml A pre-initialized XML string : $xml = new SimpleXMLElement("<?xml version =\"1.0\"?><root></root>");
	 */
	protected function arrayToXML($data, &$xml) {
		if (empty($data)) {
			return;
		}

		foreach($data as $key => $value) {
			if (is_array($value)) {
				if (is_numeric($key)) {
					$subnode = $xml->addChild('item' . $key);
				}
				else {
					$subnode = $xml->addChild("$key");
				}
				$this->arrayToXML($value, $subnode);
			}
			else {
				if (is_numeric($key)) {
					$xml->addChild("item$key", htmlspecialchars("$value"));
				}
				else {
					$xml->addChild("$key", htmlspecialchars("$value"));
				}
			}
		}
	}


	/**
	 * Some verifications on tag names
	 * @param string A tag name
	 * @return boolean True if the tag name string won't break xml
	 */
	protected function isValidTagName($tag){
		$pattern = '/^[a-z_]+[a-z0-9\:\-\.\_]*[^:]*$/i';
		return preg_match($pattern, $tag, $matches) && $matches[0] == $tag;
	}

}
