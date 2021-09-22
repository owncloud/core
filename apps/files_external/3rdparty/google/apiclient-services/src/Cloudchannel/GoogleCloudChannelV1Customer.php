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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1Customer extends \Google\Model
{
  public $alternateEmail;
  public $channelPartnerId;
  public $cloudIdentityId;
  protected $cloudIdentityInfoType = GoogleCloudChannelV1CloudIdentityInfo::class;
  protected $cloudIdentityInfoDataType = '';
  public $createTime;
  public $domain;
  public $languageCode;
  public $name;
  public $orgDisplayName;
  protected $orgPostalAddressType = GoogleTypePostalAddress::class;
  protected $orgPostalAddressDataType = '';
  protected $primaryContactInfoType = GoogleCloudChannelV1ContactInfo::class;
  protected $primaryContactInfoDataType = '';
  public $updateTime;

  public function setAlternateEmail($alternateEmail)
  {
    $this->alternateEmail = $alternateEmail;
  }
  public function getAlternateEmail()
  {
    return $this->alternateEmail;
  }
  public function setChannelPartnerId($channelPartnerId)
  {
    $this->channelPartnerId = $channelPartnerId;
  }
  public function getChannelPartnerId()
  {
    return $this->channelPartnerId;
  }
  public function setCloudIdentityId($cloudIdentityId)
  {
    $this->cloudIdentityId = $cloudIdentityId;
  }
  public function getCloudIdentityId()
  {
    return $this->cloudIdentityId;
  }
  /**
   * @param GoogleCloudChannelV1CloudIdentityInfo
   */
  public function setCloudIdentityInfo(GoogleCloudChannelV1CloudIdentityInfo $cloudIdentityInfo)
  {
    $this->cloudIdentityInfo = $cloudIdentityInfo;
  }
  /**
   * @return GoogleCloudChannelV1CloudIdentityInfo
   */
  public function getCloudIdentityInfo()
  {
    return $this->cloudIdentityInfo;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrgDisplayName($orgDisplayName)
  {
    $this->orgDisplayName = $orgDisplayName;
  }
  public function getOrgDisplayName()
  {
    return $this->orgDisplayName;
  }
  /**
   * @param GoogleTypePostalAddress
   */
  public function setOrgPostalAddress(GoogleTypePostalAddress $orgPostalAddress)
  {
    $this->orgPostalAddress = $orgPostalAddress;
  }
  /**
   * @return GoogleTypePostalAddress
   */
  public function getOrgPostalAddress()
  {
    return $this->orgPostalAddress;
  }
  /**
   * @param GoogleCloudChannelV1ContactInfo
   */
  public function setPrimaryContactInfo(GoogleCloudChannelV1ContactInfo $primaryContactInfo)
  {
    $this->primaryContactInfo = $primaryContactInfo;
  }
  /**
   * @return GoogleCloudChannelV1ContactInfo
   */
  public function getPrimaryContactInfo()
  {
    return $this->primaryContactInfo;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1Customer::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1Customer');
