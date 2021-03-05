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

class Google_Service_Monitoring_QueryTimeSeriesResponse extends Google_Collection
{
  protected $collection_key = 'timeSeriesData';
  public $nextPageToken;
  protected $partialErrorsType = 'Google_Service_Monitoring_Status';
  protected $partialErrorsDataType = 'array';
  protected $timeSeriesDataType = 'Google_Service_Monitoring_TimeSeriesData';
  protected $timeSeriesDataDataType = 'array';
  protected $timeSeriesDescriptorType = 'Google_Service_Monitoring_TimeSeriesDescriptor';
  protected $timeSeriesDescriptorDataType = '';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Monitoring_Status[]
   */
  public function setPartialErrors($partialErrors)
  {
    $this->partialErrors = $partialErrors;
  }
  /**
   * @return Google_Service_Monitoring_Status[]
   */
  public function getPartialErrors()
  {
    return $this->partialErrors;
  }
  /**
   * @param Google_Service_Monitoring_TimeSeriesData[]
   */
  public function setTimeSeriesData($timeSeriesData)
  {
    $this->timeSeriesData = $timeSeriesData;
  }
  /**
   * @return Google_Service_Monitoring_TimeSeriesData[]
   */
  public function getTimeSeriesData()
  {
    return $this->timeSeriesData;
  }
  /**
   * @param Google_Service_Monitoring_TimeSeriesDescriptor
   */
  public function setTimeSeriesDescriptor(Google_Service_Monitoring_TimeSeriesDescriptor $timeSeriesDescriptor)
  {
    $this->timeSeriesDescriptor = $timeSeriesDescriptor;
  }
  /**
   * @return Google_Service_Monitoring_TimeSeriesDescriptor
   */
  public function getTimeSeriesDescriptor()
  {
    return $this->timeSeriesDescriptor;
  }
}
