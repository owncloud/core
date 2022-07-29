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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1ComputeEnvironmentScoresRequest extends \Google\Collection
{
  protected $collection_key = 'filters';
  protected $filtersType = GoogleCloudApigeeV1ComputeEnvironmentScoresRequestFilter::class;
  protected $filtersDataType = 'array';
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  protected $timeRangeType = GoogleTypeInterval::class;
  protected $timeRangeDataType = '';

  /**
   * @param GoogleCloudApigeeV1ComputeEnvironmentScoresRequestFilter[]
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return GoogleCloudApigeeV1ComputeEnvironmentScoresRequestFilter[]
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param GoogleTypeInterval
   */
  public function setTimeRange(GoogleTypeInterval $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return GoogleTypeInterval
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ComputeEnvironmentScoresRequest::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ComputeEnvironmentScoresRequest');
