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

namespace Google\Service\Clouderrorreporting;

class ListGroupStatsResponse extends \Google\Collection
{
  protected $collection_key = 'errorGroupStats';
  protected $errorGroupStatsType = ErrorGroupStats::class;
  protected $errorGroupStatsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var string
   */
  public $timeRangeBegin;

  /**
   * @param ErrorGroupStats[]
   */
  public function setErrorGroupStats($errorGroupStats)
  {
    $this->errorGroupStats = $errorGroupStats;
  }
  /**
   * @return ErrorGroupStats[]
   */
  public function getErrorGroupStats()
  {
    return $this->errorGroupStats;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param string
   */
  public function setTimeRangeBegin($timeRangeBegin)
  {
    $this->timeRangeBegin = $timeRangeBegin;
  }
  /**
   * @return string
   */
  public function getTimeRangeBegin()
  {
    return $this->timeRangeBegin;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListGroupStatsResponse::class, 'Google_Service_Clouderrorreporting_ListGroupStatsResponse');
