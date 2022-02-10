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

class PlayerScore extends \Google\Model
{
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
  public $score;
  /**
   * @var string
   */
  public $scoreTag;
  /**
   * @var string
   */
  public $timeSpan;

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerScore::class, 'Google_Service_Games_PlayerScore');
