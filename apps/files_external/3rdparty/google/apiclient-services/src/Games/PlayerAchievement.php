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

namespace Google\Service\Games;

class PlayerAchievement extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementState;
  /**
   * @var int
   */
  public $currentSteps;
  /**
   * @var string
   */
  public $experiencePoints;
  /**
   * @var string
   */
  public $formattedCurrentStepsString;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastUpdatedTimestamp;

  /**
   * @param string
   */
  public function setAchievementState($achievementState)
  {
    $this->achievementState = $achievementState;
  }
  /**
   * @return string
   */
  public function getAchievementState()
  {
    return $this->achievementState;
  }
  /**
   * @param int
   */
  public function setCurrentSteps($currentSteps)
  {
    $this->currentSteps = $currentSteps;
  }
  /**
   * @return int
   */
  public function getCurrentSteps()
  {
    return $this->currentSteps;
  }
  /**
   * @param string
   */
  public function setExperiencePoints($experiencePoints)
  {
    $this->experiencePoints = $experiencePoints;
  }
  /**
   * @return string
   */
  public function getExperiencePoints()
  {
    return $this->experiencePoints;
  }
  /**
   * @param string
   */
  public function setFormattedCurrentStepsString($formattedCurrentStepsString)
  {
    $this->formattedCurrentStepsString = $formattedCurrentStepsString;
  }
  /**
   * @return string
   */
  public function getFormattedCurrentStepsString()
  {
    return $this->formattedCurrentStepsString;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerAchievement::class, 'Google_Service_Games_PlayerAchievement');
