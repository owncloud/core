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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1HistogramQuery extends \Google\Model
{
  protected $filtersType = GoogleCloudContentwarehouseV1HistogramQueryPropertyNameFilter::class;
  protected $filtersDataType = '';
  /**
   * @var string
   */
  public $histogramQuery;
  /**
   * @var bool
   */
  public $requirePreciseResultSize;

  /**
   * @param GoogleCloudContentwarehouseV1HistogramQueryPropertyNameFilter
   */
  public function setFilters(GoogleCloudContentwarehouseV1HistogramQueryPropertyNameFilter $filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return GoogleCloudContentwarehouseV1HistogramQueryPropertyNameFilter
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param string
   */
  public function setHistogramQuery($histogramQuery)
  {
    $this->histogramQuery = $histogramQuery;
  }
  /**
   * @return string
   */
  public function getHistogramQuery()
  {
    return $this->histogramQuery;
  }
  /**
   * @param bool
   */
  public function setRequirePreciseResultSize($requirePreciseResultSize)
  {
    $this->requirePreciseResultSize = $requirePreciseResultSize;
  }
  /**
   * @return bool
   */
  public function getRequirePreciseResultSize()
  {
    return $this->requirePreciseResultSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1HistogramQuery::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1HistogramQuery');
