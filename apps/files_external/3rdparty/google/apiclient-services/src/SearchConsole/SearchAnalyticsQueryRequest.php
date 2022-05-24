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

namespace Google\Service\SearchConsole;

class SearchAnalyticsQueryRequest extends \Google\Collection
{
  protected $collection_key = 'dimensions';
  /**
   * @var string
   */
  public $aggregationType;
  /**
   * @var string
   */
  public $dataState;
  protected $dimensionFilterGroupsType = ApiDimensionFilterGroup::class;
  protected $dimensionFilterGroupsDataType = 'array';
  /**
   * @var string[]
   */
  public $dimensions;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var int
   */
  public $rowLimit;
  /**
   * @var string
   */
  public $searchType;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var int
   */
  public $startRow;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAggregationType($aggregationType)
  {
    $this->aggregationType = $aggregationType;
  }
  /**
   * @return string
   */
  public function getAggregationType()
  {
    return $this->aggregationType;
  }
  /**
   * @param string
   */
  public function setDataState($dataState)
  {
    $this->dataState = $dataState;
  }
  /**
   * @return string
   */
  public function getDataState()
  {
    return $this->dataState;
  }
  /**
   * @param ApiDimensionFilterGroup[]
   */
  public function setDimensionFilterGroups($dimensionFilterGroups)
  {
    $this->dimensionFilterGroups = $dimensionFilterGroups;
  }
  /**
   * @return ApiDimensionFilterGroup[]
   */
  public function getDimensionFilterGroups()
  {
    return $this->dimensionFilterGroups;
  }
  /**
   * @param string[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string[]
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
   * @param int
   */
  public function setRowLimit($rowLimit)
  {
    $this->rowLimit = $rowLimit;
  }
  /**
   * @return int
   */
  public function getRowLimit()
  {
    return $this->rowLimit;
  }
  /**
   * @param string
   */
  public function setSearchType($searchType)
  {
    $this->searchType = $searchType;
  }
  /**
   * @return string
   */
  public function getSearchType()
  {
    return $this->searchType;
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
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  /**
   * @return int
   */
  public function getStartRow()
  {
    return $this->startRow;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchAnalyticsQueryRequest::class, 'Google_Service_SearchConsole_SearchAnalyticsQueryRequest');
