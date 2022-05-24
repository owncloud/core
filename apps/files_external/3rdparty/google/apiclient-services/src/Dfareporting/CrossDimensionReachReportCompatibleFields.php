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

class CrossDimensionReachReportCompatibleFields extends \Google\Collection
{
  protected $collection_key = 'overlapMetrics';
  protected $breakdownType = Dimension::class;
  protected $breakdownDataType = 'array';
  protected $dimensionFiltersType = Dimension::class;
  protected $dimensionFiltersDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'array';
  protected $overlapMetricsType = Metric::class;
  protected $overlapMetricsDataType = 'array';

  /**
   * @param Dimension[]
   */
  public function setBreakdown($breakdown)
  {
    $this->breakdown = $breakdown;
  }
  /**
   * @return Dimension[]
   */
  public function getBreakdown()
  {
    return $this->breakdown;
  }
  /**
   * @param Dimension[]
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return Dimension[]
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
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
   * @param Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Metric[]
   */
  public function setOverlapMetrics($overlapMetrics)
  {
    $this->overlapMetrics = $overlapMetrics;
  }
  /**
   * @return Metric[]
   */
  public function getOverlapMetrics()
  {
    return $this->overlapMetrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrossDimensionReachReportCompatibleFields::class, 'Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields');
