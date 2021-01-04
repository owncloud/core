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

class Google_Service_Monitoring_TimeSeriesData extends Google_Collection
{
  protected $collection_key = 'pointData';
  protected $labelValuesType = 'Google_Service_Monitoring_LabelValue';
  protected $labelValuesDataType = 'array';
  protected $pointDataType = 'Google_Service_Monitoring_PointData';
  protected $pointDataDataType = 'array';

  /**
   * @param Google_Service_Monitoring_LabelValue[]
   */
  public function setLabelValues($labelValues)
  {
    $this->labelValues = $labelValues;
  }
  /**
   * @return Google_Service_Monitoring_LabelValue[]
   */
  public function getLabelValues()
  {
    return $this->labelValues;
  }
  /**
   * @param Google_Service_Monitoring_PointData[]
   */
  public function setPointData($pointData)
  {
    $this->pointData = $pointData;
  }
  /**
   * @return Google_Service_Monitoring_PointData[]
   */
  public function getPointData()
  {
    return $this->pointData;
  }
}
