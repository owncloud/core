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

class CandlestickData extends \Google\Model
{
  protected $closeSeriesType = CandlestickSeries::class;
  protected $closeSeriesDataType = '';
  protected $highSeriesType = CandlestickSeries::class;
  protected $highSeriesDataType = '';
  protected $lowSeriesType = CandlestickSeries::class;
  protected $lowSeriesDataType = '';
  protected $openSeriesType = CandlestickSeries::class;
  protected $openSeriesDataType = '';

  /**
   * @param CandlestickSeries
   */
  public function setCloseSeries(CandlestickSeries $closeSeries)
  {
    $this->closeSeries = $closeSeries;
  }
  /**
   * @return CandlestickSeries
   */
  public function getCloseSeries()
  {
    return $this->closeSeries;
  }
  /**
   * @param CandlestickSeries
   */
  public function setHighSeries(CandlestickSeries $highSeries)
  {
    $this->highSeries = $highSeries;
  }
  /**
   * @return CandlestickSeries
   */
  public function getHighSeries()
  {
    return $this->highSeries;
  }
  /**
   * @param CandlestickSeries
   */
  public function setLowSeries(CandlestickSeries $lowSeries)
  {
    $this->lowSeries = $lowSeries;
  }
  /**
   * @return CandlestickSeries
   */
  public function getLowSeries()
  {
    return $this->lowSeries;
  }
  /**
   * @param CandlestickSeries
   */
  public function setOpenSeries(CandlestickSeries $openSeries)
  {
    $this->openSeries = $openSeries;
  }
  /**
   * @return CandlestickSeries
   */
  public function getOpenSeries()
  {
    return $this->openSeries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CandlestickData::class, 'Google_Service_Sheets_CandlestickData');
