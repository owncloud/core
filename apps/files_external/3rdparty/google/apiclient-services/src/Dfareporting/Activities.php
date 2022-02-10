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

namespace Google\Service\Dfareporting;

class Activities extends \Google\Collection
{
  protected $collection_key = 'metricNames';
  protected $filtersType = DimensionValue::class;
  protected $filtersDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $metricNames;

  /**
   * @param DimensionValue[]
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return DimensionValue[]
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  /**
   * @return string[]
   */
  public function getMetricNames()
  {
    return $this->metricNames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Activities::class, 'Google_Service_Dfareporting_Activities');
