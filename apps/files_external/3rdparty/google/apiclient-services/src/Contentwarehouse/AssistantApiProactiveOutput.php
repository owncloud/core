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

class AssistantApiProactiveOutput extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowAllPersonalData;
  /**
   * @var string
   */
  public $androidTvAssistantSettingsSource;
  /**
   * @var string
   */
  public $healthAndFitnessProactive;
  /**
   * @var string
   */
  public $photosProactive;
  /**
   * @var bool
   */
  public $supportsProactiveOutput;
  /**
   * @var string
   */
  public $userMatchProactive;

  /**
   * @param bool
   */
  public function setAllowAllPersonalData($allowAllPersonalData)
  {
    $this->allowAllPersonalData = $allowAllPersonalData;
  }
  /**
   * @return bool
   */
  public function getAllowAllPersonalData()
  {
    return $this->allowAllPersonalData;
  }
  /**
   * @param string
   */
  public function setAndroidTvAssistantSettingsSource($androidTvAssistantSettingsSource)
  {
    $this->androidTvAssistantSettingsSource = $androidTvAssistantSettingsSource;
  }
  /**
   * @return string
   */
  public function getAndroidTvAssistantSettingsSource()
  {
    return $this->androidTvAssistantSettingsSource;
  }
  /**
   * @param string
   */
  public function setHealthAndFitnessProactive($healthAndFitnessProactive)
  {
    $this->healthAndFitnessProactive = $healthAndFitnessProactive;
  }
  /**
   * @return string
   */
  public function getHealthAndFitnessProactive()
  {
    return $this->healthAndFitnessProactive;
  }
  /**
   * @param string
   */
  public function setPhotosProactive($photosProactive)
  {
    $this->photosProactive = $photosProactive;
  }
  /**
   * @return string
   */
  public function getPhotosProactive()
  {
    return $this->photosProactive;
  }
  /**
   * @param bool
   */
  public function setSupportsProactiveOutput($supportsProactiveOutput)
  {
    $this->supportsProactiveOutput = $supportsProactiveOutput;
  }
  /**
   * @return bool
   */
  public function getSupportsProactiveOutput()
  {
    return $this->supportsProactiveOutput;
  }
  /**
   * @param string
   */
  public function setUserMatchProactive($userMatchProactive)
  {
    $this->userMatchProactive = $userMatchProactive;
  }
  /**
   * @return string
   */
  public function getUserMatchProactive()
  {
    return $this->userMatchProactive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiProactiveOutput::class, 'Google_Service_Contentwarehouse_AssistantApiProactiveOutput');
