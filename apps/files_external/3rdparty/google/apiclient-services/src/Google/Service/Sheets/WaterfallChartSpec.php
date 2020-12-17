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

class Google_Service_Sheets_WaterfallChartSpec extends Google_Collection
{
  protected $collection_key = 'series';
  protected $connectorLineStyleType = 'Google_Service_Sheets_LineStyle';
  protected $connectorLineStyleDataType = '';
  protected $domainType = 'Google_Service_Sheets_WaterfallChartDomain';
  protected $domainDataType = '';
  public $firstValueIsTotal;
  public $hideConnectorLines;
  protected $seriesType = 'Google_Service_Sheets_WaterfallChartSeries';
  protected $seriesDataType = 'array';
  public $stackedType;

  /**
   * @param Google_Service_Sheets_LineStyle
   */
  public function setConnectorLineStyle(Google_Service_Sheets_LineStyle $connectorLineStyle)
  {
    $this->connectorLineStyle = $connectorLineStyle;
  }
  /**
   * @return Google_Service_Sheets_LineStyle
   */
  public function getConnectorLineStyle()
  {
    return $this->connectorLineStyle;
  }
  /**
   * @param Google_Service_Sheets_WaterfallChartDomain
   */
  public function setDomain(Google_Service_Sheets_WaterfallChartDomain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartDomain
   */
  public function getDomain()
  {
    return $this->domain;
  }
  public function setFirstValueIsTotal($firstValueIsTotal)
  {
    $this->firstValueIsTotal = $firstValueIsTotal;
  }
  public function getFirstValueIsTotal()
  {
    return $this->firstValueIsTotal;
  }
  public function setHideConnectorLines($hideConnectorLines)
  {
    $this->hideConnectorLines = $hideConnectorLines;
  }
  public function getHideConnectorLines()
  {
    return $this->hideConnectorLines;
  }
  /**
   * @param Google_Service_Sheets_WaterfallChartSeries[]
   */
  public function setSeries($series)
  {
    $this->series = $series;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartSeries[]
   */
  public function getSeries()
  {
    return $this->series;
  }
  public function setStackedType($stackedType)
  {
    $this->stackedType = $stackedType;
  }
  public function getStackedType()
  {
    return $this->stackedType;
  }
}
