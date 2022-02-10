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

class AchievementDefinition extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementType;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $experiencePoints;
  /**
   * @var string
   */
  public $formattedTotalSteps;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $initialState;
  /**
   * @var bool
   */
  public $isRevealedIconUrlDefault;
  /**
   * @var bool
   */
  public $isUnlockedIconUrlDefault;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $revealedIconUrl;
  /**
   * @var int
   */
  public $totalSteps;
  /**
   * @var string
   */
  public $unlockedIconUrl;

  /**
   * @param string
   */
  public function setAchievementType($achievementType)
  {
    $this->achievementType = $achievementType;
  }
  /**
   * @return string
   */
  public function getAchievementType()
  {
    return $this->achievementType;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
  public function setFormattedTotalSteps($formattedTotalSteps)
  {
    $this->formattedTotalSteps = $formattedTotalSteps;
  }
  /**
   * @return string
   */
  public function getFormattedTotalSteps()
  {
    return $this->formattedTotalSteps;
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
  public function setInitialState($initialState)
  {
    $this->initialState = $initialState;
  }
  /**
   * @return string
   */
  public function getInitialState()
  {
    return $this->initialState;
  }
  /**
   * @param bool
   */
  public function setIsRevealedIconUrlDefault($isRevealedIconUrlDefault)
  {
    $this->isRevealedIconUrlDefault = $isRevealedIconUrlDefault;
  }
  /**
   * @return bool
   */
  public function getIsRevealedIconUrlDefault()
  {
    return $this->isRevealedIconUrlDefault;
  }
  /**
   * @param bool
   */
  public function setIsUnlockedIconUrlDefault($isUnlockedIconUrlDefault)
  {
    $this->isUnlockedIconUrlDefault = $isUnlockedIconUrlDefault;
  }
  /**
   * @return bool
   */
  public function getIsUnlockedIconUrlDefault()
  {
    return $this->isUnlockedIconUrlDefault;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRevealedIconUrl($revealedIconUrl)
  {
    $this->revealedIconUrl = $revealedIconUrl;
  }
  /**
   * @return string
   */
  public function getRevealedIconUrl()
  {
    return $this->revealedIconUrl;
  }
  /**
   * @param int
   */
  public function setTotalSteps($totalSteps)
  {
    $this->totalSteps = $totalSteps;
  }
  /**
   * @return int
   */
  public function getTotalSteps()
  {
    return $this->totalSteps;
  }
  /**
   * @param string
   */
  public function setUnlockedIconUrl($unlockedIconUrl)
  {
    $this->unlockedIconUrl = $unlockedIconUrl;
  }
  /**
   * @return string
   */
  public function getUnlockedIconUrl()
  {
    return $this->unlockedIconUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementDefinition::class, 'Google_Service_Games_AchievementDefinition');
