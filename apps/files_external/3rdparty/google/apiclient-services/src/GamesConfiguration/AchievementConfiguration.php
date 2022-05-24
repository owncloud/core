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

namespace Google\Service\GamesConfiguration;

class AchievementConfiguration extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementType;
  protected $draftType = AchievementConfigurationDetail::class;
  protected $draftDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $initialState;
  /**
   * @var string
   */
  public $kind;
  protected $publishedType = AchievementConfigurationDetail::class;
  protected $publishedDataType = '';
  /**
   * @var int
   */
  public $stepsToUnlock;
  /**
   * @var string
   */
  public $token;

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
   * @param AchievementConfigurationDetail
   */
  public function setDraft(AchievementConfigurationDetail $draft)
  {
    $this->draft = $draft;
  }
  /**
   * @return AchievementConfigurationDetail
   */
  public function getDraft()
  {
    return $this->draft;
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
   * @param AchievementConfigurationDetail
   */
  public function setPublished(AchievementConfigurationDetail $published)
  {
    $this->published = $published;
  }
  /**
   * @return AchievementConfigurationDetail
   */
  public function getPublished()
  {
    return $this->published;
  }
  /**
   * @param int
   */
  public function setStepsToUnlock($stepsToUnlock)
  {
    $this->stepsToUnlock = $stepsToUnlock;
  }
  /**
   * @return int
   */
  public function getStepsToUnlock()
  {
    return $this->stepsToUnlock;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementConfiguration::class, 'Google_Service_GamesConfiguration_AchievementConfiguration');
