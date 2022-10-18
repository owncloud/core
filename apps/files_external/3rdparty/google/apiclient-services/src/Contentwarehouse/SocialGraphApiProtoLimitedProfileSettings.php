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

namespace Google\Service\Contentwarehouse;

class SocialGraphApiProtoLimitedProfileSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $disableReason;
  /**
   * @var bool
   */
  public $gpayOobe;
  /**
   * @var string
   */
  public $lastUpdateTime;
  /**
   * @var string
   */
  public $legacyDiscoverability;
  /**
   * @var bool
   */
  public $myAccount;
  protected $nameSettingsType = SocialGraphApiProtoLimitedProfileNameSettings::class;
  protected $nameSettingsDataType = '';
  protected $profilePictureSettingsType = SocialGraphApiProtoLimitedProfilePictureSettings::class;
  protected $profilePictureSettingsDataType = '';

  /**
   * @param string
   */
  public function setDisableReason($disableReason)
  {
    $this->disableReason = $disableReason;
  }
  /**
   * @return string
   */
  public function getDisableReason()
  {
    return $this->disableReason;
  }
  /**
   * @param bool
   */
  public function setGpayOobe($gpayOobe)
  {
    $this->gpayOobe = $gpayOobe;
  }
  /**
   * @return bool
   */
  public function getGpayOobe()
  {
    return $this->gpayOobe;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param string
   */
  public function setLegacyDiscoverability($legacyDiscoverability)
  {
    $this->legacyDiscoverability = $legacyDiscoverability;
  }
  /**
   * @return string
   */
  public function getLegacyDiscoverability()
  {
    return $this->legacyDiscoverability;
  }
  /**
   * @param bool
   */
  public function setMyAccount($myAccount)
  {
    $this->myAccount = $myAccount;
  }
  /**
   * @return bool
   */
  public function getMyAccount()
  {
    return $this->myAccount;
  }
  /**
   * @param SocialGraphApiProtoLimitedProfileNameSettings
   */
  public function setNameSettings(SocialGraphApiProtoLimitedProfileNameSettings $nameSettings)
  {
    $this->nameSettings = $nameSettings;
  }
  /**
   * @return SocialGraphApiProtoLimitedProfileNameSettings
   */
  public function getNameSettings()
  {
    return $this->nameSettings;
  }
  /**
   * @param SocialGraphApiProtoLimitedProfilePictureSettings
   */
  public function setProfilePictureSettings(SocialGraphApiProtoLimitedProfilePictureSettings $profilePictureSettings)
  {
    $this->profilePictureSettings = $profilePictureSettings;
  }
  /**
   * @return SocialGraphApiProtoLimitedProfilePictureSettings
   */
  public function getProfilePictureSettings()
  {
    return $this->profilePictureSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoLimitedProfileSettings::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoLimitedProfileSettings');
