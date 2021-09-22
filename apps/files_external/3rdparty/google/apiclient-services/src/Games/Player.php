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
  public $avatarImageUrl;
  public $bannerUrlLandscape;
  public $bannerUrlPortrait;
  public $displayName;
  protected $experienceInfoType = PlayerExperienceInfo::class;
  protected $experienceInfoDataType = '';
  public $friendStatus;
  public $kind;
  protected $nameType = PlayerName::class;
  protected $nameDataType = '';
  public $originalPlayerId;
  public $playerId;
  protected $profileSettingsType = ProfileSettings::class;
  protected $profileSettingsDataType = '';
  public $title;

  public function setAvatarImageUrl($avatarImageUrl)
  {
    $this->avatarImageUrl = $avatarImageUrl;
  }
  public function getAvatarImageUrl()
  {
    return $this->avatarImageUrl;
  }
  public function setBannerUrlLandscape($bannerUrlLandscape)
  {
    $this->bannerUrlLandscape = $bannerUrlLandscape;
  }
  public function getBannerUrlLandscape()
  {
    return $this->bannerUrlLandscape;
  }
  public function setBannerUrlPortrait($bannerUrlPortrait)
  {
    $this->bannerUrlPortrait = $bannerUrlPortrait;
  }
  public function getBannerUrlPortrait()
  {
    return $this->bannerUrlPortrait;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
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
  public function setFriendStatus($friendStatus)
  {
    $this->friendStatus = $friendStatus;
  }
  public function getFriendStatus()
  {
    return $this->friendStatus;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
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
  public function setOriginalPlayerId($originalPlayerId)
  {
    $this->originalPlayerId = $originalPlayerId;
  }
  public function getOriginalPlayerId()
  {
    return $this->originalPlayerId;
  }
  public function setPlayerId($playerId)
  {
    $this->playerId = $playerId;
  }
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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Player::class, 'Google_Service_Games_Player');
