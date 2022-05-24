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

class PlayerScoreSubmissionList extends \Google\Collection
{
  protected $collection_key = 'scores';
  /**
   * @var string
   */
  public $kind;
  protected $scoresType = ScoreSubmission::class;
  protected $scoresDataType = 'array';

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
   * @param ScoreSubmission[]
   */
  public function setScores($scores)
  {
    $this->scores = $scores;
  }
  /**
   * @return ScoreSubmission[]
   */
  public function getScores()
  {
    return $this->scores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerScoreSubmissionList::class, 'Google_Service_Games_PlayerScoreSubmissionList');
