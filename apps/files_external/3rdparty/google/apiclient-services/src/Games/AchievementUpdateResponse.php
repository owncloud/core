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

class AchievementUpdateResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementId;
  /**
   * @var string
   */
  public $currentState;
  /**
   * @var int
   */
  public $currentSteps;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $newlyUnlocked;
  /**
   * @var bool
   */
  public $updateOccurred;

  /**
   * @param string
   */
  public function setAchievementId($achievementId)
  {
    $this->achievementId = $achievementId;
  }
  /**
   * @return string
   */
  public function getAchievementId()
  {
    return $this->achievementId;
  }
  /**
   * @param string
   */
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  /**
   * @return string
   */
  public function getCurrentState()
  {
    return $this->currentState;
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
   * @param bool
   */
  public function setNewlyUnlocked($newlyUnlocked)
  {
    $this->newlyUnlocked = $newlyUnlocked;
  }
  /**
   * @return bool
   */
  public function getNewlyUnlocked()
  {
    return $this->newlyUnlocked;
  }
  /**
   * @param bool
   */
  public function setUpdateOccurred($updateOccurred)
  {
    $this->updateOccurred = $updateOccurred;
  }
  /**
   * @return bool
   */
  public function getUpdateOccurred()
  {
    return $this->updateOccurred;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementUpdateResponse::class, 'Google_Service_Games_AchievementUpdateResponse');
