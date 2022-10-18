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

class AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedData extends \Google\Collection
{
  protected $collection_key = 'achievements';
  protected $achievementsType = AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement::class;
  protected $achievementsDataType = 'array';
  /**
   * @var string
   */
  public $avatarImageUrl;
  protected $failureType = AppsPeopleOzExternalMergedpeopleapiProductProfileFailure::class;
  protected $failureDataType = '';
  /**
   * @var string
   */
  public $gamerTag;
  /**
   * @var int
   */
  public $playerLevel;
  /**
   * @var string
   */
  public $profileVisibility;
  /**
   * @var string
   */
  public $totalFriendsCount;
  /**
   * @var string
   */
  public $totalUnlockedAchievements;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement[]
   */
  public function setAchievements($achievements)
  {
    $this->achievements = $achievements;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedDataAchievement[]
   */
  public function getAchievements()
  {
    return $this->achievements;
  }
  /**
   * @param string
   */
  public function setAvatarImageUrl($avatarImageUrl)
  {
    $this->avatarImageUrl = $avatarImageUrl;
  }
  /**
   * @return string
   */
  public function getAvatarImageUrl()
  {
    return $this->avatarImageUrl;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiProductProfileFailure
   */
  public function setFailure(AppsPeopleOzExternalMergedpeopleapiProductProfileFailure $failure)
  {
    $this->failure = $failure;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiProductProfileFailure
   */
  public function getFailure()
  {
    return $this->failure;
  }
  /**
   * @param string
   */
  public function setGamerTag($gamerTag)
  {
    $this->gamerTag = $gamerTag;
  }
  /**
   * @return string
   */
  public function getGamerTag()
  {
    return $this->gamerTag;
  }
  /**
   * @param int
   */
  public function setPlayerLevel($playerLevel)
  {
    $this->playerLevel = $playerLevel;
  }
  /**
   * @return int
   */
  public function getPlayerLevel()
  {
    return $this->playerLevel;
  }
  /**
   * @param string
   */
  public function setProfileVisibility($profileVisibility)
  {
    $this->profileVisibility = $profileVisibility;
  }
  /**
   * @return string
   */
  public function getProfileVisibility()
  {
    return $this->profileVisibility;
  }
  /**
   * @param string
   */
  public function setTotalFriendsCount($totalFriendsCount)
  {
    $this->totalFriendsCount = $totalFriendsCount;
  }
  /**
   * @return string
   */
  public function getTotalFriendsCount()
  {
    return $this->totalFriendsCount;
  }
  /**
   * @param string
   */
  public function setTotalUnlockedAchievements($totalUnlockedAchievements)
  {
    $this->totalUnlockedAchievements = $totalUnlockedAchievements;
  }
  /**
   * @return string
   */
  public function getTotalUnlockedAchievements()
  {
    return $this->totalUnlockedAchievements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPlayGamesExtendedData');
