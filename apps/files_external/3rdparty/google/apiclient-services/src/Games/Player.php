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

class Player extends \Google\Model
{
  /**
   * @var string
   */
  public $avatarImageUrl;
  /**
   * @var string
   */
  public $bannerUrlLandscape;
  /**
   * @var string
   */
  public $bannerUrlPortrait;
  /**
   * @var string
   */
  public $displayName;
  protected $experienceInfoType = PlayerExperienceInfo::class;
  protected $experienceInfoDataType = '';
  /**
   * @var string
   */
  public $friendStatus;
  /**
   * @var string
   */
  public $gamePlayerId;
  /**
   * @var string
   */
  public $kind;
  protected $nameType = PlayerName::class;
  protected $nameDataType = '';
  /**
   * @var string
   */
  public $originalPlayerId;
  /**
   * @var string
   */
  public $playerId;
  protected $profileSettingsType = ProfileSettings::class;
  protected $profileSettingsDataType = '';
  /**
   * @var string
   */
  public $title;

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
   * @param string
   */
  public function setBannerUrlLandscape($bannerUrlLandscape)
  {
    $this->bannerUrlLandscape = $bannerUrlLandscape;
  }
  /**
   * @return string
   */
  public function getBannerUrlLandscape()
  {
    return $this->bannerUrlLandscape;
  }
  /**
   * @param string
   */
  public function setBannerUrlPortrait($bannerUrlPortrait)
  {
    $this->bannerUrlPortrait = $bannerUrlPortrait;
  }
  /**
   * @return string
   */
  public function getBannerUrlPortrait()
  {
    return $this->bannerUrlPortrait;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param PlayerExperienceInfo
   */
  public function setExperienceInfo(PlayerExperienceInfo $experienceInfo)
  {
    $this->experienceInfo = $experienceInfo;
  }
  /**
   * @return PlayerExperienceInfo
   */
  public function getExperienceInfo()
  {
    return $this->experienceInfo;
  }
  /**
   * @param string
   */
  public function setFriendStatus($friendStatus)
  {
    $this->friendStatus = $friendStatus;
  }
  /**
   * @return string
   */
  public function getFriendStatus()
  {
    return $this->friendStatus;
  }
  /**
   * @param string
   */
  public function setGamePlayerId($gamePlayerId)
  {
    $this->gamePlayerId = $gamePlayerId;
  }
  /**
   * @return string
   */
  public function getGamePlayerId()
  {
    return $this->gamePlayerId;
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
   * @param PlayerName
   */
  public function setName(PlayerName $name)
  {
    $this->name = $name;
  }
  /**
   * @return PlayerName
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOriginalPlayerId($originalPlayerId)
  {
    $this->originalPlayerId = $originalPlayerId;
  }
  /**
   * @return string
   */
  public function getOriginalPlayerId()
  {
    return $this->originalPlayerId;
  }
  /**
   * @param string
   */
  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }
  /**
   * @return string
   */
  public function getPlayerId()
  {
    return $this->playerId;
  }
  /**
   * @param ProfileSettings
   */
  public function setProfileSettings(ProfileSettings $profileSettings)
  {
    $this->profileSettings = $profileSettings;
  }
  /**
   * @return ProfileSettings
   */
  public function getProfileSettings()
  {
    return $this->profileSettings;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Player::class, 'Google_Service_Games_Player');
