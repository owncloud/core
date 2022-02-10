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

class LeaderboardScoreRank extends \Google\Model
{
  /**
   * @var string
   */
  public $formattedNumScores;
  /**
   * @var string
   */
  public $formattedRank;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $numScores;
  /**
   * @var string
   */
  public $rank;

  /**
   * @param string
   */
  public function setFormattedNumScores($formattedNumScores)
  {
    $this->formattedNumScores = $formattedNumScores;
  }
  /**
   * @return string
   */
  public function getFormattedNumScores()
  {
    return $this->formattedNumScores;
  }
  /**
   * @param string
   */
  public function setFormattedRank($formattedRank)
  {
    $this->formattedRank = $formattedRank;
  }
  /**
   * @return string
   */
  public function getFormattedRank()
  {
    return $this->formattedRank;
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
  public function setNumScores($numScores)
  {
    $this->numScores = $numScores;
  }
  /**
   * @return string
   */
  public function getNumScores()
  {
    return $this->numScores;
  }
  /**
   * @param string
   */
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  /**
   * @return string
   */
  public function getRank()
  {
    return $this->rank;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LeaderboardScoreRank::class, 'Google_Service_Games_LeaderboardScoreRank');
