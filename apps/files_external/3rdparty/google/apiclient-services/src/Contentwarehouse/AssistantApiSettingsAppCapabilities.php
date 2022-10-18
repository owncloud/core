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

class AssistantApiSettingsAppCapabilities extends \Google\Model
{
  protected $carSettingsCapabilitiesType = AssistantApiCarSettingsCapabilities::class;
  protected $carSettingsCapabilitiesDataType = '';
  /**
   * @var bool
   */
  public $reissueQueryAfterMusicSetup;
  /**
   * @var bool
   */
  public $supportsPaymentsSettingsUpdate;

  /**
   * @param AssistantApiCarSettingsCapabilities
   */
  public function setCarSettingsCapabilities(AssistantApiCarSettingsCapabilities $carSettingsCapabilities)
  {
    $this->carSettingsCapabilities = $carSettingsCapabilities;
  }
  /**
   * @return AssistantApiCarSettingsCapabilities
   */
  public function getCarSettingsCapabilities()
  {
    return $this->carSettingsCapabilities;
  }
  /**
   * @param bool
   */
  public function setReissueQueryAfterMusicSetup($reissueQueryAfterMusicSetup)
  {
    $this->reissueQueryAfterMusicSetup = $reissueQueryAfterMusicSetup;
  }
  /**
   * @return bool
   */
  public function getReissueQueryAfterMusicSetup()
  {
    return $this->reissueQueryAfterMusicSetup;
  }
  /**
   * @param bool
   */
  public function setSupportsPaymentsSettingsUpdate($supportsPaymentsSettingsUpdate)
  {
    $this->supportsPaymentsSettingsUpdate = $supportsPaymentsSettingsUpdate;
  }
  /**
   * @return bool
   */
  public function getSupportsPaymentsSettingsUpdate()
  {
    return $this->supportsPaymentsSettingsUpdate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsAppCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsAppCapabilities');
