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

class PlayerExperienceInfo extends \Google\Model
{
  public $currentExperiencePoints;
  protected $currentLevelType = PlayerLevel::class;
  protected $currentLevelDataType = '';
  public $kind;
  public $lastLevelUpTimestampMillis;
  protected $nextLevelType = PlayerLevel::class;
  protected $nextLevelDataType = '';

  public function setCurrentExperiencePoints($currentExperiencePoints)
  {
    $this->currentExperiencePoints = $currentExperiencePoints;
  }
  public function getCurrentExperiencePoints()
  {
    return $this->currentExperiencePoints;
  }
  /**
   * @param PlayerLevel
   */
  public function setCurrentLevel(PlayerLevel $currentLevel)
  {
    $this->currentLevel = $currentLevel;
  }
  /**
   * @return PlayerLevel
   */
  public function getCurrentLevel()
  {
    return $this->currentLevel;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastLevelUpTimestampMillis($lastLevelUpTimestampMillis)
  {
    $this->lastLevelUpTimestampMillis = $lastLevelUpTimestampMillis;
  }
  public function getLastLevelUpTimestampMillis()
  {
    return $this->lastLevelUpTimestampMillis;
  }
  /**
   * @param PlayerLevel
   */
  public function setNextLevel(PlayerLevel $nextLevel)
  {
    $this->nextLevel = $nextLevel;
  }
  /**
   * @return PlayerLevel
   */
  public function getNextLevel()
  {
    return $this->nextLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerExperienceInfo::class, 'Google_Service_Games_PlayerExperienceInfo');
