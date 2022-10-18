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

namespace Google\Service\Contentwarehouse;

class PostalAddress extends \Google\Collection
{
  protected $collection_key = 'addressLine';
  /**
   * @var string[]
   */
  public $addressLine;
  /**
   * @var string
   */
  public $administrativeAreaName;
  /**
   * @var string
   */
  public $countryName;
  /**
   * @var string
   */
  public $countryNameCode;
  /**
   * @var string
   */
  public $dependentLocalityName;
  /**
   * @var string
   */
  public $dependentThoroughfareName;
  /**
   * @var string
   */
  public $firmName;
  /**
   * @var bool
   */
  public $isDisputed;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $localityName;
  /**
   * @var string
   */
  public $postBoxNumber;
  /**
   * @var string
   */
  public $postalCodeNumber;
  /**
   * @var string
   */
  public $postalCodeNumberExtension;
  /**
   * @var string
   */
  public $premiseName;
  /**
   * @var string
   */
  public $recipientName;
  /**
   * @var string
   */
  public $sortingCode;
  /**
   * @var string
   */
  public $subAdministrativeAreaName;
  /**
   * @var string
   */
  public $subPremiseName;
  /**
   * @var string
   */
  public $thoroughfareName;
  /**
   * @var string
   */
  public $thoroughfareNumber;

  /**
   * @param string[]
   */
  public function setAddressLine($addressLine)
  {
    $this->addressLine = $addressLine;
  }
  /**
   * @return string[]
   */
  public function getAddressLine()
  {
    return $this->addressLine;
  }
  /**
   * @param string
   */
  public function setAdministrativeAreaName($administrativeAreaName)
  {
    $this->administrativeAreaName = $administrativeAreaName;
  }
  /**
   * @return string
   */
  public function getAdministrativeAreaName()
  {
    return $this->administrativeAreaName;
  }
  /**
   * @param string
   */
  public function setCountryName($countryName)
  {
    $this->countryName = $countryName;
  }
  /**
   * @return string
   */
  public function getCountryName()
  {
    return $this->countryName;
  }
  /**
   * @param string
   */
  public function setCountryNameCode($countryNameCode)
  {
    $this->countryNameCode = $countryNameCode;
  }
  /**
   * @return string
   */
  public function getCountryNameCode()
  {
    return $this->countryNameCode;
  }
  /**
   * @param string
   */
  public function setDependentLocalityName($dependentLocalityName)
  {
    $this->dependentLocalityName = $dependentLocalityName;
  }
  /**
   * @return string
   */
  public function getDependentLocalityName()
  {
    return $this->dependentLocalityName;
  }
  /**
   * @param string
   */
  public function setDependentThoroughfareName($dependentThoroughfareName)
  {
    $this->dependentThoroughfareName = $dependentThoroughfareName;
  }
  /**
   * @return string
   */
  public function getDependentThoroughfareName()
  {
    return $this->dependentThoroughfareName;
  }
  /**
   * @param string
   */
  public function setFirmName($firmName)
  {
    $this->firmName = $firmName;
  }
  /**
   * @return string
   */
  public function getFirmName()
  {
    return $this->firmName;
  }
  /**
   * @param bool
   */
  public function setIsDisputed($isDisputed)
  {
    $this->isDisputed = $isDisputed;
  }
  /**
   * @return bool
   */
  public function getIsDisputed()
  {
    return $this->isDisputed;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLocalityName($localityName)
  {
    $this->localityName = $localityName;
  }
  /**
   * @return string
   */
  public function getLocalityName()
  {
    return $this->localityName;
  }
  /**
   * @param string
   */
  public function setPostBoxNumber($postBoxNumber)
  {
    $this->postBoxNumber = $postBoxNumber;
  }
  /**
   * @return string
   */
  public function getPostBoxNumber()
  {
    return $this->postBoxNumber;
  }
  /**
   * @param string
   */
  public function setPostalCodeNumber($postalCodeNumber)
  {
    $this->postalCodeNumber = $postalCodeNumber;
  }
  /**
   * @return string
   */
  public function getPostalCodeNumber()
  {
    return $this->postalCodeNumber;
  }
  /**
   * @param string
   */
  public function setPostalCodeNumberExtension($postalCodeNumberExtension)
  {
    $this->postalCodeNumberExtension = $postalCodeNumberExtension;
  }
  /**
   * @return string
   */
  public function getPostalCodeNumberExtension()
  {
    return $this->postalCodeNumberExtension;
  }
  /**
   * @param string
   */
  public function setPremiseName($premiseName)
  {
    $this->premiseName = $premiseName;
  }
  /**
   * @return string
   */
  public function getPremiseName()
  {
    return $this->premiseName;
  }
  /**
   * @param string
   */
  public function setRecipientName($recipientName)
  {
    $this->recipientName = $recipientName;
  }
  /**
   * @return string
   */
  public function getRecipientName()
  {
    return $this->recipientName;
  }
  /**
   * @param string
   */
  public function setSortingCode($sortingCode)
  {
    $this->sortingCode = $sortingCode;
  }
  /**
   * @return string
   */
  public function getSortingCode()
  {
    return $this->sortingCode;
  }
  /**
   * @param string
   */
  public function setSubAdministrativeAreaName($subAdministrativeAreaName)
  {
    $this->subAdministrativeAreaName = $subAdministrativeAreaName;
  }
  /**
   * @return string
   */
  public function getSubAdministrativeAreaName()
  {
    return $this->subAdministrativeAreaName;
  }
  /**
   * @param string
   */
  public function setSubPremiseName($subPremiseName)
  {
    $this->subPremiseName = $subPremiseName;
  }
  /**
   * @return string
   */
  public function getSubPremiseName()
  {
    return $this->subPremiseName;
  }
  /**
   * @param string
   */
  public function setThoroughfareName($thoroughfareName)
  {
    $this->thoroughfareName = $thoroughfareName;
  }
  /**
   * @return string
   */
  public function getThoroughfareName()
  {
    return $this->thoroughfareName;
  }
  /**
   * @param string
   */
  public function setThoroughfareNumber($thoroughfareNumber)
  {
    $this->thoroughfareNumber = $thoroughfareNumber;
  }
  /**
   * @return string
   */
  public function getThoroughfareNumber()
  {
    return $this->thoroughfareNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostalAddress::class, 'Google_Service_Contentwarehouse_PostalAddress');
