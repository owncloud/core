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

class GamesPlayerLevelResource extends \Google\Model
{
  /**
   * @var int
   */
  public $level;
  /**
   * @var string
   */
  public $maxExperiencePoints;
  /**
   * @var string
   */
  public $minExperiencePoints;

  /**
   * @param int
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return int
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param string
   */
  public function setMaxExperiencePoints($maxExperiencePoints)
  {
    $this->maxExperiencePoints = $maxExperiencePoints;
  }
  /**
   * @return string
   */
  public function getMaxExperiencePoints()
  {
    return $this->maxExperiencePoints;
  }
  /**
   * @param string
   */
  public function setMinExperiencePoints($minExperiencePoints)
  {
    $this->minExperiencePoints = $minExperiencePoints;
  }
  /**
   * @return string
   */
  public function getMinExperiencePoints()
  {
    return $this->minExperiencePoints;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GamesPlayerLevelResource::class, 'Google_Service_GamesManagement_GamesPlayerLevelResource');
