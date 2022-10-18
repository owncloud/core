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

class GoogleCloudApigeeV1QueryTimeSeriesStatsResponse extends \Google\Collection
{
  protected $collection_key = 'values';
  /**
   * @var string[]
   */
  public $columns;
  /**
   * @var string
   */
  public $nextPageToken;
  protected $valuesType = GoogleCloudApigeeV1QueryTimeSeriesStatsResponseSequence::class;
  protected $valuesDataType = 'array';

  /**
   * @param string[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return string[]
   */
  public function getColumns()
  {
    return $this->columns;
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
   * @param GoogleCloudApigeeV1QueryTimeSeriesStatsResponseSequence[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return GoogleCloudApigeeV1QueryTimeSeriesStatsResponseSequence[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1QueryTimeSeriesStatsResponse::class, 'Google_Service_Apigee_GoogleCloudApigeeV1QueryTimeSeriesStatsResponse');
