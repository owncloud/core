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

class Google_Service_Bigquery_RankingMetrics extends Google_Model
{
  public $averageRank;
  public $meanAveragePrecision;
  public $meanSquaredError;
  public $normalizedDiscountedCumulativeGain;

  public function setAverageRank($averageRank)
  {
    $this->averageRank = $averageRank;
  }
  public function getAverageRank()
  {
    return $this->averageRank;
  }
  public function setMeanAveragePrecision($meanAveragePrecision)
  {
    $this->meanAveragePrecision = $meanAveragePrecision;
  }
  public function getMeanAveragePrecision()
  {
    return $this->meanAveragePrecision;
  }
  public function setMeanSquaredError($meanSquaredError)
  {
    $this->meanSquaredError = $meanSquaredError;
  }
  public function getMeanSquaredError()
  {
    return $this->meanSquaredError;
  }
  public function setNormalizedDiscountedCumulativeGain($normalizedDiscountedCumulativeGain)
  {
    $this->normalizedDiscountedCumulativeGain = $normalizedDiscountedCumulativeGain;
  }
  public function getNormalizedDiscountedCumulativeGain()
  {
    return $this->normalizedDiscountedCumulativeGain;
  }
}
