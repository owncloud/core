<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
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
	 * @return array with information about the app
	 */
	public function getInfo($filename) {
		$data = array();
		$content = @file_get_contents($filename);
		if (!$content) {
			return null;
		}
		$xml = new \SimpleXMLElement($content);
		$data['info'] = array();
		$data['remote'] = array();
		$data['public'] = array();
		foreach ($xml->children() as $child) {
			/**
			 * @var $child \SimpleXMLElement
			 */
			if ($child->getName()=='remote') {
				foreach($child->children() as $remote) {
					/**
					 * @var $remote \SimpleXMLElement
					 */
					$data['remote'][$remote->getName()] = (string)$remote;
				}
			} elseif ($child->getName()=='public') {
				foreach($child->children() as $public) {
					/**
					 * @var $public \SimpleXMLElement
					 */
					$data['public'][$public->getName()] = (string)$public;
				}
			} elseif ($child->getName()=='types') {
				$data['types']=array();
				foreach($child->children() as $type) {
					/**
					 * @var $type \SimpleXMLElement
					 */
					$data['types'][] = $type->getName();
				}
			} elseif ($child->getName()=='description') {
				$xml=(string)$child->asXML();
				$data[$child->getName()] = substr($xml, 13, -14);//strip <description> tags
                        } elseif ($child->getName()=='documentation') {
                                foreach($child as $subchild) {
                                        $data["documentation"][$subchild->getName()] = (string)$subchild;
                                }
			} else {
				$data[$child->getName()] = (string)$child;
			}
		}
		return $data;
	}
}
