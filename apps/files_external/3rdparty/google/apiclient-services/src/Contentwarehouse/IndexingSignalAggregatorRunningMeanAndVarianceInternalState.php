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

class IndexingSignalAggregatorRunningMeanAndVarianceInternalState extends \Google\Model
{
  public $m2;
  public $mean;
  public $totalWeight;

  public function setM2($m2)
  {
    $this->m2 = $m2;
  }
  public function getM2()
  {
    return $this->m2;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  public function setTotalWeight($totalWeight)
  {
    $this->totalWeight = $totalWeight;
  }
  public function getTotalWeight()
  {
    return $this->totalWeight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorRunningMeanAndVarianceInternalState::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorRunningMeanAndVarianceInternalState');
