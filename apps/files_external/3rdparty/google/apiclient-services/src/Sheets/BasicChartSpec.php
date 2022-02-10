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

namespace Google\Service\Sheets;

class BasicChartSpec extends \Google\Collection
{
  protected $collection_key = 'series';
  protected $axisType = BasicChartAxis::class;
  protected $axisDataType = 'array';
  /**
   * @var string
   */
  public $chartType;
  /**
   * @var string
   */
  public $compareMode;
  protected $domainsType = BasicChartDomain::class;
  protected $domainsDataType = 'array';
  /**
   * @var int
   */
  public $headerCount;
  /**
   * @var bool
   */
  public $interpolateNulls;
  /**
   * @var string
   */
  public $legendPosition;
  /**
   * @var bool
   */
  public $lineSmoothing;
  protected $seriesType = BasicChartSeries::class;
  protected $seriesDataType = 'array';
  /**
   * @var string
   */
  public $stackedType;
  /**
   * @var bool
   */
  public $threeDimensional;
  protected $totalDataLabelType = DataLabel::class;
  protected $totalDataLabelDataType = '';

  /**
   * @param BasicChartAxis[]
   */
  public function setAxis($axis)
  {
    $this->axis = $axis;
  }
  /**
   * @return BasicChartAxis[]
   */
  public function getAxis()
  {
    return $this->axis;
  }
  /**
   * @param string
   */
  public function setChartType($chartType)
  {
    $this->chartType = $chartType;
  }
  /**
   * @return string
   */
  public function getChartType()
  {
    return $this->chartType;
  }
  /**
   * @param string
   */
  public function setCompareMode($compareMode)
  {
    $this->compareMode = $compareMode;
  }
  /**
   * @return string
   */
  public function getCompareMode()
  {
    return $this->compareMode;
  }
  /**
   * @param BasicChartDomain[]
   */
  public function setDomains($domains)
  {
    $this->domains = $domains;
  }
  /**
   * @return BasicChartDomain[]
   */
  public function getDomains()
  {
    return $this->domains;
  }
  /**
   * @param int
   */
  public function setHeaderCount($headerCount)
  {
    $this->headerCount = $headerCount;
  }
  /**
   * @return int
   */
  public function getHeaderCount()
  {
    return $this->headerCount;
  }
  /**
   * @param bool
   */
  public function setInterpolateNulls($interpolateNulls)
  {
    $this->interpolateNulls = $interpolateNulls;
  }
  /**
   * @return bool
   */
  public function getInterpolateNulls()
  {
    return $this->interpolateNulls;
  }
  /**
   * @param string
   */
  public function setLegendPosition($legendPosition)
  {
    $this->legendPosition = $legendPosition;
  }
  /**
   * @return string
   */
  public function getLegendPosition()
  {
    return $this->legendPosition;
  }
  /**
   * @param bool
   */
  public function setLineSmoothing($lineSmoothing)
  {
    $this->lineSmoothing = $lineSmoothing;
  }
  /**
   * @return bool
   */
  public function getLineSmoothing()
  {
    return $this->lineSmoothing;
  }
  /**
   * @param BasicChartSeries[]
   */
  public function setSeries($series)
  {
    $this->series = $series;
  }
  /**
   * @return BasicChartSeries[]
   */
  public function getSeries()
  {
    return $this->series;
  }
  /**
   * @param string
   */
  public function setStackedType($stackedType)
  {
    $this->stackedType = $stackedType;
  }
  /**
   * @return string
   */
  public function getStackedType()
  {
    return $this->stackedType;
  }
  /**
   * @param bool
   */
  public function setThreeDimensional($threeDimensional)
  {
    $this->threeDimensional = $threeDimensional;
  }
  /**
   * @return bool
   */
  public function getThreeDimensional()
  {
    return $this->threeDimensional;
  }
  /**
   * @param DataLabel
   */
  public function setTotalDataLabel(DataLabel $totalDataLabel)
  {
    $this->totalDataLabel = $totalDataLabel;
  }
  /**
   * @return DataLabel
   */
  public function getTotalDataLabel()
  {
    return $this->totalDataLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicChartSpec::class, 'Google_Service_Sheets_BasicChartSpec');
