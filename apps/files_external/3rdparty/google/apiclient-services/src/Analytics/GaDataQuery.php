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

class GaDataQuery extends \Google\Collection
{
  protected $collection_key = 'sort';
  protected $internal_gapi_mappings = [
        "endDate" => "end-date",
        "maxResults" => "max-results",
        "startDate" => "start-date",
        "startIndex" => "start-index",
  ];
  /**
   * @var string
   */
  public $dimensions;
  /**
   * @var string
   */
  public $endDate;
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
   * @var string
   */
  public $samplingLevel;
  /**
   * @var string
   */
  public $segment;
  /**
   * @var string[]
   */
  public $sort;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var int
   */
  public $startIndex;

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
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
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
   * @param string
   */
  public function setSamplingLevel($samplingLevel)
  {
    $this->samplingLevel = $samplingLevel;
  }
  /**
   * @return string
   */
  public function getSamplingLevel()
  {
    return $this->samplingLevel;
  }
  /**
   * @param string
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return string
   */
  public function getSegment()
  {
    return $this->segment;
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
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GaDataQuery::class, 'Google_Service_Analytics_GaDataQuery');
