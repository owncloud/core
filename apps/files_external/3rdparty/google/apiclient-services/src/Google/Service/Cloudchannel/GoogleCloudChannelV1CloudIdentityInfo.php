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

class Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityInfo extends Google_Model
{
  public $adminConsoleUri;
  public $alternateEmail;
  public $customerType;
  protected $eduDataType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1EduData';
  protected $eduDataDataType = '';
  public $isDomainVerified;
  public $languageCode;
  public $phoneNumber;
  public $primaryDomain;

  public function setAdminConsoleUri($adminConsoleUri)
  {
    $this->adminConsoleUri = $adminConsoleUri;
  }
  public function getAdminConsoleUri()
  {
    return $this->adminConsoleUri;
  }
  public function setAlternateEmail($alternateEmail)
  {
    $this->alternateEmail = $alternateEmail;
  }
  public function getAlternateEmail()
  {
    return $this->alternateEmail;
  }
  public function setCustomerType($customerType)
  {
    $this->customerType = $customerType;
  }
  public function getCustomerType()
  {
    return $this->customerType;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1EduData
   */
  public function setEduData(Google_Service_Cloudchannel_GoogleCloudChannelV1EduData $eduData)
  {
    $this->eduData = $eduData;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1EduData
   */
  public function getEduData()
  {
    return $this->eduData;
  }
  public function setIsDomainVerified($isDomainVerified)
  {
    $this->isDomainVerified = $isDomainVerified;
  }
  public function getIsDomainVerified()
  {
    return $this->isDomainVerified;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setPrimaryDomain($primaryDomain)
  {
    $this->primaryDomain = $primaryDomain;
  }
  public function getPrimaryDomain()
  {
    return $this->primaryDomain;
  }
}
