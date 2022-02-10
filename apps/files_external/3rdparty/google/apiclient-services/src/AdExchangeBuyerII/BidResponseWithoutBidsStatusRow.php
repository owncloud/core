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

class BidResponseWithoutBidsStatusRow extends \Google\Model
{
  protected $impressionCountType = MetricValue::class;
  protected $impressionCountDataType = '';
  protected $rowDimensionsType = RowDimensions::class;
  protected $rowDimensionsDataType = '';
  /**
   * @var string
   */
  public $status;

  /**
   * @param MetricValue
   */
  public function setImpressionCount(MetricValue $impressionCount)
  {
    $this->impressionCount = $impressionCount;
  }
  /**
   * @return MetricValue
   */
  public function getImpressionCount()
  {
    return $this->impressionCount;
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
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BidResponseWithoutBidsStatusRow::class, 'Google_Service_AdExchangeBuyerII_BidResponseWithoutBidsStatusRow');
