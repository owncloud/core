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

class AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement extends \Google\Model
{
  /**
   * @var string
   */
  public $achievementName;
  /**
   * @var string
   */
  public $achievementUnlockedIconUrl;
  /**
   * @var float
   */
  public $rarityPercentage;

  /**
   * @param string
   */
  public function setAchievementName($achievementName)
  {
    $this->achievementName = $achievementName;
  }
  /**
   * @return string
   */
  public function getAchievementName()
  {
    return $this->achievementName;
  }
  /**
   * @param string
   */
  public function setAchievementUnlockedIconUrl($achievementUnlockedIconUrl)
  {
    $this->achievementUnlockedIconUrl = $achievementUnlockedIconUrl;
  }
  /**
   * @return string
   */
  public function getAchievementUnlockedIconUrl()
  {
    return $this->achievementUnlockedIconUrl;
  }
  /**
   * @param float
   */
  public function setRarityPercentage($rarityPercentage)
  {
    $this->rarityPercentage = $rarityPercentage;
  }
  /**
   * @return float
   */
  public function getRarityPercentage()
  {
    return $this->rarityPercentage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement');
