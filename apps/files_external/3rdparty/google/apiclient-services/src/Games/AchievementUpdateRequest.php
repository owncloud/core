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

class AchievementUpdateRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementId;
  protected $incrementPayloadType = GamesAchievementIncrement::class;
  protected $incrementPayloadDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $setStepsAtLeastPayloadType = GamesAchievementSetStepsAtLeast::class;
  protected $setStepsAtLeastPayloadDataType = '';
  /**
   * @var string
   */
  public $updateType;

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
   * @param GamesAchievementIncrement
   */
  public function setIncrementPayload(GamesAchievementIncrement $incrementPayload)
  {
    $this->incrementPayload = $incrementPayload;
  }
  /**
   * @return GamesAchievementIncrement
   */
  public function getIncrementPayload()
  {
    return $this->incrementPayload;
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
   * @param GamesAchievementSetStepsAtLeast
   */
  public function setSetStepsAtLeastPayload(GamesAchievementSetStepsAtLeast $setStepsAtLeastPayload)
  {
    $this->setStepsAtLeastPayload = $setStepsAtLeastPayload;
  }
  /**
   * @return GamesAchievementSetStepsAtLeast
   */
  public function getSetStepsAtLeastPayload()
  {
    return $this->setStepsAtLeastPayload;
  }
  /**
   * @param string
   */
  public function setUpdateType($updateType)
  {
    $this->updateType = $updateType;
  }
  /**
   * @return string
   */
  public function getUpdateType()
  {
    return $this->updateType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementUpdateRequest::class, 'Google_Service_Games_AchievementUpdateRequest');
