<?php
/**
 * Copyright (c) 2013,2014 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

/**
* Reader for the appinfo/info.xml file
*/
class InfoXMLReader {
	/**
	 * @brief Get information about an app
	 * @param string $filename path to info.xml file
	 *
	 * @throws \Exception when the file is not found or is empty
	 * @return array with information about the app
	 */
	public function parseInfo($filename) {
		if (!file_exists($filename)) {
			throw new Exception('info.xml file not found: '.$filename);
		}
		$data = array();
		$content = @file_get_contents($filename);
		if (!$content) {
			throw new Exception('info.xml file is empty or unreadable: '.$filename);
		}
		$xml = new \SimpleXMLElement($content);
		$data['info'] = array();
		$data['remote'] = array();
		$data['public'] = array();
		foreach ($xml->children() as $child) {
			/**
			 * @var $child \SimpleXMLElement
			 */
			switch ($child->getName()) {
				case 'remote':
					foreach($child->children() as $remote) {
						/**
						* @var $remote \SimpleXMLElement
						*/
						$data['remote'][$remote->getName()] = (string)$remote;
					}
					break;
				case 'public':
					foreach($child->children() as $public) {
						/**
						* @var $public \SimpleXMLElement
						*/
						$data['public'][$public->getName()] = (string)$public;
					}
					break;
				case 'types':
					$data['types']=array();
					foreach($child->children() as $type) {
						/**
						* @var $type \SimpleXMLElement
						*/
						$data['types'][] = $type->getName();
					}
					break;
				case 'description':
					$xml=(string)$child->asXML();
					$data[$child->getName()] = substr($xml, 13, -14);//strip <description> tags
					break;
				case 'documentation':
					foreach($child as $subChild) {
						$data["documentation"][$subChild->getName()] = (string)$subChild;
					}
					break;
				default:
					$data[$child->getName()] = (string)$child;
			}
		}
		return $data;
	}
}
