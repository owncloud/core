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

class AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty extends \Google\Collection
{
  protected $collection_key = 'supportedSettings';
  /**
   * @var bool
   */
  public $skipAndroidAndGsaVersionCheck;
  /**
   * @var string[]
   */
  public $supportedSettings;
  /**
   * @var bool
   */
  public $supportsDoNotDisturbWithDuration;
  /**
   * @var bool
   */
  public $supportsMuteUnmute;

  /**
   * @param bool
   */
  public function setSkipAndroidAndGsaVersionCheck($skipAndroidAndGsaVersionCheck)
  {
    $this->skipAndroidAndGsaVersionCheck = $skipAndroidAndGsaVersionCheck;
  }
  /**
   * @return bool
   */
  public function getSkipAndroidAndGsaVersionCheck()
  {
    return $this->skipAndroidAndGsaVersionCheck;
  }
  /**
   * @param string[]
   */
  public function setSupportedSettings($supportedSettings)
  {
    $this->supportedSettings = $supportedSettings;
  }
  /**
   * @return string[]
   */
  public function getSupportedSettings()
  {
    return $this->supportedSettings;
  }
  /**
   * @param bool
   */
  public function setSupportsDoNotDisturbWithDuration($supportsDoNotDisturbWithDuration)
  {
    $this->supportsDoNotDisturbWithDuration = $supportsDoNotDisturbWithDuration;
  }
  /**
   * @return bool
   */
  public function getSupportsDoNotDisturbWithDuration()
  {
    return $this->supportsDoNotDisturbWithDuration;
  }
  /**
   * @param bool
   */
  public function setSupportsMuteUnmute($supportsMuteUnmute)
  {
    $this->supportsMuteUnmute = $supportsMuteUnmute;
  }
  /**
   * @return bool
   */
  public function getSupportsMuteUnmute()
  {
    return $this->supportsMuteUnmute;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty::class, 'Google_Service_Contentwarehouse_AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty');
