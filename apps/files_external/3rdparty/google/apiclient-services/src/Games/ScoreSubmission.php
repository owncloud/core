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

class ScoreSubmission extends \Google\Model
{
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
  public $score;
  /**
   * @var string
   */
  public $scoreTag;
  /**
   * @var string
   */
  public $signature;

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
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return string
   */
  public function getScore()
  {
    return $this->score;
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
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  /**
   * @return string
   */
  public function getSignature()
  {
    return $this->signature;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScoreSubmission::class, 'Google_Service_Games_ScoreSubmission');
