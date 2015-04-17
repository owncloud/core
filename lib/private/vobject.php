<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
 * @author Susinthiran Sithamparanathan <chesusin@gmail.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
 * This class provides a streamlined interface to the Sabre VObject classes
 */
class OC_VObject{
	/** @var Sabre\VObject\Component */
	protected $vObject;
	protected $vcomponent;

	/**
	 * @return Sabre\VObject\Component
	 */
	public function getVObject() {
		return $this->vObject;
	}

	/**
	 * Parses the VObject
	 * @param string $data VObject as string
	 * @return Sabre\VObject\Reader|null
	 */
	public static function parse($data) {
		try {
			$vObject = Sabre\VObject\Reader::read($data);
			if ($vObject instanceof Sabre\VObject\Component) {
				$vObject = new OC_VObject($vObject);
			}
			return $vObject;
		} catch (Exception $e) {
			OC_Log::write('vobject', $e->getMessage(), OC_Log::ERROR);
			return null;
		}
	}

	/**
	 * Escapes semicolons
	 * @param array $value
	 * @return string
	 */
	public static function escapeSemicolons($value) {
		foreach($value as &$i ) {
			$i = implode("\\\\;", explode(';', $i));
		}
		return implode(';', $value);
	}

	/**
	 * Creates an array out of a multivalue property
	 * @param string $value
	 * @return array
	 */
	public static function unescapeSemicolons($value) {
		$array = explode(';', $value);
		$arrayCount = count($array);
		for($i = 0; $i < $arrayCount; $i++) {
			if(substr($array[$i], -2, 2)=="\\\\") {
				if(isset($array[$i+1])) {
					$array[$i] = substr($array[$i], 0, count($array[$i])-2).';'.$array[$i+1];
					unset($array[$i+1]);
				}
				else{
					$array[$i] = substr($array[$i], 0, count($array[$i])-2).';';
				}
				$i = $i - 1;
			}
		}
		return $array;
	}

	/**
	 * Constructor
	 * @param Sabre\VObject\Component|string $vobject_or_name
	 */
	public function __construct($vobject_or_name) {
		if (is_object($vobject_or_name)) {
			$this->vObject = $vobject_or_name;
		} else {
			switch($vobject_or_name){
				case 'VCALENDAR':
				case 'VTODO':
				case 'VEVENT':
				case 'VALARM':
				case 'VFREEBUSY':	
				case 'VJOURNAL':
				case 'VTIMEZONE':					
					$this->vcomponent = new Sabre\VObject\Component\VCalendar();
					break;	
				case 'VCARD':
					$this->vcomponent = new Sabre\VObject\Component\VCard();
					break;
				default:
				 	$this->vcomponent = new Sabre\VObject\Component\VCalendar();
					break;			
			}
				
			$this->vObject  = $this->vcomponent->createComponent($vobject_or_name);	
		}
	}

	/**
	 * @todo Write documentation
	 * @param \OC_VObject|\Sabre\VObject\Component $item
	 * @param null $itemValue
	 */
	public function add($item, $itemValue = null) {
		if ($item instanceof OC_VObject) {
			$item = $item->getVObject();
		}
		$this->vObject->add($item, $itemValue);
	}

	/**
	 * Add property to vobject
	 * @param object $name of property
	 * @param object $value of property
	 * @param array|object $parameters of property
	 * @return Sabre\VObject\Property newly created
	 */
	public function addProperty($name, $value, $parameters=array()) {
		if(is_array($value)) {
			$value = OC_VObject::escapeSemicolons($value);
		}
		
		$vcalendar = new Sabre\VObject\Component\VCalendar();
		$property = $vcalendar->createProperty( $name, $value );
		
		foreach($parameters as $name => $value) {
			$property->parameters[] = $vcalendar->createProperty( $name, $value );
		}


		$this->vObject->add($property);
		return $property;
	}

	public function setUID() {
		$uid = substr(md5(rand().time()), 0, 10);
		$this->vObject->add('UID', $uid);
	}

	/**
	 * @todo Write documentation
	 * @param mixed $name
	 * @param string $string
	 */
	public function setString($name, $string) {
		if ($string != '') {
			$string = strtr($string, array("\r\n"=>"\n"));
			$this->vObject->__set($name, $string);
		}else{
			$this->vObject->__unset($name);
		}
	}

	/**
	 * Sets or unsets the Date and Time for a property.
	 * When $datetime is set to 'now', use the current time
	 * When $datetime is null, unset the property
	 *
	 * @param string $name
	 * @param DateTime $datetime
	 * @param  $floating
	 * @return void
	 */
	public function setDateTime($name, $datetime, $floating=false) {
			
		if ($datetime == 'now') {
			$datetime = new \DateTime();
		}
		if ($datetime instanceof \DateTime) {
				$tThis=$this;
			if(!($tThis instanceof Sabre\VObject\Component)){
				$tThis=new Sabre\VObject\Component\VCalendar();
			}	
			$datetime_element = new Sabre\VObject\Property\ICalendar\DateTime($tThis,$name);
			$datetime_element->setDateTime($datetime, $floating);
			$this->vObject->__set($name,$datetime_element);
		}else{
			$this->vObject->__unset($name);
		}
		
		
		
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 * @return string
	 */
	public function getAsString($name) {
		return $this->vObject->__isset($name) ?
			$this->vObject->__get($name)->getValue() :
			'';
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 * @return array
	 */
	public function getAsArray($name) {
		$values = array();
		if ($this->vObject->__isset($name)) {
			$values = explode(',', $this->getAsString($name));
			$values = array_map('trim', $values);
		}
		return $values;
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 * @return array|OC_VObject|\Sabre\VObject\Property
	 */
	public function &__get($name) {
		if ($name == 'children') {
			return $this->vObject->children;
		}
		$return = $this->vObject->__get($name);
		if ($return instanceof Sabre\VObject\Component) {
			$return = new OC_VObject($return);
		}
		return $return;
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 * @param string $value
	 */
	public function __set($name, $value) {
		return $this->vObject->__set($name, $value);
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 */
	public function __unset($name) {
		return $this->vObject->__unset($name);
	}

	/**
	 * @todo Write documentation
	 * @param string $name
	 * @return bool
	 */
	public function __isset($name) {
		return $this->vObject->__isset($name);
	}

	/**
	 * @todo Write documentation
	 * @param callable $function
	 * @param array $arguments
	 * @return mixed
	 */
	public function __call($function, $arguments) {
		return call_user_func_array(array($this->vObject, $function), $arguments);
	}
}
