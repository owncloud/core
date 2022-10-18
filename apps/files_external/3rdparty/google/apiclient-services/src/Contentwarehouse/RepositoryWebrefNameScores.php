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

class RepositoryWebrefNameScores extends \Google\Model
{
  /**
   * @var float
   */
  public $completeWorldVolume;
  /**
   * @var float
   */
  public $contextFringeScore;
  /**
   * @var float
   */
  public $contextWeight;
  /**
   * @var float
   */
  public $idfScore;
  /**
   * @var float
   */
  public $openWorldVolumeModifier;
  /**
   * @var float
   */
  public $totalScore;

  /**
   * @param float
   */
  public function setCompleteWorldVolume($completeWorldVolume)
  {
    $this->completeWorldVolume = $completeWorldVolume;
  }
  /**
   * @return float
   */
  public function getCompleteWorldVolume()
  {
    return $this->completeWorldVolume;
  }
  /**
   * @param float
   */
  public function setContextFringeScore($contextFringeScore)
  {
    $this->contextFringeScore = $contextFringeScore;
  }
  /**
   * @return float
   */
  public function getContextFringeScore()
  {
    return $this->contextFringeScore;
  }
  /**
   * @param float
   */
  public function setContextWeight($contextWeight)
  {
    $this->contextWeight = $contextWeight;
  }
  /**
   * @return float
   */
  public function getContextWeight()
  {
    return $this->contextWeight;
  }
  /**
   * @param float
   */
  public function setIdfScore($idfScore)
  {
    $this->idfScore = $idfScore;
  }
  /**
   * @return float
   */
  public function getIdfScore()
  {
    return $this->idfScore;
  }
  /**
   * @param float
   */
  public function setOpenWorldVolumeModifier($openWorldVolumeModifier)
  {
    $this->openWorldVolumeModifier = $openWorldVolumeModifier;
  }
  /**
   * @return float
   */
  public function getOpenWorldVolumeModifier()
  {
    return $this->openWorldVolumeModifier;
  }
  /**
   * @param float
   */
  public function setTotalScore($totalScore)
  {
    $this->totalScore = $totalScore;
  }
  /**
   * @return float
   */
  public function getTotalScore()
  {
    return $this->totalScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefNameScores::class, 'Google_Service_Contentwarehouse_RepositoryWebrefNameScores');
