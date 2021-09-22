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
  public $activeDisplayAudienceSize;
  public $audienceSource;
  public $audienceType;
  public $description;
  public $displayAudienceSize;
  public $displayDesktopAudienceSize;
  public $displayMobileAppAudienceSize;
  public $displayMobileWebAudienceSize;
  public $displayName;
  public $firstAndThirdPartyAudienceId;
  public $firstAndThirdPartyAudienceType;
  public $gmailAudienceSize;
  public $membershipDurationDays;
  public $name;
  public $youtubeAudienceSize;

  public function setActiveDisplayAudienceSize($activeDisplayAudienceSize)
  {
    $this->activeDisplayAudienceSize = $activeDisplayAudienceSize;
  }
  public function getActiveDisplayAudienceSize()
  {
    return $this->activeDisplayAudienceSize;
  }
  public function setAudienceSource($audienceSource)
  {
    $this->audienceSource = $audienceSource;
  }
  public function getAudienceSource()
  {
    return $this->audienceSource;
  }
  public function setAudienceType($audienceType)
  {
    $this->audienceType = $audienceType;
  }
  public function getAudienceType()
  {
    return $this->audienceType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayAudienceSize($displayAudienceSize)
  {
    $this->displayAudienceSize = $displayAudienceSize;
  }
  public function getDisplayAudienceSize()
  {
    return $this->displayAudienceSize;
  }
  public function setDisplayDesktopAudienceSize($displayDesktopAudienceSize)
  {
    $this->displayDesktopAudienceSize = $displayDesktopAudienceSize;
  }
  public function getDisplayDesktopAudienceSize()
  {
    return $this->displayDesktopAudienceSize;
  }
  public function setDisplayMobileAppAudienceSize($displayMobileAppAudienceSize)
  {
    $this->displayMobileAppAudienceSize = $displayMobileAppAudienceSize;
  }
  public function getDisplayMobileAppAudienceSize()
  {
    return $this->displayMobileAppAudienceSize;
  }
  public function setDisplayMobileWebAudienceSize($displayMobileWebAudienceSize)
  {
    $this->displayMobileWebAudienceSize = $displayMobileWebAudienceSize;
  }
  public function getDisplayMobileWebAudienceSize()
  {
    return $this->displayMobileWebAudienceSize;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFirstAndThirdPartyAudienceId($firstAndThirdPartyAudienceId)
  {
    $this->firstAndThirdPartyAudienceId = $firstAndThirdPartyAudienceId;
  }
  public function getFirstAndThirdPartyAudienceId()
  {
    return $this->firstAndThirdPartyAudienceId;
  }
  public function setFirstAndThirdPartyAudienceType($firstAndThirdPartyAudienceType)
  {
    $this->firstAndThirdPartyAudienceType = $firstAndThirdPartyAudienceType;
  }
  public function getFirstAndThirdPartyAudienceType()
  {
    return $this->firstAndThirdPartyAudienceType;
  }
  public function setGmailAudienceSize($gmailAudienceSize)
  {
    $this->gmailAudienceSize = $gmailAudienceSize;
  }
  public function getGmailAudienceSize()
  {
    return $this->gmailAudienceSize;
  }
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setYoutubeAudienceSize($youtubeAudienceSize)
  {
    $this->youtubeAudienceSize = $youtubeAudienceSize;
  }
  public function getYoutubeAudienceSize()
  {
    return $this->youtubeAudienceSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirstAndThirdPartyAudience::class, 'Google_Service_DisplayVideo_FirstAndThirdPartyAudience');
