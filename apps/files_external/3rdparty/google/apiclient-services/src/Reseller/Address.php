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

namespace Google\Service\Reseller;

class Address extends \Google\Model
{
  /**
   * @var string
   */
  public $addressLine1;
  /**
   * @var string
   */
  public $addressLine2;
  /**
   * @var string
   */
  public $addressLine3;
  /**
   * @var string
   */
  public $contactName;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $organizationName;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var string
   */
  public $region;

  /**
   * @param string
   */
  public function setAddressLine1($addressLine1)
  {
    $this->addressLine1 = $addressLine1;
  }
  /**
   * @return string
   */
  public function getAddressLine1()
  {
    return $this->addressLine1;
  }
  /**
   * @param string
   */
  public function setAddressLine2($addressLine2)
  {
    $this->addressLine2 = $addressLine2;
  }
  /**
   * @return string
   */
  public function getAddressLine2()
  {
    return $this->addressLine2;
  }
  /**
   * @param string
   */
  public function setAddressLine3($addressLine3)
  {
    $this->addressLine3 = $addressLine3;
  }
  /**
   * @return string
   */
  public function getAddressLine3()
  {
    return $this->addressLine3;
  }
  /**
   * @param string
   */
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
  }
  /**
   * @return string
   */
  public function getContactName()
  {
    return $this->contactName;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  /**
   * @return string
   */
  public function getOrganizationName()
  {
    return $this->organizationName;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Address::class, 'Google_Service_Reseller_Address');
