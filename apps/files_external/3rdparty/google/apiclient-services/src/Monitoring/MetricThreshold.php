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

namespace Google\Service\Monitoring;

class MetricThreshold extends \Google\Collection
{
  protected $collection_key = 'denominatorAggregations';
  protected $aggregationsType = Aggregation::class;
  protected $aggregationsDataType = 'array';
  public $comparison;
  protected $denominatorAggregationsType = Aggregation::class;
  protected $denominatorAggregationsDataType = 'array';
  public $denominatorFilter;
  public $duration;
  public $filter;
  public $thresholdValue;
  protected $triggerType = Trigger::class;
  protected $triggerDataType = '';

  /**
   * @param Aggregation[]
   */
  public function setAggregations($aggregations)
  {
    $this->aggregations = $aggregations;
  }
  /**
   * @return Aggregation[]
   */
  public function getAggregations()
  {
    return $this->aggregations;
  }
  public function setComparison($comparison)
  {
    $this->comparison = $comparison;
  }
  public function getComparison()
  {
    return $this->comparison;
  }
  /**
   * @param Aggregation[]
   */
  public function setDenominatorAggregations($denominatorAggregations)
  {
    $this->denominatorAggregations = $denominatorAggregations;
  }
  /**
   * @return Aggregation[]
   */
  public function getDenominatorAggregations()
  {
    return $this->denominatorAggregations;
  }
  public function setDenominatorFilter($denominatorFilter)
  {
    $this->denominatorFilter = $denominatorFilter;
  }
  public function getDenominatorFilter()
  {
    return $this->denominatorFilter;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setThresholdValue($thresholdValue)
  {
    $this->thresholdValue = $thresholdValue;
  }
  public function getThresholdValue()
  {
    return $this->thresholdValue;
  }
  /**
   * @param Trigger
   */
  public function setTrigger(Trigger $trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return Trigger
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricThreshold::class, 'Google_Service_Monitoring_MetricThreshold');
