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

namespace Google\Service\Analytics;

class RealtimeDataQuery extends \Google\Collection
{
  protected $collection_key = 'sort';
  protected $internal_gapi_mappings = [
        "maxResults" => "max-results",
  ];
  /**
   * @var string
   */
  public $dimensions;
  /**
   * @var string
   */
  public $filters;
  /**
   * @var string
   */
  public $ids;
  /**
   * @var int
   */
  public $maxResults;
  /**
   * @var string[]
   */
  public $metrics;
  /**
   * @var string[]
   */
  public $sort;

  /**
   * @param string
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return string
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param string
   */
  public function setIds($ids)
  {
    $this->ids = $ids;
  }
  /**
   * @return string
   */
  public function getIds()
  {
    return $this->ids;
  }
  /**
   * @param int
   */
  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }
  /**
   * @return int
   */
  public function getMaxResults()
  {
    return $this->maxResults;
  }
  /**
   * @param string[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string[]
   */
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  /**
   * @return string[]
   */
  public function getSort()
  {
    return $this->sort;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RealtimeDataQuery::class, 'Google_Service_Analytics_RealtimeDataQuery');
