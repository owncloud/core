<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Directory;

class UserAddress extends \Google\Model
{
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $customType;
  /**
   * @var string
   */
  public $extendedAddress;
  /**
   * @var string
   */
  public $formatted;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $poBox;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var string
   */
  public $region;
  /**
   * @var bool
   */
  public $sourceIsStructured;
  /**
   * @var string
   */
  public $streetAddress;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }
  /**
   * @return string
   */
  public function getCustomType()
  {
    return $this->customType;
  }
  /**
   * @param string
   */
  public function setExtendedAddress($extendedAddress)
  {
    $this->extendedAddress = $extendedAddress;
  }
  /**
   * @return string
   */
  public function getExtendedAddress()
  {
    return $this->extendedAddress;
  }
  /**
   * @param string
   */
  public function setFormatted($formatted)
  {
    $this->formatted = $formatted;
  }
  /**
   * @return string
   */
  public function getFormatted()
  {
    return $this->formatted;
  }
  /**
   * @param string
   */
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return string
   */
  public function getLocality()
  {
    return $this->locality;
  }
  /**
   * @param string
   */
  public function setPoBox($poBox)
  {
    $this->poBox = $poBox;
  }
  /**
   * @return string
   */
  public function getPoBox()
  {
    return $this->poBox;
  }
  /**
   * @param string
   */
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  /**
   * @return string
   */
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param bool
   */
  public function setSourceIsStructured($sourceIsStructured)
  {
    $this->sourceIsStructured = $sourceIsStructured;
  }
  /**
   * @return bool
   */
  public function getSourceIsStructured()
  {
    return $this->sourceIsStructured;
  }
  /**
   * @param string
   */
  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }
  /**
   * @return string
   */
  public function getStreetAddress()
  {
    return $this->streetAddress;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserAddress::class, 'Google_Service_Directory_UserAddress');
