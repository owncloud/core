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

namespace Google\Service\AnalyticsData;

class Pivot extends \Google\Collection
{
  protected $collection_key = 'orderBys';
  /**
   * @var string[]
   */
  public $fieldNames;
  /**
   * @var string
   */
  public $limit;
  /**
   * @var string[]
   */
  public $metricAggregations;
  /**
   * @var string
   */
  public $offset;
  protected $orderBysType = OrderBy::class;
  protected $orderBysDataType = 'array';

  /**
   * @param string[]
   */
  public function setFieldNames($fieldNames)
  {
    $this->fieldNames = $fieldNames;
  }
  /**
   * @return string[]
   */
  public function getFieldNames()
  {
    return $this->fieldNames;
  }
  /**
   * @param string
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return string
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param string[]
   */
  public function setMetricAggregations($metricAggregations)
  {
    $this->metricAggregations = $metricAggregations;
  }
  /**
   * @return string[]
   */
  public function getMetricAggregations()
  {
    return $this->metricAggregations;
  }
  /**
   * @param string
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return string
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param OrderBy[]
   */
  public function setOrderBys($orderBys)
  {
    $this->orderBys = $orderBys;
  }
  /**
   * @return OrderBy[]
   */
  public function getOrderBys()
  {
    return $this->orderBys;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pivot::class, 'Google_Service_AnalyticsData_Pivot');
