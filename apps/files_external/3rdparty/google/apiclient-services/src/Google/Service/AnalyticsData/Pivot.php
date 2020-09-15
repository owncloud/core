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

class Google_Service_AnalyticsData_Pivot extends Google_Collection
{
  protected $collection_key = 'orderBys';
  public $fieldNames;
  public $limit;
  public $metricAggregations;
  public $offset;
  protected $orderBysType = 'Google_Service_AnalyticsData_OrderBy';
  protected $orderBysDataType = 'array';

  public function setFieldNames($fieldNames)
  {
    $this->fieldNames = $fieldNames;
  }
  public function getFieldNames()
  {
    return $this->fieldNames;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setMetricAggregations($metricAggregations)
  {
    $this->metricAggregations = $metricAggregations;
  }
  public function getMetricAggregations()
  {
    return $this->metricAggregations;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param Google_Service_AnalyticsData_OrderBy
   */
  public function setOrderBys($orderBys)
  {
    $this->orderBys = $orderBys;
  }
  /**
   * @return Google_Service_AnalyticsData_OrderBy
   */
  public function getOrderBys()
  {
    return $this->orderBys;
  }
}
