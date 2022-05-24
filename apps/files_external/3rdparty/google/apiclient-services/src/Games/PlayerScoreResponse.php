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

class PlayerScoreResponse extends \Google\Collection
{
  protected $collection_key = 'unbeatenScores';
  /**
   * @var string[]
   */
  public $beatenScoreTimeSpans;
  /**
   * @var string
   */
  public $formattedScore;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $leaderboardId;
  /**
   * @var string
   */
  public $scoreTag;
  protected $unbeatenScoresType = PlayerScore::class;
  protected $unbeatenScoresDataType = 'array';

  /**
   * @param string[]
   */
  public function setBeatenScoreTimeSpans($beatenScoreTimeSpans)
  {
    $this->beatenScoreTimeSpans = $beatenScoreTimeSpans;
  }
  /**
   * @return string[]
   */
  public function getBeatenScoreTimeSpans()
  {
    return $this->beatenScoreTimeSpans;
  }
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
  public function setLeaderboardId($leaderboardId)
  {
    $this->leaderboardId = $leaderboardId;
  }
  /**
   * @return string
   */
  public function getLeaderboardId()
  {
    return $this->leaderboardId;
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
   * @param PlayerScore[]
   */
  public function setUnbeatenScores($unbeatenScores)
  {
    $this->unbeatenScores = $unbeatenScores;
  }
  /**
   * @return PlayerScore[]
   */
  public function getUnbeatenScores()
  {
    return $this->unbeatenScores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerScoreResponse::class, 'Google_Service_Games_PlayerScoreResponse');
