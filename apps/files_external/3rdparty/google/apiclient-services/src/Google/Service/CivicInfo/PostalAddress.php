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

class Google_Service_CivicInfo_PostalAddress extends Google_Collection
{
  protected $collection_key = 'addressLines';
  public $addressLines;
  public $administrativeAreaName;
  public $countryName;
  public $countryNameCode;
  public $dependentLocalityName;
  public $dependentThoroughfareName;
  public $firmName;
  public $isDisputed;
  public $languageCode;
  public $localityName;
  public $postBoxNumber;
  public $postalCodeNumber;
  public $postalCodeNumberExtension;
  public $premiseName;
  public $recipientName;
  public $sortingCode;
  public $subAdministrativeAreaName;
  public $subPremiseName;
  public $thoroughfareName;
  public $thoroughfareNumber;

  public function setAddressLines($addressLines)
  {
    $this->addressLines = $addressLines;
  }
  public function getAddressLines()
  {
    return $this->addressLines;
  }
  public function setAdministrativeAreaName($administrativeAreaName)
  {
    $this->administrativeAreaName = $administrativeAreaName;
  }
  public function getAdministrativeAreaName()
  {
    return $this->administrativeAreaName;
  }
  public function setCountryName($countryName)
  {
    $this->countryName = $countryName;
  }
  public function getCountryName()
  {
    return $this->countryName;
  }
  public function setCountryNameCode($countryNameCode)
  {
    $this->countryNameCode = $countryNameCode;
  }
  public function getCountryNameCode()
  {
    return $this->countryNameCode;
  }
  public function setDependentLocalityName($dependentLocalityName)
  {
    $this->dependentLocalityName = $dependentLocalityName;
  }
  public function getDependentLocalityName()
  {
    return $this->dependentLocalityName;
  }
  public function setDependentThoroughfareName($dependentThoroughfareName)
  {
    $this->dependentThoroughfareName = $dependentThoroughfareName;
  }
  public function getDependentThoroughfareName()
  {
    return $this->dependentThoroughfareName;
  }
  public function setFirmName($firmName)
  {
    $this->firmName = $firmName;
  }
  public function getFirmName()
  {
    return $this->firmName;
  }
  public function setIsDisputed($isDisputed)
  {
    $this->isDisputed = $isDisputed;
  }
  public function getIsDisputed()
  {
    return $this->isDisputed;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setLocalityName($localityName)
  {
    $this->localityName = $localityName;
  }
  public function getLocalityName()
  {
    return $this->localityName;
  }
  public function setPostBoxNumber($postBoxNumber)
  {
    $this->postBoxNumber = $postBoxNumber;
  }
  public function getPostBoxNumber()
  {
    return $this->postBoxNumber;
  }
  public function setPostalCodeNumber($postalCodeNumber)
  {
    $this->postalCodeNumber = $postalCodeNumber;
  }
  public function getPostalCodeNumber()
  {
    return $this->postalCodeNumber;
  }
  public function setPostalCodeNumberExtension($postalCodeNumberExtension)
  {
    $this->postalCodeNumberExtension = $postalCodeNumberExtension;
  }
  public function getPostalCodeNumberExtension()
  {
    return $this->postalCodeNumberExtension;
  }
  public function setPremiseName($premiseName)
  {
    $this->premiseName = $premiseName;
  }
  public function getPremiseName()
  {
    return $this->premiseName;
  }
  public function setRecipientName($recipientName)
  {
    $this->recipientName = $recipientName;
  }
  public function getRecipientName()
  {
    return $this->recipientName;
  }
  public function setSortingCode($sortingCode)
  {
    $this->sortingCode = $sortingCode;
  }
  public function getSortingCode()
  {
    return $this->sortingCode;
  }
  public function setSubAdministrativeAreaName($subAdministrativeAreaName)
  {
    $this->subAdministrativeAreaName = $subAdministrativeAreaName;
  }
  public function getSubAdministrativeAreaName()
  {
    return $this->subAdministrativeAreaName;
  }
  public function setSubPremiseName($subPremiseName)
  {
    $this->subPremiseName = $subPremiseName;
  }
  public function getSubPremiseName()
  {
    return $this->subPremiseName;
  }
  public function setThoroughfareName($thoroughfareName)
  {
    $this->thoroughfareName = $thoroughfareName;
  }
  public function getThoroughfareName()
  {
    return $this->thoroughfareName;
  }
  public function setThoroughfareNumber($thoroughfareNumber)
  {
    $this->thoroughfareNumber = $thoroughfareNumber;
  }
  public function getThoroughfareNumber()
  {
    return $this->thoroughfareNumber;
  }
}
