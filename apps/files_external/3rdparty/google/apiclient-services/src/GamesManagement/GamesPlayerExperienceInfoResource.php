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

namespace Google\Service\GamesManagement;

class GamesPlayerExperienceInfoResource extends \Google\Model
{
  /**
   * @var string
   */
  public $currentExperiencePoints;
  protected $currentLevelType = GamesPlayerLevelResource::class;
  protected $currentLevelDataType = '';
  /**
   * @var string
   */
  public $lastLevelUpTimestampMillis;
  protected $nextLevelType = GamesPlayerLevelResource::class;
  protected $nextLevelDataType = '';

  /**
   * @param string
   */
  public function setCurrentExperiencePoints($currentExperiencePoints)
  {
    $this->currentExperiencePoints = $currentExperiencePoints;
  }
  /**
   * @return string
   */
  public function getCurrentExperiencePoints()
  {
    return $this->currentExperiencePoints;
  }
  /**
   * @param GamesPlayerLevelResource
   */
  public function setCurrentLevel(GamesPlayerLevelResource $currentLevel)
  {
    $this->currentLevel = $currentLevel;
  }
  /**
   * @return GamesPlayerLevelResource
   */
  public function getCurrentLevel()
  {
    return $this->currentLevel;
  }
  /**
   * @param string
   */
  public function setLastLevelUpTimestampMillis($lastLevelUpTimestampMillis)
  {
    $this->lastLevelUpTimestampMillis = $lastLevelUpTimestampMillis;
  }
  /**
   * @return string
   */
  public function getLastLevelUpTimestampMillis()
  {
    return $this->lastLevelUpTimestampMillis;
  }
  /**
   * @param GamesPlayerLevelResource
   */
  public function setNextLevel(GamesPlayerLevelResource $nextLevel)
  {
    $this->nextLevel = $nextLevel;
  }
  /**
   * @return GamesPlayerLevelResource
   */
  public function getNextLevel()
  {
    return $this->nextLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GamesPlayerExperienceInfoResource::class, 'Google_Service_GamesManagement_GamesPlayerExperienceInfoResource');
