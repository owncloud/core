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

class PlayerLeaderboardScore extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "leaderboardId" => "leaderboard_id",
  ];
  protected $friendsRankType = LeaderboardScoreRank::class;
  protected $friendsRankDataType = '';
  public $kind;
  public $leaderboardId;
  protected $publicRankType = LeaderboardScoreRank::class;
  protected $publicRankDataType = '';
  public $scoreString;
  public $scoreTag;
  public $scoreValue;
  protected $socialRankType = LeaderboardScoreRank::class;
  protected $socialRankDataType = '';
  public $timeSpan;
  public $writeTimestamp;

  /**
   * @param LeaderboardScoreRank
   */
  public function setFriendsRank(LeaderboardScoreRank $friendsRank)
  {
    $this->friendsRank = $friendsRank;
  }
  /**
   * @return LeaderboardScoreRank
   */
  public function getFriendsRank()
  {
    return $this->friendsRank;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLeaderboardId($leaderboardId)
  {
    $this->leaderboardId = $leaderboardId;
  }
  public function getLeaderboardId()
  {
    return $this->leaderboardId;
  }
  /**
   * @param LeaderboardScoreRank
   */
  public function setPublicRank(LeaderboardScoreRank $publicRank)
  {
    $this->publicRank = $publicRank;
  }
  /**
   * @return LeaderboardScoreRank
   */
  public function getPublicRank()
  {
    return $this->publicRank;
  }
  public function setScoreString($scoreString)
  {
    $this->scoreString = $scoreString;
  }
  public function getScoreString()
  {
    return $this->scoreString;
  }
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }
  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }
  public function getScoreValue()
  {
    return $this->scoreValue;
  }
  /**
   * @param LeaderboardScoreRank
   */
  public function setSocialRank(LeaderboardScoreRank $socialRank)
  {
    $this->socialRank = $socialRank;
  }
  /**
   * @return LeaderboardScoreRank
   */
  public function getSocialRank()
  {
    return $this->socialRank;
  }
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }
  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  public function setWriteTimestamp($writeTimestamp)
  {
    $this->writeTimestamp = $writeTimestamp;
  }
  public function getWriteTimestamp()
  {
    return $this->writeTimestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerLeaderboardScore::class, 'Google_Service_Games_PlayerLeaderboardScore');
