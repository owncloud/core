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

class WaterfallChartSpec extends \Google\Collection
{
  protected $collection_key = 'series';
  protected $connectorLineStyleType = LineStyle::class;
  protected $connectorLineStyleDataType = '';
  protected $domainType = WaterfallChartDomain::class;
  protected $domainDataType = '';
  /**
   * @var bool
   */
  public $firstValueIsTotal;
  /**
   * @var bool
   */
  public $hideConnectorLines;
  protected $seriesType = WaterfallChartSeries::class;
  protected $seriesDataType = 'array';
  /**
   * @var string
   */
  public $stackedType;
  protected $totalDataLabelType = DataLabel::class;
  protected $totalDataLabelDataType = '';

  /**
   * @param LineStyle
   */
  public function setConnectorLineStyle(LineStyle $connectorLineStyle)
  {
    $this->connectorLineStyle = $connectorLineStyle;
  }
  /**
   * @return LineStyle
   */
  public function getConnectorLineStyle()
  {
    return $this->connectorLineStyle;
  }
  /**
   * @param WaterfallChartDomain
   */
  public function setDomain(WaterfallChartDomain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return WaterfallChartDomain
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param bool
   */
  public function setFirstValueIsTotal($firstValueIsTotal)
  {
    $this->firstValueIsTotal = $firstValueIsTotal;
  }
  /**
   * @return bool
   */
  public function getFirstValueIsTotal()
  {
    return $this->firstValueIsTotal;
  }
  /**
   * @param bool
   */
  public function setHideConnectorLines($hideConnectorLines)
  {
    $this->hideConnectorLines = $hideConnectorLines;
  }
  /**
   * @return bool
   */
  public function getHideConnectorLines()
  {
    return $this->hideConnectorLines;
  }
  /**
   * @param WaterfallChartSeries[]
   */
  public function setSeries($series)
  {
    $this->series = $series;
  }
  /**
   * @return WaterfallChartSeries[]
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
class_alias(WaterfallChartSpec::class, 'Google_Service_Sheets_WaterfallChartSpec');
