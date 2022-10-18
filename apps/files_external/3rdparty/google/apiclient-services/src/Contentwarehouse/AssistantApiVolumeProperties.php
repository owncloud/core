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

class AssistantApiVolumeProperties extends \Google\Model
{
  /**
   * @var int
   */
  public $defaultVolumePercentage;
  /**
   * @var int
   */
  public $highVolumePercentage;
  public $levelStepSize;
  /**
   * @var int
   */
  public $lowVolumePercentage;
  /**
   * @var int
   */
  public $maximumVolumeLevel;
  /**
   * @var int
   */
  public $mediumVolumePercentage;
  /**
   * @var int
   */
  public $veryHighVolumePercentage;
  /**
   * @var int
   */
  public $veryLowVolumePercentage;

  /**
   * @param int
   */
  public function setDefaultVolumePercentage($defaultVolumePercentage)
  {
    $this->defaultVolumePercentage = $defaultVolumePercentage;
  }
  /**
   * @return int
   */
  public function getDefaultVolumePercentage()
  {
    return $this->defaultVolumePercentage;
  }
  /**
   * @param int
   */
  public function setHighVolumePercentage($highVolumePercentage)
  {
    $this->highVolumePercentage = $highVolumePercentage;
  }
  /**
   * @return int
   */
  public function getHighVolumePercentage()
  {
    return $this->highVolumePercentage;
  }
  public function setLevelStepSize($levelStepSize)
  {
    $this->levelStepSize = $levelStepSize;
  }
  public function getLevelStepSize()
  {
    return $this->levelStepSize;
  }
  /**
   * @param int
   */
  public function setLowVolumePercentage($lowVolumePercentage)
  {
    $this->lowVolumePercentage = $lowVolumePercentage;
  }
  /**
   * @return int
   */
  public function getLowVolumePercentage()
  {
    return $this->lowVolumePercentage;
  }
  /**
   * @param int
   */
  public function setMaximumVolumeLevel($maximumVolumeLevel)
  {
    $this->maximumVolumeLevel = $maximumVolumeLevel;
  }
  /**
   * @return int
   */
  public function getMaximumVolumeLevel()
  {
    return $this->maximumVolumeLevel;
  }
  /**
   * @param int
   */
  public function setMediumVolumePercentage($mediumVolumePercentage)
  {
    $this->mediumVolumePercentage = $mediumVolumePercentage;
  }
  /**
   * @return int
   */
  public function getMediumVolumePercentage()
  {
    return $this->mediumVolumePercentage;
  }
  /**
   * @param int
   */
  public function setVeryHighVolumePercentage($veryHighVolumePercentage)
  {
    $this->veryHighVolumePercentage = $veryHighVolumePercentage;
  }
  /**
   * @return int
   */
  public function getVeryHighVolumePercentage()
  {
    return $this->veryHighVolumePercentage;
  }
  /**
   * @param int
   */
  public function setVeryLowVolumePercentage($veryLowVolumePercentage)
  {
    $this->veryLowVolumePercentage = $veryLowVolumePercentage;
  }
  /**
   * @return int
   */
  public function getVeryLowVolumePercentage()
  {
    return $this->veryLowVolumePercentage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiVolumeProperties::class, 'Google_Service_Contentwarehouse_AssistantApiVolumeProperties');
