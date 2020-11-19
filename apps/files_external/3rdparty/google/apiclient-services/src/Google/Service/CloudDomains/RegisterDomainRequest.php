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

class Google_Service_CloudDomains_RegisterDomainRequest extends Google_Collection
{
  protected $collection_key = 'domainNotices';
  public $contactNotices;
  public $domainNotices;
  protected $registrationType = 'Google_Service_CloudDomains_Registration';
  protected $registrationDataType = '';
  public $validateOnly;
  protected $yearlyPriceType = 'Google_Service_CloudDomains_Money';
  protected $yearlyPriceDataType = '';

  public function setContactNotices($contactNotices)
  {
    $this->contactNotices = $contactNotices;
  }
  public function getContactNotices()
  {
    return $this->contactNotices;
  }
  public function setDomainNotices($domainNotices)
  {
    $this->domainNotices = $domainNotices;
  }
  public function getDomainNotices()
  {
    return $this->domainNotices;
  }
  /**
   * @param Google_Service_CloudDomains_Registration
   */
  public function setRegistration(Google_Service_CloudDomains_Registration $registration)
  {
    $this->registration = $registration;
  }
  /**
   * @return Google_Service_CloudDomains_Registration
   */
  public function getRegistration()
  {
    return $this->registration;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
  /**
   * @param Google_Service_CloudDomains_Money
   */
  public function setYearlyPrice(Google_Service_CloudDomains_Money $yearlyPrice)
  {
    $this->yearlyPrice = $yearlyPrice;
  }
  /**
   * @return Google_Service_CloudDomains_Money
   */
  public function getYearlyPrice()
  {
    return $this->yearlyPrice;
  }
}
