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

class Google_Service_CertificateAuthorityService_Subject extends Google_Model
{
  public $countryCode;
  public $locality;
  public $organization;
  public $organizationalUnit;
  public $postalCode;
  public $province;
  public $streetAddress;

  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  public function getLocality()
  {
    return $this->locality;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  public function getOrganization()
  {
    return $this->organization;
  }
  public function setOrganizationalUnit($organizationalUnit)
  {
    $this->organizationalUnit = $organizationalUnit;
  }
  public function getOrganizationalUnit()
  {
    return $this->organizationalUnit;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  public function setProvince($province)
  {
    $this->province = $province;
  }
  public function getProvince()
  {
    return $this->province;
  }
  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }
  public function getStreetAddress()
  {
    return $this->streetAddress;
  }
}
