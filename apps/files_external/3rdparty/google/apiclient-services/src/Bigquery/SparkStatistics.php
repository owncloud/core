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

namespace Google\Service\Bigquery;

class SparkStatistics extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "loggingInfo" => "logging_info",
        "sparkJobId" => "spark_job_id",
        "sparkJobLocation" => "spark_job_location",
  ];
  /**
   * @var string[]
   */
  public $endpoints;
  protected $loggingInfoType = SparkLoggingInfo::class;
  protected $loggingInfoDataType = '';
  /**
   * @var string
   */
  public $sparkJobId;
  /**
   * @var string
   */
  public $sparkJobLocation;

  /**
   * @param string[]
   */
  public function setEndpoints($endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return string[]
   */
  public function getEndpoints()
  {
    return $this->endpoints;
  }
  /**
   * @param SparkLoggingInfo
   */
  public function setLoggingInfo(SparkLoggingInfo $loggingInfo)
  {
    $this->loggingInfo = $loggingInfo;
  }
  /**
   * @return SparkLoggingInfo
   */
  public function getLoggingInfo()
  {
    return $this->loggingInfo;
  }
  /**
   * @param string
   */
  public function setSparkJobId($sparkJobId)
  {
    $this->sparkJobId = $sparkJobId;
  }
  /**
   * @return string
   */
  public function getSparkJobId()
  {
    return $this->sparkJobId;
  }
  /**
   * @param string
   */
  public function setSparkJobLocation($sparkJobLocation)
  {
    $this->sparkJobLocation = $sparkJobLocation;
  }
  /**
   * @return string
   */
  public function getSparkJobLocation()
  {
    return $this->sparkJobLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SparkStatistics::class, 'Google_Service_Bigquery_SparkStatistics');
