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

class PathReportCompatibleFields extends \Google\Collection
{
  protected $collection_key = 'pathFilters';
  protected $channelGroupingsType = Dimension::class;
  protected $channelGroupingsDataType = 'array';
  protected $dimensionsType = Dimension::class;
  protected $dimensionsDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'array';
  protected $pathFiltersType = Dimension::class;
  protected $pathFiltersDataType = 'array';

  /**
   * @param Dimension[]
   */
  public function setChannelGroupings($channelGroupings)
  {
    $this->channelGroupings = $channelGroupings;
  }
  /**
   * @return Dimension[]
   */
  public function getChannelGroupings()
  {
    return $this->channelGroupings;
  }
  /**
   * @param Dimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Dimension[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
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
   * @param Dimension[]
   */
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
  /**
   * @return Dimension[]
   */
  public function getPathFilters()
  {
    return $this->pathFilters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PathReportCompatibleFields::class, 'Google_Service_Dfareporting_PathReportCompatibleFields');
