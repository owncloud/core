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

class PlayerScoreListResponse extends \Google\Collection
{
  protected $collection_key = 'submittedScores';
  public $kind;
  protected $submittedScoresType = PlayerScoreResponse::class;
  protected $submittedScoresDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param PlayerScoreResponse[]
   */
  public function setSubmittedScores($submittedScores)
  {
    $this->submittedScores = $submittedScores;
  }
  /**
   * @return PlayerScoreResponse[]
   */
  public function getSubmittedScores()
  {
    return $this->submittedScores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlayerScoreListResponse::class, 'Google_Service_Games_PlayerScoreListResponse');
