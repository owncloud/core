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
  /**
   * @var string
   */
  public $alternateEmail;
  /**
   * @var string
   */
  public $channelPartnerId;
  /**
   * @var string
   */
  public $cloudIdentityId;
  protected $cloudIdentityInfoType = GoogleCloudChannelV1CloudIdentityInfo::class;
  protected $cloudIdentityInfoDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $orgDisplayName;
  protected $orgPostalAddressType = GoogleTypePostalAddress::class;
  protected $orgPostalAddressDataType = '';
  protected $primaryContactInfoType = GoogleCloudChannelV1ContactInfo::class;
  protected $primaryContactInfoDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAlternateEmail($alternateEmail)
  {
    $this->alternateEmail = $alternateEmail;
  }
  /**
   * @return string
   */
  public function getAlternateEmail()
  {
    return $this->alternateEmail;
  }
  /**
   * @param string
   */
  public function setChannelPartnerId($channelPartnerId)
  {
    $this->channelPartnerId = $channelPartnerId;
  }
  /**
   * @return string
   */
  public function getChannelPartnerId()
  {
    return $this->channelPartnerId;
  }
  /**
   * @param string
   */
  public function setCloudIdentityId($cloudIdentityId)
  {
    $this->cloudIdentityId = $cloudIdentityId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOrgDisplayName($orgDisplayName)
  {
    $this->orgDisplayName = $orgDisplayName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1Customer::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1Customer');
