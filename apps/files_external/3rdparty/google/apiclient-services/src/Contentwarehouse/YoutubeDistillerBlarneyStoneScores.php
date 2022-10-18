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

namespace Google\Service\Contentwarehouse;

class YoutubeDistillerBlarneyStoneScores extends \Google\Collection
{
  protected $collection_key = 'modelScores';
  /**
   * @var float
   */
  public $familySafeV1Score;
  /**
   * @var float
   */
  public $mildHateHarassV1Score;
  /**
   * @var float
   */
  public $mildHateHarassV2Score;
  protected $modelScoresType = YoutubeDistillerModelScore::class;
  protected $modelScoresDataType = 'array';
  /**
   * @var float
   */
  public $severeHateHarassV1Score;

  /**
   * @param float
   */
  public function setFamilySafeV1Score($familySafeV1Score)
  {
    $this->familySafeV1Score = $familySafeV1Score;
  }
  /**
   * @return float
   */
  public function getFamilySafeV1Score()
  {
    return $this->familySafeV1Score;
  }
  /**
   * @param float
   */
  public function setMildHateHarassV1Score($mildHateHarassV1Score)
  {
    $this->mildHateHarassV1Score = $mildHateHarassV1Score;
  }
  /**
   * @return float
   */
  public function getMildHateHarassV1Score()
  {
    return $this->mildHateHarassV1Score;
  }
  /**
   * @param float
   */
  public function setMildHateHarassV2Score($mildHateHarassV2Score)
  {
    $this->mildHateHarassV2Score = $mildHateHarassV2Score;
  }
  /**
   * @return float
   */
  public function getMildHateHarassV2Score()
  {
    return $this->mildHateHarassV2Score;
  }
  /**
   * @param YoutubeDistillerModelScore[]
   */
  public function setModelScores($modelScores)
  {
    $this->modelScores = $modelScores;
  }
  /**
   * @return YoutubeDistillerModelScore[]
   */
  public function getModelScores()
  {
    return $this->modelScores;
  }
  /**
   * @param float
   */
  public function setSevereHateHarassV1Score($severeHateHarassV1Score)
  {
    $this->severeHateHarassV1Score = $severeHateHarassV1Score;
  }
  /**
   * @return float
   */
  public function getSevereHateHarassV1Score()
  {
    return $this->severeHateHarassV1Score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeDistillerBlarneyStoneScores::class, 'Google_Service_Contentwarehouse_YoutubeDistillerBlarneyStoneScores');
