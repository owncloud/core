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

class LeaderboardEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $formattedScore;
  /**
   * @var string
   */
  public $formattedScoreRank;
  /**
   * @var string
   */
  public $kind;
  protected $playerType = Player::class;
  protected $playerDataType = '';
  /**
   * @var string
   */
  public $scoreRank;
  /**
   * @var string
   */
  public $scoreTag;
  /**
   * @var string
   */
  public $scoreValue;
  /**
   * @var string
   */
  public $timeSpan;
  /**
   * @var string
   */
  public $writeTimestampMillis;

  /**
   * @param string
   */
  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }
  /**
   * @return string
   */
  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  /**
   * @param string
   */
  public function setFormattedScoreRank($formattedScoreRank)
  {
    $this->formattedScoreRank = $formattedScoreRank;
  }
  /**
   * @return string
   */
  public function getFormattedScoreRank()
  {
    return $this->formattedScoreRank;
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
   * @param Player
   */
  public function setPlayer(Player $player)
  {
    $this->player = $player;
  }
  /**
   * @return Player
   */
  public function getPlayer()
  {
    return $this->player;
  }
  /**
   * @param string
   */
  public function setScoreRank($scoreRank)
  {
    $this->scoreRank = $scoreRank;
  }
  /**
   * @return string
   */
  public function getScoreRank()
  {
    return $this->scoreRank;
  }
  /**
   * @param string
   */
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }
  /**
   * @return string
   */
  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  /**
   * @param string
   */
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }
  /**
   * @return string
   */
  public function getScoreValue()
  {
    return $this->scoreValue;
  }
  /**
   * @param string
   */
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }
  /**
   * @return string
   */
  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
  /**
   * @param string
   */
  public function setWriteTimestampMillis($writeTimestampMillis)
  {
    $this->writeTimestampMillis = $writeTimestampMillis;
  }
  /**
   * @return string
   */
  public function getWriteTimestampMillis()
  {
    return $this->writeTimestampMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LeaderboardEntry::class, 'Google_Service_Games_LeaderboardEntry');
