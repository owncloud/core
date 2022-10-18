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

class IndexingSignalAggregatorAdaptiveIntervalData extends \Google\Model
{
  public $clicksGoodInterval;
  public $clicksGoodPriorWeight;
  public $clicksTotalInterval;
  public $clicksTotalPriorWeight;
  public $ctrwiInterval;
  public $ctrwiPriorWeight;
  public $dwellsInterval;
  public $dwellsPriorWeight;
  public $luDwellsInterval;
  public $luDwellsPriorWeight;

  public function setClicksGoodInterval($clicksGoodInterval)
  {
    $this->clicksGoodInterval = $clicksGoodInterval;
  }
  public function getClicksGoodInterval()
  {
    return $this->clicksGoodInterval;
  }
  public function setClicksGoodPriorWeight($clicksGoodPriorWeight)
  {
    $this->clicksGoodPriorWeight = $clicksGoodPriorWeight;
  }
  public function getClicksGoodPriorWeight()
  {
    return $this->clicksGoodPriorWeight;
  }
  public function setClicksTotalInterval($clicksTotalInterval)
  {
    $this->clicksTotalInterval = $clicksTotalInterval;
  }
  public function getClicksTotalInterval()
  {
    return $this->clicksTotalInterval;
  }
  public function setClicksTotalPriorWeight($clicksTotalPriorWeight)
  {
    $this->clicksTotalPriorWeight = $clicksTotalPriorWeight;
  }
  public function getClicksTotalPriorWeight()
  {
    return $this->clicksTotalPriorWeight;
  }
  public function setCtrwiInterval($ctrwiInterval)
  {
    $this->ctrwiInterval = $ctrwiInterval;
  }
  public function getCtrwiInterval()
  {
    return $this->ctrwiInterval;
  }
  public function setCtrwiPriorWeight($ctrwiPriorWeight)
  {
    $this->ctrwiPriorWeight = $ctrwiPriorWeight;
  }
  public function getCtrwiPriorWeight()
  {
    return $this->ctrwiPriorWeight;
  }
  public function setDwellsInterval($dwellsInterval)
  {
    $this->dwellsInterval = $dwellsInterval;
  }
  public function getDwellsInterval()
  {
    return $this->dwellsInterval;
  }
  public function setDwellsPriorWeight($dwellsPriorWeight)
  {
    $this->dwellsPriorWeight = $dwellsPriorWeight;
  }
  public function getDwellsPriorWeight()
  {
    return $this->dwellsPriorWeight;
  }
  public function setLuDwellsInterval($luDwellsInterval)
  {
    $this->luDwellsInterval = $luDwellsInterval;
  }
  public function getLuDwellsInterval()
  {
    return $this->luDwellsInterval;
  }
  public function setLuDwellsPriorWeight($luDwellsPriorWeight)
  {
    $this->luDwellsPriorWeight = $luDwellsPriorWeight;
  }
  public function getLuDwellsPriorWeight()
  {
    return $this->luDwellsPriorWeight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorAdaptiveIntervalData::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorAdaptiveIntervalData');
