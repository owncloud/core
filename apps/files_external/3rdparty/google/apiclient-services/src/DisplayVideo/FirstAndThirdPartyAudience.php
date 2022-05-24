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

namespace Google\Service\DisplayVideo;

class FirstAndThirdPartyAudience extends \Google\Model
{
  /**
   * @var string
   */
  public $activeDisplayAudienceSize;
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $audienceSource;
  /**
   * @var string
   */
  public $audienceType;
  protected $contactInfoListType = ContactInfoList::class;
  protected $contactInfoListDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayAudienceSize;
  /**
   * @var string
   */
  public $displayDesktopAudienceSize;
  /**
   * @var string
   */
  public $displayMobileAppAudienceSize;
  /**
   * @var string
   */
  public $displayMobileWebAudienceSize;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $firstAndThirdPartyAudienceId;
  /**
   * @var string
   */
  public $firstAndThirdPartyAudienceType;
  /**
   * @var string
   */
  public $gmailAudienceSize;
  /**
   * @var string
   */
  public $membershipDurationDays;
  protected $mobileDeviceIdListType = MobileDeviceIdList::class;
  protected $mobileDeviceIdListDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $youtubeAudienceSize;

  /**
   * @param string
   */
  public function setActiveDisplayAudienceSize($activeDisplayAudienceSize)
  {
    $this->activeDisplayAudienceSize = $activeDisplayAudienceSize;
  }
  /**
   * @return string
   */
  public function getActiveDisplayAudienceSize()
  {
    return $this->activeDisplayAudienceSize;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setAudienceSource($audienceSource)
  {
    $this->audienceSource = $audienceSource;
  }
  /**
   * @return string
   */
  public function getAudienceSource()
  {
    return $this->audienceSource;
  }
  /**
   * @param string
   */
  public function setAudienceType($audienceType)
  {
    $this->audienceType = $audienceType;
  }
  /**
   * @return string
   */
  public function getAudienceType()
  {
    return $this->audienceType;
  }
  /**
   * @param ContactInfoList
   */
  public function setContactInfoList(ContactInfoList $contactInfoList)
  {
    $this->contactInfoList = $contactInfoList;
  }
  /**
   * @return ContactInfoList
   */
  public function getContactInfoList()
  {
    return $this->contactInfoList;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayAudienceSize($displayAudienceSize)
  {
    $this->displayAudienceSize = $displayAudienceSize;
  }
  /**
   * @return string
   */
  public function getDisplayAudienceSize()
  {
    return $this->displayAudienceSize;
  }
  /**
   * @param string
   */
  public function setDisplayDesktopAudienceSize($displayDesktopAudienceSize)
  {
    $this->displayDesktopAudienceSize = $displayDesktopAudienceSize;
  }
  /**
   * @return string
   */
  public function getDisplayDesktopAudienceSize()
  {
    return $this->displayDesktopAudienceSize;
  }
  /**
   * @param string
   */
  public function setDisplayMobileAppAudienceSize($displayMobileAppAudienceSize)
  {
    $this->displayMobileAppAudienceSize = $displayMobileAppAudienceSize;
  }
  /**
   * @return string
   */
  public function getDisplayMobileAppAudienceSize()
  {
    return $this->displayMobileAppAudienceSize;
  }
  /**
   * @param string
   */
  public function setDisplayMobileWebAudienceSize($displayMobileWebAudienceSize)
  {
    $this->displayMobileWebAudienceSize = $displayMobileWebAudienceSize;
  }
  /**
   * @return string
   */
  public function getDisplayMobileWebAudienceSize()
  {
    return $this->displayMobileWebAudienceSize;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFirstAndThirdPartyAudienceId($firstAndThirdPartyAudienceId)
  {
    $this->firstAndThirdPartyAudienceId = $firstAndThirdPartyAudienceId;
  }
  /**
   * @return string
   */
  public function getFirstAndThirdPartyAudienceId()
  {
    return $this->firstAndThirdPartyAudienceId;
  }
  /**
   * @param string
   */
  public function setFirstAndThirdPartyAudienceType($firstAndThirdPartyAudienceType)
  {
    $this->firstAndThirdPartyAudienceType = $firstAndThirdPartyAudienceType;
  }
  /**
   * @return string
   */
  public function getFirstAndThirdPartyAudienceType()
  {
    return $this->firstAndThirdPartyAudienceType;
  }
  /**
   * @param string
   */
  public function setGmailAudienceSize($gmailAudienceSize)
  {
    $this->gmailAudienceSize = $gmailAudienceSize;
  }
  /**
   * @return string
   */
  public function getGmailAudienceSize()
  {
    return $this->gmailAudienceSize;
  }
  /**
   * @param string
   */
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  /**
   * @return string
   */
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
  }
  /**
   * @param MobileDeviceIdList
   */
  public function setMobileDeviceIdList(MobileDeviceIdList $mobileDeviceIdList)
  {
    $this->mobileDeviceIdList = $mobileDeviceIdList;
  }
  /**
   * @return MobileDeviceIdList
   */
  public function getMobileDeviceIdList()
  {
    return $this->mobileDeviceIdList;
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
  public function setYoutubeAudienceSize($youtubeAudienceSize)
  {
    $this->youtubeAudienceSize = $youtubeAudienceSize;
  }
  /**
   * @return string
   */
  public function getYoutubeAudienceSize()
  {
    return $this->youtubeAudienceSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirstAndThirdPartyAudience::class, 'Google_Service_DisplayVideo_FirstAndThirdPartyAudience');
