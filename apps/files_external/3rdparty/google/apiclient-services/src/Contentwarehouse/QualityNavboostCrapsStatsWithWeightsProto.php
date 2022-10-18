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

class QualityNavboostCrapsStatsWithWeightsProto extends \Google\Model
{
  public $hi;
  /**
   * @var int
   */
  public $kind;
  public $lo;
  public $mean;
  public $median;
  /**
   * @var int
   */
  public $n;
  public $pc10;
  public $pc25;
  public $pc75;
  public $pc90;
  public $stdError;
  public $stddev;
  public $varOfMean;
  public $variance;
  public $weightedN;

  public function setHi($hi)
  {
    $this->hi = $hi;
  }
  public function getHi()
  {
    return $this->hi;
  }
  /**
   * @param int
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return int
   */
  public function getKind()
  {
    return $this->kind;
  }
  public function setLo($lo)
  {
    $this->lo = $lo;
  }
  public function getLo()
  {
    return $this->lo;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  public function setMedian($median)
  {
    $this->median = $median;
  }
  public function getMedian()
  {
    return $this->median;
  }
  /**
   * @param int
   */
  public function setN($n)
  {
    $this->n = $n;
  }
  /**
   * @return int
   */
  public function getN()
  {
    return $this->n;
  }
  public function setPc10($pc10)
  {
    $this->pc10 = $pc10;
  }
  public function getPc10()
  {
    return $this->pc10;
  }
  public function setPc25($pc25)
  {
    $this->pc25 = $pc25;
  }
  public function getPc25()
  {
    return $this->pc25;
  }
  public function setPc75($pc75)
  {
    $this->pc75 = $pc75;
  }
  public function getPc75()
  {
    return $this->pc75;
  }
  public function setPc90($pc90)
  {
    $this->pc90 = $pc90;
  }
  public function getPc90()
  {
    return $this->pc90;
  }
  public function setStdError($stdError)
  {
    $this->stdError = $stdError;
  }
  public function getStdError()
  {
    return $this->stdError;
  }
  public function setStddev($stddev)
  {
    $this->stddev = $stddev;
  }
  public function getStddev()
  {
    return $this->stddev;
  }
  public function setVarOfMean($varOfMean)
  {
    $this->varOfMean = $varOfMean;
  }
  public function getVarOfMean()
  {
    return $this->varOfMean;
  }
  public function setVariance($variance)
  {
    $this->variance = $variance;
  }
  public function getVariance()
  {
    return $this->variance;
  }
  public function setWeightedN($weightedN)
  {
    $this->weightedN = $weightedN;
  }
  public function getWeightedN()
  {
    return $this->weightedN;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNavboostCrapsStatsWithWeightsProto::class, 'Google_Service_Contentwarehouse_QualityNavboostCrapsStatsWithWeightsProto');
