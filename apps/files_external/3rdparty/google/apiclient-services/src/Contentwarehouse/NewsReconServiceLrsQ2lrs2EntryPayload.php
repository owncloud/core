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

class NewsReconServiceLrsQ2lrs2EntryPayload extends \Google\Collection
{
  protected $collection_key = 'outKgFeatureTypes';
  /**
   * @var bool
   */
  public $isDailyMoment;
  /**
   * @var bool
   */
  public $isMomentAnyFlavor;
  /**
   * @var bool
   */
  public $isPlannedMoment;
  /**
   * @var string
   */
  public $momentRankingScore;
  /**
   * @var string[]
   */
  public $outKgFeatureTypes;

  /**
   * @param bool
   */
  public function setIsDailyMoment($isDailyMoment)
  {
    $this->isDailyMoment = $isDailyMoment;
  }
  /**
   * @return bool
   */
  public function getIsDailyMoment()
  {
    return $this->isDailyMoment;
  }
  /**
   * @param bool
   */
  public function setIsMomentAnyFlavor($isMomentAnyFlavor)
  {
    $this->isMomentAnyFlavor = $isMomentAnyFlavor;
  }
  /**
   * @return bool
   */
  public function getIsMomentAnyFlavor()
  {
    return $this->isMomentAnyFlavor;
  }
  /**
   * @param bool
   */
  public function setIsPlannedMoment($isPlannedMoment)
  {
    $this->isPlannedMoment = $isPlannedMoment;
  }
  /**
   * @return bool
   */
  public function getIsPlannedMoment()
  {
    return $this->isPlannedMoment;
  }
  /**
   * @param string
   */
  public function setMomentRankingScore($momentRankingScore)
  {
    $this->momentRankingScore = $momentRankingScore;
  }
  /**
   * @return string
   */
  public function getMomentRankingScore()
  {
    return $this->momentRankingScore;
  }
  /**
   * @param string[]
   */
  public function setOutKgFeatureTypes($outKgFeatureTypes)
  {
    $this->outKgFeatureTypes = $outKgFeatureTypes;
  }
  /**
   * @return string[]
   */
  public function getOutKgFeatureTypes()
  {
    return $this->outKgFeatureTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewsReconServiceLrsQ2lrs2EntryPayload::class, 'Google_Service_Contentwarehouse_NewsReconServiceLrsQ2lrs2EntryPayload');
