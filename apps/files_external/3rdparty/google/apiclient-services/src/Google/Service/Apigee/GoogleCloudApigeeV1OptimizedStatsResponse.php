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

class Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsResponse extends Google_Collection
{
  protected $collection_key = 'TimeUnit';
  protected $internal_gapi_mappings = array(
        "timeUnit" => "TimeUnit",
  );
  public $timeUnit;
  protected $metaDataType = 'Google_Service_Apigee_GoogleCloudApigeeV1Metadata';
  protected $metaDataDataType = '';
  public $resultTruncated;
  protected $statsType = 'Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsNode';
  protected $statsDataType = '';

  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Metadata
   */
  public function setMetaData(Google_Service_Apigee_GoogleCloudApigeeV1Metadata $metaData)
  {
    $this->metaData = $metaData;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Metadata
   */
  public function getMetaData()
  {
    return $this->metaData;
  }
  public function setResultTruncated($resultTruncated)
  {
    $this->resultTruncated = $resultTruncated;
  }
  public function getResultTruncated()
  {
    return $this->resultTruncated;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsNode
   */
  public function setStats(Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsNode $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsNode
   */
  public function getStats()
  {
    return $this->stats;
  }
}
