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

namespace Google\Service\CertificateAuthorityService;

class Subject extends \Google\Model
{
  /**
   * @var string
   */
  public $commonName;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $locality;
  /**
   * @var string
   */
  public $organization;
  /**
   * @var string
   */
  public $organizationalUnit;
  /**
   * @var string
   */
  public $postalCode;
  /**
   * @var string
   */
  public $province;
  /**
   * @var string
   */
  public $streetAddress;

  /**
   * @param string
   */
  public function setCommonName($commonName)
  {
    $this->commonName = $commonName;
  }
  /**
   * @return string
   */
  public function getCommonName()
  {
    return $this->commonName;
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
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return string
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param string
   */
  public function setOrganizationalUnit($organizationalUnit)
  {
    $this->organizationalUnit = $organizationalUnit;
  }
  /**
   * @return string
   */
  public function getOrganizationalUnit()
  {
    return $this->organizationalUnit;
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
  public function setProvince($province)
  {
    $this->province = $province;
  }
  /**
   * @return string
   */
  public function getProvince()
  {
    return $this->province;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subject::class, 'Google_Service_CertificateAuthorityService_Subject');
