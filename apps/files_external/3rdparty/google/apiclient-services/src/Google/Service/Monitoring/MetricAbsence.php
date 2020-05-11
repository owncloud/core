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

class Google_Service_Monitoring_MetricAbsence extends Google_Collection
{
  protected $collection_key = 'aggregations';
  protected $aggregationsType = 'Google_Service_Monitoring_Aggregation';
  protected $aggregationsDataType = 'array';
  public $duration;
  public $filter;
  protected $triggerType = 'Google_Service_Monitoring_Trigger';
  protected $triggerDataType = '';

  /**
   * @param Google_Service_Monitoring_Aggregation
   */
  public function setAggregations($aggregations)
  {
    $this->aggregations = $aggregations;
  }
  /**
   * @return Google_Service_Monitoring_Aggregation
   */
  public function getAggregations()
  {
    return $this->aggregations;
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
  /**
   * @param Google_Service_Monitoring_Trigger
   */
  public function setTrigger(Google_Service_Monitoring_Trigger $trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return Google_Service_Monitoring_Trigger
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
}
