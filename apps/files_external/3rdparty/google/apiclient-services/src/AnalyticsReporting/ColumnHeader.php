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

namespace Google\Service\AnalyticsReporting;

class ColumnHeader extends \Google\Collection
{
  protected $collection_key = 'dimensions';
  public $dimensions;
  protected $metricHeaderType = MetricHeader::class;
  protected $metricHeaderDataType = '';

  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param MetricHeader
   */
  public function setMetricHeader(MetricHeader $metricHeader)
  {
    $this->metricHeader = $metricHeader;
  }
  /**
   * @return MetricHeader
   */
  public function getMetricHeader()
  {
    return $this->metricHeader;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ColumnHeader::class, 'Google_Service_AnalyticsReporting_ColumnHeader');
