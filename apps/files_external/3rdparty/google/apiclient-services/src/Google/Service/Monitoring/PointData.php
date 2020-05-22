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

class Google_Service_Monitoring_PointData extends Google_Collection
{
  protected $collection_key = 'values';
  protected $timeIntervalType = 'Google_Service_Monitoring_TimeInterval';
  protected $timeIntervalDataType = '';
  protected $valuesType = 'Google_Service_Monitoring_TypedValue';
  protected $valuesDataType = 'array';

  /**
   * @param Google_Service_Monitoring_TimeInterval
   */
  public function setTimeInterval(Google_Service_Monitoring_TimeInterval $timeInterval)
  {
    $this->timeInterval = $timeInterval;
  }
  /**
   * @return Google_Service_Monitoring_TimeInterval
   */
  public function getTimeInterval()
  {
    return $this->timeInterval;
  }
  /**
   * @param Google_Service_Monitoring_TypedValue
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return Google_Service_Monitoring_TypedValue
   */
  public function getValues()
  {
    return $this->values;
  }
}
