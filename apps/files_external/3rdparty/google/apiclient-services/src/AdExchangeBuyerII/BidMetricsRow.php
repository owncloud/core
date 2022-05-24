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

namespace Google\Service\AdExchangeBuyerII;

class BidMetricsRow extends \Google\Model
{
  protected $bidsType = MetricValue::class;
  protected $bidsDataType = '';
  protected $bidsInAuctionType = MetricValue::class;
  protected $bidsInAuctionDataType = '';
  protected $billedImpressionsType = MetricValue::class;
  protected $billedImpressionsDataType = '';
  protected $impressionsWonType = MetricValue::class;
  protected $impressionsWonDataType = '';
  protected $measurableImpressionsType = MetricValue::class;
  protected $measurableImpressionsDataType = '';
  protected $reachedQueriesType = MetricValue::class;
  protected $reachedQueriesDataType = '';
  protected $rowDimensionsType = RowDimensions::class;
  protected $rowDimensionsDataType = '';
  protected $viewableImpressionsType = MetricValue::class;
  protected $viewableImpressionsDataType = '';

  /**
   * @param MetricValue
   */
  public function setBids(MetricValue $bids)
  {
    $this->bids = $bids;
  }
  /**
   * @return MetricValue
   */
  public function getBids()
  {
    return $this->bids;
  }
  /**
   * @param MetricValue
   */
  public function setBidsInAuction(MetricValue $bidsInAuction)
  {
    $this->bidsInAuction = $bidsInAuction;
  }
  /**
   * @return MetricValue
   */
  public function getBidsInAuction()
  {
    return $this->bidsInAuction;
  }
  /**
   * @param MetricValue
   */
  public function setBilledImpressions(MetricValue $billedImpressions)
  {
    $this->billedImpressions = $billedImpressions;
  }
  /**
   * @return MetricValue
   */
  public function getBilledImpressions()
  {
    return $this->billedImpressions;
  }
  /**
   * @param MetricValue
   */
  public function setImpressionsWon(MetricValue $impressionsWon)
  {
    $this->impressionsWon = $impressionsWon;
  }
  /**
   * @return MetricValue
   */
  public function getImpressionsWon()
  {
    return $this->impressionsWon;
  }
  /**
   * @param MetricValue
   */
  public function setMeasurableImpressions(MetricValue $measurableImpressions)
  {
    $this->measurableImpressions = $measurableImpressions;
  }
  /**
   * @return MetricValue
   */
  public function getMeasurableImpressions()
  {
    return $this->measurableImpressions;
  }
  /**
   * @param MetricValue
   */
  public function setReachedQueries(MetricValue $reachedQueries)
  {
    $this->reachedQueries = $reachedQueries;
  }
  /**
   * @return MetricValue
   */
  public function getReachedQueries()
  {
    return $this->reachedQueries;
  }
  /**
   * @param RowDimensions
   */
  public function setRowDimensions(RowDimensions $rowDimensions)
  {
    $this->rowDimensions = $rowDimensions;
  }
  /**
   * @return RowDimensions
   */
  public function getRowDimensions()
  {
    return $this->rowDimensions;
  }
  /**
   * @param MetricValue
   */
  public function setViewableImpressions(MetricValue $viewableImpressions)
  {
    $this->viewableImpressions = $viewableImpressions;
  }
  /**
   * @return MetricValue
   */
  public function getViewableImpressions()
  {
    return $this->viewableImpressions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BidMetricsRow::class, 'Google_Service_AdExchangeBuyerII_BidMetricsRow');
